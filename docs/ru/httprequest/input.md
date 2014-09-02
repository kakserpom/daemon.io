### input # Input #> Input {tpl-git PHPDaemon/HTTPRequest/Input.php}

```php
namespace PHPDaemon\HTTPRequest;
class Input extends \EventBuffer;
```

@TODO

#### properties # Свойства

<md:prop>
array public $curPart;
Current Part
</md:prop>

<md:prop>
</md:prop>

#### methods # Методы

<md:method>
void public setBoundary ( string $boundary )

Set boundary

$boundary
@TODO
</md:method>

<md:method>
void public freeze ( boolean $at_front = false )

Freeze input

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
void public unfreeze ( boolean $at_front = false )

Unfreeze input

$at_front
At front. Default is true. If the front of a buffer is frozen, operations that drain data from the front of the buffer, or that prepend data to the buffer, will fail until it is unfrozen. If the back a buffer is frozen, operations that append data from the buffer will fail until it is unfrozen.
</md:method>

<md:method>
boolean public isFrozen ( )

Is frozen?
</md:method>

<md:method>
boolean public isEof ( )

Is EOF?
</md:method>

<md:method>
void public setRequest ( [Generic](#../generic) $req )

Set request

$req
@TODO
</md:method>

<md:method>
void public sendEOF ( )

Send EOF
</md:method>

<md:method>
integer public readFromBuffer ( \EventBuffer $buf )

Moves $n bytes from input buffer to arbitrary buffer

$buf
Source nuffer
</md:method>

<md:method>
void public readFromString ( string $chunk, boolean $final = true )

Append string to input buffer

$chunk
Piece of request input

$final
Final call is THIS SEQUENCE of calls (not mandatory final in request)?
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
void public parseMultipart ( )

Parses multipart
</md:method>

<md:method>
string public getChunkString ( )

Get current upload chunk as string
</md:method>

<md:method>
boolean public writeChunkToFd ( resource $fd, callable $cb = null )

Write current upload chunk to file descriptor

$fd
File destriptor

$cb
Callback
</md:method>

<md:method>
void public log ( string $msg )

Log

$msg
Message
</md:method>