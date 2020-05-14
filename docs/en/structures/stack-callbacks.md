### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class StackCallbacks extends \[SplStack](http://php.net/manual/class.splstack.php);
```

This class provides a stack of callback functions with several additional methods

> Used in [Network/Client](#network/client) to store the callback stack

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

<div class="clearboth"></div>


<!--/ include-namespace -->
