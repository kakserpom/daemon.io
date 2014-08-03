### irc # IRC #> IRC {tpl-git PHPDaemon/Utils/IRC.php}

`:h`class PHPDaemon\Utils\IRC`

Класс используемый в IRC-клиенте и IRC-баунсере

#### methods # Методы

 -.method ```php.inline
 string public static getCommandByCode ( integer $code )
 ```
   -.n Возвращает строковое представление команды по её коду
   -.n.ti `:hc`$code` — код команды

 -.method ```php.inline
 string public static getCodeByCommand ( string $cmd )
 ```
   -.n Возвращает код команды по её строковому представлению
   -.n.ti `:hc`$cmd` — строковое представление команды

 -.method ```php.inline
 string public static parseUsermask ( string $mask )
 ```
   -.n Возвращает ассоциативный массив вида {nick: string, unverified: bool, user: string, host: string, orig: string}
   -.n.ti `:hc`$mask` — маска вида `nick!~?user@host`
