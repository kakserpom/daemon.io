### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

```php:p
namespace PHPDaemon\Structures;
class StackCallbacks extends \[SplStack](http://php.net/manual/class.splstack.php);
```

Данный класс предоставляет стек функций обратного вызова с несколькими дополнительными методами

> Используется в {tpl-inlink network/client Network/Client} для хранения стека функций обратного вызова запросов

#### methods # Методы

 -.method ```php.inline
 void public push ( callable $cb )
 ```
   -.n Добавляет функцию обратного вызова в конец стека
   -.n.ti `:hc`$cb` — функция

 -.method ```php.inline
 void public unshift ( callable $cb )
 ```
   -.n Добавляет функцию обратного вызова в начало стека
   -.n.ti `:hc`$cb` — функция

 -.method ```php.inline
 boolean public executeOne ( mixed $arg, ... )
 ```
   -.n Извлекает первую функцию обратного вызова из начала стека и выполняет её с переданными аргументами. Возвращает `false` если стек пуст
   -.n.ti `:hc`$arg` — аргументы

 -.method ```php.inline
 boolean public executeAndKeepOne ( mixed $arg, ... )
 ```
   -.n Выполяет первую функцию обратного вызова из начала стека с переданными аргументами без извлечения её из стека. Возвращает `false` если стек пуст
   -.n.ti `:hc`$arg`, ... — аргументы

 -.method ```php.inline
 integer public executeAll ( mixed $arg, ... )
 ```
   -.n Извлекает все функции обратного вызова и выполняет с заданными аргументами. Возвращает количество выполненных функций.
   -.n.ti `:hc`$arg1`, ... — аргументы

 -.method ```php.inline
 array public toArray ( )
 ```
   -.n Возвращает индексный массив стека

 -.method ```php.inline
 void public reset ( )
 ```
   -.n Удаляет все элементы из стека
