### http # HTTP #> HTTP {tpl-git PHPDaemon/Servers/HTTP}

The server uses the namespace [HTTPRequest](#httprequest).

This vehicle application provides HTTP server for phpDaemon. Incoming connections will be transferred Websocket WebsocketServer application.

HTTP is trying to determine the application through AppResolver, be sure to configure it.

<!-- include-namespace path="\PHPDaemon\Servers\HTTP" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/HTTP/Connection.php}

```php
namespace PHPDaemon\Servers\HTTP;
class Connection extends \PHPDaemon\Network\Connection;
```

##### consts # Constants

<md:const>
@TODO DESCR
const STATE_FIRSTLINE = 1
</md:const>

<md:const>
@TODO DESCR
const STATE_HEADERS = 2
</md:const>

<md:const>
@TODO DESCR
const STATE_CONTENT = 3
</md:const>

<md:const>
@TODO DESCR
const STATE_PROCESSING = 4
</md:const>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Check if Sendfile is supported here.
	 * @return boolean Succes
	 */
public function checkSendfileCap() { // @DISCUSS
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L60
</md:method>

<md:method>
/**
	 * Check if Chunked encoding is supported here.
	 * @return boolean Succes
	 */
public function checkChunkedEncCap() { // @DISCUSS
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L68
</md:method>

<md:method>
/**
	 * @TODO
	 * @return integer
	 */
public function getKeepaliveTimeout()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L76
</md:method>

<md:method>
/**
	 * Handles the output from downstream requests.
	 * @param  object  $req \PHPDaemon\Request\Generic.
	 * @param  string  $s   The output.
	 * @return boolean      Success
	 */
public function requestOut($req, $s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L336
</md:method>

<md:method>
/**
	 * End request
	 * @return void
	 */
public function endRequest($req, $appStatus, $protoStatus)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L348
</md:method>

<md:method>
/**
	 * Frees this request
	 * @return void
	 */
public function freeRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L373
</md:method>

<md:method>
/**
	 * Called when connection is finished
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L388
</md:method>

<md:method>
/**
	 * Send Bad request
	 * @return void
	 */
public function badRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Connection.php#L402
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/HTTP/Pool.php}

```php
namespace PHPDaemon\Servers\HTTP;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = 'tcp://0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 80)`  
 Listen port

 - `:p`send-file (boolean = 0)`  
 Enable X-Sendfile?

 - `:p`send-file-dir (string = '/dev/shm')`  
 Directory for X-Sendfile

 - `:p`send-file-prefix (string = 'http-')`  
 Prefix for files used for X-Sendfile

 - `:p`send-file-onlybycommand (boolean = 0)`  
 Use X-Sendfile only if server['USE_SENDFILE'] provided.

 - `:p`expose (boolean = 1)`  
 Expose PHPDaemon version by X-Powered-By Header

 - `:p`keepalive ([Time](#config/types/time) = '0s')`  
 Keepalive time

 - `:p`chunksize ([Size](#config/types/size) = '8k')`  
 Chunk size

 - `:p`defaultcharset (string = 'utf-8')`  
 Default charset

 - `:p`wss-name (string = '')`  
 Related WebSocketServer instance name

 - `:p`fps-name (string = '')`  
 Related FlashPolicyServer instance name

 - `:p`upload-max-size ([Size](#config/types/size) = ini_get('upload_max_filesize'))`  
 Maximum uploading file size.

 - `:p`responder (string = null)`  
 Reponder application (if you do not want to use AppResolver)

##### properties # Properties

<md:prop>
/**
	 * @var string Variables order "GPC"
	 */
public $variablesOrder
</md:prop>

<md:prop>
/**
	 * @var WebSocketServer WebSocketServer instance
	 */
public $WS
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when worker is going to update configuration.
	 * @return void
	 */
public function onConfigUpdated()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Pool.php#L79
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/HTTP/Pool.php#L96
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
