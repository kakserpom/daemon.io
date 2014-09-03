### dnode # DNode #> DNode {tpl-git PHPDaemon/WebSocket/Traits/DNode.php}

`:hp`trait \PHPDaemon\WebSocket\Traits\DNode`

Данная примесь применима в классах-наследниках  {tpl-inlink servers/websocket/route Servers\WebSocket\Route}.

Реализует серверную часть протокола {tpl-outlink https://github.com/substack/dnode DNode}, который служит для вызова удаленных процедур (RPC).

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

##### methods # Методы

<md:method>
void protected defineLocalMethods ( array $arr )

Задает набор серверных методов

$arr
@TODO
</md:method>

<md:method>
[DNode](#../) public callLocal ( )

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
[DNode](#../) public callRemote ( )

@TODO
</md:method>

<md:method>
[DNode](#../) public callRemoteArray ( string $method, array $args )

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
string public toJson ( array $p )

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
string string public toJsonDebug ( array $p )

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
void public onFinish ( )

@TODO
</md:method>

<md:method>
void public cleanup ( )

@TODO
</md:method>

<md:method>
mixed public __call ( string $m, array $args )

@TODO

$m
@TODO

$args
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