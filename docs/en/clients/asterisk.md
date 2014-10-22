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

<!-- include-namespace path="\PHPDaemon\Clients\Asterisk" commit="bdb7b502568a245704a5ab6df9ba1d47f5a189fa" level="" access="" -->
#### connection-finished # Class ConnectionFinished {tpl-git PHPDaemon/Clients/Asterisk/ConnectionFinished.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class ConnectionFinished extends \PHPDaemon\Exceptions\ConnectionFinished;
```

#### connection # Class Connection {tpl-git PHPDaemon/Clients/Asterisk/Connection.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
const CONN_STATE_START = 0;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_GOT_INITIAL_PACKET = 0.1;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_AUTH = 1;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_LOGIN_PACKET_SENT = 1.1;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_CHALLENGE_PACKET_SENT = 1.2;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_LOGIN_PACKET_SENT_AFTER_CHALLENGE = 1.3;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_HANDSHAKED_OK = 2.1;
@TODO DESCR
</md:const>

<md:const>
const CONN_STATE_HANDSHAKED_ERROR = 2.2;
@TODO DESCR
</md:const>

<md:const>
const INPUT_STATE_START = 0;
@TODO DESCR
</md:const>

<md:const>
const INPUT_STATE_END_OF_PACKET = 1;
@TODO DESCR
</md:const>

<md:const>
const INPUT_STATE_PROCESSING = 2;
@TODO DESCR
</md:const>

##### properties # Properties

<md:prop>
/**
	 * @TODO DESCR
	 * @var string
	 */
public $EOL;
</md:prop>

<md:prop>
/**
	 * The username to access the interface.
	 * @var string
	 */
public $username;
</md:prop>

<md:prop>
/**
	 * The password defined in manager interface of server.
	 * @var string
	 */
public $secret;
</md:prop>

<md:prop>
/**
	 * Connection's state.
	 * @var float
	 */
public $state;
</md:prop>

<md:prop>
/**
	 * Input state.
	 * @var integer
	 */
public $instate;
</md:prop>

<md:prop>
/**
	 * Received packets.
	 * @var array
	 */
public $packets;
</md:prop>

<md:prop>
/**
	 * For composite response on action.
	 * @var integer
	 */
public $cnt;
</md:prop>

<md:prop>
/**
	 * Stack of callbacks called when response received.
	 * @var array
	 */
public $callbacks;
</md:prop>

<md:prop>
/**
	 * Assertions for callbacks.
	 * Assertion: if more events may follow as response this is a main part or full
	 * an action complete event indicating that all data has been sent.
	 *
	 * @var array
	 */
public $assertions;
</md:prop>

<md:prop>
/**
	 * Callback. Called when received response on challenge action.
	 * @var callback
	 */
public $onChallenge;
</md:prop>

<md:prop>
/**
	 * Associated pool
	 * @var object ConnectionPool
	 */
public $pool;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Execute the given callback when/if the connection is handshaked.
	 * @param Callback
	 * @return void
	 */
public function onConnected($cb)
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
</md:method>

<md:method>
/**
	 * Called when the worker is going to shutdown
	 * @return boolean Ready to shutdown?
	 */
public function gracefulShutdown()
</md:method>

<md:method>
/**
	 * Called when session finishes
	 * @return void
	 */
public function onFinish()
</md:method>

<md:method>
/**
	 * Called when new data received.
	 * @return void
	 */
public function onRead()
</md:method>

<md:method>
/**
	 * Action: SIPpeers
	 * Synopsis: List SIP peers (text format)
	 * Privilege: system,reporting,all
	 * Description: Lists SIP peers in text format with details on current status.
	 * Peerlist will follow as separate events, followed by a final event called
	 * PeerlistComplete.
	 * Variables:
	 * ActionID: <id>    Action ID for this transaction. Will be returned.
	 *
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function getSipPeers($cb)
</md:method>

<md:method>
/**
	 * Action: IAXpeerlist
	 * Synopsis: List IAX Peers
	 * Privilege: system,reporting,all
	 *
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function getIaxPeers($cb)
</md:method>

<md:method>
/**
	 * Action: GetConfig
	 * Synopsis: Retrieve configuration
	 * Privilege: system,config,all
	 * Description: A 'GetConfig' action will dump the contents of a configuration
	 * file by category and contents or optionally by specified category only.
	 * Variables: (Names marked with * are required)
	 *   *Filename: Configuration filename (e.g. foo.conf)
	 *   Category: Category in configuration file
	 *
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function getConfig($filename, $cb)
</md:method>

<md:method>
/**
	 * Action: GetConfigJSON
	 * Synopsis: Retrieve configuration
	 * Privilege: system,config,all
	 * Description: A 'GetConfigJSON' action will dump the contents of a configuration
	 * file by category and contents in JSON format.  This only makes sense to be used
	 * using rawman over the HTTP interface.
	 * Variables:
	 *    Filename: Configuration filename (e.g. foo.conf)
	 *
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function getConfigJSON($filename, $cb)
</md:method>

<md:method>
/**
	 * Action: Setvar
	 * Synopsis: Set Channel Variable
	 * Privilege: call,all
	 * Description: Set a global or local channel variable.
	 * Variables: (Names marked with * are required)
	 * Channel: Channel to set variable for
	 *  *Variable: Variable name
	 *  *Value: Value
	 */
public function setVar($channel, $variable, $value, $cb)
</md:method>

<md:method>
/**
	 * Action: CoreShowChannels
	 * Synopsis: List currently active channels
	 * Privilege: system,reporting,all
	 * Description: List currently defined channels and some information
	 *        about them.
	 * Variables:
	 *        ActionID: Optional Action id for message matching.
	 */
public function coreShowChannels($cb)
</md:method>

<md:method>
/**
	 * Action: Status
	 * Synopsis: Lists channel status
	 * Privilege: system,call,reporting,all
	 * Description: Lists channel status along with requested channel vars.
	 * Variables: (Names marked with * are required)
	 *Channel: Name of the channel to query for status
	 *    Variables: Comma ',' separated list of variables to include
	 * ActionID: Optional ID for this transaction
	 * Will return the status information of each channel along with the
	 * value for the specified channel variables.
	 */
public function status($cb, $channel = null)
</md:method>

<md:method>
/**
	 * Action: Redirect
	 * Synopsis: Redirect (transfer) a call
	 * Privilege: call,all
	 * Description: Redirect (transfer) a call.
	 * Variables: (Names marked with * are required)
	 * *Channel: Channel to redirect
	 *  ExtraChannel: Second call leg to transfer (optional)
	 * *Exten: Extension to transfer to
	 * *Context: Context to transfer to
	 * *Priority: Priority to transfer to
	 * ActionID: Optional Action id for message matching.
	 *
	 * @param array $params
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function redirect(array $params, $cb)
</md:method>

<md:method>
/**
	 * Action: Originate
	 * Synopsis: Originate a call
	 * Privilege: call,all
	 * Description: first the Channel is rung. Then, when that answers, the Extension is dialled within the Context
	 *  to initiate the other end of the call.
	 * Variables: (Names marked with * are required)
	 * *Channel: Channel on which to originate the call (The same as you specify in the Dial application command)
	 * *Context: Context to use on connect (must use Exten & Priority with it)
	 * *Exten: Extension to use on connect (must use Context & Priority with it)
	 * *Priority: Priority to use on connect (must use Context & Exten with it)
	 * Timeout: Timeout (in milliseconds) for the originating connection to happen(defaults to 30000 milliseconds)
	 * *CallerID: CallerID to use for the call
	 * Variable: Channels variables to set (max 32). Variables will be set for both channels (local and connected).
	 * Account: Account code for the call
	 * Application: Application to use on connect (use Data for parameters)
	 * Data : Data if Application parameter is used
	 * ActionID: Optional Action id for message matching.
	 *
	 * @param array $params
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function originate(array $params, $cb)
</md:method>

<md:method>
/**
	 * Action: ExtensionState
	 * Synopsis: Get an extension's state.
	 * Description: function can be used to retrieve the state from any	hinted extension.
	 * Variables: (Names marked with * are required)
	 * *Exten: Extension to get state
	 * Context: Context for exten
	 * ActionID: Optional Action id for message matching.
	 *
	 * @param array $params
	 * @param callable $cb Callback called when response received.
	 * @return void
	 */
public function extensionState(array $params, $cb)
</md:method>

<md:method>
/**
	 * Action: Ping
	 * Description: A 'Ping' action will ellicit a 'Pong' response.  Used to keep the
	 *   manager connection open.
	 * Variables: NONE
	 *
	 * @param calalble Callback called when response received.
	 * @return void
	 */
public function ping($cb)
</md:method>

<md:method>
/**
	 * For almost any actions in Action: ListCommands
	 * Privilege: depends on $action
	 *
	 * @param string $action
	 * @param callable              Callback called when response received.
	 * @param array|null $params
	 * @param array|null $assertion If more events may follow as response this is a main part or full an action complete event indicating that all data has been sent.
	 * @return void
	 */
public function action($action, $cb, array $params = null, array $assertion = null)
</md:method>

<md:method>
/**
	 * Action: Logoff
	 * Synopsis: Logoff Manager
	 * Privilege: <none>
	 * Description: Logoff this manager session
	 * Variables: NONE
	 *
	 * @param callable $cb Optional callback called when response received
	 * @return void
	 */
public function logoff($cb = null)
</md:method>

<md:method>
/**
	 * Called when event occured.
	 * @param callable $cb Callback
	 * @deprecated Replaced with ->bind('event', ...)
	 * @return void
	 */
public function onEvent($cb)
</md:method>

#### pool # Class Pool {tpl-git PHPDaemon/Clients/Asterisk/Pool.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Pool extends \PHPDaemon\Network\Client;
```

##### properties # Properties

<md:prop>
/**
	 * Beginning of the string in the header or value that indicates whether the save value case.
	 * @var array
	 */
public static $safeCaseValues;
</md:prop>

<md:prop>
/**
	 * Default connection class
	 * @var string
	 */
public $connectionClass;
</md:prop>

<md:prop>
/**
	 * Name
	 * @var string
	 */
public $name;
</md:prop>

<md:prop>
/**
	 * Configuration
	 * @var \PHPDaemon\Config\Section
	 */
public $config;
</md:prop>

<md:prop>
/**
	 * Max concurrency
	 * @var integer
	 */
public $maxConcurrency;
</md:prop>

<md:prop>
/**
	 * Max allowed packet
	 * @var integer
	 */
public $maxAllowedPacket;
</md:prop>

<md:prop>
/**
	 * Application instance object
	 * @var object|null
	 */
public $appInstance;
</md:prop>

##### methods # Methods

<md:method>
/** Sets AMI version
	 * @param string $addr Address
	 * @param string $ver  Version
	 * @return void
	 */
public function setAmiVersion($addr, $ver)
</md:method>

<md:method>
/** Prepares environment scope
	 * @param string $data Address
	 * @return array
	 */
public static function prepareEnv($data)
</md:method>

<md:method>
/**
	 * Extract key and value pair from line.
	 * @param string $line
	 * @return array
	 */
public static function extract($line)
</md:method>


<!--/ include-namespace -->
