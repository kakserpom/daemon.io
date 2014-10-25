### complexjob # ComplexJob #> ComplexJob {tpl-git PHPDaemon/Core/ComplexJob.php}

```php:p
namespace PHPDaemon\Core;
class ComplexJob extends \[ArrayAccess](http://php.net/manual/class.arrayaccess.php);
```

Объект класса ComplexJob позволяет повесить функцию обратного вызова на завершение всех объявленных в нем процедур. Это удобно, когда нужно выполнить ряд независимых цепочек действий.


#### examples # Примеры

```php
$j = new ComplexJob(function($j) { // Когда всё выполнилось
   D($j['foo']); // this
   D($j['foobar']); // is
   D($j['bar']); // sparta
});

/* Добавляем задачу */
$j('foo', function($name, $j) { 
   $j[$name] = 'this'; // Вызываем setResult()


   /* Еще задачу */
   $j('foobar', function($name, $j) { 
      $j[$name] = 'is';
   });
});

/* И еще одну */
$j('bar', function($name, $j) {
   $j[$name] = 'sparta';
});

$j(); // Запускаем
```

<!-- include-namespace path="\PHPDaemon\Core\ComplexJob" level="" access="" -->
#### consts # Constants

<md:const>
const STATE_WAITING = 1
State: waiting
</md:const>

<md:const>
const STATE_RUNNING = 2
State: running
</md:const>

<md:const>
const STATE_DONE = 3
State: done
</md:const>

#### properties # Properties

<md:prop>
/**
	 * @var array Listeners [callable, ...]
	 */
public $listeners = [ ]
</md:prop>

<md:prop>
/**
	 * @var array Hash of results [jobname -> result, ...]
	 */
public $results = [ ]
</md:prop>

<md:prop>
/**
	 * @var integer Current state
	 */
public $state
</md:prop>

<md:prop>
/**
	 * @var array Hash of jobs [jobname -> callback, ...]
	 */
public $jobs = [ ]
</md:prop>

<md:prop>
/**
	 * @var integer Number of results
	 */
public $resultsNum = 0
</md:prop>

<md:prop>
/**
	 * @var integer Number of jobs
	 */
public $jobsNum = 0
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param callable $cb Listener
	 */
public function __construct($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L72
</md:method>

<md:method>
/**
	 * Handler of isset($job[$name])
	 * @param  string $j Job name
	 * @return boolean
	 */
public function offsetExists($j)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L84
</md:method>

<md:method>
/**
	 * Handler of $job[$name]
	 * @param  string $j Job name
	 * @return mixed
	 */
public function offsetGet($j)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L93
</md:method>

<md:method>
/**
	 * Handler of $job[$name] = $value
	 * @param  string $j Job name
	 * @param  mixed  $v Job result
	 * @return void
	 */
public function offsetSet($j, $v)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L103
</md:method>

<md:method>
/**
	 * Handler of unset($job[$name])
	 * @param  string $j Job name
	 * @return void
	 */
public function offsetUnset($j)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L112
</md:method>

<md:method>
/**
	 * Returns associative array of results
	 * @return array
	 */
public function getResults()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L120
</md:method>

<md:method>
/**
	 * Keep
	 * @param  boolean $keep Keep?
	 * @return void
	 */
public function keep($keep = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L128
</md:method>

<md:method>
/**
	 * Has completed?
	 * @return boolean
	 */
public function hasCompleted()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L136
</md:method>

<md:method>
/**
	 * Sets a limit of simultaneously executing tasks
	 * @param  integer $n Natural number or -1 (no limit)
	 * @return this
	 */
public function maxConcurrency($n = -1)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L145
</md:method>

<md:method>
/**
	 * Set result
	 * @param  string $jobname Job name
	 * @param  mixed  $result  Result
	 * @return boolean
	 */
public function setResult($jobname, $result = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L156
</md:method>

<md:method>
/**
	 * Get result
	 * @param  string $jobname Job name
	 * @return mixed Result or null
	 */
public function getResult($jobname)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L171
</md:method>

<md:method>
/**
	 * Called automatically. Checks whether if the queue is full. If not, tries to pull more jobs from backlog and 'more'
	 * @return void
	 */
public function checkQueue()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L197
</md:method>

<md:method>
/**
	 * Sets a callback which is going to be fired always when we have a room for more jobs
	 * @param  callable $cb Callback
	 * @return this
	 */
public function more($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L217
</md:method>

<md:method>
/**
	 * Returns whether or not the queue is full (maxConcurrency option exceed)
	 * @return boolean
	 */
public function isQueueFull()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L244
</md:method>

<md:method>
/**
	 * Adds job
	 * @param  string   $name Job name
	 * @param  callable $cb   Callback
	 * @return boolean Success
	 */
public function addJob($name, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L254
</md:method>

<md:method>
/**
	 * Clean up
	 * @return void
	 */
public function cleanup()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L279
</md:method>

<md:method>
/**
	 * Adds listener
	 * @param  callable $cb Callback
	 * @return void
	 */
public function addListener($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L291
</md:method>

<md:method>
/**
	 * Runs the job
	 * @return void
	 */
public function execute()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L303
</md:method>

<md:method>
/**
	 * Adds new job or calls execute() method
	 * @param  mixed    $name
	 * @param  callable $cb
	 * @return void
	 */
public function __invoke($name = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/ComplexJob.php#L320
</md:method>


<!--/ include-namespace -->