### fastcgi # FastCGI #> FastCGI {tpl-git PHPDaemon/Servers/FastCGI}

Сервер использует пространство имен [HTTPRequest](#httprequest).

Это транспортное приложение представляет FastCGI сервер для phpDaemon.

После конфигурирования phpDaemon вам также следует задействовать веб-сервер, который поддерживает FastCGI. Если вы еще не сделали выбор в пользу одного из них, мы советуем [NGINX](http://nginx.org).

Веб-сервер может передавать FastCGI-серверу параметр APPNAME, который содержит название приложения которое должно обработать данный запрос. Если параметр не передан, FastCGI-сервер попробует определить это через AppResolver.

Пример конфигурации NGINX:

```nginx
location /Example/ {
	fastcgi_pass unix:/tmp/phpdaemon.fcgi.sock;
	fastcgi_param APPNAME Example;
	include fastcgi_params;
}
```

<!-- include-namespace path="\PHPDaemon\Servers\FastCGI" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/FastCGI/Connection.php}

```php
namespace PHPDaemon\Servers\FastCGI;
class Connection extends \PHPDaemon\Network\Connection;
```

##### consts # Constants

<md:const>

const FCGI_BEGIN_REQUEST = 1
</md:const>

<md:const>

const FCGI_ABORT_REQUEST = 2
</md:const>

<md:const>

const FCGI_END_REQUEST = 3
</md:const>

<md:const>

const FCGI_PARAMS = 4
</md:const>

<md:const>

const FCGI_STDIN = 5
</md:const>

<md:const>

const FCGI_STDOUT = 6
</md:const>

<md:const>

const FCGI_STDERR = 7
</md:const>

<md:const>

const FCGI_DATA = 8
</md:const>

<md:const>

const FCGI_GET_VALUES = 9
</md:const>

<md:const>

const FCGI_GET_VALUES_RESULT = 10
</md:const>

<md:const>

const FCGI_UNKNOWN_TYPE = 11
</md:const>

<md:const>

const FCGI_RESPONDER = 1
</md:const>

<md:const>

const FCGI_AUTHORIZER = 2
</md:const>

<md:const>

const FCGI_FILTER = 3
</md:const>

<md:const>

const STATE_CONTENT = 1
</md:const>

<md:const>

const STATE_PADDING = 2
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
 */
public $timeout = 180
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Is this upstream suitable for sendfile()?
	 * @return bool
	 */
public function checkSendfileCap() { // @DISCUSS
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L75
</md:method>

<md:method>
/**
	 * Is this upstream suitable for chunked encoding?
	 * @return bool
	 */
public function checkChunkedEncCap() { // @DISCUSS
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L83
</md:method>

<md:method>
/**
	 * @TODO
	 * @return integer
	 */
public function getKeepaliveTimeout()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L91
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L99
</md:method>

<md:method>
/**
	 * Handles the output from downstream requests
	 * @param  object  $req Request
	 * @param  string  $out The output
	 * @return boolean      Success
	 */
public function requestOut($req, $out)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L294
</md:method>

<md:method>
/**
	 * Sends a chunk
	 * @param  object  $req   Request
	 * @param  string  $chunk Data
	 * @return bool
	 */
public function sendChunk($req, $chunk)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L319
</md:method>

<md:method>
/**
	 * Frees request
	 * @param  object $req
	 */
public function freeRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L333
</md:method>

<md:method>
/**
	 * Handles the output from downstream requests
	 * @param  object $req
	 * @param  string $appStatus
	 * @param  string $protoStatus
	 * @return void
	 */
public function endRequest($req, $appStatus, $protoStatus)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L345
</md:method>

<md:method>
/**
	 * Send Bad request
	 * @param  object $req
	 * @return void
	 */
public function badRequest($req)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Connection.php#L371
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/FastCGI/Pool.php}

```php
namespace PHPDaemon\Servers\FastCGI;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = 'tcp://127.0.0.1,unix:///tmp/phpdaemon.fcgi.sock')`  
 Listen addresses

 - `:p`port (integer = 9000)`  
 Listen port

 - `:p`auto-read-body-file (boolean = 1)`  
 Read request body from the file given in REQUEST_BODY_FILE parameter

 - `:p`allowed-clients (string = '127.0.0.1')`  
 Allowed clients ip list

 - `:p`send-file (boolean = 0)`  
 Enable X-Sendfile?

 - `:p`send-file-dir (string = '/dev/shm')`  
 Directory for X-Sendfile

 - `:p`send-file-prefix (string = 'fcgi-')`  
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

 - `:p`upload-max-size ([Size](#config/types/size) = ini_get('upload_max_filesize'))`  
 Maximum uploading file size.

##### properties # Properties

<md:prop>
/** 
	 * @var string "GPC" Variables order
	 */
public $variablesOrder
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when worker is going to update configuration
	 * @return void
	 */
public function onConfigUpdated()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FastCGI/Pool.php#L71
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->