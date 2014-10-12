### server # Server #> Server {tpl-git PHPDaemon/Network/Server.php}

```php:p
namespace PHPDaemon\Network;
abstract class Server extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Server" commit="" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var array|null Allowed clients
	 */
public $allowedClients;
</md:prop>

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
	 * Constructor
	 * @param array   $config Config variables
	 * @param boolean $init
	 */
public function __construct($config = [], $init = true)
</md:method>

<md:method>
/**
	 * Finishes ConnectionPool
	 * @return boolean Success
	 */
public function finish($graceful = false)
</md:method>

<md:method>
/**
	 * Bind given sockets
	 * @param  mixed   $addrs Addresses to bind
	 * @param  integer $max   Maximum
	 * @return integer        Number of bound
	 */
public function bindSockets($addrs = [], $max = 0)
</md:method>

<md:method>
/**
	 * Bind given socket
	 * @param  string  $uri Address to bind
	 * @return boolean      Success
	 */
public function bindSocket($uri)
</md:method>

<md:method>
/**
	 * Attach Generic
	 * @param  \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @param  mixed $inf Info
	 * @return void
	 */
public function attachBound(\PHPDaemon\BoundSocket\Generic $bound, $inf = null)
</md:method>

<md:method>
/**
	 * Detach Generic
	 * @param  \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @return void
	 */
public function detachBound(\PHPDaemon\BoundSocket\Generic $bound)
</md:method>

<md:method>
/**
	 * Close each of binded sockets
	 * @return void
	 */
public function closeBound()
</md:method>

<md:method>
/**
	 * Called when a request to HTTP-server looks like another connection
	 * @param  object  $req     Request
	 * @param  object  $oldConn Connection
	 * @return boolean Success
	 */
public function inheritFromRequest($req, $oldConn)
</md:method>


<!--/ include-namespace -->
