### input # Input #> Input {tpl-git PHPDaemon/HTTPRequest/Input.php}

```php
namespace PHPDaemon\HTTPRequest;
class Input extends \EventBuffer;
```

@TODO

<!-- include-namespace path="\PHPDaemon\HTTPRequest\Input" level="" access="" -->
#### consts # Constants

<md:const>
const STATE_SEEKBOUNDARY = 0
State: seek nearest boundary
</md:const>

<md:const>
const STATE_HEADERS = 1
State: headers
</md:const>

<md:const>
const STATE_BODY = 2
State: body
</md:const>

<md:const>
const STATE_UPLOAD = 3
State: upload
</md:const>

#### properties # Properties

<md:prop>
/**
	 * @var array Current Part
	 */
public $curPart
</md:prop>

<md:prop>

public $length
</md:prop>

<md:prop>

public $contiguous_space
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Set boundary
	 * @param  string $boundary Boundary
	 * @return void
	 */
public function setBoundary($boundary)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L92
</md:method>

<md:method>
/**
	 * Freeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return void
	 */
public function freeze($at_front = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L101
</md:method>

<md:method>
/**
	 * Unfreeze input
	 * @param  boolean $at_front At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen
	 * @return void
	 */
public function unfreeze($at_front = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L111
</md:method>

<md:method>
/**
	 * Is frozen?
	 * @return boolean
	 */
public function isFrozen()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L126
</md:method>

<md:method>
/**
	 * Is EOF?
	 * @return boolean
	 */
public function isEof()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L134
</md:method>

<md:method>
/**
	 * Set request
	 * @param  Generic $req Request
	 * @return void
	 */
public function setRequest(Generic $req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L143
</md:method>

<md:method>
/**
	 * Send EOF
	 * @return void
	 */
public function sendEOF()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L194
</md:method>

<md:method>
/**
	 * Moves $n bytes from input buffer to arbitrary buffer
	 * @param  \EventBuffer $buf Source nuffer
	 * @return integer
	 */
public function readFromBuffer(\EventBuffer $buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L206
</md:method>

<md:method>
/**
	 * Append string to input buffer
	 * @param  string  $chunk Piece of request input
	 * @param  boolean $final Final call is THIS SEQUENCE of calls (not mandatory final in request)?
	 * @return void
	 */
public function readFromString($chunk, $final = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L231
</md:method>

<md:method>
/**
	 * Read from buffer without draining
	 * @param  integer $n Number of bytes to read
	 * @param  integer $o Offset
	 * @return string
	 */
public function look($n, $o = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L246
</md:method>

<md:method>
/**
	 * Parses multipart
	 * @return void
	 */
public function parseMultipart()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L258
</md:method>

<md:method>
/**
	 * Get current upload chunk as string
	 * @return string Chunk body
	 */
public function getChunkString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L415
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L431
</md:method>

<md:method>
/**
	 * Log
	 * @param  string $msg Message
	 * @return void
	 */
public function log($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/HTTPRequest/Input.php#L446
</md:method>


<!--/ include-namespace -->
