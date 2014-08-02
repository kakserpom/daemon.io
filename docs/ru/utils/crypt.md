### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

`:h`class PHPDaemon\Utils\Crypt`

Данный класс содержит методы, относящиеся к криптографии.

#### methods # Методы

 -.method ```php.inline
 string public static Crypt::hash ( string $str, string $salt = '', boolean $plain = false )
 ```
   -.n Возвращает хеш строки по алгоритму Keccak
   -.n.ti `:hc`$str` — исходная строка
   -.n `:hc`$salt` — примесь для хеширования
   -.n `:hc`$plain` — если `false` то результат будет закодирован в base64

 -.method ```php.inline
 string public static Crypt::randomString ( integer $len = 64, string $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-.' )
 ```
   -.n Генерирует псевдослучайную строку длиной `:hc`$len` из представленных в `:hc`$chars` символов
   -.n.ti `:hc`$len` — длина выходной строки
   -.n `:hc`$chars` — набор используемых символов

 -.method ```php.inline
 boolean public static Crypt::compareStrings ( string $a, string $b )
 ```
   -.n Сравнение строк устойчивое к атаке по времени (англ. Timing attack)
   -.n.ti `:hc`$a` и `:hc`$b` — Строки для сравнения
