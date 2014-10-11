### client # Client #> Client {tpl-git PHPDaemon/Network/Client.php}

```php:p
namespace PHPDaemon\Network;
abstract class Client extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Client" commit="" level="" access="" -->
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
	 * @var ConnectionPool[] Instances storage
	 */
protected static $instances;
</md:prop>

<md:prop>
/**
	 * @var integer Max concurrency
	 */
public $maxConcurrency;
</md:prop>

<md:prop>
/**
	 * @var integer Max allowed packet
	 */
public $maxAllowedPacket;
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
public addServer($url, $weight = NULL)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  string   $url Address
	 * @param  callback $cb  onConnected
	 * @param  integer  $pri Optional. Priority
	 * @call   boolean public getConnection ( callable $cb )
	 * @call   boolean public getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )
	 * @return boolean       Success|Connection
	 */
public getConnection($url = null, $cb = null, $pri = 0)
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param  object $conn Connection
	 * @return void
	 */
public detach($conn)
</md:method>

<md:method>
/**
	 * Mark connection as free
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public markConnFree(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Mark connection as busy
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public markConnBusy(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public detachConnFromUrl(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Touch pending "requests for connection"
	 * @param  string $url URL
	 * @return void
	 */
public touchPending($url)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by key
	 * @param  string   $key Key
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public getConnectionByKey($key, $cb = null)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  callable $cb Callback
	 * @return boolean      Success
	 */
public getConnectionRR($cb = null)
</md:method>

<md:method>
/**
	 * Sends a request to arbitrary server
	 * @param  string   $server     Server
	 * @param  string   $data       Data
	 * @param  callable $onResponse Called when the request complete
	 * @return boolean              Success
	 */
public requestByServer($server, $data, $onResponse = null)
</md:method>

<md:method>
/**
	 * Sends a request to server according to the key
	 * @param  string   $key        Key
	 * @param  string   $data       Data
	 * @param  callable $onResponse Callback called when the request complete
	 * @return boolean              Success
	 */
public requestByKey($key, $data, $onResponse = null)
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param  boolean $graceful Graceful?
	 * @return boolean           Ready to shutdown?
	 */
public onShutdown($graceful = false)
</md:method>


<!--/ include-namespace -->
