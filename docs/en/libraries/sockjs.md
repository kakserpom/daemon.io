### sockjs # SockJS #> SockJS {tpl-git PHPDaemon/SockJS}

```php
namespace PHPDaemon\SockJS;
```

<!-- include-namespace path="\PHPDaemon\SockJS" level="" access="" -->
#### web-socket-route-proxy # Class WebSocketRouteProxy {tpl-git PHPDaemon/SockJS/WebSocketRouteProxy.php}

```php
namespace PHPDaemon\SockJS;
class WebSocketRouteProxy;
```

##### methods # Methods

<md:method>
/**
	 * @param Application $sockjs
	 */
public function __construct($sockjs, $route)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L28
</md:method>

<md:method>
/**
 */
public function __get($k)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L32
</md:method>

<md:method>
/**
 */
public function __call($method, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L36
</md:method>

<md:method>
/**
	 * Called when new frame received.
	 * @param string  Frame's contents.
	 * @param integer Frame's type.
	 * @return void
	 */
public function onFrame($data, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L46
</md:method>

<md:method>
/**
 */
public function onPacket($frame, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L62
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L69
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onWrite()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L83
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L92
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */

link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
* @param Application $sockjs
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L26
</md:method>

<div class="clearboth"></div>

#### web-socket-connection-proxy # Class WebSocketConnectionProxy {tpl-git PHPDaemon/SockJS/WebSocketConnectionProxy.php}

```php
namespace PHPDaemon\SockJS;
class WebSocketConnectionProxy;
```

##### methods # Methods

<md:method>
/**
	 * @param Application $sockjs
	 */
public function __construct($sockjs, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L25
</md:method>

<md:method>
/**
 */
public function __get($k)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L29
</md:method>

<md:method>
/**
 */
public function __isset($k)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L33
</md:method>

<md:method>
/**
 */
public function __call($method, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L37
</md:method>

<md:method>
/**
 */
public function toJson($p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L41
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param string   Frame's data.
	 * @param integer  Frame's type. See the constants.
	 * @param callback Optional. Callback called when the frame is received by client.
	 * @return boolean Success.
	 */
public function sendFrame($data, $type = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L52
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param string   Frame's data.
	 * @param integer  Frame's type. See the constants.
	 * @param callback Optional. Callback called when the frame is received by client.
	 * @return boolean Success.
	 */
public function sendFrameReal($data, $type = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L64
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */

link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
$this->sockjs = $sockjs;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L26
</md:method>

<div class="clearboth"></div>

#### session # Class Session {tpl-git PHPDaemon/SockJS/Session.php}

```php
namespace PHPDaemon\SockJS;
class Session;
```

##### properties # Properties

<md:prop>
/** @var \PHPDaemon\Request\Generic */
public $route
</md:prop>

<md:prop>
/** @var \PHPDaemon\Structures\StackCallbacks */
public $onWrite
</md:prop>

<md:prop>
/**
 */
public $id
</md:prop>

<md:prop>
/**
 */
public $appInstance
</md:prop>

<md:prop>
/**
 */
public $addr
</md:prop>

<md:prop>
/** @var array */
public $buffer = [ ]
</md:prop>

<md:prop>
/**
 */
public $framesBuffer = [ ]
</md:prop>

<md:prop>
/** @var bool */
public $finished = false
</md:prop>

<md:prop>
/** @var bool */
public $flushing = false
</md:prop>

<md:prop>
/** @var int */
public $timeout = 60
</md:prop>

<md:prop>
/**
 */
public $server
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @param $route
	 * @param Application $appInstance
	 * @param $authKey
	 */
public function __construct($appInstance, $id, $server)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L65
</md:method>

<md:method>
/**
	 * Uncaught exception handler
	 * @param $e
	 * @return boolean|null Handled?
	 */
public function handleException($e)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L88
</md:method>

<md:method>
/**
	 * Called when the request wakes up
	 * @return void
	 */
public function onWakeup()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L100
</md:method>

<md:method>
/**
	 * Called when the request starts sleep
	 * @return void
	 */
public function onSleep()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L115
</md:method>

<md:method>
/**
 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L122
</md:method>

<md:method>
/**
 */
public function c2s($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L135
</md:method>

<md:method>
/**
 */
public function onFrame($msg, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L149
</md:method>

<md:method>
/**
 */
public function poll($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L165
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onWrite()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L179
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function finish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L195
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L210
</md:method>

<md:method>
/**
	 * Flushes buffered packets
	 * @return void
	 */
public function flush()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L230
</md:method>

<md:method>
/**
	 * @param string $pct
	 */
public function sendPacket($pct, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L293
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param string   Frame's data.
	 * @param integer  Frame's type. See the constants.
	 * @param callback Optional. Callback called when the frame is received by client.
	 * @return boolean Success.
	 */
public function sendFrame($data, $type = 0x00, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L312
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
/** @var \PHPDaemon\Request\Generic */
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
public $addr;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
use \PHPDaemon\Traits\StaticObjectWatchdog;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
public $id;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L26
</md:method>

<div class="clearboth"></div>

#### application # Class Application {tpl-git PHPDaemon/SockJS/Application.php}

```php
namespace PHPDaemon\SockJS;
class Application extends \PHPDaemon\Core\AppInstance;
```

##### options # Options

 - `redis-name ('')`  
 

 - `redis-prefix ('sockjs:')`  
 

 - `wss-name ('')`  
 

 - `batch-delay (new \PHPDaemon\Config\Entry\Double('0.05'))`  
 

 - `heartbeat-interval (new \PHPDaemon\Config\Entry\Double('25'))`  
 

 - `dead-session-timeout (new \PHPDaemon\Config\Entry\Time('1h'))`  
 

 - `gc-max-response-size (new \PHPDaemon\Config\Entry\Size('128k'))`  
 

 - `network-timeout-read (new \PHPDaemon\Config\Entry\Time('2h'))`  
 

 - `network-timeout-write (new \PHPDaemon\Config\Entry\Time('120s'))`  
 

##### properties # Properties

<md:prop>
/**
 */
public $wss
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L38
</md:method>

<md:method>
/**
	 * @param string $chan
	 * @param \Closure $opcb
	 */
public function subscribe($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L46
</md:method>

<md:method>
/**
 */
public function setnx($key, $value, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L50
</md:method>

<md:method>
/**
 */
public function setkey($key, $value, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L54
</md:method>

<md:method>
/**
 */
public function getkey($key, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L58
</md:method>

<md:method>
/**
 */
public function expire($key, $seconds, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L62
</md:method>

<md:method>
/**
	 * @param string $chan
	 */
public function unsubscribe($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L69
</md:method>

<md:method>
/**
 */
public function unsubscribeReal($chan, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L73
</md:method>

<md:method>
/**
	 * @param string $chan
	 * @param string $cb
	 * @param \Closure $opcb
	 */
public function publish($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L82
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L90
</md:method>

<md:method>
/**
 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L99
</md:method>

<md:method>
/**
	 * @param \PHPDaemon\Network\Pool $wss
	 */
public function attachWss($wss)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L109
</md:method>

<md:method>
/**
 */
public function wsHandler($ws, $path, $client, $state)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L118
</md:method>

<md:method>
/**
 */
public function detachWss($wss)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L143
</md:method>

<md:method>
/**
 */
public function beginSession($path, $sessId, $server)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L152
</md:method>

<md:method>
/**
 */
public function getRouteOptions($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L167
</md:method>

<md:method>
/**
	 * @param Session $session
	 */
public function endSession($session)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L187
</md:method>

<md:method>
/**
	 * Creates Request.
	 * @param object Request.
	 * @param object Upstream application instance.
	 * @return object Request.
	 */
public function beginRequest($req, $upstream)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L197
</md:method>

<md:method>
/**
 */
public function callMethod($method, $req, $upstream)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L259
</md:method>

<div class="clearboth"></div>

#### echo-feed # Class EchoFeed {tpl-git PHPDaemon/SockJS/TestRelay/EchoFeed.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class EchoFeed extends \PHPDaemon\WebSocket\Route;
```

##### methods # Methods

<md:method>
/**
	 * Called when new frame received.
	 * @param string  Frame's contents.
	 * @param integer Frame's type.
	 * @return void
	 */
public function onFrame($data, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/EchoFeed.php#L20
</md:method>

<div class="clearboth"></div>

#### close # Class Close {tpl-git PHPDaemon/SockJS/TestRelay/Close.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class Close extends \PHPDaemon\WebSocket\Route;
```

##### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked.
	 * @return void
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/Close.php#L19
</md:method>

<div class="clearboth"></div>

#### application # Class Application {tpl-git PHPDaemon/SockJS/TestRelay/Application.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class Application extends \PHPDaemon\Core\AppInstance;
```

##### options # Options

 - `wss-name ('')`  
 

##### methods # Methods

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/Application.php#L29
</md:method>

<div class="clearboth"></div>

#### htmlfile # Class Htmlfile {tpl-git PHPDaemon/SockJS/Methods/Htmlfile.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Htmlfile extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
 */
public function sendFrame($frame)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Htmlfile.php#L21
</md:method>

<md:method>
/**
 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Htmlfile.php#L25
</md:method>

<div class="clearboth"></div>

#### xhr # Class Xhr {tpl-git PHPDaemon/SockJS/Methods/Xhr.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Xhr extends \PHPDaemon\SockJS\Methods\Generic;
```

#### jsonp-send # Class JsonpSend {tpl-git PHPDaemon/SockJS/Methods/JsonpSend.php}

```php
namespace PHPDaemon\SockJS\Methods;
class JsonpSend extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/JsonpSend.php#L22
</md:method>

<div class="clearboth"></div>

#### info # Class Info {tpl-git PHPDaemon/SockJS/Methods/Info.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Info extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Info.php#L17
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Info.php#L31
</md:method>

<div class="clearboth"></div>

#### eventsource # Class Eventsource {tpl-git PHPDaemon/SockJS/Methods/Eventsource.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Eventsource extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
 */
public function sendFrame($frame)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Eventsource.php#L20
</md:method>

<md:method>
/**
 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Eventsource.php#L25
</md:method>

<div class="clearboth"></div>

#### xhr-send # Class XhrSend {tpl-git PHPDaemon/SockJS/Methods/XhrSend.php}

```php
namespace PHPDaemon\SockJS\Methods;
class XhrSend extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/XhrSend.php#L21
</md:method>

<div class="clearboth"></div>

#### welcome # Class Welcome {tpl-git PHPDaemon/SockJS/Methods/Welcome.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Welcome extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Welcome.php#L21
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Welcome.php#L33
</md:method>

<div class="clearboth"></div>

#### xhr-streaming # Class XhrStreaming {tpl-git PHPDaemon/SockJS/Methods/XhrStreaming.php}

```php
namespace PHPDaemon\SockJS\Methods;
class XhrStreaming extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
 */
public function afterHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/XhrStreaming.php#L22
</md:method>

<div class="clearboth"></div>

#### iframe # Class IFrame {tpl-git PHPDaemon/SockJS/Methods/Iframe.php}

```php
namespace PHPDaemon\SockJS\Methods;
class IFrame extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Iframe.php#L22
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Iframe.php#L64
</md:method>

<div class="clearboth"></div>

#### generic # Class Generic {tpl-git PHPDaemon/SockJS/Methods/Generic.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Generic extends \PHPDaemon\HTTPRequest\Generic;
```

##### methods # Methods

<md:method>
/**
 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L51
</md:method>

<md:method>
/**
 */
public function afterHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L109
</md:method>

<md:method>
/**
	 * Output some data
	 * @param string $s String to out
	 * @param bool $flush
	 * @return boolean Success
	 */
public function outputFrame($s, $flush = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L118
</md:method>

<md:method>
/**
 */
public function gcCheck()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L123
</md:method>

<md:method>
/**
	 * Output some data
	 * @param string $s String to out
	 * @param bool $flush
	 * @return boolean Success
	 */
public function out($s, $flush = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L139
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L151
</md:method>

<md:method>
/**
 */
public function w8in() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L156
</md:method>

<md:method>
/**
 */
public function s2c($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L158
</md:method>

<md:method>
/**
 */
public function stop()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L180
</md:method>

<md:method>
/**
 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L195
</md:method>

<md:method>
/**
 */
public function internalServerError()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L205
</md:method>

<div class="clearboth"></div>

#### not-found # Class NotFound {tpl-git PHPDaemon/SockJS/Methods/NotFound.php}

```php
namespace PHPDaemon\SockJS\Methods;
class NotFound extends \PHPDaemon\SockJS\Methods\Generic;
```

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/NotFound.php#L19
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/NotFound.php#L29
</md:method>

<div class="clearboth"></div>

#### jsonp # Class Jsonp {tpl-git PHPDaemon/SockJS/Methods/Jsonp.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Jsonp extends \PHPDaemon\SockJS\Methods\Generic;
```


<!--/ include-namespace -->