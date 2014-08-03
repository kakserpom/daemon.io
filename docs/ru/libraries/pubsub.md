### pubsub # PubSub #> PubSub {tpl-git PHPDaemon/PubSub}

`:h`namespace PHPDaemon\PubSub`

#### pubsub # Класс PubSub {tpl-git PHPDaemon/PubSub/PubSub.php}

`:h`class PHPDaemon\PubSub\PubSub`

##### methods # Методы

 -.method ```php.inline
 boolean public PubSub::eventExists ( string $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public PubSub::sub ( string $id, object $obj, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php.inline
 void public PubSub::addEvent ( string $id, PubSubEvent $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO

 -.method ```php.inline
 void public PubSub::removeEvent ( string $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public PubSub::unsub ( string $id, object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$obj` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../../pubsubevent) public PubSub::pub ( string $id, mixed $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$data` — @TODO

 -.method ```php.inline
 boolean public PubSub::unsubFromAll ( object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO

#### pubsubevent # Класс PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

`:hp`class PHPDaemon\PubSub\PubSubEvent extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php)`

##### properties # Свойства

 -.method `:h`array public $sub = [ ];`  
 @TODO

 -.method `:h`callable public $actCb;`  
 @TODO

 -.method `:h`callable public $deactCb;`  
 @TODO

##### methods # Методы

 -.method ```php.inline
 void public PubSubEvent::__construct ( callable $act = null, callable $deact = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$act` — @TODO
   -.n `:hc`$deact` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public PubSubEvent::onActivation ( callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public PubSubEvent::onDeactivation ( callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public static PubSubEvent::init ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public PubSubEvent::sub ( object $obj, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public PubSubEvent::unsub ( object $obj )
 ```
   -.n @TODO
   -.n.ti `:hc`$obj` — @TODO

 -.method ```php:p.inline
 [PubSubEvent](#../) public PubSubEvent::pub ( mixed $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO
