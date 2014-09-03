### generic # Generic #> Generic {tpl-git PHPDaemon/HTTPRequest/Generic.php}

```php
namespace PHPDaemon\HTTPRequest;
abstract class Generic extends \PHPDaemon\Request\Generic;
```

@TODO

#### properties # Properties

<md:prop>
boolean public $keepalive = false;
@TODO
</md:prop>

<md:prop>
integer public $responseLength = 0;
Current response length
</md:prop>

<md:prop>
array public static $hvaltr = ['; ' => '&', ';' => '&', ' ' => '%20'];
Replacement pairs for processing some header values in parse_str()
</md:prop>

<md:prop>
array public static $htr = ['-' => '_'];
State
</md:prop>

#### methods # Methods

<md:method>
void public firstDeferredEventUsed ( )

@TODO
</md:method>

<md:method>
boolean public sendfile ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

Output whole contents of file

$path
Path

$cb
Callback

$pri
Priority
</md:method>

<md:method>
boolean public checkIfReady ( )

Called to check if Request is ready
</md:method>

<md:method>
integer public getUploadMaxSize ( )

Upload maximum file size
</md:method>

<md:method>
void public postPrepare ( )

Prepares the request body
</md:method>

<md:method>
boolean public ensureSentHeaders ( )

Ensure that headers are sent
</md:method>

<md:method>
boolean public out ( string $s, boolean $flush = true )

Output some data

$s
String to out

$flush
Flush
</md:method>

<md:method>
void public onParsedParams ( )

Called when request's headers parsed
</md:method>

<md:method>
boolean public combinedOut ( string $s )

Outputs data with headers (split by \r\n\r\n)

$s
String to out
</md:method>

<md:method>
void public chunked ( )

Use chunked encoding
</md:method>

<md:method>
void public onWakeup ( )

Called when the request wakes up
</md:method>

<md:method>
void public onSleep ( )

Called when the request starts sleep
</md:method>

<md:method>
boolean public status ( integer $code = 200 )

Send HTTP-status

$code
Code
</md:method>

<md:method>
boolean public headers_sent ( string &$file, integer &$line )

Checks if headers have been sent

&$file
File name where output started in the file and line variables

&$line
Line number where output started in the file and line variables
</md:method>

<md:method>
array public headers_list ( )

Return current list of headers
</md:method>

<md:method>
void public setcookie ( string $name, string $value = '', штеупук $maxage = 0, string $path = '', string $domain = '', boolean $secure = false, boolean $HTTPOnly = false )

Set the cookie

$name
Name of cookie

$value
Value

$maxage
Optional. Max-Age. Default is 0

$path
Optional. Path. Default is empty string

$domain
@TODO

$secure
Optional. Secure. Default is false

$HTTPOnly
Optional. HTTPOnly. Default is false
</md:method>

<md:method>
boolean public header ( string $s, boolean $replace = true, integer $code = false )

Send the header

$s
Header. Example: `Location: http://php.net/`

$replace
Optional. Replace?

$code
Optional. HTTP response code
</md:method>

<md:method>
void public removeHeader ( string $s )

Removes a header

$s
Header name. Example: `Location`
</md:method>

<md:method>
integer public static parseSize ( string $value )

Converts human-readable representation of size to number of bytes

$value
Data
</md:method>

<md:method>
void public onUploadFileStart ( [Input](#../input) $in )

Called when file upload started

$in
Input
</md:method>

<md:method>
void public onUploadFileChunk ( [Input](#../input) $in, boolean $last = false )

Called when chunk of incoming file has arrived

$in
Input

$last
Last?
</md:method>

<md:method>
string public getUploadTempDir ( )

@TODO
</md:method>

<md:method>
boolean public isUploadedFile ( string $path )

Tells whether the file was uploaded via HTTP POST

$path
The filename being checked
</md:method>

<md:method>
boolean public moveUploadedFile ( string $filename, string $dest )

Moves an uploaded file to a new location

$filename
The filename of the uploaded file

$dest
The destination of the moved file
</md:method>

<md:method>
boolean public readBodyFile ( )

Read request body from the file given in REQUEST_BODY_FILE parameter
</md:method>

<md:method>
void public static parse_str ( string $s, array &$var, boolean $header = false )

Replacement for default parse_str(), it supoorts UCS-2 like this: %uXXXX

$s
String to parse

&$var
Reference to the resulting array

$header
Header-style string
</md:method>