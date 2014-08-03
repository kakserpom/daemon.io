### timer # Timer #> Timer {tpl-git PHPDaemon/Core/Timer.php}

`:h`class PHPDaemon\Core\Timer`

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

 -.method ```php.inline
 setTimeout ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )
 ```
	-.n Функция-псевдоним конструктора таймера 
	-.n.ti `:hc`$cb` — функция обратного вызова
	-.n `:hc`$timeout` — количество микросекунд через которое должна быть выполнена функция обратного вызова
	-.n `:hc`$id` — идентификатор таймера
	-.n `:hc`$priority` — приоритет события таймера

#### properties # Свойства

 -.method `:h`integer public $id;`  
 Идентификатор таймера

 -.method `:h`integer public $lastTimeout;`  
 Количество микросекунд на которое был взведен таймер последний раз

 -.method `:h`boolean public $finished = false;`  
 Завершен ли данный таймер?

 -.method `:h`callable public $cb;`  
 Функция обратного вызова

 -.method `:h`array public static $list = [];`  
 Ассоциативный массив всех таймеров

 -.method `:h`integer public $priority;`  
 Приоритет события данного таймера 


#### methods # Методы

 -.method ```php.inline
 void public __construct ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )
 ```
	-.n Конструктор
	-.n.ti `:hc`$cb` — функция обратного вызова
	-.n `:hc`$timeout` — количество микросекунд через которое должна быть выполнена функция обратного вызова
	-.n `:hc`$id` — идентификатор таймера
	-.n `:hc`$priority` — приоритет события таймера

 -.method ```php.inline
 void public setPriority ( integer $priority )
 ```
	-.n @TODO
	-.n.ti `:hc`$priority` — @TODO

 -.method ```php.inline
 integer public static add ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )
 ```
	-.n @TODO
	-.n.ti `:hc`$cb` — @TODO
	-.n `:hc`$timeout` — @TODO
	-.n `:hc`$id` — @TODO
	-.n `:hc`$priority` — @TODO

 -.method ```php.inline
 boolean public static setTimeout ( integer $id, integer $timeout = NULL )
 ```
	-.n @TODO
	-.n.ti `:hc`$id` — @TODO
	-.n `:hc`$timeout` — @TODO

 -.method ```php.inline
 void public static remove ( integer $id )
 ```
	-.n @TODO
	-.n.ti `:hc`$id` — @TODO

 -.method ```php.inline
 void public static cancelTimeout ( integer $id )
 ```
	-.n @TODO
	-.n.ti `:hc`$id` — @TODO

 -.method ```php.inline
 void public timeout ( integer $timeout = null )
 ```
	-.n @TODO
	-.n.ti `:hc`$timeout` — @TODO

 -.method ```php.inline
 void public cancel ( )
 ```
	-.n @TODO

 -.method ```php.inline
 void public finish ( )
 ```
	-.n @TODO

 -.method ```php.inline
 void public __destruct ( )
 ```
	-.n @TODO

 -.method ```php.inline
 void public free ( )
 ```
	-.n @TODO
