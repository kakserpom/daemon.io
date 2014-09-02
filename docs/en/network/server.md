### server # Server #> Server {tpl-git PHPDaemon/Network/Server.php}

```php
namespace PHPDaemon\Network;
abstract class Server extends Pool;
```

@TODO

#### properties # Properties

<md:prop>
array public $allowedClients = null;
Allowed clients
</md:prop>

<md:prop>
integer public $maxAllowedPacket;
@TODO
</md:prop>

#### methods # Methods

<md:method>
void public __construct ( array $config = [], boolean $init = true )

Constructor

$config
Config variables

$init
@TODO
</md:method>

<md:method>
boolean public finish ( boolean $graceful = false )

Finishes ConnectionPool

$graceful
@TODO
</md:method>

<md:method>
integer public bindSockets ( mixed $addrs = [], integer $max = 0 )

Bind given sockets

$addrs
Addresses to bind

$max
Number of bound
</md:method>

<md:method>
boolean public bindSocket ( string $uri )

Bind given socket

$uri
Address to bind
</md:method>

<md:method>
void public attachBound ( \PHPDaemon\BoundSocket\Generic $bound, mixed $inf = null )

Attach Generic

$bound
Generic

$inf
Info
</md:method>

<md:method>
void public detachBound ( \PHPDaemon\BoundSocket\Generic $bound )

Detach Generic

$bound
Generic
</md:method>

<md:method>
void public closeBound ( )

Close each of binded sockets
</md:method>

<md:method>
boolean public inheritFromRequest ( object $req, object $oldConn )

Called when a request to HTTP-server looks like another connection

$req
@TODO

$oldConn
@TODO
</md:method>