### pool # Пул #> Пул {tpl-git PHPDaemon/Network/Pool.php}

```php:p
namespace PHPDaemon\Network;
abstract class Pool extends [ObjectStorage](#structures/object-storage);
```

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

#### properties # Свойства

<md:prop>
string public $connectionClass;
Default connection class
</md:prop>

<md:prop>
string public $name;
Name
</md:prop>

<md:prop>
\PHPDaemon\Config\Section public $config;
Configuration
</md:prop>

<md:prop>
integer public $maxConcurrency = 0;
Max concurrency
</md:prop>

<md:prop>
integer public $maxAllowedPacket = 0;
Max allowed packet
</md:prop>

<md:prop>
object public $appInstance;
Application instance object
</md:prop>

#### methods # Методы

<md:method>
public __construct ( array $config = [], boolean $init = true )

Constructor

$config
Config variables

$init
@TODO
</md:method>

<md:method>
public onReady ( )

Called when the worker is ready to go
</md:method>

<md:method>
public onConfigUpdated ( )

Called when worker is going to update configuration
</md:method>

<md:method>
public static getInstance ( string $arg = '', boolean $spawn = true )

Returns instance object

$arg
name / array config / ConfigSection

$spawn
Spawn? Default is true
</md:method>

<md:method>
public setConnectionClass ( string $class )

Sets default connection class

$class
String name
</md:method>

<md:method>
public enable ( )

Enable socket events
</md:method>

<md:method>
public disable ( )

Disable all events of sockets
</md:method>

<md:method>
public onShutdown ( boolean $graceful = false )

Called when application instance is going to shutdown

$graceful
graceful
</md:method>

<md:method>
public finish ( boolean $graceful = false )

Finishes ConnectionPool

$graceful
graceful
</md:method>

<md:method>
public attach ( [Connection](#../../connection) $conn, $inf = null )

Attach Connection

$conn
Connection

$inf
Info
</md:method>

<md:method>
public detach ( [Connection](#../../connection) $conn )

Detach Connection

$conn
Connection
</md:method>

<md:method>
public connect ( string $url, callable $cb, string $class = null )

Establish a connection with remote peer

$url
URL

$cb
Optional. Callback

$class
Optional. Connection class name
</md:method>