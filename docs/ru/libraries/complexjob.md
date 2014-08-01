### complexjob # ComplexJob #> ComplexJob {tpl-git PHPDaemon/Core/ComplexJob.php}

`:h`class PHPDaemon\Core\ComplexJob`

Объект класса ComplexJob позволяет повесить событие на завершение всех объявленных в нем асинхронных процедур.

Класс ComplexJob наследуется от {tpl-outlink http://php.net/manual/class.arrayaccess.php ArrayAccess}.

#### vars # Свойства

 -.method `:h`callable public $listeners;`  
 @TODO

 -.method `:h`integer public $results;`  
 @TODO

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
