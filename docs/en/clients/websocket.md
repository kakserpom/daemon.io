### websocket # WebSocket #> WebSocket {tpl-git PHPDaemon/Clients/WebSocket}

```php
namespace PHPDaemon\Clients\WebSocket;
```

<!-- include-namespace path="\PHPDaemon\Clients\WebSocket" level="" access="" -->
#### example # Example {tpl-git PHPDaemon/Clients/WebSocket/Example.php}

```php
namespace PHPDaemon\Clients\WebSocket;
class Example extends \PHPDaemon\Core\AppInstance;
```

##### options # Options

 - `:p`url ('tcp://echo.websocket.org:80/')`  
 

 - `:p`reconnect (1)`  
 

 - `:p`wsclient-name ('')`  
 

##### properties # Properties

<md:prop>
/**
<<<<<<< HEAD
 */
public $wsclient
=======
	 * @var array
	 */
public $headers = [ ]
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:prop>

<md:prop>
/**
<<<<<<< HEAD
 */
public $wsconn
=======
	 * @var string
	 */
public $type
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
<<<<<<< HEAD
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Example.php#L34
=======
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L73
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
<<<<<<< HEAD
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Example.php#L44
=======
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L85
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function connect()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Example.php#L51
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown.
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Example.php#L73
</md:method>

<div class="clearboth"></div>

#### connection # Connection {tpl-git PHPDaemon/Clients/WebSocket/Connection.php}

```php
namespace PHPDaemon\Clients\WebSocket;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

Class Connection

##### consts # Constants

<md:const>
Globally Unique Identifier @see http://tools.ietf.org/html/rfc6455
const GUID = '258EAFA5-E914-47DA-95CA-C5AB0DC85B11'
</md:const>

<md:const>

const STATE_HEADER = 1
</md:const>

<md:const>

const STATE_DATA = 2
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/** @var array */
public $headers = [ ]
</md:prop>

<md:prop>
/** @var string */
public $type
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L57
=======
	 * Send frame to WebSocket server
	 * @param string  $payload
	 * @param string  $type
	 * @param boolean $isMasked
	 */
public function sendFrame($payload, $type = Pool::TYPE_TEXT, $isMasked = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L189
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L67
</md:method>

<md:method>
/**
	 * Send frame to WebSocket server
	 *
	 * @param $payload
	 * @param string $type
	 * @param bool $isMasked
	 */
public function sendFrame($payload, $type = Pool::TYPE_TEXT, $isMasked = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L172
</md:method>

<md:method>
/**
 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L229
=======
	 * @TODO
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Connection.php#L250
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/WebSocket/Pool.php}

```php
namespace PHPDaemon\Clients\WebSocket;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`max-allowed-packet ([Size](#config/types/size) = '1M')`  
 Maximum allowed size of packet

##### consts # Constants

<md:const>
Types of WebSocket frame
const TYPE_TEXT = 'text'
</md:const>

<md:const>

const TYPE_BINARY = 'binary'
</md:const>

<md:const>

const TYPE_CLOSE = 'close'
</md:const>

<md:const>

const TYPE_PING = 'ping'
</md:const>

<md:const>

const TYPE_PONG = 'pong'
</md:const>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
 */
public function getConfigDefaults()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/WebSocket/Pool.php#L23
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->