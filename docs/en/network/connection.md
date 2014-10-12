### connection # Connection #> Connection {tpl-git PHPDaemon/Network/Connection.php}

```php:p
namespace PHPDaemon\Network;
abstract class Connection extends [IOStream](#../iostream);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Connection" commit="" level="" access="" -->
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
	 * Connected?
	 * @return boolean
	 */
public function isConnected()
</md:method>

<md:method>
/**
	 * Sets DGRAM mode
	 * @param  boolean $bool DGRAM Mode
	 * @return void
	 */
public function setDgram($bool)
</md:method>

<md:method>
/**
	 * Sets peer name
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return void
	 */
public function setPeername($host, $port)
</md:method>

<md:method>
/**
	 * Getter
	 * @param  string $name Name
	 * @return mixed
	 */
public function __get($name)
</md:method>

<md:method>
/**
	 * Get socket name
	 * @param  string &$addr Addr
	 * @param  srting &$port Port
	 * @return void
	 */
public function getSocketName(&$addr, &$port)
</md:method>

<md:method>
/**
	 * Sets parent socket
	 * @param \PHPDaemon\BoundSocket\Generic $sock
	 * @return void
	 */
public function setParentSocket(Generic $sock)
</md:method>

<md:method>
/**
	 * Called when new UDP packet received
	 * @param  object $pct Packet
	 * @return void
	 */
public function onUdpPacket($pct)
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
	 * Called if we inherit connection from request
	 * @param  Request $req Parent Request
	 * @return void
	 */
public function onInheritanceFromRequest($req)
</md:method>

<md:method>
/**
	 * Called when the connection failed to be established
	 * @return void
	 */
public function onFailure()
</md:method>

<md:method>
/**
	 * Called when the connection failed
	 * @param  EventBufferEvent $bev
	 * @return void
	 */
public function onFailureEv($bev = null)
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public function __destruct()
</md:method>

<md:method>
/**
	 * Send data to the connection. Note that it just writes to buffer that flushes at every baseloop
	 * @param  string  $data Data to send
	 * @return boolean       Success
	 */
public function write($data)
</md:method>

<md:method>
/**
	 * Executes the given callback when/if the connection is handshaked
	 * @param  callable $cb Callback
	 * @return void
	 */
public function onConnected($cb)
</md:method>

<md:method>
/**
	 * Get URL
	 * @return string
	 */
public function getUrl()
</md:method>

<md:method>
/**
	 * Get host
	 * @return string
	 */
public function getHost()
</md:method>

<md:method>
/**
	 * Get port
	 * @return integer
	 */
public function getPort()
</md:method>

<md:method>
/**
	 * Connects to URL
	 * @param  string   $url URL
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public function connect($url, $cb = null)
</md:method>

<md:method>
/**
	 * Establish UNIX socket connection
	 * @param  string  $path Path
	 * @return boolean       Success
	 */
public function connectUnix($path)
</md:method>

<md:method>
/**
	 * Establish raw socket connection
	 * @param  string  $host Hostname
	 * @return boolean       Success
	 */
public function connectRaw($host)
</md:method>

<md:method>
/**
	 * Establish UDP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public function connectUdp($host, $port)
</md:method>

<md:method>
/**
	 * Establish TCP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public function connectTcp($host, $port)
</md:method>

<md:method>
/**
	 * Set keepalive
	 * @param  boolean $bool
	 * @return void
	 */
public function setKeepalive($bool)
</md:method>

<md:method>
/**
	 * Close the connection
	 * @return void
	 */
public function close()
</md:method>

<md:method>
/**
	 * Set timeouts
	 * @param  integer $read  Read timeout in seconds
	 * @param  integer $write Write timeout in seconds
	 * @return void
	 */
public function setTimeouts($read, $write)
</md:method>

<md:method>
/**
	 * Set socket option
	 * @param  integer $level   Level
	 * @param  integer $optname Option
	 * @param  mixed   $val     Value
	 * @return void
	 */
public function setOption($level, $optname, $val)
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
</md:method>


<!--/ include-namespace -->
