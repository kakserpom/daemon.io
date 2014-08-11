### priority-queue-callbacks # PriorityQueueCallbacks #> PriorityQueueCallbacks {tpl-git PHPDaemon/Structures/PriorityQueueCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class PriorityQueueCallbacks extends \[SplPriorityQueue](http://php.net/manual/class.splpriorityqueue.php);
```

> Используется в {tpl-inlink network/client Network/Client} для хранения вызовов, пока все доступные соединения заняты

#### methods # Методы

<md:method>
void public enqueue ( callable $cb, integer $pri = 0 )

Добавляет функцию обратного вызова в очередь и пересортирует её

$cb
функция обратного вызова

$pri
приоритет
</md:method>

<md:method>
void public insert ( callable $cb, integer $pri = 0 )

Псевдоним метода `:hc`enqueue`
</md:method>

<md:method>
CallbackWrapper public dequeue ( )

Извлекает функцию обратного вызова из начала очереди и пересортирует её. Псевдоним метода `:hc`SplPriorityQueue::extract`
</md:method>

<md:method>
boolean public executeOne ( mixed $arg, ... )

Извлекает первую из начала очереди функцию обратного вызова и выполняет её с переданными аргументами. Возвращает `false` если очередь пуста

$arg, ...
аргументы
</md:method>

<md:method>
integer public executeAll ( mixed $arg, ... )

Извлекает и выполняет все функции обратного вызова в очереди с переданными аргументами. Возвращает количество выполненных функций обратного вызова

$arg, ...
аргументы
</md:method>