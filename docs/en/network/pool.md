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

<!-- include-namespace path="\PHPDaemon\Network\Pool" level="" access="" -->
#### properties # Properties

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

<div class="clearboth"></div>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param array   $config Config variables
	 * @param boolean $init
	 */
public function __construct($config = [], $init = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L73
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L97
</md:method>

<md:method>
/**
	 * Called when worker is going to update configuration
	 * @return void
	 */
public function onConfigUpdated()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L105
</md:method>

<md:method>
/**
	 * Returns instance object
	 * @param  string  $arg   name / array config / ConfigSection
	 * @param  boolean $spawn Spawn? Default is true
	 * @return this
	 */
public static function getInstance($arg = '', $spawn = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L159
</md:method>

<md:method>
/**
	 * Sets default connection class
	 * @param  string $class Connection class name
	 * @return void
	 */
public function setConnectionClass($class)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L192
</md:method>

<md:method>
/**
	 * Enable socket events
	 * @return void
	 */
public function enable()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L200
</md:method>

<md:method>
/**
	 * Disable all events of sockets
	 * @return void
	 */
public function disable()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L212
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param  boolean $graceful
	 * @return boolean Ready to shutdown?
	 */
public function onShutdown($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L239
</md:method>

<md:method>
/**
	 * Finishes ConnectionPool
	 * @return boolean Success
	 */
public function finish($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L254
</md:method>

<md:method>
/**
	 * Attach Connection
	 * @param  object $conn Connection
	 * @param  mixed  $inf  Info
	 * @return void
	 */
public function attach($conn, $inf = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L283
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param  object $conn Connection
	 * @return void
	 */
public function detach($conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L299
</md:method>

<md:method>
/**
	 * Establish a connection with remote peer
	 * @param  string   $url   URL
	 * @param  callback $cb    Callback
	 * @param  string   $class Optional. Connection class name
	 * @return integer         Connection's ID. Boolean false when failed
	 */
public function connect($url, $cb, $class = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Pool.php#L316
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
