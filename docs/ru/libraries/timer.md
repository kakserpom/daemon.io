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

#### properties # Свойства

<md:prop>
integer public $id;
Идентификатор таймера
</md:prop>

<md:prop>
integer public $lastTimeout;
Количество микросекунд на которое был взведен таймер последний раз
</md:prop>

<md:prop>
boolean public $finished = false;
Завершен ли данный таймер?
</md:prop>

<md:prop>
callable public $cb;
Функция обратного вызова
</md:prop>

<md:prop>
array public static $list = [];
Ассоциативный массив всех таймеров
</md:prop>

<md:prop>
integer public $priority;
Приоритет события данного таймера 
</md:prop>


#### methods # Методы

<md:method>
void public __construct ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )

Конструктор

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
void public setPriority ( integer $priority )

@TODO

$priority
@TODO
</md:method>

<md:method>
integer public static add ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )

@TODO

$cb
@TODO

$timeout
@TODO

$id
@TODO

$priority
@TODO
</md:method>

<md:method>
boolean public static setTimeout ( integer $id, integer $timeout = NULL )

@TODO

$id
@TODO

$timeout
@TODO
</md:method>

<md:method>
void public static remove ( integer $id )

@TODO

$id
@TODO
</md:method>

<md:method>
void public static cancelTimeout ( integer $id )

@TODO

$id
@TODO
</md:method>

<md:method>
void public timeout ( integer $timeout = null )

@TODO

$timeout
@TODO
</md:method>

<md:method>
void public cancel ( )

@TODO
</md:method>

<md:method>
void public finish ( )

@TODO
</md:method>

<md:method>
void public __destruct ( )

@TODO
</md:method>

<md:method>
void public free ( )

@TODO
</md:method>