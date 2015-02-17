### http # HTTP #> HTTP {tpl-git PHPDaemon/Clients/HTTP}

```php
namespace PHPDaemon\Clients\HTTP;
```

Предназначен для выполнения GET и POST запросов на удаленные хосты.

Клиент использует пространство имен [HTTPRequest](#httprequest).

#### examples # Примеры

Получение файла [google.com/robots.txt](http://www.google.com/robots.txt) GET запросом:

```php
$httpclient = \PHPDaemon\Clients\HTTP\Pool::getInstance();

$httpclient->get('http://www.google.com/robots.txt',
	function ($conn, $success) {
		// обработка данных ответа
	}
);
```

Рабочий пример клиента представлен в {tpl-git PHPDaemon/Clients/HTTP/Examples/Simple.php Clients/HTTP/Examples/Simple.php}

<!-- include-namespace path="\PHPDaemon\Clients\HTTP" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/HTTP/Connection.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
State: headers
const STATE_HEADERS = 1
</md:const>

<md:const>
State: body
const STATE_BODY = 2
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var array Associative array of headers
	 */
public $headers = [ ]
</md:prop>

<md:prop>
/**
	 * @var integer Content length
	 */
public $contentLength = -1
</md:prop>

<md:prop>
/**
	 * @var string Contains response body
	 */
public $body = ''
</md:prop>

<md:prop>
/**
	 * @var array Associative array of Cookies
	 */
public $cookie = [ ]
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $chunked = false
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $protocolError
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $responseCode = 0
</md:prop>

<md:prop>
/**
	 * @var string Last requested URL
	 */
public $lastURL
</md:prop>

<md:prop>
/**
	 * @var array Raw headers array
	 */
public $rawHeaders
</md:prop>

<md:prop>
/**
 */
public $contentType
</md:prop>

<md:prop>
/**
 */
public $charset
</md:prop>

<md:prop>
/**
 */
public $eofTerminated = false
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string $url
	 * @param array  $params
	 */
public function get($url, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L99
</md:method>

<md:method>
/** 
	 * Performs POST-request
	 * @param string $url
	 * @param array  $data
	 * @param array  $params
	 */
public function post($url, $data = [], $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L166
</md:method>

<md:method>
/**
	 * Get body
	 * @return string
	 */
public function getBody()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L233
</md:method>

<md:method>
/**
	 * Get headers
	 * @return array
	 */
public function getHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L241
</md:method>

<md:method>
/**
	 * Get header
	 * @param  string $name Header name
	 * @return string
	 */
public function getHeader($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L250
</md:method>

<md:method>
/**
	 * Called when new data received
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L258
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L389
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (integer = 80)`  
 Default port

 - `:p`sslport (integer = 443)`  
 Default SSL port

 - `:p`expose (boolean = 1)`  
 Send User-Agent header?

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string   $url
	 * @param array    $params
	 * @param callable $resultcb
	 * @call  ( url $url, array $params )
	 * @call  ( url $url, callable $resultcb )
	 * @callback $resultcb ( Connection $conn, boolean $success )
	 */
public function get($url, $params)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L40
</md:method>

<md:method>
/**
	 * Performs HTTP request
	 * @param string   $url
	 * @param array    $data
	 * @param array    $params
	 * @param callable $resultcb
	 * @call  ( url $url, array $data, array $params )
	 * @call  ( url $url, array $data, callable $resultcb )
	 * @callback $resultcb ( Connection $conn, boolean $success )
	 */
public function post($url, $data = [], $params)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L77
</md:method>

<md:method>
/**
	 * Builds URL from array
	 * @param string $mixed
	 * @call  ( string $str )
	 * @call  ( array $mixed )
	 * @return string|false
	 */
public static function buildUrl($mixed)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L111
</md:method>

<md:method>
/**
	 * Parse URL
	 * @param string $mixed Look Pool::buildUrl()
	 * @call  ( string $str )
	 * @call  ( array $mixed )
	 * @return array|bool
	 */
public static function parseUrl($mixed)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L147
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
