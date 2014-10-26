### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class StackCallbacks extends \[SplStack](http://php.net/manual/class.splstack.php);
```

Данный класс предоставляет стек функций обратного вызова с несколькими дополнительными методами

> Используется в [Network/Client](#network/client) для хранения стека функций обратного вызова запросов

<!-- include-namespace path="\PHPDaemon\Structures\StackCallbacks" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Push callback to the bottom of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public function push($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L20
</md:method>

<md:method>
/**
	 * Push callback to the top of stack
	 * @param  callable $cb Callback
	 * @return void
	 */
public function unshift($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L29
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public function executeOne()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L38
</md:method>

<md:method>
/**
	 * Executes one callback from the top with given arguments without taking it out
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public function executeAndKeepOne()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L57
</md:method>

<md:method>
/**
	 * Executes all callbacks with given arguments
	 * @param  mixed   ...$args Arguments
	 * @return integer
	 */
public function executeAll()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L74
</md:method>

<md:method>
/**
	 * Return array
	 * @return array
	 */
public function toArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L97
</md:method>

<md:method>
/**
	 * Shifts all callbacks sequentially
	 * @return void
	 */
public function reset()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L109
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
public function push($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
parent::unshift(CallbackWrapper::wrap($cb));
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
* @return void
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
* @param  callable $cb Callback
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/StackCallbacks.php#L26
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
