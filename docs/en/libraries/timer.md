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

<!-- include-namespace path="\PHPDaemon\Core\Timer" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var integer|null Timer id
	 */
public $id;
</md:prop>

<md:prop>
/**
	 * @var integer Current timeout holder
	 */
public $lastTimeout;
</md:prop>

<md:prop>
/**
	 * @var boolean Is the timer finished?
	 */
public $finished;
</md:prop>

<md:prop>
/**
	 * @var callable Callback
	 */
public $cb;
</md:prop>

<md:prop>
/**
	 * @var integer Priority
	 */
public $priority;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param  callable       $cb       Callback
	 * @param  integer        $timeout  Timeout
	 * @param  integer|string $id       Timer ID
	 * @param  integer        $priority Priority
	 */
public function __construct($cb, $timeout = null, $id = null, $priority = null)
</md:method>

<md:method>
/**
	 * Called when timer is triggered
	 * @return void
	 */
public function eventCall()
</md:method>

<md:method>
/**
	 * Set prioriry
	 * @param  integer $priority Priority
	 * @return void
	 */
public function setPriority($priority)
</md:method>

<md:method>
/**
	 * Adds timer
	 * @param  callable       $cb       Callback
	 * @param  integer        $timeout  Timeout
	 * @param  integer|string $id       Timer ID
	 * @param  integer        $priority Priority
	 * @return integer|string           Timer ID
	 */
public static function add($cb, $timeout = null, $id = null, $priority = null)
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param  integer|string $id       Timer ID
	 * @param  integer        $timeout  Timeout
	 * @return boolean
	 */
public static function setTimeout($id, $timeout = NULL)
</md:method>

<md:method>
/**
	 * Removes timer by ID
	 * @param  integer|string $id Timer ID
	 * @return void
	 */
public static function remove($id)
</md:method>

<md:method>
/**
	 * Cancels timer by ID
	 * @param  integer|string $id Timer ID
	 * @return void
	 */
public static function cancelTimeout($id)
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param  integer $timeout Timeout
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
	 * @return void
	 */
public function free()
</md:method>


<!--/ include-namespace -->
