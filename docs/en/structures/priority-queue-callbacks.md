### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class PriorityQueueCallbacks extends \[SplPriorityQueue](http://php.net/manual/class.splpriorityqueue.php);
```

> Используется в [Network/Client](#network/client) для хранения вызовов, пока все доступные соединения заняты

<!-- include-namespace path="\PHPDaemon\Structures\PriorityQueueCallbacks" commit="d7fbbeafa230215aaf095babb2061c9f6a4c4265" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Insert callback
	 * @param callable $cb Callback
	 * @param integer $pri Priority
	 * @return void
	 */
public function insert($cb, $pri = 0)
</md:method>

<md:method>
/**
	 * Enqueue callback
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return void
	 */
public function enqueue($cb, $pri = 0)
</md:method>

<md:method>
/**
	 * Dequeue
	 * @return callback
	 */
public function dequeue()
</md:method>

<md:method>
/**
	 * Compare two priorities
	 * @param int $pri1
	 * @param int $pri2
	 * @return integer
	 */
public function compare($pri1, $pri2)
</md:method>

<md:method>
/**
	 * Executes one callback from the top of queue with arbitrary arguments
	 * @return integer
	 */
public function executeOne()
</md:method>

<md:method>
/**
	 * Executes all callbacks from the top of queue to bottom with arbitrary arguments
	 * @return integer
	 */
public function executeAll()
</md:method>


<!--/ include-namespace -->
