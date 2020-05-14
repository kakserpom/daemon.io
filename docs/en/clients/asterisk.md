### asterisk # Asterisk #> Asterisk {tpl-git PHPDaemon/Clients/Asterisk}

```php
namespace PHPDaemon\Clients\Asterisk;
```

{tpl-outdated}


[Asterisk](http://www.asterisk.org) - is an open-source PBX.
AMI - Asterisk's software interface (API) for system management, which allows developers to send commands to the server, read the results of their execution, as well as receive notifications about events in real time.
The Asterisk client provides a high-level interface to AMI, allowing developers to control the Asterisk server from applications.

The documentation of the client is based on the material in the book [Asterisk: будущее телефонии](http://asterisk.ru/store/files/Asterisk_RU_OReilly_DRAFT.pdf).

#### use # Usage

@TODO it's from the wiki, check it out.

Before sending commands and receiving events from the server, you need to get the connection session(s) in your application. In your application you receive the AsteriskDriver object through:

```php
$this->pbxDriver = Daemon::$appResolver->getInstanceByAppName('AsteriskDriver');
```

##### connect # Connection

Next you get the AsteriskDriverSession object through:

```php
$session = $this->pbxDriver->getConnection();
// или
foreach($this->pbxConnections as $addr => $conn) {
    $session = $this->pbxDriver->getConnection($addr);
    // do something...
}
```

Add (composition) to it the current connection context by means of:

```php
$session->context = $this;
```

On connect:

```php
$session->onConnected(function(SocketSession $session, $status) {
    // your code, depending on the connection
});
```

On disconnect:

```php
$session->onFinish(function(SocketSession $session) {
    // maybe run reconnect interval
});
```

Suppose that you have multiple Asterisk servers from which you want to receive events and to which you want to send action commands. You also want to track down connection failure and perform a reconnect. See below for an example on how to reconnect.

##### io # A little bit about the I/O format

Although AMI is a string-based protocol, the driver works with associative arrays during I/O. When an action or event is replied to, all headers and their values are case-sensitive if the value does not contain case-sensitive information, such as the name of the pirate.

##### cmds # Sending commands and receiving a response

To send a command and receive a response, you can use either the helper method, which has a detailed explanation in the Asterisk documentation, or the universal Connection::action method.

In any case, for each command you define a callback function to which the connection session object and an associative header-value pair array will be passed.

The client correctly handles that the order of response packets is not defined and correctly assembles the response packets.

```php
$session->getSipPeers(function(SocketSession $session, array $packet) {
    // $session->addr contain the connection address
    // $session->context contains the call context (if installed)
    // $packet - is an array of response header-value pairs.
    // do something
})
// or
$session->getConfig('chan_dahdi.conf', array($this, 'doSomething'));
public function doSomething(SocketSession $session, array $packet) {

}
// or
$session->action('Ping', function(SocketSession $session, array $packet) {
    if($packet['response'] == 'success' && $packet['ping'] == 'pong') {
        // successfully played ping-pong
    }
});
// or
// $channel contains the channel from the event
$session->redirect(array(
    'Channel' => $channel,
    'Context' => 'internal',
    'Exten' => '116',
    'Priority' => 1
), function(SocketSession $session, array $packet) {
  // find out whether it was successful or not from the server response contained in the $packet associative array
});
```

##### events # Receiving server events

The callback function when an event occurs in this connection is defined once and passed to the onEvent() method.

```php
$session->onEvent(array($this, 'onPbxEvent'));
```

When several worker are launched, you can use the lock table to avoid that the channel events (which are characterized by a unique identifier (uniqueid) of the channel) are multiple of the number of workers. Here is an example, when MongoDB collection is used as a lock table, which allows to put a unique index on a document:

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

#### example # Example on how to reconnect

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

<!-- include-namespace path="\PHPDaemon\Clients\Asterisk" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Asterisk/Connection.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

Asterisk Call Manager Connection

##### consts # Constants

<md:const>
@TODO DESCR
const CONN_STATE_START = 0
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_GOT_INITIAL_PACKET = 0.1
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_AUTH = 1
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_LOGIN_PACKET_SENT = 1.1
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_CHALLENGE_PACKET_SENT = 1.2
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_LOGIN_PACKET_SENT_AFTER_CHALLENGE = 1.3
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_HANDSHAKED_OK = 2.1
</md:const>

<md:const>
@TODO DESCR
const CONN_STATE_HANDSHAKED_ERROR = 2.2
</md:const>

<md:const>
@TODO DESCR
const INPUT_STATE_START = 0
</md:const>

<md:const>
@TODO DESCR
const INPUT_STATE_END_OF_PACKET = 1
</md:const>

<md:const>
@TODO DESCR
const INPUT_STATE_PROCESSING = 2
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var string EOL
	 */
public $EOL = '\r\n'
</md:prop>

<md:prop>
/**
	 * @var string The username to access the interface
	 */
public $username
</md:prop>

<md:prop>
/**
	 * @var string The password defined in manager interface of server
	 */
public $secret
</md:prop>

<md:prop>
/**
	 * @var float Connection's state
	 */
public $state = 0
</md:prop>

<md:prop>
/**
	 * @var integer Input state
	 */
public $instate = 0
</md:prop>

<md:prop>
/**
	 * @var array Received packets
	 */
public $packets = [ ]
</md:prop>

<md:prop>
/**
	 * @var integer For composite response on action
	 */
public $cnt = 0
</md:prop>

<md:prop>
/**
	 * @var array Stack of callbacks called when response received
	 */
public $callbacks = [ ]
</md:prop>

<md:prop>
/**
	 * Assertions for callbacks.
	 * Assertion: if more events may follow as response this is a main part or full
	 * an action complete event indicating that all data has been sent
	 * @var array
	 */
public $assertions = [ ]
</md:prop>

<md:prop>
/**
	 * @var callable Callback. Called when received response on challenge action
	 */
public $onChallenge
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Execute the given callback when/if the connection is handshaked
	 * @param  callable Callback
	 * @return void
	 */
public function onConnected($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L130
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L150
</md:method>

<md:method>
/**
	 * Called when the worker is going to shutdown
	 * @return boolean Ready to shutdown?
	 */
public function gracefulShutdown()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L169
</md:method>

<md:method>
/**
	 * Called when session finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L185
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L197
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
	 * @param callable $cb Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function getSipPeers($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L377
</md:method>

<md:method>
/**
	 * Action: IAXpeerlist
	 * Synopsis: List IAX Peers
	 * Privilege: system,reporting,all
	 *
	 * @param callable $cb Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function getIaxPeers($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L390
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
	 * @param  string   $filename Filename
	 * @param  callable $cb       Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function getConfig($filename, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L409
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
	 * @param  string   $filename Filename
	 * @param callable $cb Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function getConfigJSON($filename, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L428
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
	 *
	 * @param string   $channel
	 * @param string   $variable
	 * @param string   $value
	 * @param callable $cb
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function setVar($channel, $variable, $value, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L449
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
	 *
	 * @param callable $cb
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function coreShowChannels($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L477
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
	 *
	 * @param  callable $cb
	 * @param  string   $channel
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function status($cb, $channel = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L500
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
	 * @param array    $params
	 * @param callable $cb     Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function redirect(array $params, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L528
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
	 * @param array    $params
	 * @param callable $cb     Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function originate(array $params, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L556
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
	 * @param array    $params
	 * @param callable $cb     Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function extensionState(array $params, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L576
</md:method>

<md:method>
/**
	 * Action: Ping
	 * Description: A 'Ping' action will ellicit a 'Pong' response.  Used to keep the
	 *   manager connection open.
	 * Variables: NONE
	 *
	 * @param callable $cb Callback called when response received
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function ping($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L590
</md:method>

<md:method>
/**
	 * For almost any actions in Action: ListCommands
	 * Privilege: depends on $action
	 *
	 * @param string   $action    Action
	 * @param callable $cb        Callback called when response received
	 * @param array    $params    Parameters
	 * @param array    $assertion If more events may follow as response this is a main part or full an action complete event indicating that all data has been sent
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function action($action, $cb, array $params = null, array $assertion = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L605
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
	 * @callback $cb ( Connection $conn, array $packet )
	 * @return void
	 */
public function logoff($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L622
</md:method>

<md:method>
/**
	 * Called when event occured
	 * @deprecated Replaced with ->bind('event', ...)
	 * @param callable $cb Callback
	 * @return void
	 */
public function onEvent($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L632
</md:method>

<md:method>
/**
	 * Bind event or events
	 * @alias EventHandlers::bind
	 * @param string|array $event Event name
	 * @param callable     $cb    Callback
	 * @return this
	 */
public function onConnected($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Connection.php#L130
</md:method>

<div class="clearboth"></div>

#### connection-finished # ConnectionFinished {tpl-git PHPDaemon/Clients/Asterisk/ConnectionFinished.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class ConnectionFinished extends \PHPDaemon\Exceptions\ConnectionFinished;
```

Driver for Asterisk Call Manager/1.1

#### pool # Pool {tpl-git PHPDaemon/Clients/Asterisk/Pool.php}

```php
namespace PHPDaemon\Clients\Asterisk;
class Pool extends \PHPDaemon\Network\Client;
```

Class Pool

##### options # Options

 - `:p`authtype (string = 'md5')`
 Auth hash type

 - `:p`port (integer = 5280)`
 Port

##### properties # Properties

<md:prop>
/**
	 * @var array Beginning of the string in the header or value that indicates whether the save value case
	 */
public static $safeCaseValues = [
  0 => 'dialstring',
  1 => 'callerid',
  2 => 'connectedline',
]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sets AMI version
	 * @param  string $addr Address
	 * @param  string $ver  Version
	 * @return void
	 */
public function setAmiVersion($addr, $ver)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Pool.php#L42
</md:method>

<md:method>
/**
	 * Prepares environment scope
	 * @param  string $data Address
	 * @return array
	 */
public static function prepareEnv($data)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Pool.php#L51
</md:method>

<md:method>
/**
	 * Extract key and value pair from line.
	 * @param  string $line
	 * @return array
	 */
public static function extract($line)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Asterisk/Pool.php#L66
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
