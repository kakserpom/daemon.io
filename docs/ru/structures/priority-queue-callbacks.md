### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

Данный класс наследуется от {tpl-outlink http://php.net/manual/class.splpriorityqueue.php SplPriorityQueue} и реализует несколько дополнительных методов.

> Используется в {tpl-inlink network/client Network/Client} для хранения вызовов, пока все доступные соединения заняты

#### methods # Методы

 -.method ```php.inline
 void public PriorityQueueCallbacks::enqueue ( callable $cb, integer $pri = 0 )
 ```
   -.n Добавляет функцию обратного вызова в очередь и пересортирует её
   -.n.ti `:hc`$cb` — функция обратного вызова
   -.n `:hc`$pri` — приоритет

 -.method ```php.inline
 void public PriorityQueueCallbacks::insert ( callable $cb, integer $pri = 0 )
 ```
   -.n Псевдоним метода `:hc`PriorityQueueCallbacks::enqueue`

 -.method ```php.inline
 CallbackWrapper public PriorityQueueCallbacks::dequeue ( )
 ```
   -.n Извлекает функцию обратного вызова из начала очереди и пересортирует её. Псевдоним метода `:hc`SplPriorityQueue::extract`

 -.method ```php.inline
 boolean public PriorityQueueCallbacks::executeOne ( mixed $arg, ... )
 ```
   -.n Извлекает первую из начала очереди функцию обратного вызова и выполняет её с переданными аргументами. Возвращает `false` если очередь пуста
   -.n.ti `:hc`$arg`, ... — аргументы

 -.method ```php.inline
 integer public PriorityQueueCallbacks::executeAll ( mixed $arg, ... )
 ```
   -.n Извлекает и выполняет все функции обратного вызова в очереди с переданными аргументами. Возвращает количество выполненных функций обратного вызова
   -.n.ti `:hc`$arg`, ... — аргументы
