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
#### connection # Class Connection {tpl-git PHPDaemon/Clients/HTTP/Connection.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
const STATE_HEADERS = 1
State: headers
</md:const>

<md:const>
const STATE_BODY = 2
State: body
</md:const>

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

public $contentType
</md:prop>

<md:prop>

public $charset
</md:prop>

<md:prop>

public $eofTerminated = false
</md:prop>

<md:prop>
/**
	 * @var object Associated pool
	 */
public $pool
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string $url
	 * @param array  $params
	 */
public function get($url, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L100
</md:method>

<md:method>
/** 
	 * Performs POST-request
	 * @param string $url
	 * @param array  $data
	 * @param array  $params
	 */
public function post($url, $data = [], $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L167
</md:method>

<md:method>
/**
	 * Get body
	 * @return string
	 */
public function getBody()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L234
</md:method>

<md:method>
/**
	 * Get headers
	 * @return array
	 */
public function getHeaders()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L242
</md:method>

<md:method>
/**
	 * Get header
	 * @param  string $name Header name
	 * @return string
	 */
public function getHeader($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L251
</md:method>

<md:method>
/**
	 * Called when new data received
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L259
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php#L390
</md:method>

#### pool # Class Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `port (80)`  
 

 - `sslport (443)`  
 

 - `expose (1)`  
 

##### properties # Properties

<md:prop>
/**
	 * @var string Default connection class
	 */
public $connectionClass
</md:prop>

<md:prop>
/**
	 * @var string Name
	 */
public $name
</md:prop>

<md:prop>
/**
	 * @var \PHPDaemon\Config\Section Configuration
	 */
public $config
</md:prop>

<md:prop>
/**
	 * @var integer Max concurrency
	 */
public $maxConcurrency = 0
</md:prop>

<md:prop>
/**
	 * @var integer Max allowed packet
	 */
public $maxAllowedPacket = 0
</md:prop>

<md:prop>
/**
	 * @var object|null Application instance object
	 */
public $appInstance
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string   $url
	 * @param array    $params
	 * @param callable $resultcb
	 * @call  void public function get ( url $url, array $params )
	 * @call  void public function get ( url $url, callable $resultcb )
	 * @callback $resultcb ( Connection $conn, boolean $success )
	 */
public function get($url, $params)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L47
</md:method>

<md:method>
/**
	 * Performs HTTP request
	 * @param string   $url
	 * @param array    $data
	 * @param array    $params
	 * @param callable $resultcb
	 * @call  void public function post ( url $url, array $data, array $params )
	 * @call  void public function post ( url $url, array $data, callable $resultcb )
	 * @callback $resultcb ( Connection $conn, boolean $success )
	 */
public function post($url, $data = [], $params)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L84
</md:method>

<md:method>
/**
	 * Builds URL from array
	 * @param string $mixed
	 * @call  string public static function buildUrl ( string $str )
	 * @call  string public static function buildUrl ( array $mixed )
	 * @return string|false
	 */
public static function buildUrl($mixed)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L118
</md:method>

<md:method>
/**
	 * Parse URL
	 * @param string $mixed Look Pool::buildUrl()
	 * @call  string public static function parseUrl ( string $str )
	 * @call  string public static function parseUrl ( array $mixed )
	 * @return array|bool
	 */
public static function parseUrl($mixed)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Pool.php#L154
</md:method>

#### simple-request # Class SimpleRequest {tpl-git PHPDaemon/Clients/HTTP/Examples/SimpleRequest.php}

```php
namespace PHPDaemon\Clients\HTTP\Examples;
class SimpleRequest extends \PHPDaemon\HTTPRequest\Generic;
```

##### properties # Properties

<md:prop>
/**
	 * @var boolean Keepalive?
	 */
public $keepalive = false
</md:prop>

<md:prop>
/**
	 * @var integer Current response length
	 */
public $responseLength = 0
</md:prop>

<md:prop>
/**
	 * @var array Replacement pairs for processing some header values in parse_str()
	 */
public static $hvaltr = [
  '; ' => '&',
  ';' => '&',
  ' ' => '%20',
]
</md:prop>

<md:prop>
/**
	 * @var array State
	 */
public static $htr = [
  '-' => '_',
]
</md:prop>

<md:prop>
/**
	 * Related Application instance
	 * @var \PHPDaemon\Core\AppInstance
	 */
public $appInstance
</md:prop>

<md:prop>
/**
	 * Attributes
	 * @var \StdCLass
	 */
public $attrs
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/SimpleRequest.php#L14
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/SimpleRequest.php#L35
</md:method>

#### simple # Class Simple {tpl-git PHPDaemon/Clients/HTTP/Examples/Simple.php}

```php
namespace PHPDaemon\Clients\HTTP\Examples;
class Simple extends \PHPDaemon\Core\AppInstance;
```

##### properties # Properties

<md:prop>

public $httpclient
</md:prop>

<md:prop>
/**
	 * @var boolean If true, it's allowed to be run without defined config section'
	 */
public static $runOnDemand = true
</md:prop>

<md:prop>
/**
	 * @var string Optional passphrase
	 */
public $passphrase
</md:prop>

<md:prop>
/**
	 * @var boolean Ready to run?
	 */
public $ready = false
</md:prop>

<md:prop>
/**
	 * @var object Related config section
	 */
public $config
</md:prop>

<md:prop>
/**
	 * @var boolean Is RPC enabled?
	 */
public $enableRPC = false
</md:prop>

<md:prop>
/**
	 * @var null|string Default class of incoming requests
	 */
public $requestClass
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/Simple.php#L22
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/Simple.php#L31
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown.
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/Simple.php#L39
</md:method>

<md:method>
/**
	 * Creates Request.
	 * @param object Request.
	 * @param object Upstream application instance.
	 * @return SimpleRequest Request.
	 */
public function beginRequest($req, $upstream)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Examples/Simple.php#L50
</md:method>


<!--/ include-namespace -->
