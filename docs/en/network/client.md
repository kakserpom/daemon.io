### client # Client #> Client {tpl-git PHPDaemon/Network/Client.php}

```php:p
namespace PHPDaemon\Network;
abstract class Client extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Client" commit="4cacb482e20eda30e7674b2611d8aceeb9471af4" level="" access="" -->
#### properties # Properties

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

#### methods # Methods

<md:method>
/**
	 * Adds server
	 * @param string  Server URL
	 * @param integer Weight
	 * @return void
	 */
public function addServer($url, $weight = NULL)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param string   Address
	 * @param callback onConnected
	 * @param integer  Optional. Priority.
	 * @return mixed Success|Connection.
	 */
public function getConnection($url = null, $cb = null, $pri = 0)
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param $conn Connection
	 * @return void
	 */
public function detach($conn)
</md:method>

<md:method>
/**
	 * Mark connection as free
	 * @param ClientConnection $conn Connection
	 * @param string $url            URL
	 * @return void
	 */
public function markConnFree(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Mark connection as busy
	 * @param ClientConnection $conn Connection
	 * @param string $url            URL
	 * @return void
	 */
public function markConnBusy(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param ClientConnection $conn Connection
	 * @param string $url URL
	 * @return void
	 */
public function detachConnFromUrl(ClientConnection $conn, $url)
</md:method>

<md:method>
/**
	 * Touch pending "requests for connection"
	 * @param string $url URL
	 * @return void
	 */
public function touchPending($url)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by key
	 * @param string $key Key
	 * @param callable $cb
	 * @return boolean Success.
	 */
public function getConnectionByKey($key, $cb = null)
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param callable $cb Callback
	 * @return boolean Success
	 */
public function getConnectionRR($cb = null)
</md:method>

<md:method>
/**
	 * Sends a request to arbitrary server
	 * @param string Server
	 * @param string Request
	 * @param mixed  Callback called when the request complete
	 * @return boolean Success.
	 */
public function requestByServer($server, $data, $onResponse = null)
</md:method>

<md:method>
/**
	 * Sends a request to server according to the key
	 * @param string Key
	 * @param string Request
	 * @param mixed  Callback called when the request complete
	 * @return boolean Success
	 */
public function requestByKey($key, $data, $onResponse = null)
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param bool $graceful
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
</md:method>


<!--/ include-namespace -->
