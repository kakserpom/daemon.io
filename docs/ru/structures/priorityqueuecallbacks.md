### priorityqueuecallbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

Данный класс наследуется от {tpl-outlink http://php.net/manual/ru/class.splpriorityqueue.php SplPriorityQueue} и предоставляет приоритетную очередь callback-функций с несколькими дополнительными методами

#### methods # Методы

 -.method ```php.inline
 void public PriorityQueueCallbacks::enqueue ( callable $cb, integer $pri = 0 )
 ```
   -.n Добавляет callback-функцию в очередь и пересортирует её
   -.n.ti `:hc`$cb` &mdash; callback-функция
   -.n `:hc`$pri` &mdash; приоритет

 -.method ```php.inline
 void public PriorityQueueCallbacks::insert ( callable $cb, integer $pri = 0 )
 ```
   -.n Синоним метода `:h`PriorityQueueCallbacks::enqueue`
