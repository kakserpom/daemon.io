### timer # Timer #> Timer {tpl-git PHPDaemon/Core/Timer.php}

```php:p
namespace PHPDaemon\Core;
class Timer;
```

С помощью этого класса можно создавать отложенные во времени события (таймеры)

#### examples # Примеры

```php
$i = 0;
setTimeout(function($timer) use (&$i) {
 D("Пять секунд прошло!");

 if (++$i < 3) {
    // запуск таймера ещё на 5 секунд
    $timer->timeout();
 } else {
    D('Конец');
    $timer->free();
 }
}, 5e6);
```

#### global-functions # Глобальные функции 

<md:method>
integer setTimeout ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )

Функция-псевдоним `Timer::add`

$cb
функция обратного вызова

$timeout
количество микросекунд через которое должна быть выполнена функция обратного вызова

$id
идентификатор таймера

$priority
приоритет события таймера
</md:method>

<md:method>
</md:method>

<!-- include-namespace path="\PHPDaemon\Core\Timer" commit="6f80045feaa2890961bd7c0507c5cd64c6fefc06" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var int|null
	 */
public $id;
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $lastTimeout;
</md:prop>

<md:prop>
/**
	 * @var bool
	 */
public $finished;
</md:prop>

<md:prop>
/**
	 * @var callable
	 */
public $cb;
</md:prop>

<md:prop>
/**
	 * @var int
	 */
public $priority;
</md:prop>

<md:prop>
/**
	 * @var int
	 */
public static $counter;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param callable $cb
	 * @param int $timeout
	 * @param int|string $id
	 * @param int $priority
	 * @return \PHPDaemon\Core\Timer
	 */
public function __construct($cb, $timeout = null, $id = null, $priority = null)
</md:method>

<md:method>
/**
	 * Called when timer is triggered
	 * @param mixed $arg
	 * @return void
	 */
public function eventCall()
</md:method>

<md:method>
/**
	 * Set prioriry
	 * @param $priority
	 * @return void
	 */
public function setPriority($priority)
</md:method>

<md:method>
/**
	 * Adds timer
	 * @param callable $cb
	 * @param int $timeout
	 * @param int|string $id
	 * @param int $priority
	 * @return int|null
	 */
public static function add($cb, $timeout = null, $id = null, $priority = null)
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param int|string $id
	 * @param int $timeout
	 * @return bool
	 */
public static function setTimeout($id, $timeout = NULL)
</md:method>

<md:method>
/**
	 * Removes timer by ID
	 * @param $id
	 * @return void
	 */
public static function remove($id)
</md:method>

<md:method>
/**
	 * Cancels timer by ID
	 * @param $id
	 * @return void
	 */
public static function cancelTimeout($id)
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param int $timeout
	 * @return void
	 */
public function timeout($timeout = null)
</md:method>

<md:method>
/**
	 * Cancels timer
	 * @return void
	 */
public function cancel()
</md:method>

<md:method>
/**
	 * Finishes timer
	 * @return void
	 */
public function finish()
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public function __destruct()
</md:method>

<md:method>
/**
	 * Frees the timer
	 */
public function free()
</md:method>


<!--/ include-namespace -->
