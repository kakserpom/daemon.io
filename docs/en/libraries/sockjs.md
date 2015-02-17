### sockjs # SockJS #> SockJS {tpl-git PHPDaemon/SockJS}

```php
namespace PHPDaemon\SockJS;
```

<!-- include-namespace path="PHPDaemon\SockJS" level="" access="" -->
#### application # Application {tpl-git PHPDaemon/SockJS/Application.php}

```php
namespace PHPDaemon\SockJS;
class Application extends \PHPDaemon\Core\AppInstance;
```

##### options # Options

 - `:p`redis-name (string = '')`  
 @todo redis-name

 - `:p`redis-prefix (string = 'sockjs:')`  
 @todo redis-prefix

 - `:p`wss-name (string = '')`  
 @todo wss-name

 - `:p`batch-delay ([Double](#config/types/double) = '0.05')`  
 @todo batch-delay

 - `:p`heartbeat-interval ([Double](#config/types/double) = '25')`  
 @todo heartbeat-interval

 - `:p`dead-session-timeout ([Time](#config/types/time) = '1h')`  
 @todo dead-session-timeout

 - `:p`gc-max-response-size ([Size](#config/types/size) = '128k')`  
 @todo gc-max-response-size

 - `:p`network-timeout-read ([Time](#config/types/time) = '2h')`  
 @todo network-timeout-read

 - `:p`network-timeout-write ([Time](#config/types/time) = '120s')`  
 @todo network-timeout-write

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
	 * getLocalSubscribersCount
	 * @param  string $chan
	 * @return integer
	 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L61
</md:method>

<md:method>
/**
	 * subscribe
	 * @param  string   $chan [@todo description]
	 * @param  callable $cb   [@todo description]
	 * @param  callable $opcb [@todo description]
	 * @callback $cb ( )
	 * @callback $opcb ( )
	 * @return void
	 */
public function subscribe($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L74
</md:method>

<md:method>
/**
	 * setnx
	 * @param  string   $key   [@todo description]
	 * @param  mixed    $value [@todo description]
	 * @param  callable $cb    [@todo description]
	 * @callback $cb ( )
	 * @return void
	 */
public function setnx($key, $value, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L86
</md:method>

<md:method>
/**
	 * setkey
	 * @param  string   $key   [@todo description]
	 * @param  mixed    $value [@todo description]
	 * @param  callable $cb    [@todo description]
	 * @callback $cb ( )
	 * @return void
	 */
public function setkey($key, $value, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L98
</md:method>

<md:method>
/**
	 * getkey
	 * @param  string   $key   [@todo description]
	 * @param  callable $cb    [@todo description]
	 * @callback $cb ( )
	 * @return void
	 */
public function getkey($key, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L109
</md:method>

<md:method>
/**
	 * expire
	 * @param  string   $key     [@todo description]
	 * @param  integer  $seconds [@todo description]
	 * @param  callable $cb      [@todo description]
	 * @callback $cb ( )
	 * @return void
	 */
public function expire($key, $seconds, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L121
</md:method>

<md:method>
/**
	 * unsubscribe
	 * @param  string   $chan [@todo description]
	 * @param  callable $cb   [@todo description]
	 * @param  callable $opcb [@todo description]
	 * @callback $cb ( )
	 * @callback $opcb ( )
	 * @return void
	 */
public function unsubscribe($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L134
</md:method>

<md:method>
/**
	 * unsubscribeReal
	 * @param  string   $chan [@todo description]
	 * @param  callable $opcb [@todo description]
	 * @callback $opcb ( )
	 * @return void
	 */
public function unsubscribeReal($chan, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L145
</md:method>

<md:method>
/**
	 * publish
	 * @param  string   $chan [@todo description]
	 * @param  callable $cb   [@todo description]
	 * @param  callable $opcb [@todo description]
	 * @callback $cb ( )
	 * @callback $opcb ( )
	 * @return void
	 */
public function publish($chan, $cb, $opcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L158
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L166
</md:method>

<md:method>
/**
	 * onFinish
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L179
</md:method>

<md:method>
/**
	 * attachWss
	 * @param \PHPDaemon\Network\Pool $wss
	 * @return boolean
	 */
public function attachWss($wss)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L191
</md:method>

<md:method>
/**
	 * wsHandler
	 * @param  object   $ws     [@todo description]
	 * @param  string   $path   [@todo description]
	 * @param  object   $client [@todo description]
	 * @param  callable $state  [@todo description]
	 * @callback $state ( object $route )
	 * @return boolean
	 */
public function wsHandler($ws, $path, $client, $state)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L209
</md:method>

<md:method>
/**
	 * detachWss
	 * @param  object $wss [@todo description]
	 * @return boolean
	 */
public function detachWss($wss)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L239
</md:method>

<md:method>
/**
	 * beginSession
	 * @param  string $path   [@todo description]
	 * @param  string $sessId [@todo description]
	 * @param  string $server [@todo description]
	 * @return object
	 */
public function beginSession($path, $sessId, $server)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L255
</md:method>

<md:method>
/**
	 * getRouteOptions
	 * @param  string $path [@todo description]
	 * @return array
	 */
public function getRouteOptions($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L275
</md:method>

<md:method>
/**
	 * endSession
	 * @param Session $session
	 * @return void
	 */
public function endSession($session)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L297
</md:method>

<md:method>
/**
	 * Creates Request.
	 * @param  object $req      Request.
	 * @param  object $upstream Upstream application instance.
	 * @return object           Request.
	 */
public function beginRequest($req, $upstream)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L307
</md:method>

<md:method>
/**
	 * callMethod
	 * @param  string $method   [@todo description]
	 * @param  object $req      [@todo description]
	 * @param  object $upstream [@todo description]
	 * @return object
	 */
public function callMethod($method, $req, $upstream)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Application.php#L376
</md:method>

<div class="clearboth"></div>

#### session # Session {tpl-git PHPDaemon/SockJS/Session.php}

```php
namespace PHPDaemon\SockJS;
class Session;
```

##### properties # Properties

<md:prop>
/**
	 * @var \PHPDaemon\Request\Generic
	 */
public $route
</md:prop>

<md:prop>
/**
	 * @var \PHPDaemon\Structures\StackCallbacks
	 */
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
/**
	 * @var array
	 */
public $buffer = [ ]
</md:prop>

<md:prop>
/**
 */
public $framesBuffer = [ ]
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $finished = false
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $flushing = false
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
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
	 * __construct
	 * @param Application $appInstance [@todo description]
	 * @param string      $id          [@todo description]
	 * @param array       $server      [@todo description]
	 * @return void
	 */
public function __construct($appInstance, $id, $server)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L84
</md:method>

<md:method>
/**
	 * Uncaught exception handler
	 * @param  object $e
	 * @return boolean|null Handled?
	 */
public function handleException($e)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L107
</md:method>

<md:method>
/**
	 * Called when the request wakes up
	 * @return void
	 */
public function onWakeup()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L118
</md:method>

<md:method>
/**
	 * Called when the request starts sleep
	 * @return void
	 */
public function onSleep()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L132
</md:method>

<md:method>
/**
	 * onHandshake
	 * @return void
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L143
</md:method>

<md:method>
/**
	 * c2s
	 * @param  object $redis
	 * @return void
	 */
public function c2s($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L161
</md:method>

<md:method>
/**
	 * onFrame
	 * @param  string  $msg  [@todo description]
	 * @param  integer $type [@todo description]
	 * @return void
	 */
public function onFrame($msg, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L181
</md:method>

<md:method>
/**
	 * poll
	 * @param  object $redis
	 * @return void
	 */
public function poll($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L202
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onWrite()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L217
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function finish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L234
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L250
</md:method>

<md:method>
/**
	 * Flushes buffered packets
	 * @return void
	 */
public function flush()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L270
</md:method>

<md:method>
/**
	 * sendPacket
	 * @param  object   $pct [@todo description]
	 * @param  callable $cb  [@todo description]
	 * @callback $cb ( )
	 * @return void
	 */
public function sendPacket($pct, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L337
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param  string   $data Frame's data.
	 * @param  integer  $type Frame's type. See the constants.
	 * @param  callback $cb   Optional. Callback called when the frame is received by client.
	 * @callback $cb ( )
	 * @return boolean Success.
	 */
public function sendFrame($data, $type = 0x00, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Session.php#L357
</md:method>

<div class="clearboth"></div>

#### web-socket-connection-proxy # WebSocketConnectionProxy {tpl-git PHPDaemon/SockJS/WebSocketConnectionProxy.php}

```php
namespace PHPDaemon\SockJS;
class WebSocketConnectionProxy;
```

##### methods # Methods

<md:method>
/**
	 * __construct
	 * @param Application $sockjs
	 * @param object      $conn
	 */
public function __construct($sockjs, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L28
</md:method>

<md:method>
/**
	 * __isset
	 * @param  string  $k 
	 * @return boolean
	 */
public function __isset($k)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L47
</md:method>

<md:method>
/**
	 * __call
	 * @param  string $method
	 * @param  array  $args
	 * @return mixed
	 */
public function __call($method, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L57
</md:method>

<md:method>
/**
	 * toJson
	 * @param  string $p
	 * @return string
	 */
public function toJson($p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L66
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param string   $data Frame's data.
	 * @param integer  $type Frame's type. See the constants.
	 * @param callback $cb   Optional. Callback called when the frame is received by client.
	 * @callback $cb ( )
	 * @return boolean Success.
	 */
public function sendFrame($data, $type = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L78
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param  string   $data Frame's data.
	 * @param  integer  $type Frame's type. See the constants.
	 * @param  callback $cb   Optional. Callback called when the frame is received by client.
	 * @callback $cb ( )
	 * @return boolean Success.
	 */
public function sendFrameReal($data, $type = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketConnectionProxy.php#L91
</md:method>

<div class="clearboth"></div>

#### web-socket-route-proxy # WebSocketRouteProxy {tpl-git PHPDaemon/SockJS/WebSocketRouteProxy.php}

```php
namespace PHPDaemon\SockJS;
class WebSocketRouteProxy;
```

##### methods # Methods

<md:method>
/**
	 * __construct
	 * @param Application $sockjs
	 * @param object      $conn
	 */
public function __construct($sockjs, $route)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L30
</md:method>

<md:method>
/**
	 * __call
	 * @param  string $method
	 * @param  array  $args
	 * @return mixed
	 */
public function __call($method, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L50
</md:method>

<md:method>
/**
	 * Called when new frame received.
	 * @param string  $data Frame's contents.
	 * @param integer $type Frame's type.
	 * @return void
	 */
public function onFrame($data, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L60
</md:method>

<md:method>
/**
	 * onPacket
	 * @param string  $data Frame's contents.
	 * @param integer $type Frame's type.
	 * @return void
	 */
public function onPacket($frame, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L82
</md:method>

<md:method>
/**
	 * realRoute onBeforeHandshake
	 * @param  callable   $cb
	 * @return void|false
	 */
public function onBeforeHandshake($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L91
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L102
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onWrite()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L117
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/WebSocketRouteProxy.php#L127
</md:method>

<div class="clearboth"></div>

#### Methods # / Methods {tpl-git PHPDaemon/SockJS/Methods}

##### eventsource # Eventsource {tpl-git PHPDaemon/SockJS/Methods/Eventsource.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Eventsource extends \PHPDaemon\SockJS\Methods\Generic;
```

###### methods # Methods

<md:method>
/**
	 * Send frame
	 * @param  string $frame
	 * @return void
	 */
public function sendFrame($frame)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Eventsource.php#L25
</md:method>

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Eventsource.php#L34
</md:method>

<div class="clearboth"></div>

###### generic # Generic {tpl-git PHPDaemon/SockJS/Methods/Generic.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Generic extends \PHPDaemon\HTTPRequest\Generic;
```

Contains some base methods

####### methods # Methods

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L53
</md:method>

<md:method>
/**
	 * afterHeaders
	 * @return void
	 */
public function afterHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L115
</md:method>

<md:method>
/**
	 * Output some data
	 * @param  string  $s     String to out
	 * @param  boolean $flush
	 * @return boolean        Success
	 */
public function outputFrame($s, $flush = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L124
</md:method>

<md:method>
/**
	 * gcCheck
	 * @return void
	 */
public function gcCheck()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L133
</md:method>

<md:method>
/**
	 * Output some data
	 * @param  string  $s     String to out
	 * @param  boolean $flush
	 * @return boolean        Success
	 */
public function out($s, $flush = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L149
</md:method>

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L161
</md:method>

<md:method>
/**
	 * w8in
	 * @return void
	 */
public function w8in() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L169
</md:method>

<md:method>
/**
	 * s2c
	 * @param  object $redis
	 * @return void
	 */
public function s2c($redis)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L176
</md:method>

<md:method>
/**
	 * Stop
	 * @return void
	 */
public function stop()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L202
</md:method>

<md:method>
/**
	 * On finish
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L220
</md:method>

<md:method>
/**
	 * internalServerError
	 * @return void
	 */
public function internalServerError()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Generic.php#L234
</md:method>

<div class="clearboth"></div>

####### htmlfile # Htmlfile {tpl-git PHPDaemon/SockJS/Methods/Htmlfile.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Htmlfile extends \PHPDaemon\SockJS\Methods\Generic;
```

######## methods # Methods

<md:method>
/**
	 * Send frame
	 * @param  string $frame
	 * @return void
	 */
public function sendFrame($frame)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Htmlfile.php#L26
</md:method>

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Htmlfile.php#L35
</md:method>

<div class="clearboth"></div>

######## iframe # IFrame {tpl-git PHPDaemon/SockJS/Methods/Iframe.php}

```php
namespace PHPDaemon\SockJS\Methods;
class IFrame extends \PHPDaemon\SockJS\Methods\Generic;
```

######### methods # Methods

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Iframe.php#L22
</md:method>

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Iframe.php#L64
</md:method>

<div class="clearboth"></div>

######### info # Info {tpl-git PHPDaemon/SockJS/Methods/Info.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Info extends \PHPDaemon\SockJS\Methods\Generic;
```

########## methods # Methods

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Info.php#L20
</md:method>

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Info.php#L34
</md:method>

<div class="clearboth"></div>

########## jsonp # Jsonp {tpl-git PHPDaemon/SockJS/Methods/Jsonp.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Jsonp extends \PHPDaemon\SockJS\Methods\Generic;
```

########### jsonp-send # JsonpSend {tpl-git PHPDaemon/SockJS/Methods/JsonpSend.php}

```php
namespace PHPDaemon\SockJS\Methods;
class JsonpSend extends \PHPDaemon\SockJS\Methods\Generic;
```

############ methods # Methods

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/JsonpSend.php#L22
</md:method>

<div class="clearboth"></div>

############ not-found # NotFound {tpl-git PHPDaemon/SockJS/Methods/NotFound.php}

```php
namespace PHPDaemon\SockJS\Methods;
class NotFound extends \PHPDaemon\SockJS\Methods\Generic;
```

############# methods # Methods

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/NotFound.php#L20
</md:method>

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/NotFound.php#L30
</md:method>

<div class="clearboth"></div>

############# welcome # Welcome {tpl-git PHPDaemon/SockJS/Methods/Welcome.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Welcome extends \PHPDaemon\SockJS\Methods\Generic;
```

############## methods # Methods

<md:method>
/**
	 * Constructor
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Welcome.php#L21
</md:method>

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run() {}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/Welcome.php#L33
</md:method>

<div class="clearboth"></div>

############## xhr # Xhr {tpl-git PHPDaemon/SockJS/Methods/Xhr.php}

```php
namespace PHPDaemon\SockJS\Methods;
class Xhr extends \PHPDaemon\SockJS\Methods\Generic;
```

############### xhr-send # XhrSend {tpl-git PHPDaemon/SockJS/Methods/XhrSend.php}

```php
namespace PHPDaemon\SockJS\Methods;
class XhrSend extends \PHPDaemon\SockJS\Methods\Generic;
```

################ methods # Methods

<md:method>
/**
	 * Called when request iterated
	 * @return void
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/XhrSend.php#L22
</md:method>

<div class="clearboth"></div>

################ xhr-streaming # XhrStreaming {tpl-git PHPDaemon/SockJS/Methods/XhrStreaming.php}

```php
namespace PHPDaemon\SockJS\Methods;
class XhrStreaming extends \PHPDaemon\SockJS\Methods\Generic;
```

################# methods # Methods

<md:method>
/**
	 * afterHeaders
	 * @return void
	 */
public function afterHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/Methods/XhrStreaming.php#L26
</md:method>

<div class="clearboth"></div>

################# application # Application {tpl-git PHPDaemon/SockJS/TestRelay/Application.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class Application extends \PHPDaemon\Core\AppInstance;
```

################## options # Options

 - `:p`wss-name (string = '')`  
 WSS name

################## methods # Methods

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/Application.php#L31
</md:method>

<div class="clearboth"></div>

################## close # Close {tpl-git PHPDaemon/SockJS/TestRelay/Close.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class Close extends \PHPDaemon\WebSocket\Route;
```

################### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked.
	 * @return void
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/Close.php#L19
</md:method>

<div class="clearboth"></div>

################### echo-feed # EchoFeed {tpl-git PHPDaemon/SockJS/TestRelay/EchoFeed.php}

```php
namespace PHPDaemon\SockJS\TestRelay;
class EchoFeed extends \PHPDaemon\WebSocket\Route;
```

#################### methods # Methods

<md:method>
/**
	 * Called when new frame received
	 * @param  string  $data Frame's contents
	 * @param  integer $type Frame's type
	 * @return void
	 */
public function onFrame($data, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/SockJS/TestRelay/EchoFeed.php#L21
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->