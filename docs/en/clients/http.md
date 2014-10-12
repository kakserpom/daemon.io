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

<!-- include-namespace path="\PHPDaemon\Clients\HTTP" commit="" level="" access="" -->
#### connection # Class Connection {tpl-git PHPDaemon/Clients/HTTP/Connection.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
const STATE_HEADERS = 1;
State: headers @var integer
</md:const>

<md:const>
const STATE_BODY = 2;
State: body @var integer
</md:const>

##### properties # Properties

<md:prop>
/**
	 * Associative array of headers
	 * @var array
	 */
public $headers;
</md:prop>

<md:prop>
/**
	 * Content length
	 * @var int
	 */
public $contentLength;
</md:prop>

<md:prop>
/**
	 * Contains response body
	 * @var string
	 */
public $body;
</md:prop>

<md:prop>
/**
	 * Associative array of Cookies
	 * @var array
	 */
public $cookie;
</md:prop>

<md:prop>
/**
	 * @var bool
	 */
public $chunked;
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $protocolError;
</md:prop>

<md:prop>
/**
	 * @var int
	 */
public $responseCode;
</md:prop>

<md:prop>
/**
	 * Last requested URL
	 * @var string
	 */
public $lastURL;
</md:prop>

<md:prop>
/**
	 * Raw headers array
	 * @var array
	 */
public $rawHeaders;
</md:prop>

<md:prop>

public $contentType;
</md:prop>

<md:prop>

public $charset;
</md:prop>

<md:prop>

public $eofTerminated;
</md:prop>

<md:prop>
/**
	 * @var CappedStorage Context cache
	 */
protected static $contextCache;
</md:prop>

<md:prop>
/**
	 * @var number Context cache size
	 */
protected static $contextCacheSize;
</md:prop>

<md:prop>
/**
	 * @var object Associated pool
	 */
public $pool;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string $url
	 * @param array $params
	 */
public function get($url, $params = null)
</md:method>

<md:method>
/** 
	 * Performs POST-request
	 * @param string $url
	 * @param array $data
	 * @param array $params
	 */
public function post($url, $data = [], $params = null)
</md:method>

<md:method>

public function getBody()
</md:method>

<md:method>

public function getHeaders()
</md:method>

<md:method>

public function getHeader($name)
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @param string New data
	 * @return void
	 */
public function onRead()
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
</md:method>

#### pool # Class Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Pool extends \PHPDaemon\Network\Client;
```

##### properties # Properties

<md:prop>
/**
	 * @var string Default connection class
	 */
public $connectionClass;
</md:prop>

<md:prop>
/**
	 * @var string Name
	 */
public $name;
</md:prop>

<md:prop>
/**
	 * @var \PHPDaemon\Config\Section Configuration
	 */
public $config;
</md:prop>

<md:prop>
/**
	 * @var ConnectionPool[] Instances storage
	 */
protected static $instances;
</md:prop>

<md:prop>
/**
	 * @var integer Max concurrency
	 */
public $maxConcurrency;
</md:prop>

<md:prop>
/**
	 * @var integer Max allowed packet
	 */
public $maxAllowedPacket;
</md:prop>

<md:prop>
/**
	 * @var object|null Application instance object
	 */
public $appInstance;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string $url
	 * @param array $params
	 * @call  void public get ( url $url, array $params )
	 * @call  void public get ( url $url, callable $resultcb )
	 * @callback ( Connection $conn, boolean $success )
	 */
public function get($url, $params)
</md:method>

<md:method>
/**
	 * Performs HTTP request
	 * @param string $url
	 * @param array $data
	 * @param array $params
	 * @call  void public post ( url $url, array $data, array $params )
	 * @call  void public post ( url $url, array $data, callable $resultcb )
	 * @callback ( Connection $conn, boolean $success )
	 */
public function post($url, $data = [], $params)
</md:method>

<md:method>
/**
	 * Builds URL from array
	 * @param string $mixed
	 * @call  string public static buildUrl ( string $str )
	 * @call  string public static buildUrl ( array $mixed )
	 * @return string|false
	 */
public static function buildUrl($mixed)
</md:method>

<md:method>
/**
	 * Parse URL
	 * @param string $mixed Look Pool::buildUrl()
	 * @call  string public static parseUrl ( string $str )
	 * @call  string public static parseUrl ( array $mixed )
	 * @return array|bool
	 */
public static function parseUrl($mixed)
</md:method>

#### simple # Class Simple {tpl-git PHPDaemon/Clients/HTTP/Examples/Simple.php}

```php
namespace PHPDaemon\Clients\HTTP\Examples;
class Simple extends \PHPDaemon\Core\AppInstance;
```

##### properties # Properties

<md:prop>

public $httpclient;
</md:prop>

<md:prop>
/**
	 * @var boolean If true, it's allowed to be run without defined config section'
	 */
public static $runOnDemand;
</md:prop>

<md:prop>
/**
	 * @var string Optional passphrase
	 */
public $passphrase;
</md:prop>

<md:prop>
/**
	 * @var boolean Ready to run?
	 */
public $ready;
</md:prop>

<md:prop>
/**
	 * @var object Related config section
	 */
public $config;
</md:prop>

<md:prop>
/**
	 * @var boolean Is RPC enabled?
	 */
public $enableRPC;
</md:prop>

<md:prop>
/**
	 * @var null|string Default class of incoming requests
	 */
public $requestClass;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go.
	 * @return void
	 */
public function onReady()
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown.
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
</md:method>

<md:method>
/**
	 * Creates Request.
	 * @param object Request.
	 * @param object Upstream application instance.
	 * @return SimpleRequest Request.
	 */
public function beginRequest($req, $upstream)
</md:method>

#### simple-request # Class SimpleRequest {tpl-git PHPDaemon/Clients/HTTP/Examples/SimpleRequest.php}

```php
namespace PHPDaemon\Clients\HTTP\Examples;
class SimpleRequest extends \PHPDaemon\HTTPRequest\Generic;
```

##### properties # Properties

<md:prop>
/**
	 * @var array Status codes
	 */
protected static $codes;
</md:prop>

<md:prop>
/**
	 * @var boolean Keepalive?
	 */
public $keepalive;
</md:prop>

<md:prop>
/**
	 * @var integer Current response length
	 */
public $responseLength;
</md:prop>

<md:prop>
/**
	 * @var array Replacement pairs for processing some header values in parse_str()
	 */
public static $hvaltr;
</md:prop>

<md:prop>
/**
	 * @var array State
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

##### methods # Methods

<md:method>
/**
	 * Constructor.
	 * @return void
	 */
public function init()
</md:method>

<md:method>
/**
	 * Called when request iterated.
	 * @return integer Status.
	 */
public function run()
</md:method>


<!--/ include-namespace -->
