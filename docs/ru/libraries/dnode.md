### dnode # DNode #> DNode {tpl-git PHPDaemon/DNode}

```php
namespace PHPDaemon\DNode;
```

@TODO desc

#### generic # Класс Generic {tpl-git PHPDaemon/DNode/Generic.php}

```php
namespace PHPDaemon\DNode;
class Generic extends \PHPDaemon\WebSocket\Route;
```

##### methods # Методы

<md:method>
void public onHandshake ( )

@TODO
</md:method>

<md:method>
void public defineLocalMethods ( array $arr )

@TODO

$arr
@TODO
</md:method>

<md:method>
boolean public static ensureCallback ( mixed &$arg )

@TODO

&$arg
@TODO
</md:method>

<md:method>
void public extractCallbacks ( array $args, array &$list, array &$path )

@TODO

$args
@TODO

&$list
@TODO

&$path
@TODO
</md:method>

<md:method>
void public callRemote ( )

@TODO
</md:method>

<md:method>
void public callRemoteArray ( string $method, array $args )

@TODO

$method
@TODO

$args
@TODO
</md:method>

<md:method>
void public methodsMethod ( array $methods )

@TODO

$methods
@TODO
</md:method>

<md:method>
string public toJson ( string $p )

@TODO

$p
@TODO
</md:method>

<md:method>
void public toJsonDebugResursive ( array &$a )

@TODO

&$a
@TODO
</md:method>

<md:method>
string public toJsonDebug ( array $p )

@TODO

$p
@TODO
</md:method>

<md:method>
void public sendPacket ( array $p )

@TODO

$p
@TODO
</md:method>

<md:method>
void public fakeIncomingCallExtractCallbacks ( array $args, array &$list, array &$path )

@TODO

$args
@TODO

&$list
@TODO

&$path
@TODO
</md:method>

<md:method>
void public fakeIncomingCall ( )

@TODO
</md:method>

<md:method>
void public onFinish ( )

@TODO
</md:method>

<md:method>
void public __call ( string $m, array $args )

@TODO
</md:method>

<md:method>
void public onPacket ( array $pct )

@TODO

$pct
@TODO
</md:method>

<md:method>
void public onFrame ( string $data, string $type )

@TODO

$data
@TODO

$type
@TODO
</md:method>