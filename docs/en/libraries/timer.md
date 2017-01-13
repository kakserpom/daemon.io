### timer # Timer #> Timer {tpl-git PHPDaemon/Core/Timer.php}

```php:p
namespace PHPDaemon\Core;
class Timer;
```

With this class can be created in the pending event (timers) time

#### examples # Examples

```php
$i = 0;
setTimeout(function($timer) use (&$i) {
 D("5 seconds passed!");

 if (++$i < 3) {
    // start the timer for another 5 seconds
    $timer->timeout();
 } else {
    D('Конец');
    $timer->free();
 }
}, 5e6);
```

#### global-functions # Global Functions

<md:method>
integer setTimeout ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )

Function alias `Timer::add`

$cb 
Callback

$timeout
The timeout microseconds through which the callback function to be executed

$id
timer ID

$priority
event priority timer
</md:method>

<md:method>
</md:method>

<!-- include-namespace path="\PHPDaemon\Core\Timer" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var integer|null Timer id
	 */
public $id
</md:prop>

<md:prop>
/**
	 * @var integer Current timeout holder
	 */
public $lastTimeout
</md:prop>

<md:prop>
/**
	 * @var boolean Is the timer finished?
	 */
public $finished = false
</md:prop>

<md:prop>
/**
	 * @var callable Callback
	 */
public $cb
</md:prop>

<md:prop>
/**
	 * @var integer Priority
	 */
public $priority
</md:prop>

<div class="clearboth"></div>

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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L55
</md:method>

<md:method>
/**
	 * Called when timer is triggered
	 * @return void
	 */
public function eventCall()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L78
</md:method>

<md:method>
/**
	 * Set prioriry
	 * @param  integer $priority Priority
	 * @return void
	 */
public function setPriority($priority)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L92
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L105
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param  integer|string $id       Timer ID
	 * @param  integer        $timeout  Timeout
	 * @return boolean
	 */
public static function setTimeout($id, $timeout = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L116
</md:method>

<md:method>
/**
	 * Removes timer by ID
	 * @param  integer|string $id Timer ID
	 * @return void
	 */
public static function remove($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L129
</md:method>

<md:method>
/**
	 * Cancels timer by ID
	 * @param  integer|string $id Timer ID
	 * @return void
	 */
public static function cancelTimeout($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L140
</md:method>

<md:method>
/**
	 * Sets timeout
	 * @param  integer $timeout Timeout
	 * @return void
	 */
public function timeout($timeout = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L151
</md:method>

<md:method>
/**
	 * Cancels timer
	 * @return void
	 */
public function cancel()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L162
</md:method>

<md:method>
/**
	 * Finishes timer
	 * @return void
	 */
public function finish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L170
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L178
</md:method>

<md:method>
/**
	 * Frees the timer
	 * @return void
	 */
public function free()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/Timer.php#L186
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
