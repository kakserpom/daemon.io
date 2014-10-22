### clientconnection # ClientConnection #> ClientConnection {tpl-git PHPDaemon/Network/ClientConnection.php}

```php:p
namespace PHPDaemon\Network;
class ClientConnection extends [Connection](#../connection);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\ClientConnection" commit="54dfa1ea8d46f47d880c365c09c64d7eeea32adb" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * Associated pool
	 * @var object ConnectionPool
	 */
public $pool;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param mixed $fd   File descriptor
	 * @param mixed $pool ConnectionPool
	 */
public function __construct($fd, $pool = null)
</md:method>

<md:method>
/**
	 * Busy?
	 * @return boolean
	 */
public function isBusy()
</md:method>

<md:method>
/**
	 * Push callback to onReponse stack
	 * @return void
	 */
public function onResponse($cb)
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
</md:method>

<md:method>
/**
	 * Set connection free/busy
	 * @param boolean Free?
	 * @return void
	 */
public function setFree($free = true)
</md:method>

<md:method>
/**
	 * Set connection free
	 * @return void
	 */
public function release()
</md:method>

<md:method>
/**
	 * Set connection free/busy according to onResponse emptiness and ->finished
	 * @return void
	 */
public function checkFree()
</md:method>

<md:method>

public function getQueueLength()
</md:method>

<md:method>

public function isQueueEmpty()
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
</md:method>


<!--/ include-namespace -->
