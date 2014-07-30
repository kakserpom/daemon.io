### event-handlers # EventHandlers #> EventHandlers {tpl-git PHPDaemon/Traits/EventHandlers.php}

Директива для использования: `use \PHPDaemon\Traits\EventHandlers;`

Данная примесь реализует простой механизм PUB/SUB для объекта.

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

> Не забывайте о том, что при удалении такого объекта необходимо вызвать метод `cleanupEventHandlers()`, чтобы избежать утечек памяти.