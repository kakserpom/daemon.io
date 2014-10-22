### server # Server #> Server {tpl-git PHPDaemon/Network/Server.php}

```php:p
namespace PHPDaemon\Network;
abstract class Server extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Server" commit="c3eabafdec2045261861630de601aebeeb29bea9" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * Allowed clients
	 * @var array|null
	 */
public $allowedClients;
</md:prop>

<md:prop>

public $maxAllowedPacket;
</md:prop>

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
	 * Application instance object
	 * @var object|null
	 */
public $appInstance;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param array Config variables
	 * @return object
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
	 * @param mixed Addresses to bind
	 * @return integer Number of bound.
	 */
public function bindSockets($addrs = [], $max = 0)
</md:method>

<md:method>
/**
	 * Bind given socket
	 * @param string Address to bind
	 * @return boolean Success
	 */
public function bindSocket($uri)
</md:method>

<md:method>
/**
	 * Attach Generic
	 * @param \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @param mixed $inf Info
	 * @return void
	 */
public function attachBound(\PHPDaemon\BoundSocket\Generic $bound, $inf = null)
</md:method>

<md:method>
/**
	 * Detach Generic
	 * @param \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @return void
	 */
public function detachBound(\PHPDaemon\BoundSocket\Generic $bound)
</md:method>

<md:method>
/**
	 * Close each of binded sockets.
	 * @return void
	 */
public function closeBound()
</md:method>

<md:method>
/**
	 * Called when a request to HTTP-server looks like another connection.
	 * @param $req
	 * @param $oldConn
	 * @return boolean Success
	 */
public function inheritFromRequest($req, $oldConn)
</md:method>


<!--/ include-namespace -->
