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

 -.method ```php.inline
 void public onHandshake ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public defineLocalMethods ( array $arr )
 ```
   -.n @TODO
   -.n.ti `:hc`$arr` — @TODO

 -.method ```php.inline
 boolean public static ensureCallback ( mixed &$arg )
 ```
   -.n @TODO
   -.n.ti `:hc`&$arg` — @TODO

 -.method ```php.inline
 void public extractCallbacks ( array $args, array &$list, array &$path )
 ```
   -.n @TODO
   -.n.ti `:hc`$args` — @TODO
   -.n `:hc`&$list` — @TODO
   -.n `:hc`&$path` — @TODO

 -.method ```php.inline
 void public callRemote ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public callRemoteArray ( string $method, array $args )
 ```
   -.n @TODO
   -.n.ti `:hc`$method` — @TODO
   -.n `:hc`$args` — @TODO

 -.method ```php.inline
 void public methodsMethod ( array $methods )
 ```
   -.n @TODO
   -.n.ti `:hc`$methods` — @TODO

 -.method ```php.inline
 string public toJson ( string $p )
 ```
   -.n @TODO
   -.n.ti `:hc`$p` — @TODO

 -.method ```php.inline
 void public toJsonDebugResursive ( array &$a )
 ```
   -.n @TODO
   -.n.ti `:hc`&$a` — @TODO

 -.method ```php.inline
 string public toJsonDebug ( array $p )
 ```
   -.n @TODO
   -.n.ti `:hc`$p` — @TODO

 -.method ```php.inline
 void public sendPacket ( array $p )
 ```
   -.n @TODO
   -.n.ti `:hc`$p` — @TODO

 -.method ```php.inline
 void public fakeIncomingCallExtractCallbacks ( array $args, array &$list, array &$path )
 ```
   -.n @TODO
   -.n.ti `:hc`$args` — @TODO
   -.n `:hc`&$list` — @TODO
   -.n `:hc`&$path` — @TODO

 -.method ```php.inline
 void public fakeIncomingCall ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public onFinish ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public __call ( string $m, array $args )
 ```
   -.n @TODO

 -.method ```php.inline
 void public onPacket ( array $pct )
 ```
   -.n @TODO
   -.n.ti `:hc`$pct` — @TODO

 -.method ```php.inline
 voivoid public onFrame ( string $data, string $type )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO
   -.n `:hc`$type` — @TODO
