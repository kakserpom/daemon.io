### clientconnection # ClientConnection #> ClientConnection {tpl-git PHPDaemon/Network/ClientConnection.php}

```php:p
namespace PHPDaemon\Network;
class ClientConnection extends [Connection](#../connection);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\ClientConnection" commit="8b80f6d1d2fb3f9534b708f86100d2629ac4204b" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var object Associated pool
	 */
public $pool;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param resource $fd   File descriptor
	 * @param mixed    $pool ConnectionPool
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
	 * @param  callable $cb Callback
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
	 * @param  boolean $free Free?
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
/**
	 * getQueueLength
	 * @return integer
	 */
public function getQueueLength()
</md:method>

<md:method>
/**
	 * isQueueEmpty
	 * @return boolean
	 */
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
