### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class PriorityQueueCallbacks extends \[SplPriorityQueue](http://php.net/manual/class.splpriorityqueue.php);
```

> Используется в [Network/Client](#network/client) для хранения вызовов, пока все доступные соединения заняты

<!-- include-namespace path="\PHPDaemon\Structures\PriorityQueueCallbacks" commit="" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Insert callback
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return void
	 */
public insert($cb, $pri = 0)
</md:method>

<md:method>
/**
	 * Enqueue callback
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return void
	 */
public enqueue($cb, $pri = 0)
</md:method>

<md:method>
/**
	 * Dequeue
	 * @return callable
	 */
public dequeue()
</md:method>

<md:method>
/**
	 * Compare two priorities
	 * @param  integer $pri1
	 * @param  integer $pri2
	 * @return integer
	 */
public compare($pri1, $pri2)
</md:method>

<md:method>
/**
	 * Executes one callback from the top of queue with arbitrary arguments
	 * @return boolean
	 */
public executeOne()
</md:method>

<md:method>
/**
	 * Executes all callbacks from the top of queue to bottom with arbitrary arguments
	 * @return integer
	 */
public executeAll()
</md:method>


<!--/ include-namespace -->
