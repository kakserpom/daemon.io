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

<md:method>
boolean public eventExists ( string $id )

@TODO

$id
@TODO
</md:method>

<md:method>
[PubSubEvent](#../../pubsubevent) public sub ( string $id, object $obj, callable $cb )

@TODO

$id
@TODO

$obj
@TODO

$cb
@TODO
</md:method>

<md:method>
void public addEvent ( string $id, PubSubEvent $obj )

@TODO

$id
@TODO

$obj
@TODO
</md:method>

<md:method>
void public removeEvent ( string $id )

@TODO

$id
@TODO
</md:method>

<md:method>
[PubSubEvent](#../../pubsubevent) public unsub ( string $id, object $obj )

@TODO

$id
@TODO

$obj
@TODO
</md:method>

<md:method>
[PubSubEvent](#../../pubsubevent) public pub ( string $id, mixed $data )

@TODO

$id
@TODO

$data
@TODO
</md:method>

<md:method>
boolean public unsubFromAll ( object $obj )

@TODO

$obj
@TODO
</md:method>

#### pubsubevent # Класс PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

```php:p
namespace PHPDaemon\PubSub;
class PubSubEvent extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php);
```

##### properties # Свойства

<md:prop>
array public $sub = [ ];
@TODO
</md:prop>

<md:prop>
callable public $actCb;
@TODO
</md:prop>

<md:prop>
callable public $deactCb;
@TODO
</md:prop>

##### methods # Методы

<md:method>
void public __construct ( callable $act = null, callable $deact = null )

@TODO

$act
@TODO

$deact
@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public onActivation ( callable $cb )

@TODO

$cb
@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public onDeactivation ( callable $cb )

@TODO

$cb
@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public static init ( )

@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public sub ( object $obj, callable $cb )

@TODO

$obj
@TODO

$cb
@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public unsub ( object $obj )

@TODO

$obj
@TODO
</md:method>

<md:method>
[PubSubEvent](#../) public pub ( mixed $data )

@TODO

$data
@TODO
</md:method>