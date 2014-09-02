### connection # Connection #> Connection {tpl-git PHPDaemon/Network/Connection.php}

```php:p
namespace PHPDaemon\Network;
abstract class Connection extends [IOStream](#../iostream);
```

@TODO

#### methods # Methods

<md:method>
boolean public isConnected ( )

Connected?
</md:method>

<md:method>
void public setDgram ( boolean $bool )

Sets DGRAM mode

$bool
@TODO
</md:method>

<md:method>
void public setPeername ( string $host, integer $port )

Sets peer name

$host
Hostname

$port
Port
</md:method>

<md:method>
mixed public __get ( string $name )

Getter

$name
Name
</md:method>

<md:method>
void public getSocketName ( string &$addr, string &$port )

Get socket name

&$addr
Addr

&$port
Port
</md:method>

<md:method>
void public setParentSocket ( \PHPDaemon\BoundSocket\Generic $sock )

Sets parent socket
</md:method>

<md:method>
void public onUdpPacket ( @TODO $pct )

Called when new UDP packet received

$pct
@TODO
</md:method>

<md:method>
void public onReady ( )

Called when the connection is handshaked (at low-level), and peer is ready to recv. data
</md:method>

<md:method>
void public onInheritanceFromRequest ( object $req )

Called if we inherit connection from request

$req
Parent Request
</md:method>

<md:method>
void public onFailure ( )

Called when the connection failed to be established
</md:method>

<md:method>
void public onFailureEv ( \EventBufferEvent $bev = null )

Called when the connection failed

$bev
@TODO
</md:method>

<md:method>
void public __destruct ( )

Destructor
</md:method>

<md:method>
boolean public write ( string $data )

Send data to the connection. Note that it just writes to buffer that flushes at every baseloop

$data
Data to send
</md:method>

<md:method>
void public onConnected ( callable $cb )

Executes the given callback when/if the connection is handshaked

$cb
callable
</md:method>

<md:method>
string public getUrl ( )

Get URL
</md:method>

<md:method>
string public getHost ( )

Get host
</md:method>

<md:method>
integer public getPort ( )

Get port
</md:method>

<md:method>
boolean public connect ( string $url, callable $cb = null )

Connects to URL

$url
URL

$cb
Callback
</md:method>

<md:method>
boolean public connectUnix ( string $path )

Establish UNIX socket connection

$path
Path
</md:method>

<md:method>
boolean public connectRaw ( string $host )

Establish raw socket connection

$host
Host
</md:method>

<md:method>
boolean public connectUdp ( string $host, integer $port )

Establish UDP connection

$host
Hostname

$port
Port
</md:method>

<md:method>
boolean public connectTcp ( string $host, integer $port )

Establish TCP connection

$host
Hostname

$port
Port
</md:method>

<md:method>
void public setKeepalive ( boolean $bool )

Set keepalive

$bool
@TODO
</md:method>

<md:method>
void public close ( )

Close the connection
</md:method>

<md:method>
void public setTimeouts ( integer $read, integer $write )

Set timeouts

$read
Read timeout in seconds

$write
Write timeout in seconds
</md:method>

<md:method>
void public setOption ( integer $level, integer $optname, mixed $val )

Set socket option

$level
Level

$optname
Option

$val
Value
</md:method>

<md:method>
void public onFinish ( )

Called when connection finishes
</md:method>