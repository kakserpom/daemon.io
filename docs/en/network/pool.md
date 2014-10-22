### pool # Pool #> Pool {tpl-git PHPDaemon/Network/Pool.php}

```php:p
namespace PHPDaemon\Network;
abstract class Pool extends [ObjectStorage](#structures/object-storage);
```

@TODO translate to english

Хранит в себе активные объекты [Соединение](#network/connection) и [ОткрытыйСокет](#network/boundsocket).

Пул (клиент или сервер) можно инстанцировать из пользовательского приложении, например:

```php
$this->httpclient = \PHPDaemon\Clients\HTTP\Pool::getInstance();
```

или

```php
/* ... */
$this->pool = \PHPDaemon\Servers\FlashPolicy\Pool::getInstance([
    'listen' => 'tcp://0.0.0.0:843'
]);
$this->pool->onReady();
/* ... */
```

Но не забывайте отправлять ему onReady(), onShutdown() и onConfigUpdated() события.

В большинстве случаев сервер запускается одноименнным приложением Pool.

```ruby
# контекст для ssl соединения (опционально)
TransportContext:myContext {
    ssl;
    certFile "/path/to/cert.pem";
    pkFile "/path/to/privkey.pem";
    passphrase "";
    verifyPeer true;
    allowSelfSigned true;
}

# слушаем 80 и 443 порт
Pool:HTTPServer {
    listen "tcp://0.0.0.0:80", "tcp://0.0.0.0:443##myContext";
    port 80;
    privileged;
    maxconcurrency 1;
}
```

<!-- include-namespace path="\PHPDaemon\Network\Pool" commit="c3eabafdec2045261861630de601aebeeb29bea9" level="" access="" -->
#### properties # Properties

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

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param array $config Config variables
	 * @param bool $init
	 */
public function __construct($config = [], $init = true)
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
	 * Called when worker is going to update configuration.
	 * @return void
	 */
public function onConfigUpdated()
</md:method>

<md:method>
/**
	 * Returns instance object
	 * @param string $arg name / array config / ConfigSection
	 * @param boolean $spawn Spawn? Default is true
	 * @return Pool
	 */
public static function getInstance($arg = '', $spawn = true)
</md:method>

<md:method>
/**
	 * Sets default connection class
	 * @param string String name
	 * @return void
	 */
public function setConnectionClass($class)
</md:method>

<md:method>
/**
	 * Enable socket events
	 * @return void
	 */
public function enable()
</md:method>

<md:method>
/**
	 * Disable all events of sockets
	 * @return void
	 */
public function disable()
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param bool $graceful
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
</md:method>

<md:method>
/**
	 * Finishes ConnectionPool
	 * @return boolean Success
	 */
public function finish($graceful = false)
</md:method>

<md:method>
/**
	 * Attach Connection
	 * @param $conn Connection
	 * @param mixed $inf Info
	 * @return void
	 */
public function attach($conn, $inf = null)
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param $conn Connection
	 * @return void
	 */
public function detach($conn)
</md:method>

<md:method>
/**
	 * Establish a connection with remote peer
	 * @param string   URL
	 * @param callback Optional. Callback.
	 * @param string   Optional. Connection class name.
	 * @return integer Connection's ID. Boolean false when failed.
	 */
public function connect($url, $cb, $class = null)
</md:method>


<!--/ include-namespace -->
