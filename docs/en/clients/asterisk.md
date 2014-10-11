### asterisk # Asterisk #> Asterisk {tpl-git PHPDaemon/Clients/Asterisk}

```php
namespace PHPDaemon\Clients\Asterisk;
```

{tpl-outdated}


[Asterisk](http://www.asterisk.org) - это АТС с открытым исходным кодом.
AMI - программный интерфейс (API) Asterisk для управления системой, который позволяет разработчикам отправлять команды на сервер, считывать результаты их выполнения, а так же получать уведомления о происходящих событиях в реальном времени.
Клиент Asterisk обеспечивает высокоуровневый интерфейс к AMI, позволяющий разработчикам контролировать сервер Asterisk из приложений.

В основе документирования клиента лежит материал книги [Asterisk: будущее телефонии](http://asterisk.ru/store/files/Asterisk_RU_OReilly_DRAFT.pdf).

#### use # Использование

@TODO это из вики, проверить

Перед тем как посылать команды и получать события с сервера, нужно получить сессию(сессии) соединения(соединений) в вашем приложении. В вашем приложении вы получаете объект AsteriskDriver посредством:

```php
$this->pbxDriver = Daemon::$appResolver->getInstanceByAppName('AsteriskDriver');
```

##### connect # Соединение

Далее получаете объект AsteriskDriverSession посредством:

```php
$session = $this->pbxDriver->getConnection();
// или
foreach($this->pbxConnections as $addr => $conn) {
    $session = $this->pbxDriver->getConnection($addr);
    // что-нибудь делаем...
}
```

Добавляете (композиция) в него текущий контекст соединения посредством:

```php
$session->context = $this;
```

При соединении:

```php
$session->onConnected(function(SocketSession $session, $status) {
    // ваш код, в зависимости от соединения
});
```

При разрыве:

```php
$session->onFinish(function(SocketSession $session) {
    // возможно запустить интервал реконнекта...
});
```

Предположим у вас несколько серверов Asterisk с которых вы хотите получать события(events) и на которые вы хотите отправлять команды(actions). Так же вы хотите отслеживать падение соединения(connection failed), и осуществлять реконнект. Смотрите пример реконнекта ниже.

##### io # Немного о формате ввода-вывода

Хотя протокол AMI является строковым, драйвер при вводе-выводе работает с ассоциативными массивами. При получении ответа на действие или события все заголовки и их значения приводятся к нижнему регистру, если значение не содержит информацию, для которой важен регистр - например имя пира.

##### cmds # Отправка команд и получение ответа

Для отправки команды и получения ответа вы можете воспользоваться либо методом-помощником, который снабжен подробным комментарием из документации Asterisk, либо универсальным методом Connection::action.

В любом случае для каждой команды вы определяете функцию обратного вызова, в которую будет передан объект сессии соединения и ассоциативный массив пар заголовок-значение ответа.

Клиент корректно обрабатывает, что порядок следования пакетов ответа не определен, корректно собирает составные пакеты ответа.

```php
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
```

##### events # Получение событий сервера

Функция обратного вызова при наступлении события в данном соединении определяется один раз и передается методу onEvent().

```php
$session->onEvent(array($this, 'onPbxEvent'));
```

Когда запущено несколько воркеров, чтобы не получилось, что события канала(характеризуются наличием уникального идентификатора(uniqueid) канала) кратны количеству воркеров(workers) можно воспользоваться таблицей блокировки. Вот пример, когда в качестве таблицы блокировки используется MongoDB коллекция(collection), которая позволяет ставить уникальный индекс на документ:

```php
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
```

#### example # Пример реконнекта

```php
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
```

#### pool # Класс Pool {tpl-git PHPDaemon/Clients/Asterisk/Pool.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Опции по-умолчанию

 - `authtype (string = 'md5')`
 - `port (integer = 5280)`

##### methods # Методы

<md:method>
boolean public static getConnection ( callable $cb )
boolean public static getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )

Выполняет callback-функцию когда будет установлена связь с сервером. Возвращает `false` если соединение невозможно установить

$cb
callback ( [Connection](#../../connection) $conn, array $packet )
вызывается когда будет установлена связь с сервером

$url
адрес сервера

$pri
приоритет данного вызова среди других. Чем больше значение, тем выше приоритет
</md:method>

<md:method>
</md:method>

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/Asterisk/Connection.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### methods # Методы

<md:method>
void public getSipPeers ( callable $cb )

Выводит список сконфигурированных в данный момент равноправных участников SIP с указанием их статуса  
Привилегии: system, all

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getIaxPeers ( callable $cb )

Выводит список всех равноправных участников IAX2 с указанием их текущего статуса  
Привилегии: none

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getConfig ( string $filename, callable $cb )

Извлекает данные из конфигурационного файла Asterisk  
Привилегии: config, all

$filename
имя конфигурационного файла, из которого должны извлекаться данные

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getConfigJSON ( string $filename, callable $cb )

Возвращает данные из конфигурационного файла Asterisk в JSON формате  
Привилегии: config, all

$filename
имя конфигурационного файла, из которого должны извлекаться данные

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public setVar ( string $channel, string $variable, string $value, callable $cb )

Задает значение глобальной переменной или переменной канала  
Привилегии: call, all

$channel
канал, для переменной которого задается значение. Если не указан, переменная будет задана как глобальная

$variable
имя переменной

$value
значение

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public coreShowChannels ( callable $cb )

Отображает все активные каналы

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public status ( callable $cb, string $channel = null )

Представляет статус одного или более каналов с подробной информацией об их текущем состоянии  
Привилегии: call, all

$channel
ограничивает вывод статусом заданного канала

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public redirect ( array $params, callable $cb )

Перенаправляет канал в новый контекст, добавочный номер и приоритет диалплана  
Привилегии: call, all

$params
ассоциативный массив параметров команды

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public originate ( array $params, callable $cb )

Формирует исходящий вызов из Asterisk и соединяет канал с контекстом/добавочным номером/приоритетом или приложением диалплана  
Привилегии: call, all

$params
ассоциативный массив параметров команды

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public extensionState ( array $params, callable $cb )

Сообщает о состоянии заданного добавочного номера. Если добавочный номер имеет подсказку, эта команда обеспечит передачу состояния устройства, соединенного с данным добавочным номером  
Привилегии: call, all

$params
ассоциативный массив параметров команды

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public ping ( callable $cb )

Посылает запрос на сервер Asterisk, чтобы убедиться, что он до сих пор отвечает. Asterisk ответит сообщением Pong. Эта команда также может использоваться, чтобы не допустить разрыва соединения в результате истечения времени ожидания

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public action ( string $action, callable $cb, array $params = null, array $assertion = null )

Отправляет на сервер произвольную команду

$action
команда

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат

$params
ассоциативный массив параметров команды

$assertion
@TODO If more events may follow as response this is a main part or full an action complete event indicating that all data has been sent
</md:method>

<md:method>
void public logoff ( callable $cb = null )

Завершает сеанс

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>