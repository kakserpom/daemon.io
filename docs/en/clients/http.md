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

<!-- include-namespace path="\PHPDaemon\Clients\HTTP" commit="c5399ca37f61fd5686758d095d7b5322e4becdd7" level="" access="" -->
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
	 * Associated pool
	 * @var object ConnectionPool
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
	 * Default connection class
	 * @var string
	 */
public $connectionClass;
</md:prop>

<md:prop>
/**
	 * Name
	 * @var string
	 */
public $name;
</md:prop>

<md:prop>
/**
	 * Configuration
	 * @var \PHPDaemon\Config\Section
	 */
public $config;
</md:prop>

<md:prop>
/**
	 * Max concurrency
	 * @var integer
	 */
public $maxConcurrency;
</md:prop>

<md:prop>
/**
	 * Max allowed packet
	 * @var integer
	 */
public $maxAllowedPacket;
</md:prop>

<md:prop>
/**
	 * Application instance object
	 * @var object|null
	 */
public $appInstance;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Performs GET-request
	 * @param string $url
	 * @param array $params
	 */
public function get($url, $params)
</md:method>

<md:method>
/**
	 * Performs HTTP request
	 * @param string $url
	 * @param array $data
	 * @param array $params
	 */
public function post($url, $data = [], $params)
</md:method>

<md:method>
/**
	 * Builds URL from array
	 * @param $mixed
	 * @return bool|string
	 */
public static function buildUrl($mixed)
</md:method>

<md:method>
/**
	 * Parse URL
	 * @param $mixed Look Pool::buildUrl()
	 * @return array|bool
	 */
public static function parseUrl($mixed)
</md:method>

#### simple-request # Class SimpleRequest {tpl-git PHPDaemon/Clients/HTTP/Examples/SimpleRequest.php}

```php
namespace PHPDaemon\Clients\HTTP\Examples;
class SimpleRequest extends \PHPDaemon\HTTPRequest\Generic;
```

##### properties # Properties

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
	 * @var bool
	 */
public static $runOnDemand;
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $passphrase;
</md:prop>

<md:prop>
/**
	 * @var bool
	 */
public $ready;
</md:prop>

<md:prop>
/** @var Config\Section */
public $config;
</md:prop>

<md:prop>
/**
	 * @var bool
	 */
public $enableRPC;
</md:prop>

<md:prop>
/**
	 * @var null|string
	 */
public $requestClass;
</md:prop>

<md:prop>
/** @var array */
public $indexFiles;
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
	 * @return object Request.
	 */
public function beginRequest($req, $upstream)
</md:method>


<!--/ include-namespace -->
