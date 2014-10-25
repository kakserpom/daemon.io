### connection # Connection #> Connection {tpl-git PHPDaemon/Network/Connection.php}

```php:p
namespace PHPDaemon\Network;
abstract class Connection extends [IOStream](#../iostream);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Connection" level="" access="" -->
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
	 * Connected?
	 * @return boolean
	 */
public function isConnected()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L160
</md:method>

<md:method>
/**
	 * Sets DGRAM mode
	 * @param  boolean $bool DGRAM Mode
	 * @return void
	 */
public function setDgram($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L169
</md:method>

<md:method>
/**
	 * Sets peer name
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return void
	 */
public function setPeername($host, $port)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L179
</md:method>

<md:method>
/**
	 * Getter
	 * @param  string $name Name
	 * @return mixed
	 */
public function __get($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L197
</md:method>

<md:method>
/**
	 * Get socket name
	 * @param  string &$addr Addr
	 * @param  srting &$port Port
	 * @return void
	 */
public function getSocketName(&$addr, &$port)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L213
</md:method>

<md:method>
/**
	 * Sets parent socket
	 * @param \PHPDaemon\BoundSocket\Generic $sock
	 * @return void
	 */
public function setParentSocket(Generic $sock)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L226
</md:method>

<md:method>
/**
	 * Called when new UDP packet received
	 * @param  object $pct Packet
	 * @return void
	 */
public function onUdpPacket($pct)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L235
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L242
</md:method>

<md:method>
/**
	 * Called if we inherit connection from request
	 * @param  Request $req Parent Request
	 * @return void
	 */
public function onInheritanceFromRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L255
</md:method>

<md:method>
/**
	 * Called when the connection failed to be established
	 * @return void
	 */
public function onFailure()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L262
</md:method>

<md:method>
/**
	 * Called when the connection failed
	 * @param  EventBufferEvent $bev
	 * @return void
	 */
public function onFailureEv($bev = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L274
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L290
</md:method>

<md:method>
/**
	 * Send data to the connection. Note that it just writes to buffer that flushes at every baseloop
	 * @param  string  $data Data to send
	 * @return boolean       Success
	 */
public function write($data)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L301
</md:method>

<md:method>
/**
	 * Executes the given callback when/if the connection is handshaked
	 * @param  callable $cb Callback
	 * @return void
	 */
public function onConnected($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L313
</md:method>

<md:method>
/**
	 * Get URL
	 * @return string
	 */
public function getUrl()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L398
</md:method>

<md:method>
/**
	 * Get host
	 * @return string
	 */
public function getHost()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L406
</md:method>

<md:method>
/**
	 * Get port
	 * @return integer
	 */
public function getPort()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L414
</md:method>

<md:method>
/**
	 * Connects to URL
	 * @param  string   $url URL
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public function connect($url, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L424
</md:method>

<md:method>
/**
	 * Establish UNIX socket connection
	 * @param  string  $path Path
	 * @return boolean       Success
	 */
public function connectUnix($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L489
</md:method>

<md:method>
/**
	 * Establish raw socket connection
	 * @param  string  $host Hostname
	 * @return boolean       Success
	 */
public function connectRaw($host)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L513
</md:method>

<md:method>
/**
	 * Establish UDP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public function connectUdp($host, $port)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L559
</md:method>

<md:method>
/**
	 * Establish TCP connection
	 * @param  string  $host Hostname
	 * @param  integer $port Port
	 * @return boolean       Success
	 */
public function connectTcp($host, $port)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L618
</md:method>

<md:method>
/**
	 * Set keepalive
	 * @param  boolean $bool
	 * @return void
	 */
public function setKeepalive($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L694
</md:method>

<md:method>
/**
	 * Close the connection
	 * @return void
	 */
public function close()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L703
</md:method>

<md:method>
/**
	 * Set timeouts
	 * @param  integer $read  Read timeout in seconds
	 * @param  integer $write Write timeout in seconds
	 * @return void
	 */
public function setTimeouts($read, $write)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L716
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L731
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Connection.php#L744
</md:method>


<!--/ include-namespace -->
