### timer # Timer #> Timer {tpl-git PHPDaemon/Core/Timer.php}

`:h`class PHPDaemon\Core\Timer`

#### properties # Свойства

 -.method `:h`integer public $id;`  
 @TODO

 -.method `:h`EventBufferEvent public $ev;`  
 @TODO

 -.method `:h`integer public $lastTimeout;`  
 @TODO

 -.method `:h`boolean public $finished = false;`  
 @TODO

 -.method `:h`callable public $cb;`  
 @TODO

 -.method `:h`array public static $list = [];`  
 @TODO

 -.method `:h`integer public $priority;`  
 @TODO

 -.method `:h`integer public static $counter = 0;`  
 @TODO

#### methods # Методы

 -.method ```php.inline
 void public Timer::__construct ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$timeout` — @TODO
   -.n `:hc`$id` — @TODO
   -.n `:hc`$priority` — @TODO

 -.method ```php.inline
 void public Timer::eventCall ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public Timer::setPriority ( integer $priority )
 ```
   -.n @TODO
   -.n.ti `:hc`$priority` — @TODO

 -.method ```php.inline
 integer public static Timer::add ( callable $cb, integer $timeout = null, integer $id = null, integer $priority = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$timeout` — @TODO
   -.n `:hc`$id` — @TODO
   -.n `:hc`$priority` — @TODO

 -.method ```php.inline
 boolean public static Timer::setTimeout ( integer $id, integer $timeout = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO
   -.n `:hc`$timeout` — @TODO

 -.method ```php.inline
 void public static Timer::remove ( integer $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php.inline
 void public static Timer::cancelTimeout ( integer $id )
 ```
   -.n @TODO
   -.n.ti `:hc`$id` — @TODO

 -.method ```php.inline
 void public Timer::timeout ( integer $timeout = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$timeout` — @TODO

 -.method ```php.inline
 void public Timer::cancel ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public Timer::finish ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public Timer::__destruct ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public Timer::free ( )
 ```
   -.n @TODO
