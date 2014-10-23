### dnode # DNode #> DNode {tpl-git PHPDaemon/WebSocket/Traits/DNode.php}

`:hp`trait \PHPDaemon\WebSocket\Traits\DNode`

Данная примесь применима в классах-наследниках [Servers\WebSocket\Route](#servers/websocket/route)

Примесь реализует серверную часть протокола [DNode](https://github.com/substack/dnode), который служит для [Удалённого вызова процедур](http://ru.wikipedia.org/wiki/Удалённый_вызов_процедур) (RPC).

Для подключение примеси нужно внести `:hp`use \PHPDaemon\WebSocket\Traits\DNode` в определение своего класса-наследника [Servers\WebSocket\Route](#servers/websocket/route).

Затем необходимо определить методы, доступные клиенту. Фактически это делает метод [defineLocalMethods](#traits/dnode/methods/defineLocalMethods), который должен вызываться в [onHandshake](#servers/websocket/route/methods/onHandshake).

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

Для вызова удаленного метода по имени, используйте [callRemote](#traits/dnode/methods/callRemote).

> Как вы могли заметить, пример `dummyMethod` использует вызов `:h`static::ensureCallback($callback)`. Всегда нужно проверять переданный аргумент с помощью [ensureCallback](#traits/dnode/methods/ensureCallback) перед его исполнением. В противном случае, это обернётся серьёзной брешью безопасности.

<!-- include-namespace path="\PHPDaemon\WebSocket\Traits\DNode" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Default onHandshake() method
	 * @return void
	 */
public function onHandshake()
</md:method>

<md:method>
/**
	 * Calls a local method
	 * @param  string $method  Method name
	 * @param  mixed  ...$args Arguments
	 * @return this
	 */
public function callLocal()
</md:method>

<md:method>
/**
	 * Calls a remote method
	 * @param  string $method  Method name
	 * @param  mixed  ...$args Arguments
	 * @return this
	 */
public function callRemote()
</md:method>

<md:method>
/**
	 * Calls a remote method with array of arguments
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @return this
	 */
public function callRemoteArray($method, $args)
</md:method>

<md:method>
/**
	 * Encodes value into JSON
	 * @param  mixed $m Value
	 * @return this
	 */
public static function toJson($m)
</md:method>

<md:method>
/**
	 * Recursion handler for toJsonDebug()
	 * @param  array &$a Data
	 * @return void
	 */
public static function toJsonDebugResursive(&$m)
</md:method>

<md:method>
/**
	 * Encodes value into JSON for debugging purposes
	 * @param mixed $m Data
	 * @return void
	 */
public static function toJsonDebug($m)
</md:method>

<md:method>
/**
	 * Called when session is finished
	 * @return void
	 */
public function onFinish()
</md:method>

<md:method>
/**
	 * Swipes internal structures
	 * @return void
	 */
public function cleanup()
</md:method>

<md:method>
/**
	 * Magic __call method
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if method name not start from 'remote_'
	 * @return mixed
	 */
public function __call($method, $args)
</md:method>

<md:method>
/**
	 * Called when new packet is received
	 * @param  array $pct Packet
	 * @return void
	 */
public function onPacket($pct)
</md:method>

<md:method>
/**
	 * Called when new frame is received
	 * @param string $data Frame's contents
	 * @param integer $type Frame's type
	 * @return void
	 */
public function onFrame($data, $type)
</md:method>


<!--/ include-namespace -->
