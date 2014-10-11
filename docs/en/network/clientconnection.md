### clientconnection # ClientConnection #> ClientConnection {tpl-git PHPDaemon/Network/ClientConnection.php}

```php:p
namespace PHPDaemon\Network;
class ClientConnection extends [Connection](#../connection);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\ClientConnection" commit="" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var CappedStorage Context cache
	 */
protected static $contextCache;
</md:prop>

<md:prop>
/**
	 * @var number Context cache size
	 */
protected static $contextCacheSize;
</md:prop>

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
public __construct($fd, $pool = null)
</md:method>

<md:method>
/**
	 * Busy?
	 * @return boolean
	 */
public isBusy()
</md:method>

<md:method>
/**
	 * Push callback to onReponse stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public onResponse($cb)
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public onReady()
</md:method>

<md:method>
/**
	 * Set connection free/busy
	 * @param  boolean $free Free?
	 * @return void
	 */
public setFree($free = true)
</md:method>

<md:method>
/**
	 * Set connection free
	 * @return void
	 */
public release()
</md:method>

<md:method>
/**
	 * Set connection free/busy according to onResponse emptiness and ->finished
	 * @return void
	 */
public checkFree()
</md:method>

<md:method>
/**
	 * getQueueLength
	 * @return integer
	 */
public getQueueLength()
</md:method>

<md:method>
/**
	 * isQueueEmpty
	 * @return boolean
	 */
public isQueueEmpty()
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public onFinish()
</md:method>


<!--/ include-namespace -->
