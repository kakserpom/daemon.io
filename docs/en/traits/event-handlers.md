### event-handlers # EventHandlers #> EventHandlers {tpl-git PHPDaemon/Traits/EventHandlers.php}

```php
namespace PHPDaemon\Traits;
trait EventHandlers;
```

This trait implements a simple PUB/SUB mechanism for an object.

```php
class MyClass {
	use \PHPDaemon\Traits\EventHandlers;
}
$o = new MyClass;

$o->on('smth', function($o, $foo, $bar) {
	D("Foo is $foo, bar is $bar");
});

$o->trigger('smth', 'foo', 'barr');

```

> Do not forget that when deleting such an object, you should call the `cleanupEventHandlers()`, to avoid memory leaks.