### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

Данный класс наследуется от {tpl-outlink http://php.net/manual/class.splpriorityqueue.php SplPriorityQueue} и предоставляет приоритетную очередь callback-функций с несколькими дополнительными методами

#### methods # Методы

 -.method ```php.inline
 void public PriorityQueueCallbacks::enqueue ( callable $cb, integer $pri = 0 )
 ```
   -.n Добавляет callback-функцию в очередь и пересортирует её
   -.n.ti `:hc`$cb` — callback-функция
   -.n `:hc`$pri` — приоритет

 -.method ```php.inline
 void public PriorityQueueCallbacks::insert ( callable $cb, integer $pri = 0 )
 ```
   -.n Синоним метода `:phc`PriorityQueueCallbacks::enqueue`

 -.method ```php.inline
 CallbackWrapper public PriorityQueueCallbacks::dequeue ( )
 ```
   -.n Извлекает callback-функцию из начала очереди и пересортирует её. Синоним метода `:phc`SplPriorityQueue::extract`

 -.method ```php.inline
 boolean public PriorityQueueCallbacks::executeOne ( mixed $args, ... )
 ```
   -.n Извлекает первую из начала очереди callback-функцию и выполняет её с переданными аргументами. Возвращает `false` если очередь пуста
   -.n.ti `:hc`$args` — аргументы

 -.method ```php.inline
 integer public PriorityQueueCallbacks::executeAll ( mixed $args, ... )
 ```
   -.n Извлекает и выполняет все callback-функции в очереди с переданными аргументами. Возвращает количество выполненных callback-функции
   -.n.ti `:hc`$args` — аргументы
