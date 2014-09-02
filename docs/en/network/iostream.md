### iostream # IOStream #> IOStream {tpl-git PHPDaemon/Network/IOStream.php}

```php
namespace PHPDaemon\Network;
abstract class IOStream;
```

@TODO

#### properties # Properties

<md:prop>
ConnectionPool public $pool;
Associated pool
</md:prop>

<md:prop>
</md:prop>

#### methods # Methods

<md:method>
void public __construct ( resource $fd = null, object $pool = null )

IOStream constructor

$fd
File descriptor. Optional.

$pool
Pool. Optional.
</md:method>

<md:method>
mixed public __get ( string $name )

Getter

$name
Name
</md:method>

<md:method>
boolean public isFreed ( )

Freed?
</md:method>

<md:method>
boolean public isFinished ( )

Finished?
</md:method>

<md:method>
\EventBufferEvent public getBev ( )

Get EventBufferEvent
</md:method>

<md:method>
resource public getFd ( )

Get file descriptor
</md:method>

<md:method>
void public setContext ( object $ctx, integer $mode )

Sets context mode

$ctx
Context

$mode
Mode
</md:method>

<md:method>
void public setFd ( resource $fd, \EventBufferEvent $bev = null )

Sets fd

$fd
File descriptor

$bev
EventBufferEvent
</md:method>

<md:method>
void public setTimeout ( integer $rw )

Set timeout

$rw
Timeout
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
void public setPriority ( integer $p )

Sets priority

$p
Priority
</md:method>

<md:method>
void public setWatermark ( integer $low = null, integer $high = null )

Sets watermark

$low
Low

$high
High
</md:method>

<md:method>
string public readLine ( integer $eol = null )

Reads line from buffer

$eol
@TODO
</md:method>

<md:method>
boolean public drain ( integer $n )

Drains buffer

$n
Numbers of bytes to drain
</md:method>

<md:method>
boolean public drainIfMatch ( string $str )

Drains buffer it matches the string

$str
Data
</md:method>

<md:method>
string public lookExact ( integer $n, integer $o = 0 )

Reads exact $n bytes of buffer without draining

$n
Number of bytes to read

$o
Offset
</md:method>

<md:method>
boolean public prependInput ( string $str )

Prepends data to input buffer

$str
Data
</md:method>

<md:method>
boolean public prependOutput ( string $str )

Prepends data to output buffer

$str
Data
</md:method>

<md:method>
string public look ( integer $n, integer $o = 0 )

Read from buffer without draining

$n
Number of bytes to read

$o
Offset
</md:method>

<md:method>
string public substr ( integer $o, integer $n = -1 )

Read from buffer without draining

$o
Offset

$n
Number of bytes to read
</md:method>

<md:method>
integer public search ( string $what, integer $start = 0, integer $end = -1 )

Searches first occurence of the string in input buffer

$what
Needle

$start
Offset start

$end
Offset end
</md:method>

<md:method>
string public readExact ( integer $n )

Reads exact $n bytes from buffer

$n
Number of bytes to read
</md:method>

<md:method>
integer public getInputLength ( )

Returns length of input buffer
</md:method>

<md:method>
boolean public gracefulShutdown ( )

Called when the worker is going to shutdown
</md:method>

<md:method>
boolean public freezeInput ( boolean $at_front = false )

Freeze input

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
boolean public unfreezeInput ( boolean $at_front = false )

Unfreeze input

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
boolean public freezeOutput ( boolean $at_front = true )

Freeze output

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
boolean public unfreezeOutput ( boolean $at_front = true )

Unfreeze output

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
void public onWrite ( )

Called when the connection is ready to accept new data
</md:method>

<md:method>
boolean public write ( string $data )

Send data to the connection. Note that it just writes to buffer that flushes at every baseloop

$data
Data to send
</md:method>

<md:method>
boolean public writeln ( string $data )

Send data and appending \n to connection. Note that it just writes to buffer flushed at every baseloop

$data
Data to send
</md:method>

<md:method>
void public finish ( )

Finish the session. You should not worry about buffers, they are going to be flushed properly.
</md:method>

<md:method>
void public close ( )

Close the connection
</md:method>

<md:method>
void public unsetFd ( )

Unsets pointers of associated EventBufferEvent and File descriptr
</md:method>

<md:method>
void public onReadEv ( \EventBufferEvent $bev )

Called when the connection has got new data

$bev
Bufferevent
</md:method>

<md:method>
void public onWriteOnce ( callable $cb )

Push callback which will be called only once, when writing is available next time

$cb
Callback
</md:method>

<md:method>
void public onWriteEv ( \EventBufferEvent $bev )

Called when the connection is ready to accept new data

$bev
Bufferedevent
</md:method>

<md:method>
void public onStateEv ( \EventBufferEvent $bev, integer $events )

Called when the connection state changed

$bev
Bufferevent

$events
Events
</md:method>

<md:method>
integer public moveToBuffer ( \EventBuffer $dest, integer $n )

Moves arbitrary number of bytes from input buffer to given buffer

$dest
Destination nuffer

$n
Max. number of bytes to move
</md:method>

<md:method>
integer public writeFromBuffer ( \EventBuffer $src, integer $n )

Moves arbitrary number of bytes from given buffer to output buffer

$src
Source buffer

$n
Max. number of bytes to move
</md:method>

<md:method>
string public read ( integer $n )

Read data from the connection's buffer

$n
Max. number of bytes to read
</md:method>

<md:method>
string public readUnlimited ( )

Reads all data from the connection's buffer
</md:method>