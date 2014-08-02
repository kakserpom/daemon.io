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

#### consts # Константы

 -.method `:h`const STATE_WAITING = 1;`  
 State: waiting. It means there are no listeners yet.

 -.method `:h`const STATE_RUNNING = 2;`  
 State: running. Event handler in progress.

 -.method `:h`const STATE_DONE = 3;`  
 State: done. Event handler is finished, result is saved.

#### vars # Свойства

 -.method `:h`callable public $listeners;`  
 Стек функций обратного вызова, которые вызываются при успешном выполнении всех объявленных процедур

 -.method `:h`integer public $results;`  
 Ассоциативный массив результатов установленных через `:h`setResult($value, $value)` или `:h`$job[$name] = $value;`

 -.method `:h`integer public $state;`  
Состояние (константа STATE_*) 

 -.method `:h`array public $jobs;`  
 Ассоциативный массив, хранящий функции обратного вызова подзадач

 -.method `:h`array public $resultsNum;`  
 Количество выполненных подзадач

 -.method `:h`array public $jobsNum;`  
 Количество подзадач
 
#### methods # Методы

 -.method ```php.inline
 void public ComplexJob::__construct ( callable $cb = null )
 ```
   -.n Конструктор
   -.n.ti `:hc`$cb` — функция обратного вызова для метода addListener

-.method ```php.inline
 void public ComplexJob::addListener ( callable $cb )
 ```
   -.n Переданная функция будет вызвана когда все подзадачи выполнены
   -.n.ti `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 mixed public ComplexJob::offsetExists ( string $j )
 ```
   -.n Позволяет сделать isset($j[$name])
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 mixed public ComplexJob::offsetGet ( string $j )
 ```
   -.n Позволяет сделать isset($job[$name])
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 mixed public ComplexJob::offsetSet ( string $j, mixed $v )
 ```
   -.n Позволяет сделать $job[$name] = $value
   -.n.ti `:hc`$j` — имя подзадачи
   -.n `:hc`$v` — значение

 -.method ```php.inline
 mixed public ComplexJob::offsetUnset ( string $j )
 ```
   -.n Позволяет сделать unset($job[$name])
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 array public ComplexJob::getResults ( )
 ```
   -.n Возвращает ассоциативный массив результатов

 -.method ```php.inline
 void public ComplexJob::keep ( boolean $keep = true )
 ```
   -.n Включает опцию keep, при которой, после выполнения всех подзадач не вызывается метод `cleanup()`
   -.n.ti `:hc`$keep` — true/false

 -.method ```php.inline
 boolean public ComplexJob::hasCompleted ( )
 ```
   -.n Выполнены ли все подзадачи?

 -.method ```php:p.inline
 [ComplexJob](#../) public ComplexJob::maxConcurrency ( integer $n = -1 )
 ```
   -.n Устанавливает максимальное количество одновременно выполняемых задач
   -.n.ti `:hc`$n` — Натуральное число. При `-1` ограничение не действует.

 -.method ```php.inline
 boolean public ComplexJob::setResult ( string $jobname, mixed $result = null )
 ```
   -.n Устанавливает результат выполнения подзадачи
   -.n.ti `:hc`$jobname` — Название подзадачи
   -.n `:hc`$result` — Результат

 -.method ```php.inline
 mixed public ComplexJob::getResult ( string $jobname )
 ```
   -.n Получить результат выполнения подзадачи по имени
   -.n.ti `:hc`$jobname` — имя подзадачи

 -.method ```php.inline
 void public ComplexJob::checkQueue ( )
 ```
   -.n Вызывается автоматически. Проверяет полна ли очередь и если нет, то пробует запустить еще подзадач из `backlog` и `more`.

 -.method ```php:p.inline
 [ComplexJob](#../) public ComplexJob::more ( callable $cb = null )
 ```
   -.n Задает функцию обратного вызова, которая автоматически вызывается каждый раз, когда можно добавить еще подзадач.
   -.n.ti `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 boolean public ComplexJob::isQueueFull ( )
 ```
   -.n Проверяет полна ли на данный момент очередь задач (превышен ли параметр `maxConcurrency`)

 -.method ```php.inline
 boolean public ComplexJob::addJob ( string $name, callable $cb )
 ```
   -.n Добавляет подзадачу
   -.n.ti `:hc`$name` — имя подзадачи
   -.n `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 void public ComplexJob::cleanup ( )
 ```
   -.n Удаляет сохраненные результаты и функции обратного вызова. Вызывается автоматически, не задан параметр `keep`. В этом случае, во избежание утечек памяти вызывайте этот метод сами, когда закончили работать с данными.

 -.method ```php.inline
 void public ComplexJob::execute ( )
 ```
   -.n Выполняет 

 -.method ```php.inline
 boolean public ComplexJob::__invoke ( string $name = null, callable $cb = null )
 ```
   -.n Синоним `addJob ( $name, $cb )`. Пример: $job('job', );


-.method ```php.inline
 boolean public ComplexJob::__invoke ( )
 ```
   -.n Синоним `execute()`. Пример ```php.inline`$job();```
