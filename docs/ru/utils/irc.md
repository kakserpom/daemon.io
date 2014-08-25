### irc # IRC #> IRC {tpl-git PHPDaemon/Utils/IRC.php}

```php
namespace PHPDaemon\Utils;
class IRC;
```

Класс используемый в IRC-клиенте и IRC-баунсере

#### methods # Методы

<md:method>
string public static getCommandByCode ( integer $code )

Возвращает строковое представление команды по её коду

$code
код команды
</md:method>

<md:method>
string public static getCodeByCommand ( string $cmd )

Возвращает код команды по её строковому представлению

$cmd
строковое представление команды
</md:method>

<md:method>
string public static parseUsermask ( string $mask )

Возвращает ассоциативный массив вида {nick: string, unverified: bool, user: string, host: string, orig: string}

$mask
маска вида `nick!~?user@host`
</md:method>
