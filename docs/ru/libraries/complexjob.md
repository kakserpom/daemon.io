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

#### consts # Константы

 -.method `:h`const STATE_WAITING = 1;`  
 Состояние: ожидание

 -.method `:h`const STATE_RUNNING = 2;`  
 Состояние: в процессе

 -.method `:h`const STATE_DONE = 3;`  
 Состояние: завершено

#### properties # Свойства

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
 void public __construct ( callable $cb = null )
 ```
   -.n Конструктор
   -.n.ti `:hc`$cb` — функция обратного вызова для метода addListener

-.method ```php.inline
 void public addListener ( callable $cb )
 ```
   -.n Переданная функция будет вызвана когда все подзадачи выполнены
   -.n.ti `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 mixed public offsetExists ( string $j )
 ```
   -.n Позволяет сделать `:hc`isset($j[$name])`
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 mixed public offsetGet ( string $j )
 ```
   -.n Позволяет сделать `:hc`isset($job[$name])`
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 mixed public offsetSet ( string $j, mixed $v )
 ```
   -.n Позволяет сделать `:hc`$job[$name] = $value`
   -.n.ti `:hc`$j` — имя подзадачи
   -.n `:hc`$v` — значение

 -.method ```php.inline
 mixed public offsetUnset ( string $j )
 ```
   -.n Позволяет сделать `:hc`unset($job[$name])`
   -.n.ti `:hc`$j` — имя подзадачи

 -.method ```php.inline
 array public getResults ( )
 ```
   -.n Возвращает ассоциативный массив результатов

 -.method ```php.inline
 void public keep ( boolean $keep = true )
 ```
   -.n Включает опцию keep, при которой, после выполнения всех подзадач не вызывается метод `:hc`cleanup()`
   -.n.ti `:hc`$keep` — true/false

 -.method ```php.inline
 boolean public hasCompleted ( )
 ```
   -.n Выполнены ли все подзадачи?

 -.method ```php:p.inline
 [ComplexJob](#../) public maxConcurrency ( integer $n = -1 )
 ```
   -.n Устанавливает максимальное количество одновременно выполняемых задач
   -.n.ti `:hc`$n` — Натуральное число. При `-1` ограничение не действует.

 -.method ```php.inline
 boolean public setResult ( string $jobname, mixed $result = null )
 ```
   -.n Устанавливает результат выполнения подзадачи
   -.n.ti `:hc`$jobname` — Название подзадачи
   -.n `:hc`$result` — Результат

 -.method ```php.inline
 mixed public getResult ( string $jobname )
 ```
   -.n Получить результат выполнения подзадачи по имени
   -.n.ti `:hc`$jobname` — имя подзадачи

 -.method ```php.inline
 void public checkQueue ( )
 ```
   -.n Вызывается автоматически. Проверяет полна ли очередь и если нет, то пробует запустить еще подзадач из `backlog` и `more`.

 -.method ```php:p.inline
 [ComplexJob](#../) public more ( callable $cb = null )
 ```
   -.n Задает функцию обратного вызова, которая автоматически вызывается каждый раз, когда можно добавить еще подзадач.
   -.n.ti `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 boolean public isQueueFull ( )
 ```
   -.n Проверяет полна ли на данный момент очередь задач (превышен ли параметр `maxConcurrency`)

 -.method ```php.inline
 boolean public addJob ( string $name, callable $cb )
 ```
   -.n Добавляет подзадачу
   -.n.ti `:hc`$name` — имя подзадачи
   -.n `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 void public cleanup ( )
 ```
   -.n Удаляет сохраненные результаты и функции обратного вызова. Вызывается автоматически, не задан параметр `keep`. В этом случае, во избежание утечек памяти вызывайте этот метод сами, когда закончили работать с данными.

 -.method ```php.inline
 void public execute ( )
 ```
   -.n Выполняет 

 -.method ```php.inline
 boolean public __invoke ( string $name = null, callable $cb = null )
 ```
   -.n Синоним `addJob ( $name, $cb )`. Пример: `:hc`$job('job', )`


-.method ```php.inline
 boolean public __invoke ( )
 ```
   -.n Синоним `execute()`. Пример: `:hc`$job()`
