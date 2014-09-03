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

#### methods # Методы

<md:method>
void protected onHandshake ( )

Default onHandshake() method
</md:method>

<md:method>
[DNode](#../) public callLocal ( )

Calls a local method
</md:method>

<md:method>
void public extractCallbacks ( array &$args, array &$list, array &$path )

Extracts callback functions from array of arguments

&$args
Arguments

&$list
Output array for 'callbacks' property

&$path
Recursion path holder
</md:method>

<md:method>
[DNode](#../) public callRemote ( )

Calls a remote method
</md:method>

<md:method>
[DNode](#../) public callRemoteArray ( string $method, array $args )

Calls a remote method with array of arguments

$method
Method name

$args
Arguments
</md:method>

<md:method>
void public methodsMethod ( array $methods )

Handler of the 'methods' method

$methods
Associative array of methods
</md:method>

<md:method>
void public toJsonDebugResursive ( array &$a )

Recursion handler for toJsonDebug()

&$a
Data
</md:method>

<md:method>
string string public toJsonDebug ( array $p )

Encodes object into JSON for debugging purposes

$p
Data
</md:method>

<md:method>
void public onFinish ( )

Called when session is finished
</md:method>

<md:method>
void public cleanup ( )

Swipes internal structures
</md:method>

<md:method>
mixed public __call ( string $m, array $args )

Magic __call method

$m
Method name

$args
Arguments
</md:method>

<md:method>
void public onPacket ( array $pct )

Called when new packet is received

$pct
Data
</md:method>

<md:method>
void public onFrame ( string $data, string $type )

Called when new frame is received

$data
Frame's contents

$type
Frame's type
</md:method>