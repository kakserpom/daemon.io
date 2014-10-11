### iostream # IOStream #> IOStream {tpl-git PHPDaemon/Network/IOStream.php}

```php
namespace PHPDaemon\Network;
abstract class IOStream;
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\IOStream" commit="" level="" access="" -->
#### consts # Constants

<md:const>
const STATE_ROOT = 0;
Alias of STATE_STANDBY
</md:const>

<md:const>
const STATE_STANDBY = 0;
Standby state (default state)
</md:const>

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
	 * IOStream constructor
	 * @param resource $fd   File descriptor. Optional
	 * @param object   $pool Pool. Optional
	 */
public __construct($fd = null, $pool = null)
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
	 * Freed?
	 * @return boolean
	 */
public isFreed()
</md:method>

<md:method>
/**
	 * Finished?
	 * @return boolean
	 */
public isFinished()
</md:method>

<md:method>
/**
	 * Get EventBufferEvent
	 * @return EventBufferEvent
	 */
public getBev()
</md:method>

<md:method>
/**
	 * Get file descriptor
	 * @return resource File descriptor
	 */
public getFd()
</md:method>

<md:method>
/**
	 * Sets context mode
	 * @param  object  $ctx  Context
	 * @param  integer $mode Mode
	 * @return void
	 */
public setContext($ctx, $mode)
</md:method>

<md:method>
/**
	 * Sets fd
	 * @param  resource $fd  File descriptor
	 * @param  object   $bev EventBufferEvent
	 * @return void
	 */
public setFd($fd, $bev = null)
</md:method>

<md:method>
/**
	 * Set timeout
	 * @param  integer $rw Timeout
	 * @return void
	 */
public setTimeout($rw)
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
	 * Sets priority
	 * @param  integer $p Priority
	 * @return void
	 */
public setPriority($p)
</md:method>

<md:method>
/**
	 * Sets watermark
	 * @param  integer|null $low  Low
	 * @param  integer|null $high High
	 * @return void
	 */
public setWatermark($low = null, $high = null)
</md:method>

<md:method>
/**
	 * Reads line from buffer
	 * @param  integer     $eol EOLS_*
	 * @return string|null
	 */
public readLine($eol = null)
</md:method>

<md:method>
/**
	 * Drains buffer
	 * @param  integer $n Numbers of bytes to drain
	 * @return boolean    Success
	 */
public drain($n)
</md:method>

<md:method>
/**
	 * Drains buffer it matches the string
	 * @param  string       $str Data
	 * @return boolean|null      Success
	 */
public drainIfMatch($str)
</md:method>

<md:method>
/**
	 * Reads exact $n bytes of buffer without draining
	 * @param  integer $n Number of bytes to read
	 * @param  integer $o Offset
	 * @return string|false
	 */
public lookExact($n, $o = 0)
</md:method>

<md:method>
/**
	 * Prepends data to input buffer
	 * @param  string  $str Data
	 * @return boolean      Success
	 */
public prependInput($str)
</md:method>

<md:method>
/**
	 * Prepends data to output buffer
	 * @param  string  $str Data
	 * @return boolean      Success
	 */
public prependOutput($str)
</md:method>

<md:method>
/**
	 * Read from buffer without draining
	 * @param integer $n Number of bytes to read
	 * @param integer $o Offset
	 * @return string|false
	 */
public look($n, $o = 0)
</md:method>

<md:method>
/**
	 * Read from buffer without draining
	 * @param  integer $o Offset
	 * @param  integer $n Number of bytes to read
	 * @return string|false
	 */
public substr($o, $n = -1)
</md:method>

<md:method>
/**
	 * Searches first occurence of the string in input buffer
	 * @param  string  $what  Needle
	 * @param  integer $start Offset start
	 * @param  integer $end   Offset end
	 * @return integer        Position
	 */
public search($what, $start = 0, $end = -1)
</md:method>

<md:method>
/**
	 * Reads exact $n bytes from buffer
	 * @param  integer      $n Number of bytes to read
	 * @return string|false
	 */
public readExact($n)
</md:method>

<md:method>
/**
	 * Returns length of input buffer
	 * @return integer
	 */
public getInputLength()
</md:method>

<md:method>
/**
	 * Called when the worker is going to shutdown
	 * @return boolean Ready to shutdown?
	 */
public gracefulShutdown()
</md:method>

<md:method>
/**
	 * Freeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return boolean           Success
	 */
public freezeInput($at_front = false)
</md:method>

<md:method>
/**
	 * Unfreeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return boolean           Success
	 */
public unfreezeInput($at_front = false)
</md:method>

<md:method>
/**
	 * Freeze output
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return boolean           Success
	 */
public freezeOutput($at_front = true)
</md:method>

<md:method>
/**
	 * Unfreeze output
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return boolean           Success
	 */
public unfreezeOutput($at_front = true)
</md:method>

<md:method>
/**
	 * Called when the connection is ready to accept new data
	 * @return void
	 */
public onWrite()
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
	 * Send data and appending \n to connection. Note that it just writes to buffer flushed at every baseloop
	 * @param  string  $data Data to send
	 * @return boolean       Success
	 */
public writeln($data)
</md:method>

<md:method>
/**
	 * Finish the session. You should not worry about buffers, they are going to be flushed properly
	 * @return void
	 */
public finish()
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
	 * Unsets pointers of associated EventBufferEvent and File descriptr
	 * @return void
	 */
public unsetFd()
</md:method>

<md:method>
/**
	 * Called when the connection has got new data
	 * @param  object $bev EventBufferEvent
	 * @return void
	 */
public onReadEv($bev)
</md:method>

<md:method>
/**
	 * Push callback which will be called only once, when writing is available next time
	 * @param  callable $cb Callback
	 * @return void
	 */
public onWriteOnce($cb)
</md:method>

<md:method>
/**
	 * Called when the connection is ready to accept new data
	 * @param  object $bev EventBufferEvent
	 * @return void
	 */
public onWriteEv($bev)
</md:method>

<md:method>
/**
	 * Called when the connection state changed
	 * @param  object  $bev    EventBufferEvent
	 * @param  integer $events Events
	 * @return void
	 */
public onStateEv($bev, $events)
</md:method>

<md:method>
/**
	 * Moves arbitrary number of bytes from input buffer to given buffer
	 * @param  \EventBuffer $dest Destination nuffer
	 * @param  integer      $n    Max. number of bytes to move
	 * @return integer|false
	 */
public moveToBuffer(\EventBuffer $dest, $n)
</md:method>

<md:method>
/**
	 * Moves arbitrary number of bytes from given buffer to output buffer
	 * @param  \EventBuffer $src Source buffer
	 * @param  integer      $n   Max. number of bytes to move
	 * @return integer|false
	 */
public writeFromBuffer(\EventBuffer $src, $n)
</md:method>

<md:method>
/**
	 * Read data from the connection's buffer
	 * @param  integer      $n Max. number of bytes to read
	 * @return string|false    Readed data
	 */
public read($n)
</md:method>

<md:method>
/**
	 * Reads all data from the connection's buffer
	 * @return string Readed data
	 */
public readUnlimited()
</md:method>


<!--/ include-namespace -->
