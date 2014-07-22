### asterisk # Asterisk #> Asterisk {tpl-git PHPDaemon/Clients/Asterisk}

`:h`namespace PHPDaemon\Clients\Asterisk`

{tpl-outlink http://www.asterisk.org/ Asterisk} - это АТС с открытым исходным кодом.
AMI - программный интерфейс (API) Asterisk для управления системой, который позволяет разработчикам отправлять команды на сервер, считывать результаты их выполнения, а так же получать уведомления о происходящих событиях в реальном времени.
Клиент Asterisk обеспечивает высокоуровневый интерфейс к AMI, позволяющий разработчикам контролировать сервер Asterisk из приложений.

В основе документирования клиента лежит материал книги {tpl-outlink http://asterisk.ru/store/files/Asterisk_RU_OReilly_DRAFT.pdf Asterisk: будущее телефонии}.

Хотя протокол AMI является строковым, драйвер при вводе-выводе работает с ассоциативными массивами. При получении ответа на действие или события все заголовки и их значения приводятся к нижнему регистру, если значение не содержит информацию, для которой важен регистр - например имя пира.

Для отправки команды и получения ответа вы можете воспользоваться либо методом-помощником, который снабжен подробным комментарием из документации Asterisk, либо универсальным методом Connection::action.

В любом случае для каждой команды вы определяете функцию обратного вызова, в которую будет передан объект сессии соединения и ассоциативный массив пар заголовок-значение ответа.

Клиент корректно обрабатывает, что порядок следования пакетов ответа не определен, корректно собирает составные пакеты ответа.

#### use # Использование

@TODO

#### examples # Примеры

@TODO

```php
<?php
$session->getSipPeers(function(SocketSession $session, array $packet) {
    // $session->addr содержит адрес соединения
    // $session->context содержит контекст вызова (если был установлен)
    // $packet - это массив пар заголовок-значение ответа
    // что-нибудь делаем
})
// или
$session->getConfig('chan_dahdi.conf', array($this, 'doSomething'));
public function doSomething(SocketSession $session, array $packet) {

}
// или
$session->action('Ping', function(SocketSession $session, array $packet) {
    if($packet['response'] == 'success' && $packet['ping'] == 'pong') {
        // успешно сыграли в пинг-понг
    }    
});
// или
// $channel содержит канал из события
$session->redirect(array(
    'Channel' => $channel,
    'Context' => 'internal',
    'Exten' => '116',
    'Priority' => 1
), function(SocketSession $session, array $packet) {
  // узнаем успешно или нет из ответа сервера содержащегося в ассоциативном массиве $packet
});
?>
```

Функция обратного вызова при наступлении события в данном соединении определяется один раз и передается методу onEvent().

Когда запущено несколько воркеров, чтобы не получилось, что события канала(характеризуются наличием уникального идентификатора(uniqueid) канала) кратны количеству воркеров(workers) можно воспользоваться таблицей блокировки. Вот пример, когда в качестве таблицы блокировки используется MongoDB коллекция(collection), которая позволяет ставить уникальный индекс на документ:

```php
<?php
$session->onEvent(array($this, 'onPbxEvent'));
// db.events.ensureIndex({"event": 1, "addr": 1}, {unique: true});
public function onPbxEvent(SocketSession $session, array $event) {
    if(method_exists('Foo_PbxEventDispatcher', "{$event['event']}Handler")) {
        $handler = "{$event['event']}Handler";
        if(isset($event['uniqueid']) || isset($event['uniqueid1'])) {
            $appInstance = $this;
            $this->db->events->insert(
                array(
                        'ts' => microtime(true),
                        'event' => $event,
                        'addr' => $session->addr
                ),
                function($result) use ($appInstance, $session, $event) {
                    if($result['err'] === null) {
                        $handler = "{$event['event']}Handler";
                        Foo_PbxEventDispatcher::$handler($appInstance, $session, $event);
                    }
                }
            );
        }
        else {
            Foo_PbxEventDispatcher::$handler($this, $session, $event);
        }
    }
}
?>
```

Пример реконнекта


```php
<?php
class Foo extends AppInstance {
    // ...
    public function onInit() {
        // pbxConnections - array of connections
        foreach($this->pbxConnections as $addr => $conn) {
            $pbx_driver_session = $this->pbxDriver->getConnection($addr);
            if($pbx_driver_session instanceof SocketSession) {
                $pbx_driver_session->context = $this;
                //$pbx_driver_session->onError(array($this, 'onPbxError'));
                $pbx_driver_session->onConnected(array($this, 'onPbxConnected'));
                $pbx_driver_session->onEvent(array($this, 'onPbxEvent'));
                $pbx_driver_session->onFinish(array($this, 'onPbxFinish'));
            }
            else {
                $this->runPbxReconnectInterval($pbx_driver_session);
            }
        }
    }
    // ...
    public function onPbxConnected(SocketSession $session, $status) {
        if($status) {
            if($session->context instanceof PbxReconnector) {
                $session->context->finish();
            }
            // do something...
        }
        else {
            $this->runPbxReconnectInterval($session);
        }
    }
    // ...
    public function onPbxFinish(SocketSession $session) {
        $this->runPbxReconnectInterval($session);
    }
    // ...
    public function runPbxReconnectInterval(SocketSession $session) {
                if(Daemon::$process->terminated) {
            return;
        }
        foreach ($this->queue as &$r) {
            if($r instanceof PbxReconnector) {
                if ($r->attrs->addr == $session->addr) {
                    return;
                }
            }
        }
        $interval = $this->pushRequest(new PbxReconnector($this, $this));
        $interval->attrs->addr = $session->addr;
    }
    // ...
}
// ...
class PbxReconnector extends Request {
        public $interval = 0.3;

    public function run() {
        $pbx_driver_session = $this->appInstance->pbxDriver->getConnection($this->attrs->addr);
        if($pbx_driver_session) {
            if($this->appInstance->config->{'pbxreconnectorlogging'}->value) {
                Daemon::log('Reconnecting to ' . $this->attrs->addr);
            }
            $pbx_driver_session->context = $this;
            $pbx_driver_session->onConnected(array($this->appInstance, 'onPbxConnected'));
            $pbx_driver_session->onFinish(array($this->appInstance, 'onPbxFinish'));
        }
        $this->sleep($this->interval);
    }
}
?>
```

#### pool # Класс Pool {tpl-git PHPDaemon/Clients/Asterisk/Pool.php}

##### options # Опции по-умолчанию

 - `authtype (string = 'md5')`
 - `port (integer = 5280)`

##### methods # Методы

 -.method ```php.inline
 boolean public static Pool::getConnection ( callable $cb )
 boolean public static Pool::getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )
 ```
   -.n Выполняет callback-функцию когда будет установлена связь с сервером. Возвращает `false` если соединение невозможно установить
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет установлена связь с сервером
   -.n `:hc`$url` &mdash; адрес сервера
   -.n `:hc`$pri` &mdash; приоритет данного вызова среди других. Чем больше значение, тем выше приоритет

 -.n &nbsp;

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/Asterisk/Connection.php}

##### methods # Методы

 -.method ```php.inline
 void public Connection::getSipPeers ( callable $cb )
 ```
   -.n Выводит список сконфигурированных в данный момент равноправных участников SIP с указанием их статуса
   -.n Привилегии: system, all
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getIaxPeers ( callable $cb )
 ```
   -.n Выводит список всех равноправных участников IAX2 с указанием их текущего статуса
   -.n Привилегии: none
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getConfig ( string $filename, callable $cb )
 ```
   -.n Извлекает данные из конфигурационного файла Asterisk
   -.n Привилегии: config, all
   -.n.ti `:hc`$filename` &mdash; имя конфигурационного файла, из которого должны извлекаться данные
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getConfigJSON ( string $filename, callable $cb )
 ```
   -.n Возвращает данные из конфигурационного файла Asterisk в JSON формате
   -.n Привилегии: config, all
   -.n.ti `:hc`$filename` &mdash; имя конфигурационного файла, из которого должны извлекаться данные
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::setVar ( string $channel, string $variable, string $value, callable $cb )
 ```
   -.n Задает значение глобальной переменной или переменной канала
   -.n Привилегии: call, all
   -.n.ti `:hc`$channel` &mdash; канал, для переменной которого задается значение. Если не указан, переменная будет задана как глобальная
   -.n `:hc`$variable` &mdash; имя переменной
   -.n `:hc`$value` &mdash; значение
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::coreShowChannels ( callable $cb )
 ```
   -.n Отображает все активные каналы
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::status ( callable $cb, string $channel = null )
 ```
   -.n Представляет статус одного или более каналов с подробной информацией об их текущем состоянии
   -.n Привилегии: call, all
   -.n.ti `:hc`$channel` &mdash; ограничивает вывод статусом заданного канала
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::redirect ( array $params, callable $cb )
 ```
   -.n Перенаправляет канал в новый контекст, добавочный номер и приоритет диалплана
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::originate ( array $params, callable $cb )
 ```
   -.n Формирует исходящий вызов из Asterisk и соединяет канал с контекстом/добавочным номером/приоритетом или приложением диалплана
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::extensionState ( array $params, callable $cb )
 ```
   -.n Сообщает о состоянии заданного добавочного номера. Если добавочный номер имеет подсказку, эта команда обеспечит передачу состояния устройства, соединенного с данным добавочным номером
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::ping ( callable $cb )
 ```
   -.n Посылает запрос на сервер Asterisk, чтобы убедиться, что он до сих пор отвечает. Asterisk ответит сообщением Pong. Эта команда также может использоваться, чтобы не допустить разрыва соединения в результате истечения времени ожидания
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::action ( string $action, callable $cb, array $params = null, array $assertion = null )
 ```
   -.n Отправляет на сервер произвольную команду
   -.n.ti `:hc`$action` &mdash; команда
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат
   -.n `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$assertion` &mdash; @TODO If more events may follow as response this is a main part or full an action complete event indicating that all data has been sent

 -.method ```php.inline
 void public Connection::logoff ( callable $cb = null )
 ```
   -.n Завершает сеанс
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат
