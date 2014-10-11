### dnode # DNode #> DNode {tpl-git PHPDaemon/WebSocket/Traits/DNode.php}

`:hp`trait \PHPDaemon\WebSocket\Traits\DNode`

This trait is applicable in subclasses of {tpl-inlink servers/websocket/route Servers\WebSocket\Route}

The trait implements server-side counterpart of {tpl-outlink https://github.com/substack/dnode DNode}, which serves for {tpl-outlink http://en.wikipedia.org/wiki/Remote_procedure_call Remote Procedure Call}.

Для подключение примеси нужно внести `:hp`use \PHPDaemon\WebSocket\Traits\DNode` в определение своего класса-наследника {tpl-inlink servers/websocket/route Servers\WebSocket\Route}.

Затем необходимо определить методы, доступные клиенту. Фактически это делает метод {tpl-inlink traits/dnode/methods/defineLocalMethods defineLocalMethods}, который должен вызываться в {tpl-inlink servers/websocket/route/methods/onHandshake onHandshake}.

Давайте, для примера, создадим метод `dummy` с аргументами `:hc`$foo`, `:hc`$bar` и `:hc`$callback`:

```php
protected function dummyMethod($foo, $bar, $callback) {
	if (!static::ensureCallback($callback)) {
		/* $callback не содержит функцию обратного вызова */
		return;
	}
	$callback(md5($foo ^ $bar));
}
```

При обращении `:h`dummy('Hello', 'World', function(result) {...})` ответом будет вызов этой функции с аргументом `bd7815679056a50c3f545b159ce5e385` — результатом выполнения `:h`md5('Hello' ^ 'World')`

В качестве аргументов можно передавать передавать собственные функции обратного вызова, но учтите, что они удаляются  из памяти после вызова, если возвратное значение не является `:hc`true`. Таким образом, следует понимать ожидается ли повторный вызов, и в этом случае возвращать `:hc`true`. Это делается во избежание утечек памяти.

Для вызова удаленного метода по имени, используйте {tpl-inlink traits/dnode/methods/callRemote callRemote}.

> Как вы могли заметить, пример `dummyMethod` использует вызов `:h`static::ensureCallback($callback)`. Всегда нужно проверять переданный аргумент с помощью {tpl-inlink traits/dnode/methods/ensureCallback ensureCallback} перед его исполнением. В противном случае, это обернётся серьёзной брешью безопасности.

<!-- include-namespace path="\PHPDaemon\WebSocket\Traits\DNode" commit="" level="" access="" -->

<!--/ include-namespace -->
