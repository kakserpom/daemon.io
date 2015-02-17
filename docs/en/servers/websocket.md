### websocket # WebSocket #> WebSocket {tpl-git PHPDaemon/Servers/WebSocket}

Сервер использует пространство имен [HTTPRequest](#httprequest).

Это транспортное приложение представляет WebSocket сервер для phpDaemon.

Ваше приложение должно получать ссылку на экземпляр WebSocketServer и вызывать addRoute() для добавления своих путей. Callback-функция пути должна возвращать новый экземпляр вашего класса, который наследуется от WebSocketRoute и определяет метод onFrame. Внутри метода onFrame мы можете обращаться к $this->client->sendFrame() для отправки пакетов клиенту.

<!-- include-namespace path="\PHPDaemon\Servers\WebSocket" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/WebSocket/Connection.php}

```php
namespace PHPDaemon\Servers\WebSocket;
class Connection extends \PHPDaemon\Network\Connection;
```

##### consts # Constants

<md:const>
State: first line
const STATE_FIRSTLINE = 1
</md:const>

<md:const>
State: headers
const STATE_HEADERS = 2
</md:const>

<md:const>
State: content
const STATE_CONTENT = 3
</md:const>

<md:const>
State: prehandshake
const STATE_PREHANDSHAKE = 5
</md:const>

<md:const>
State: handshaked
const STATE_HANDSHAKED = 6
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
 */
public $session
</md:prop>

<md:prop>
/**
	 * @var string Frame buffer
	 */
public $framebuf = ''
</md:prop>

<md:prop>
/**
	 * @var array _SERVER
	 */
public $server = [ ]
</md:prop>

<md:prop>
/**
	 * @var array _COOKIE
	 */
public $cookie = [ ]
</md:prop>

<md:prop>
/**
	 * @var array _GET
	 */
public $get = [ ]
</md:prop>

<md:prop>
/**
	 * @var null _POST
	 */
public $post
</md:prop>

<md:prop>
/**
	 * @var array Replacement pairs for processing some header values in parse_str()
	 */
public static $hvaltr = [
  '; ' => '&',
  ';' => '&',
  ' ' => '%20',
]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the stream is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L116
</md:method>

<md:method>
/**
	 * Called when the request wakes up
	 * @return void
	 */
public function onWakeup()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L152
</md:method>

<md:method>
/**
	 * Called when the request starts sleep
	 * @return void
	 */
public function onSleep()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L166
</md:method>

<md:method>
/**
	 * Called when connection is inherited from HTTP request
	 * @param  object $req
	 * @return void
	 */
public function onInheritanceFromRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L178
</md:method>

<md:method>
/**
	 * Sends a frame.
	 * @param  string   $data  Frame's data.
	 * @param  string   $type  Frame's type. ("STRING" OR "BINARY")
	 * @param  callable $cb    Optional. Callback called when the frame is received by client.
	 * @callback $cb ( )
	 * @return boolean         Success.
	 */
public function sendFrame($data, $type = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L195
</md:method>

<md:method>
/**
	 * Event of Connection.
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L220
</md:method>

<md:method>
/**
	 * Uncaught exception handler
	 * @param  Exception $e
	 * @return boolean      Handled?
	 */
public function handleException($e)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L236
</md:method>

<md:method>
/**
	 * Called when new frame received.
	 * @param  string $data Frame's data.
	 * @param  string $type Frame's type ("STRING" OR "BINARY").
	 * @return boolean      Success.
	 */
public function onFrame($data, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L249
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked.
	 * @return boolean Ready to handshake ?
	 */
public function onHandshake()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L267
</md:method>

<md:method>
/**
	 * Called when the worker is going to shutdown.
	 * @return boolean Ready to shutdown ?
	 */
public function gracefulShutdown()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L292
</md:method>

<md:method>
/**
	 * Called when we're going to handshake.
	 * @param  array   $extraHeaders
	 * @return boolean               Handshake status
	 */
public function handshake($extraHeaders = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L306
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string $s Data
	 */
public function write($s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L367
</md:method>

<md:method>
/**
	 * Send Bad request
	 * @return void
	 */
public function badRequest()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L375
</md:method>

<md:method>
/**
	 * Set the cookie
	 * @param  string  $name     Name of cookie
	 * @param  string  $value    Value
	 * @param  integer $maxage   Optional. Max-Age. Default is 0.
	 * @param  string  $path     Optional. Path. Default is empty string.
	 * @param  string  $domain   Optional. Domain. Default is empty string.
	 * @param  boolean $secure   Optional. Secure. Default is false.
	 * @param  boolean $HTTPOnly Optional. HTTPOnly. Default is false.
	 * @return void
	 */
public function setcookie($name, $value = '', $maxage = 0, $path = '', $domain = '', $secure = false, $HTTPOnly = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L573
</md:method>

<md:method>
/**
	 * Send HTTP-status
	 * @throws RequestHeadersAlreadySent
	 * @param  integer $code Code
	 * @return boolean       Success
	 */
public function status($code = 200)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L590
</md:method>

<md:method>
/**
	 * Send the header
	 * @param  string  $s       Header. Example: 'Location: http://php.net/'
	 * @param  boolean $replace Optional. Replace?
	 * @param  boolean $code    Optional. HTTP response code
	 * @throws \PHPDaemon\Request\RequestHeadersAlreadySent
	 * @return boolean          Success
	 */
public function header($s, $replace = true, $code = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Connection.php#L602
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/WebSocket/Pool.php}

```php
namespace PHPDaemon\Servers\WebSocket;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`expose (boolean = 1)`  
 Expose PHPDaemon version by X-Powered-By Header

 - `:p`listen (string|array = '0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 8047)`  
 Listen port

 - `:p`max-allowed-packet ([Size](#config/types/size) = '1M')`  
 Maximum allowed size of packet

 - `:p`fps-name (string = '')`  
 Related FlashPolicyServer instance name

##### consts # Constants

<md:const>
Binary packet type
const BINARY = 'BINARY'
</md:const>

<md:const>
String packet type
const STRING = 'STRING'
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var array
	 */
public $routes = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sets an array of options associated to the route
	 * @param  string  $path Route name.
	 * @param  array   $opts Options
	 * @return boolean       Success.
	 */
public function setRouteOptions($path, $opts)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L56
</md:method>

<md:method>
/**
	 * Return options by route
	 * @param  string $path Route name
	 * @return array        Options
	 */
public function getRouteOptions($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L72
</md:method>

<md:method>
/**
	 * Adds a route if it doesn't exist already.
	 * @param  string   $path Route name.
	 * @param  callable $cb   Route's callback.
	 * @callback $cb ( )
	 * @return boolean        Success.
	 */
public function addRoute($path, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L87
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string  $path
	 * @param  object  $client
	 * @param  boolean $withoutCustomTransport
	 * @return mixed
	 */
public function getRoute($path, $client, $withoutCustomTransport = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L104
</md:method>

<md:method>
/**
	 * Force add/replace a route.
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return boolean        Success
	 */
public function setRoute($path, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L152
</md:method>

<md:method>
/**
	 * Removes a route.
	 * @param  string  $path Route name
	 * @return boolean       Success
	 */
public function removeRoute($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L163
</md:method>

<md:method>
/**
	 * Checks if route exists
	 * @param  string  $path Route name
	 * @return boolean       Exists?
	 */
public function routeExists($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/WebSocket/Pool.php#L177
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->