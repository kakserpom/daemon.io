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

<md:const>
const STATE_WAITING = 1;
Состояние: ожидание
</md:const>

<md:const>
const STATE_RUNNING = 2;
Состояние: в процессе
</md:const>

<md:const>
const STATE_DONE = 3;
Состояние: завершено
</md:const>

#### properties # Свойства

<md:prop>
callable public $listeners;
Стек функций обратного вызова, которые вызываются при успешном выполнении всех объявленных процедур
</md:prop>

<md:prop>
integer public $results;
Ассоциативный массив результатов установленных через `:h`setResult($value, $value)` или `:h`$job[$name] = $value;`
</md:prop>

<md:prop>
integer public $state;
Состояние (константа STATE_*) 
</md:prop>

<md:prop>
array public $jobs;
Ассоциативный массив, хранящий функции обратного вызова подзадач
</md:prop>

<md:prop>
array public $resultsNum;
Количество выполненных подзадач
</md:prop>

<md:prop>
array public $jobsNum;
Количество подзадач
</md:prop>
 
#### methods # Методы

<md:method>
void public __construct ( callable $cb = null )

Конструктор

$cb
функция обратного вызова для метода addListener
</md:method>

<md:method>
void public addListener ( callable $cb )

Переданная функция будет вызвана когда все подзадачи выполнены

$cb
функция обратного вызова
</md:method>

<md:method>
mixed public offsetExists ( string $j )

Позволяет сделать `:hc`isset($j[$name])`

$j
имя подзадачи
</md:method>

<md:method>
mixed public offsetGet ( string $j )

Позволяет сделать `:hc`isset($job[$name])`

$j
имя подзадачи
</md:method>

<md:method>
mixed public offsetSet ( string $j, mixed $v )

Позволяет сделать `:hc`$job[$name] = $value`

$j
имя подзадачи

$v
значение
</md:method>

<md:method>
mixed public offsetUnset ( string $j )

Позволяет сделать `:hc`unset($job[$name])`

$j
имя подзадачи
</md:method>

<md:method>
array public getResults ( )

Возвращает ассоциативный массив результатов
</md:method>

<md:method>
void public keep ( boolean $keep = true )

Включает опцию keep, при которой, после выполнения всех подзадач не вызывается метод `:hc`cleanup()`

$keep
true/false
</md:method>

<md:method>
boolean public hasCompleted ( )

Выполнены ли все подзадачи?
</md:method>

<md:method>
[ComplexJob](#../) public maxConcurrency ( integer $n = -1 )

Устанавливает максимальное количество одновременно выполняемых задач

$n
Натуральное число. При `-1` ограничение не действует.
</md:method>

<md:method>
boolean public setResult ( string $jobname, mixed $result = null )

Устанавливает результат выполнения подзадачи

$jobname
Название подзадачи

$result
Результат
</md:method>

<md:method>
mixed public getResult ( string $jobname )

Получить результат выполнения подзадачи по имени

$jobname
имя подзадачи
</md:method>

<md:method>
void public checkQueue ( )

Вызывается автоматически. Проверяет полна ли очередь и если нет, то пробует запустить еще подзадач из `backlog` и `more`.
</md:method>

<md:method>
[ComplexJob](#../) public more ( callable $cb = null )

Задает функцию обратного вызова, которая автоматически вызывается каждый раз, когда можно добавить еще подзадач.

$cb
функция обратного вызова
</md:method>

<md:method>
boolean public isQueueFull ( )

Проверяет полна ли на данный момент очередь задач (превышен ли параметр `maxConcurrency`)
</md:method>

<md:method>
boolean public addJob ( string $name, callable $cb )

Добавляет подзадачу

$name
имя подзадачи

$cb
функция обратного вызова
</md:method>

<md:method>
void public cleanup ( )

Удаляет сохраненные результаты и функции обратного вызова. Вызывается автоматически, не задан параметр `keep`. В этом случае, во избежание утечек памяти вызывайте этот метод сами, когда закончили работать с данными.
</md:method>

<md:method>
void public execute ( )

Выполняет 
</md:method>

<md:method>
boolean public __invoke ( string $name = null, callable $cb = null )

Синоним `addJob ( $name, $cb )`. Пример: `:hc`$job('job', )`
</md:method>

<md:method>
boolean public __invoke ( )

Синоним `execute()`. Пример: `:hc`$job()`
</md:method>