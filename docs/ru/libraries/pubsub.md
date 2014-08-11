### pubsub # PubSub #> PubSub {tpl-git PHPDaemon/PubSub}

```php
namespace PHPDaemon\PubSub;
```

#### pubsub # Класс PubSub {tpl-git PHPDaemon/PubSub/PubSub.php}

```php
namespace PHPDaemon\PubSub;
class PubSub;
```

##### methods # Методы

 -.method ```php.inline
 boolean public eventExists ( string $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public sub ( string $id, object $obj, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php.inline
 void public addEvent ( string $id, PubSubEvent $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO

 -.method ```php.inline
 void public removeEvent ( string $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public unsub ( string $id, object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public pub ( string $id, mixed $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$data` — @TODO

 -.method ```php.inline
 boolean public unsubFromAll ( object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO

#### pubsubevent # Класс PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

```php:p
namespace PHPDaemon\PubSub;
class PubSubEvent extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php);
```

##### properties # Свойства

 -.method `:h`array public $sub = [ ];`  
 @TODO

 -.method `:h`callable public $actCb;`  
 @TODO

 -.method `:h`callable public $deactCb;`  
 @TODO

##### methods # Методы

 -.method ```php.inline
 void public __construct ( callable $act = null, callable $deact = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$act` — @TODO
   -.n `:hc`$deact` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public onActivation ( callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public onDeactivation ( callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public static init ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public sub ( object $obj, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public unsub ( object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public pub ( mixed $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO
