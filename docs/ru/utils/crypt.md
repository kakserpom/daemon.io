### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

```php
namespace PHPDaemon\Utils;
class Crypt;
```

Данный класс содержит методы, относящиеся к криптографии.

#### methods # Методы

<md:method>
string public static hash ( string $str, string $salt = '', boolean $plain = false )

Возвращает хеш строки по алгоритму Keccak

$str
исходная строка

$salt
примесь для хеширования

$plain
если `false` то результат будет закодирован в base64
</md:method>

<md:method>
string public static randomString ( integer $len = 64, string $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-.' )

Генерирует псевдослучайную строку длиной `:hc`$len` из представленных в `:hc`$chars` символов

$len
длина выходной строки

$chars
набор используемых символов
</md:method>

<md:method>
boolean public static compareStrings ( string $a, string $b )

Сравнение строк устойчивое к атаке по времени (англ. Timing attack)

$a, $b
Строки для сравнения
</md:method>
