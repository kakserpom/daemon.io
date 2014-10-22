### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class StackCallbacks extends \[SplStack](http://php.net/manual/class.splstack.php);
```

Данный класс предоставляет стек функций обратного вызова с несколькими дополнительными методами

> Используется в [Network/Client](#network/client) для хранения стека функций обратного вызова запросов

<!-- include-namespace path="\PHPDaemon\Structures\StackCallbacks" commit="2787f4c32d31f6555bbf8be44f08914ccf062e05" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Push callback to the bottom of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public function push($cb)
</md:method>

<md:method>
/**
	 * Push callback to the top of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public function unshift($cb)
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public function executeOne()
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments without taking it out
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public function executeAndKeepOne()
</md:method>

<md:method>
/**
	 * Executes all callbacks with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return integer
	 */
public function executeAll()
</md:method>

<md:method>
/**
	 * Return array
	 * @return array
	 */
public function toArray()
</md:method>

<md:method>
/**
	 * Shifts all callbacks sequentially
	 * @return void
	 */
public function reset()
</md:method>


<!--/ include-namespace -->
