### pool # Pool #> Pool {tpl-git PHPDaemon/Network/Pool.php}

```php:p
namespace PHPDaemon\Network;
abstract class Pool extends [ObjectStorage](#structures/object-storage);
```

@TODO translate to english

Хранит в себе активные объекты {tpl-inlink network/connection Соединение} и {tpl-inlink network/boundsocket ОткрытыйСокет}.

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

<!-- include-namespace path="\PHPDaemon\Network\Pool" commit="" level="" access="" -->
#### properties # Properties

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

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param array   $config Config variables
	 * @param boolean $init
	 */
public __construct($config = [], $init = true)
</md:method>

<md:method>
/**
	 * Called when the worker is ready to go
	 * @return void
	 */
public onReady()
</md:method>

<md:method>
/**
	 * Called when worker is going to update configuration
	 * @return void
	 */
public onConfigUpdated()
</md:method>

<md:method>
/**
	 * Returns instance object
	 * @param  string  $arg   name / array config / ConfigSection
	 * @param  boolean $spawn Spawn? Default is true
	 * @return this
	 */
public static getInstance($arg = '', $spawn = true)
</md:method>

<md:method>
/**
	 * Sets default connection class
	 * @param  string $class Connection class name
	 * @return void
	 */
public setConnectionClass($class)
</md:method>

<md:method>
/**
	 * Enable socket events
	 * @return void
	 */
public enable()
</md:method>

<md:method>
/**
	 * Disable all events of sockets
	 * @return void
	 */
public disable()
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param  boolean $graceful
	 * @return boolean Ready to shutdown?
	 */
public onShutdown($graceful = false)
</md:method>

<md:method>
/**
	 * Finishes ConnectionPool
	 * @return boolean Success
	 */
public finish($graceful = false)
</md:method>

<md:method>
/**
	 * Attach Connection
	 * @param  object $conn Connection
	 * @param  mixed  $inf  Info
	 * @return void
	 */
public attach($conn, $inf = null)
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param  object $conn Connection
	 * @return void
	 */
public detach($conn)
</md:method>

<md:method>
/**
	 * Establish a connection with remote peer
	 * @param  string   $url   URL
	 * @param  callback $cb    Callback
	 * @param  string   $class Optional. Connection class name
	 * @return integer         Connection's ID. Boolean false when failed
	 */
public connect($url, $cb, $class = null)
</md:method>


<!--/ include-namespace -->
