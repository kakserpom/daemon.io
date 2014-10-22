### input # Input #> Input {tpl-git PHPDaemon/HTTPRequest/Input.php}

```php
namespace PHPDaemon\HTTPRequest;
class Input extends \EventBuffer;
```

@TODO

<!-- include-namespace path="\PHPDaemon\HTTPRequest\Input" commit="3877d439bad023595ed76194d4a9aa54ee2d9e39" level="" access="" -->
#### consts # Constants

<md:const>
const STATE_SEEKBOUNDARY = 0;
State: seek nearest boundary
</md:const>

<md:const>
const STATE_HEADERS = 1;
State: headers
</md:const>

<md:const>
const STATE_BODY = 2;
State: body
</md:const>

<md:const>
const STATE_UPLOAD = 3;
State: upload
</md:const>

#### properties # Properties

<md:prop>
/**
	 * @var array Current Part
	 */
public $curPart;
</md:prop>

<md:prop>

public $length;
</md:prop>

<md:prop>

public $contiguous_space;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Set boundary
	 * @param  string $boundary Boundary
	 * @return void
	 */
public function setBoundary($boundary)
</md:method>

<md:method>
/**
	 * Freeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return void
	 */
public function freeze($at_front = false)
</md:method>

<md:method>
/**
	 * Unfreeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return void
	 */
public function unfreeze($at_front = false)
</md:method>

<md:method>
/**
	 * Is frozen?
	 * @return boolean
	 */
public function isFrozen()
</md:method>

<md:method>
/**
	 * Is EOF?
	 * @return boolean
	 */
public function isEof()
</md:method>

<md:method>
/**
	 * Set request
	 * @param  Generic $req Request
	 * @return void
	 */
public function setRequest(Generic $req)
</md:method>

<md:method>
/**
	 * Send EOF
	 * @return void
	 */
public function sendEOF()
</md:method>

<md:method>
/**
	 * Moves $n bytes from input buffer to arbitrary buffer
	 * @param  \EventBuffer $buf Source nuffer
	 * @return integer
	 */
public function readFromBuffer(\EventBuffer $buf)
</md:method>

<md:method>
/**
	 * Append string to input buffer
	 * @param  string  $chunk Piece of request input
	 * @param  boolean $final Final call is THIS SEQUENCE of calls (not mandatory final in request)?
	 * @return void
	 */
public function readFromString($chunk, $final = true)
</md:method>

<md:method>
/**
	 * Read from buffer without draining
	 * @param  integer $n Number of bytes to read
	 * @param  integer $o Offset
	 * @return string
	 */
public function look($n, $o = 0)
</md:method>

<md:method>
/**
	 * Parses multipart
	 * @return void
	 */
public function parseMultipart()
</md:method>

<md:method>
/**
	 * Get current upload chunk as string
	 * @return string Chunk body
	 */
public function getChunkString()
</md:method>

<md:method>
/**
	 * Write current upload chunk to file descriptor
	 * @todo   It is not supported yet (callback missing in EventBuffer->write())
	 * @param  mixed    $fd File destriptor
	 * @param  callable $cb Callback
	 * @return boolean      Success
	 */
public function writeChunkToFd($fd, $cb = null)
</md:method>

<md:method>
/**
	 * Log
	 * @param  string $msg Message
	 * @return void
	 */
public function log($msg)
</md:method>


<!--/ include-namespace -->
