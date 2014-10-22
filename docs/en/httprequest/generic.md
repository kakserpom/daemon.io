### generic # Generic #> Generic {tpl-git PHPDaemon/HTTPRequest/Generic.php}

```php
namespace PHPDaemon\HTTPRequest;
abstract class Generic extends \PHPDaemon\Request\Generic;
```

@TODO

<!-- include-namespace path="\PHPDaemon\HTTPRequest\Generic" commit="e250f4a8f705fbd5581c957a3f8288e226274b63" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * Current response length
	 * @var integer
	 */
public $responseLength;
</md:prop>

<md:prop>
/**
	 * Replacement pairs for processing some header values in parse_str()
	 * @var array hash
	 */
public static $hvaltr;
</md:prop>

<md:prop>
/**
	 * State
	 * @var array
	 */
public static $htr;
</md:prop>

<md:prop>
/**
	 * Related Application instance
	 * @var \PHPDaemon\Core\AppInstance
	 */
public $appInstance;
</md:prop>

<md:prop>
/**
	 * Attributes
	 * @var \StdCLass
	 */
public $attrs;
</md:prop>

#### methods # Methods

<md:method>

public function firstDeferredEventUsed ()
</md:method>

<md:method>
/**
	 * Output whole contents of file
	 * @param string $path Path
	 * @param callable $cb Callback
	 * @param int $pri     priority
	 * @return boolean Success
	 */
public function sendfile($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Called to check if Request is ready
	 * @return boolean Ready?
	 */
public function checkIfReady()
</md:method>

<md:method>
/**
	 * Upload maximum file size
	 * @return integer
	 */
public function getUploadMaxSize()
</md:method>

<md:method>
/**
	 * Prepares the request body
	 * @return void
	 */
public function postPrepare()
</md:method>

<md:method>
/**
	 * Ensure that headers are sent
	 * @return boolean Were already sent?
	 */
public function ensureSentHeaders()
</md:method>

<md:method>
/**
	 * Output some data
	 * @param string $s String to out
	 * @param bool $flush
	 * @return boolean Success
	 */
public function out($s, $flush = true)
</md:method>

<md:method>
/**
	 * Called when request's headers parsed
	 * @return void
	 */
public function onParsedParams()
</md:method>

<md:method>
/**
	 * Outputs data with headers (split by \r\n\r\n)
	 * @param string
	 * @return boolean Success.
	 */
public function combinedOut($s)
</md:method>

<md:method>
/**
	 * Use chunked encoding
	 * @return void
	 */
public function chunked()
</md:method>

<md:method>
/**
	 * Called when the request wakes up
	 * @return void
	 */
public function onWakeup()
</md:method>

<md:method>
/**
	 * Called when the request starts sleep
	 * @return void
	 */
public function onSleep()
</md:method>

<md:method>
/**
	 * Send HTTP-status
	 * @throws RequestHeadersAlreadySent
	 * @param int $code Code
	 * @return boolean Success
	 */
public function status($code = 200)
</md:method>

<md:method>
/**
	 * Checks if headers have been sent
	 * @param $file
	 * @param $line
	 * @return boolean Success
	 */
public function headers_sent(&$file, &$line)
</md:method>

<md:method>
/**
	 * Return current list of headers
	 * @return array Headers.
	 */
public function headers_list()
</md:method>

<md:method>
/**
	 * Set the cookie
	 * @param string $name         Name of cookie
	 * @param string $value        Value
	 * @param integer $maxage      . Optional. Max-Age. Default is 0.
	 * @param string $path         . Optional. Path. Default is empty string.
	 * @param bool|string $domain  . Optional. Secure. Default is false.
	 * @param boolean $secure      . Optional. HTTPOnly. Default is false.
	 * @param bool $HTTPOnly
	 * @return void
	 */
public function setcookie($name, $value = '', $maxage = 0, $path = '', $domain = '', $secure = false, $HTTPOnly = false)
</md:method>

<md:method>
/**
	 * Send the header
	 * @param string $s        Header. Example: 'Location: http://php.net/'
	 * @param boolean $replace Optional. Replace?
	 * @param bool|int $code   Optional. HTTP response code.
	 * @throws \PHPDaemon\Request\RequestHeadersAlreadySent
	 * @return boolean Success
	 */
public function header($s, $replace = true, $code = false)
</md:method>

<md:method>
/**
	 * Converts human-readable representation of size to number of bytes
	 * @param $value
	 * @return integer
	 */
public static function parseSize($value)
</md:method>

<md:method>
/**
	 * Called when file upload started.
	 * @param HTTPRequestInput
	 * @return void
	 */
public function onUploadFileStart($in)
</md:method>

<md:method>
/**
	 * Called when chunk of incoming file has arrived.
	 * @param HTTPRequestInput
	 * @param boolean Last?
	 * @return void
	 */
public function onUploadFileChunk($in, $last = false)
</md:method>

<md:method>
/**
	 * @return string
	 */
public function getUploadTempDir()
</md:method>

<md:method>
/**
	 * Tells whether the file was uploaded via HTTP POST
	 * @param string The filename being checked.
	 * @return boolean Whether if this is uploaded file.
	 */
public function isUploadedFile($path)
</md:method>

<md:method>
/**
	 *  Moves an uploaded file to a new location
	 * @param string The filename of the uploaded file.
	 * @param string The destination of the moved file.
	 * @return boolean Success
	 */
public function moveUploadedFile($filename, $dest)
</md:method>

<md:method>
/**
	 * Read request body from the file given in REQUEST_BODY_FILE parameter.
	 * @return boolean Success
	 */
public function readBodyFile()
</md:method>

<md:method>
/**
	 * Replacement for default parse_str(), it supoorts UCS-2 like this: %uXXXX
	 * @param string  String to parse.
	 * @param array   Reference to the resulting array.
	 * @param boolean Header-style string.
	 * @return void
	 */
public static function parse_str($s, &$var, $header = false)
</md:method>


<!--/ include-namespace -->
