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

<!-- include-namespace path="\PHPDaemon\Core\ComplexJob" commit="" level="" access="" -->

<!--/ include-namespace -->