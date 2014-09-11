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

#### methods # Методы

<md:method>
void public onHandshake ( )

Default onHandshake() method
</md:method>

<md:method>
[DNode](#../) public callLocal ( )

Вызывает локальный метод
</md:method>

<md:method>
void protected extractCallbacks ( array &$args, array &$list, array &$path )

Извлекает функции обратного вызова из массива аргуметнов

&$args
Аргументы

&$list
Выходной массив для свойства 'callbacks'

&$path
Текущий путь
</md:method>

<md:method>
[DNode](#../) public callRemote ( )

Вызов удаленного метода
</md:method>

<md:method>
[DNode](#../) public callRemoteArray ( string $method, array $args )

Вызов удаленного метода с передачей аргументов массивом

$method
Название метода

$args
Аргументы
</md:method>

<md:method>
void protected methodsMethod ( array $methods )

Обработчик метода `methods`

$methods
Ассоциативный массив методов
</md:method>

<md:method>
void public toJsonDebugResursive ( mixed &$m )

Обработчик рекурсии для метода [toJsonDebug](#../toJsonDebug)

&$m
Значение
</md:method>

<md:method>
string string public toJsonDebug ( mixed $m )

Возвращает JSON-представление массива в отладочных целях

$m
Значение
</md:method>

<md:method>
void public onFinish ( )

Вызывается когда сессия завершена
</md:method>

<md:method>
void public cleanup ( )

Очищает внутренние структуры
</md:method>

<md:method>
mixed public __call ( string $m, array $args )

Магический метод __call

$m
Название метода

$args
Аргументы
</md:method>

<md:method>
void public onPacket ( array $pct )

Вызывается когда получен пакет

$pct
Data
</md:method>

<md:method>
void public onFrame ( string $data, string $type )

Вызывется когда получен фрейм

$data
Содержимое фрейма

$type
Тип фрейма
</md:method>