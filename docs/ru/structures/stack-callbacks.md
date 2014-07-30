### stack-callbacks # StackCallbacks #> StackCallbacks {tpl-git PHPDaemon/Structures/StackCallbacks.php}

Данный класс наследуется от {tpl-outlink http://php.net/manual/class.splstack.php SplStack} и предоставляет стек callback-функций с несколькими дополнительными методами

#### methods # Методы

 -.method ```php.inline
 void public StackCallbacks::push ( callable $cb )
 ```
   -.n Добавляет callback-функцию в конец стека
   -.n.ti `:hc`$cb` &mdash; callback-функция

 -.method ```php.inline
 void public StackCallbacks::unshift ( callable $cb )
 ```
   -.n Добавляет callback-функцию в начало стека
   -.n.ti `:hc`$cb` &mdash; callback-функция

 -.method ```php.inline
 boolean public StackCallbacks::executeOne ( mixed $args, ... )
 ```
   -.n Извлекает первую callback-функцию из начала стека и выполняет её с переданными аргументами. Возвращает `false` если стек пуст
   -.n.ti `:hc`$args` &mdash; аргументы

 -.method ```php.inline
 boolean public StackCallbacks::executeAndKeepOne ( mixed $args, ... )
 ```
   -.n Выполяет первую callback-функцию из начала стека с переданными аргументами без извлечения её из стека. Возвращает `false` если стек пуст
   -.n.ti `:hc`$args` &mdash; аргументы

 -.method ```php.inline
 integer public StackCallbacks::executeAll ( mixed $args, ... )
 ```
   -.n Извлекает и выполняет все callback-функции в стеке с переданными аргументами. Возвращает количество выполненных callback-функции
   -.n.ti `:hc`$args` &mdash; аргументы

 -.method ```php.inline
 array public StackCallbacks::toArray ( )
 ```
   -.n Возвращает индексный массив стека

 -.method ```php.inline
 void public StackCallbacks::reset ( )
 ```
   -.n Удаляет все элементы из стека
