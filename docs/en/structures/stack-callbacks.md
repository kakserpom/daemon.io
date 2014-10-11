### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class StackCallbacks extends \[SplStack](http://php.net/manual/class.splstack.php);
```

Данный класс предоставляет стек функций обратного вызова с несколькими дополнительными методами

> Используется в [Network/Client](#network/client) для хранения стека функций обратного вызова запросов

<!-- include-namespace path="\PHPDaemon\Structures\StackCallbacks" commit="" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Push callback to the bottom of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public push($cb)
</md:method>

<md:method>
/**
	 * Push callback to the top of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public unshift($cb)
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public executeOne()
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments without taking it out
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public executeAndKeepOne()
</md:method>

<md:method>
/**
	 * Executes all callbacks with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return integer
	 */
public executeAll()
</md:method>

<md:method>
/**
	 * Return array
	 * @return array
	 */
public toArray()
</md:method>

<md:method>
/**
	 * Shifts all callbacks sequentially
	 * @return void
	 */
public reset()
</md:method>


<!--/ include-namespace -->
