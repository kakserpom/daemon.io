### asterisk # Asterisk #> Asterisk {tpl-git PHPDaemon/Clients/Asterisk}

```php
namespace PHPDaemon\Clients\Asterisk;
```

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
   -.n Привилегии: system, all

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getIaxPeers ( callable $cb )

Выводит список всех равноправных участников IAX2 с указанием их текущего статуса
   -.n Привилегии: none

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getConfig ( string $filename, callable $cb )

Извлекает данные из конфигурационного файла Asterisk
   -.n Привилегии: config, all

$filename
имя конфигурационного файла, из которого должны извлекаться данные

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public getConfigJSON ( string $filename, callable $cb )

Возвращает данные из конфигурационного файла Asterisk в JSON формате
   -.n Привилегии: config, all

$filename
имя конфигурационного файла, из которого должны извлекаться данные

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public setVar ( string $channel, string $variable, string $value, callable $cb )

Задает значение глобальной переменной или переменной канала
   -.n Привилегии: call, all

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
   -.n Привилегии: call, all

$channel
ограничивает вывод статусом заданного канала

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public redirect ( array $params, callable $cb )

Перенаправляет канал в новый контекст, добавочный номер и приоритет диалплана
   -.n Привилегии: call, all

$params
ассоциативный массив параметров команды

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public originate ( array $params, callable $cb )

Формирует исходящий вызов из Asterisk и соединяет канал с контекстом/добавочным номером/приоритетом или приложением диалплана
   -.n Привилегии: call, all

$params
ассоциативный массив параметров команды

$cb
callback ( [Connection](#../) $conn, array $packet )
вызывается когда будет получен результат
</md:method>

<md:method>
void public extensionState ( array $params, callable $cb )

Сообщает о состоянии заданного добавочного номера. Если добавочный номер имеет подсказку, эта команда обеспечит передачу состояния устройства, соединенного с данным добавочным номером
   -.n Привилегии: call, all

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