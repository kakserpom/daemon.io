### server # Server #> Server {tpl-git PHPDaemon/Network/Server.php}

```php:p
namespace PHPDaemon\Network;
abstract class Server extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Server" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var array|null Allowed clients
	 */
public $allowedClients
</md:prop>

<div class="clearboth"></div>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param array   $config Config variables
	 * @param boolean $init
	 */
public function __construct($config = [], $init = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L29
</md:method>

<md:method>
/**
	 * Finishes ConnectionPool
	 * @return boolean Success
	 */
public function finish($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L44
</md:method>

<md:method>
/**
	 * Bind given sockets
	 * @param  mixed   $addrs Addresses to bind
	 * @param  integer $max   Maximum
	 * @return integer        Number of bound
	 */
public function bindSockets($addrs = [], $max = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L55
</md:method>

<md:method>
/**
	 * Bind given socket
	 * @param  string  $uri Address to bind
	 * @return boolean      Success
	 */
public function bindSocket($uri)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L76
</md:method>

<md:method>
/**
	 * Attach Generic
	 * @param  \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @param  mixed $inf Info
	 * @return void
	 */
public function attachBound(\PHPDaemon\BoundSocket\Generic $bound, $inf = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L152
</md:method>

<md:method>
/**
	 * Detach Generic
	 * @param  \PHPDaemon\BoundSocket\Generic $bound Generic
	 * @return void
	 */
public function detachBound(\PHPDaemon\BoundSocket\Generic $bound)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L161
</md:method>

<md:method>
/**
	 * Close each of binded sockets
	 * @return void
	 */
public function closeBound()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L169
</md:method>

<md:method>
/**
	 * Called when a request to HTTP-server looks like another connection
	 * @param  object  $req     Request
	 * @param  object  $oldConn Connection
	 * @return boolean Success
	 */
public function inheritFromRequest($req, $oldConn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Server.php#L179
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
