### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class PriorityQueueCallbacks extends \[SplPriorityQueue](http://php.net/manual/class.splpriorityqueue.php);
```

> Used in [Network/Client](#network/client) to store calls, until all available connections are busy

<!-- include-namespace path="\PHPDaemon\Structures\PriorityQueueCallbacks" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Insert callback
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return void
	 */
public function insert($cb, $pri = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L21
</md:method>

<md:method>
/**
	 * Enqueue callback
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return void
	 */
public function enqueue($cb, $pri = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L31
</md:method>

<md:method>
/**
	 * Dequeue
	 * @return callable
	 */
public function dequeue()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L39
</md:method>

<md:method>
/**
	 * Compare two priorities
	 * @param  integer $pri1
	 * @param  integer $pri2
	 * @return integer
	 */
public function compare($pri1, $pri2)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L49
</md:method>

<md:method>
/**
	 * Executes one callback from the top of queue with arbitrary arguments
	 * @param  mixed   ...$args Arguments
	 * @return boolean
	 */
public function executeOne()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L61
</md:method>

<md:method>
/**
	 * Executes all callbacks from the top of queue to bottom with arbitrary arguments
	 * @param  mixed   ...$args Arguments
	 * @return integer
	 */
public function executeAll()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/PriorityQueueCallbacks.php#L77
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
