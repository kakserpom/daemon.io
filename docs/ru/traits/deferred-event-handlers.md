### deferred-event-handlers # DeferredEventHandlers #> DeferredEventHandlers {tpl-git PHPDaemon/Traits/DeferredEventHandlers.php}

Директива для использования: `use \PHPDaemon\Traits\DeferredEventHandlers;`

Данная примесь реализует механизм отложенных событий в объекте.

```php
class MyClass {
	use \PHPDaemon\Traits\DeferredEventHandlers;
	protected function onSomethingEvent($foo, $bar) {
		return function($ev) {
			list ($foo, $bar = $ev->args;
			$ev->setResult("Foo is $foo, bar is $bar");
		};
	}
}
$o = new MyClass;
$o->onSomething(function($ev) {
	D($ev->result);
	// Foo is fooo, bar is barr
}, 'foo', 'barr');

$o->onSomething(function($ev) {
	D($ev->result);
	// Foo is fooo, bar is barr
});
```

> При этом когда результат уже установлен, производящее его замыкание не будет вызвано повторно.
> Не нужно беспокоиться о повторном вызове еще до того как результат установлен, ожидающие замыкания будут вызваны правильно.
