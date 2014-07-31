### irc # IRC #> IRC {tpl-git PHPDaemon/Utils/IRC.php}

@TODO описалово утилиты

#### methods # Методы

 -.method ```php.inline
 string public static IRC::getCommandByCode ( integer $code )
 ```
   -.n Возвращает строковое представление команды по её коду
   -.n.ti `:hc`$code` &mdash; код команды

 -.method ```php.inline
 string public static IRC::getCodeByCommand ( string $cmd )
 ```
   -.n Возвращает код команды по её строковому представлению
   -.n.ti `:hc`$cmd` &mdash; строковое представление команды

 -.method ```php.inline
 string public static IRC::parseUsermask ( string $mask )
 ```
   -.n Возвращает ассоциативный массив ... @TODO
   -.n.ti `:hc`$mask` &mdash; маска какая то @TODO
