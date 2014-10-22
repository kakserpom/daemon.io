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

<!-- include-namespace path="\PHPDaemon\Core\ComplexJob" commit="5af07ac182a1104fd4bc61da87154dd6f55e5155" level="" access="" -->
#### consts # Constants

<md:const>
const STATE_WAITING = 1;
State: waiting @var integer
</md:const>

<md:const>
const STATE_RUNNING = 2;
State: running @var integer
</md:const>

<md:const>
const STATE_DONE = 3;
State: done @var integer
</md:const>

#### properties # Properties

<md:prop>
/**
	 * Listeners
	 * @var array [callable, ...]
	 */
public $listeners;
</md:prop>

<md:prop>
/**
	 * Hash of results
	 * @var array [jobname -> result, ...]
	 */
public $results;
</md:prop>

<md:prop>
/**
	 * Current state
	 * @var enum
	 */
public $state;
</md:prop>

<md:prop>
/**
	 * Hash of jobs
	 * @var array [jobname -> callback, ...]
	 */
public $jobs;
</md:prop>

<md:prop>
/**
	 * Number of results
	 * @var integer
	 */
public $resultsNum;
</md:prop>

<md:prop>
/**
	 * Number of jobs
	 * @var integer
	 */
public $jobsNum;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param callable $cb Listener
	 * @return \PHPDaemon\Core\ComplexJob
	 */
public function __construct($cb = null)
</md:method>

<md:method>

public function offsetExists($j)
</md:method>

<md:method>

public function offsetGet($j)
</md:method>

<md:method>

public function offsetSet($j, $v)
</md:method>

<md:method>

public function offsetUnset($j)
</md:method>

<md:method>

public function getResults()
</md:method>

<md:method>
/**
	 * Keep
	 * @param boolean Keep?
	 * @return void
	 */
public function keep($keep = true)
</md:method>

<md:method>
/**
	 * Has completed?
	 * @return boolean
	 */
public function hasCompleted()
</md:method>

<md:method>

public function maxConcurrency($n = -1)
</md:method>

<md:method>
/**
	 * Set result
	 * @param string Job name
	 * @param mixed  Result
	 * @return boolean
	 */
public function setResult($jobname, $result = null)
</md:method>

<md:method>
/**
	 * Get result
	 * @param string Job name
	 * @return mixed Result or null
	 */
public function getResult($jobname)
</md:method>

<md:method>

public function checkQueue()
</md:method>

<md:method>

public function more($cb = null)
</md:method>

<md:method>

public function isQueueFull()
</md:method>

<md:method>
/**
	 * Adds job
	 * @param string   Job name
	 * @param callable $cb Callback
	 * @return boolean Success
	 */
public function addJob($name, $cb)
</md:method>

<md:method>
/**
	 * Clean up
	 * @return void
	 */
public function cleanup()
</md:method>

<md:method>
/**
	 * Adds listener
	 * @param callable $cb Callback
	 * @return void
	 */
public function addListener($cb)
</md:method>

<md:method>
/**
	 * Runs the job
	 * @return void
	 */
public function execute()
</md:method>

<md:method>
/**
	 * Adds new job or calls execute() method
	 * @param mixed $name
	 * @param callable $cb
	 * @return void
	 */
public function __invoke($name = null, $cb = null)
</md:method>


<!--/ include-namespace -->