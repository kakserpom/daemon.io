### complexjob # ComplexJob #> ComplexJob {tpl-git PHPDaemon/Core/ComplexJob.php}

`:h`class PHPDaemon\Core\ComplexJob` implements {tpl-outlink http://php.net/manual/class.arrayaccess.php ArrayAccess}

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

#### vars # Свойства

 -.method `:h`callable public $listeners;`  
Стек функций обратного вызова, которые вызываются при успешном выполнении всех объявленных процедур

 -.method `:h`integer public $results;`  
 Ассоциативный массив результатов установленных через
 ```php.inline
 setResult($value, $value)
 ```
 или 
 ```php.inline
 $job[$name] = $value;
 ```

 -.method `:h`integer public $state;`  
 @TODO

 -.method `:h`array public $jobs;`  
 @TODO

 -.method `:h`array public $resultsNum;`  
 @TODO

 -.method `:h`array public $jobsNum;`  
 @TODO

 -.method `:h`array public $req;`  
 @TODO

#### methods # Методы

 -.method ```php.inline
 void public ComplexJob::__construct ( callable $cb = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::offsetExists ( string $j )
 ```
   -.n @TODO
   -.n.ti `:hc`$j` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::offsetGet ( string $j )
 ```
   -.n @TODO
   -.n.ti `:hc`$j` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::offsetSet ( string $j, string $v )
 ```
   -.n @TODO
   -.n.ti `:hc`$j` — @TODO
   -.n `:hc`$v` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::offsetUnset ( string $j )
 ```
   -.n @TODO
   -.n.ti `:hc`$j` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::getResults ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public ComplexJob::keep ( boolean $keep = true )
 ```
   -.n @TODO
   -.n.ti `:hc`$keep` — @TODO

 -.method ```php.inline
 boolean public ComplexJob::hasCompleted ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public ComplexJob::__call ( string $name, array $args )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [ComplexJob](#../) public ComplexJob::maxConcurrency ( integer $n = 1 )
 ```
   -.n @TODO
   -.n.ti `:hc`$n` — @TODO

 -.method ```php.inline
 boolean public ComplexJob::setResult ( string $jobname, mixed $result = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$jobname` — @TODO
   -.n `:hc`$result` — @TODO

 -.method ```php.inline
 mixed public ComplexJob::getResult ( string $jobname )
 ```
   -.n @TODO
   -.n.ti `:hc`$jobname` — @TODO

 -.method ```php.inline
 void public ComplexJob::checkQueue ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [ComplexJob](#../) public ComplexJob::more ( callable $cb = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php.inline
 boolean public ComplexJob::isQueueFull ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public ComplexJob::addJob ( string $name, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$name` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php.inline
 void public ComplexJob::cleanup ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public ComplexJob::addListener ( callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO

 -.method ```php.inline
 void public ComplexJob::execute ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public ComplexJob::__invoke ( string $name = null, callable $cb = null )
 ```
   -.n @TODO
