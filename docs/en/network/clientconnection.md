### clientconnection # ClientConnection #> ClientConnection {tpl-git PHPDaemon/Network/ClientConnection.php}

```php:p
namespace PHPDaemon\Network;
class ClientConnection extends [Connection](#../connection);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\ClientConnection" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var object Associated pool
	 */
public $pool
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param resource $fd   File descriptor
	 * @param mixed    $pool ConnectionPool
	 */
public function __construct($fd, $pool = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L43
</md:method>

<md:method>
/**
	 * Busy?
	 * @return boolean
	 */
public function isBusy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L52
</md:method>

<md:method>
/**
	 * Push callback to onReponse stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public function onResponse($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L61
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L73
</md:method>

<md:method>
/**
	 * Set connection free/busy
	 * @param  boolean $free Free?
	 * @return void
	 */
public function setFree($free = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L89
</md:method>

<md:method>
/**
	 * Set connection free
	 * @return void
	 */
public function release()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L116
</md:method>

<md:method>
/**
	 * Set connection free/busy according to onResponse emptiness and ->finished
	 * @return void
	 */
public function checkFree()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L124
</md:method>

<md:method>
/**
	 * getQueueLength
	 * @return integer
	 */
public function getQueueLength()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L132
</md:method>

<md:method>
/**
	 * isQueueEmpty
	 * @return boolean
	 */
public function isQueueEmpty()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L140
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/ClientConnection.php#L148
</md:method>


<!--/ include-namespace -->
