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
In the middle of binary response part @const integer
const STATE_BINARY = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * Current result
	 * @var array|null
	 */
public $result
</md:prop>

<md:prop>
/**
	 * Current error message
	 * @var string
	 */
public $error
</md:prop>

<md:prop>
/**
	 * Subcriptions
	 * @var array
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
 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L82
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L93
</md:method>

<md:method>
/**
 */
public function subscribed()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L116
</md:method>

<md:method>
/**
 */
public function isSubscribed()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L126
</md:method>

<md:method>
/**
	 * Magic __call.
	 * @method $cmd
	 * @param string $cmd
	 * @param array $args
	 * @usage $ .. Command-dependent set of arguments ..
	 * @usage $ [callback Callback. Optional.
	 * @example  $redis->lpush('mylist', microtime(true));
	 * @return void
	 */
public function __call($cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L140
</md:method>

<md:method>
/**
	 * @param string $name
	 */
public function command($name, $args, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L160
</md:method>

<md:method>
/**
 	 * @param string $name
 	 */
public function sendCommand($name, $args, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L332
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L365
</md:method>

<md:method>
/**
 */
public function pushValue($val)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L407
</md:method>

<md:method>
/**
	 * @param integer $length
	 */
public function pushLevel($length)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L436
</md:method>

<md:method>
/**
	 * Set connection free/busy according to onResponse emptiness and ->finished
	 * @return void
	 */
public function checkFree()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Connection.php#L519
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Redis/Pool.php}

```php
namespace PHPDaemon\Clients\Redis;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers ('tcp://127.0.0.1')`  
 

 - `:p`port (6379)`  
 

 - `:p`maxconnperserv (32)`  
 

 - `:p`max-allowed-packet ('1M')`  
 

 - `:p`log-pub-sub-race-condition (true)`  
 

 - `:p`select (null)`  
 

 - `:p`sentinel-master (null)`  
 

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
 */
public function lock($key, $timeout)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L20
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param ClientConnection $conn Connection
	 * @param string $url URL
	 * @return void
	 */
public function detachConnFromUrl(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L30
</md:method>

<md:method>
/**
 */
public function getLocalSubscribersCount($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L89
</md:method>

<md:method>
/**
	 * Magic __call.
	 * @method $cmd
	 * @param string $cmd
	 * @param array $args
	 * @usage $ .. Command-dependent set of arguments ..
	 * @usage $ [callback Callback. Optional.
	 * @example  $redis->lpush('mylist', microtime(true));
	 * @return void
	 */
public function __call($cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Pool.php#L106
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
 */
public function __construct($key, $timeout, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L24
</md:method>

<md:method>
/**
 */
public function timeout($timeout)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L30
</md:method>

<md:method>
/**
 */
public function acquire($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L35
</md:method>

<md:method>
/**
 */
public function release($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Redis/Lock.php#L45
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->