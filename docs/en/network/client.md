### client # Client #> Client {tpl-git PHPDaemon/Network/Client.php}

```php:p
namespace PHPDaemon\Network;
abstract class Client extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Client" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var string Default connection class
	 */
public $connectionClass;
</md:prop>

<md:prop>
/**
	 * @var string Name
	 */
public $name;
</md:prop>

<md:prop>
/**
	 * @var \PHPDaemon\Config\Section Configuration
	 */
public $config;
</md:prop>

<md:prop>
/**
	 * @var integer Max concurrency
	 */
public $maxConcurrency = 0;
</md:prop>

<md:prop>
/**
	 * @var integer Max allowed packet
	 */
public $maxAllowedPacket = 0;
</md:prop>

<md:prop>
/**
	 * @var object|null Application instance object
	 */
public $appInstance;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Adds server
	 * @param  string  $url    Server URL
	 * @param  integer $weight Weight
	 * @return void
	 */
public function addServer($url, $weight = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L118
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  string   $url Address
	 * @param  callback $cb  onConnected
	 * @param  integer  $pri Optional. Priority
	 * @call   boolean public function getConnection ( callable $cb )
	 * @call   boolean public function getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )
	 * @return boolean       Success|Connection
	 */
public function getConnection($url = null, $cb = null, $pri = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L131
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param  object $conn Connection
	 * @return void
	 */
public function detach($conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L198
</md:method>

<md:method>
/**
	 * Mark connection as free
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function markConnFree(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L209
</md:method>

<md:method>
/**
	 * Mark connection as busy
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function markConnBusy(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L222
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function detachConnFromUrl(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L235
</md:method>

<md:method>
/**
	 * Touch pending "requests for connection"
	 * @param  string $url URL
	 * @return void
	 */
public function touchPending($url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L249
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by key
	 * @param  string   $key Key
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public function getConnectionByKey($key, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L263
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  callable $cb Callback
	 * @return boolean      Success
	 */
public function getConnectionRR($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L287
</md:method>

<md:method>
/**
	 * Sends a request to arbitrary server
	 * @param  string   $server     Server
	 * @param  string   $data       Data
	 * @param  callable $onResponse Called when the request complete
	 * @return boolean              Success
	 */
public function requestByServer($server, $data, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L298
</md:method>

<md:method>
/**
	 * Sends a request to server according to the key
	 * @param  string   $key        Key
	 * @param  string   $data       Data
	 * @param  callable $onResponse Callback called when the request complete
	 * @return boolean              Success
	 */
public function requestByKey($key, $data, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L316
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param  boolean $graceful Graceful?
	 * @return boolean           Ready to shutdown?
	 */
public function onShutdown($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L332
</md:method>


<!--/ include-namespace -->
