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
public isConnected()
</md:method>

<md:method>
/**
	 * Sets DGRAM mode
	 * @param  boolean $bool DGRAM Mode
	 * @return void
	 */
public setDgram($bool)
</md:method>

<md:method>
/**
	 * Sets peer name
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return void
	 */
public setPeername($host, $port)
</md:method>

<md:method>
/**
	 * Getter
	 * @param  string $name Name
	 * @return mixed
	 */
public __get($name)
</md:method>

<md:method>
/**
	 * Get socket name
	 * @param  string &$addr Addr
	 * @param  srting &$port Port
	 * @return void
	 */
public getSocketName(&$addr, &$port)
</md:method>

<md:method>
/**
	 * Sets parent socket
	 * @param \PHPDaemon\BoundSocket\Generic $sock
	 * @return void
	 */
public setParentSocket(Generic $sock)
</md:method>

<md:method>
/**
	 * Called when new UDP packet received
	 * @param  object $pct Packet
	 * @return void
	 */
public onUdpPacket($pct)
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
	 * Called if we inherit connection from request
	 * @param  Request $req Parent Request
	 * @return void
	 */
public onInheritanceFromRequest($req)
</md:method>

<md:method>
/**
	 * Called when the connection failed to be established
	 * @return void
	 */
public onFailure()
</md:method>

<md:method>
/**
	 * Called when the connection failed
	 * @param  EventBufferEvent $bev
	 * @return void
	 */
public onFailureEv($bev = null)
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public __destruct()
</md:method>

<md:method>
/**
	 * Send data to the connection. Note that it just writes to buffer that flushes at every baseloop
	 * @param  string  $data Data to send
	 * @return boolean       Success
	 */
public write($data)
</md:method>

<md:method>
/**
	 * Executes the given callback when/if the connection is handshaked
	 * @param  callable $cb Callback
	 * @return void
	 */
public onConnected($cb)
</md:method>

<md:method>
/**
	 * Get URL
	 * @return string
	 */
public getUrl()
</md:method>

<md:method>
/**
	 * Get host
	 * @return string
	 */
public getHost()
</md:method>

<md:method>
/**
	 * Get port
	 * @return integer
	 */
public getPort()
</md:method>

<md:method>
/**
	 * Connects to URL
	 * @param  string   $url URL
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public connect($url, $cb = null)
</md:method>

<md:method>
/**
	 * Establish UNIX socket connection
	 * @param  string  $path Path
	 * @return boolean       Success
	 */
public connectUnix($path)
</md:method>

<md:method>
/**
	 * Establish raw socket connection
	 * @param  string  $host Hostname
	 * @return boolean       Success
	 */
public connectRaw($host)
</md:method>

<md:method>
/**
	 * Establish UDP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public connectUdp($host, $port)
</md:method>

<md:method>
/**
	 * Establish TCP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public connectTcp($host, $port)
</md:method>

<md:method>
/**
	 * Set keepalive
	 * @param  boolean $bool
	 * @return void
	 */
public setKeepalive($bool)
</md:method>

<md:method>
/**
	 * Close the connection
	 * @return void
	 */
public close()
</md:method>

<md:method>
/**
	 * Set timeouts
	 * @param  integer $read  Read timeout in seconds
	 * @param  integer $write Write timeout in seconds
	 * @return void
	 */
public setTimeouts($read, $write)
</md:method>

<md:method>
/**
	 * Set socket option
	 * @param  integer $level   Level
	 * @param  integer $optname Option
	 * @param  mixed   $val     Value
	 * @return void
	 */
public setOption($level, $optname, $val)
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public onFinish()
</md:method>


<!--/ include-namespace -->
