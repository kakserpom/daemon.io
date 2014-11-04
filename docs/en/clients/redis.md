### redis # Redis #> Redis {tpl-git PHPDaemon/Clients/Redis}

```php
namespace PHPDaemon\Clients\Redis;
```

<!-- include-namespace path="\PHPDaemon\Clients\Redis" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Redis/Connection.php}

```php
namespace PHPDaemon\Clients\Redis;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
In the middle of binary response part
const STATE_BINARY = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var array|null Current result
	 */
public $result
</md:prop>

<md:prop>
/**
	 * @var string Current error message
	 */
public $error
</md:prop>

<md:prop>
/**
	 * @var array Subcriptions
	 */
public $subscribeCb = [ ]
</md:prop>

<md:prop>
/**
 */
public $psubscribeCb = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO
	 * @param  string $chan
	 * @return integer
	 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L78
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L89
</md:method>

<md:method>
/**
	 * @TODO
	 * @return void
	 */
public function subscribed()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L116
</md:method>

<md:method>
/**
	 * @TODO
	 * @return boolean
	 */
public function isSubscribed()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L130
</md:method>

<md:method>
/**
	 * Magic __call
	 * Example:
	 * $redis->lpush('mylist', microtime(true));
	 * @param  sting $cmd
	 * @param  array $args
	 * @return void
	 */
public function __call($cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L142
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string   $name
	 * @param  array    $args
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return void
	 */
public function command($name, $args, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L167
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string   $name
	 * @param  array    $args
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return void
	 */
public function sendCommand($name, $args, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L344
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L377
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  mixed $val
	 * @return void
	 */
public function pushValue($val)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L424
</md:method>

<md:method>
/**
	 * @TODO
	 * @param integer $length
	 */
public function pushLevel($length)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L454
</md:method>

<md:method>
/**
	 * Set connection free/busy according to onResponse emptiness and ->finished
	 * @return void
	 */
public function checkFree()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L537
</md:method>

<div class="clearboth"></div>

#### lock # Lock {tpl-git PHPDaemon/Clients/Redis/Lock.php}

```php
namespace PHPDaemon\Clients\Redis;
class Lock;
```

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param string  $key
	 * @param integer $timeout
	 * @param Pool    $pool
	 */
public function __construct($key, $timeout, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L29
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  integer $timeout
	 * @return this
	 */
public function timeout($timeout)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L40
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return this
	 */
public function acquire($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L51
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return this
	 */
public function release($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L67
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Redis/Pool.php}

```php
namespace PHPDaemon\Clients\Redis;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers (string|array = 'tcp://127.0.0.1')`  
 Default servers

 - `:p`port (integer = 6379)`  
 Default port

 - `:p`maxconnperserv (integer = 32)`  
 Maximum connections per server

 - `:p`max-allowed-packet (integer = '1M')`  
 Maximum allowed size of packet

 - `:p`log-pub-sub-race-condition (boolean = true)`  
 If true, race condition between UNSUBSCRIBE and PUBLISH will be journaled

 - `:p`select (integer = null)`  
 Select storage number

 - `:p`sentinel-master (integer = null)`  
 <master name> for Sentinel

##### properties # Properties

<md:prop>
/**
 */
public $servConnSub = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO
	 * @param  string  $key
	 * @param  integer $timeout
	 * @return Lock
	 */
public function lock($key, $timeout)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L24
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function detachConnFromUrl(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L34
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string $chan
	 * @return integer
	 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L76
</md:method>

<md:method>
/**
	 * Magic __call
	 * Example:
	 * $redis->lpush('mylist', microtime(true));
	 * @param  string $name Command name
	 * @param  array  $args Arguments
	 * @return void
	 */
public function __call($cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L91
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->