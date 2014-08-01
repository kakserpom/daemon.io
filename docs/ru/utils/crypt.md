### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

@TODO

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
   -.n Генерирует рандомную строку длиной `:hc`$len` из представленных в `:hc`$chars` символов
   -.n.ti `:hc`$len` — длина результирующей строки
   -.n `:hc`$chars` — набор используемых символов

 -.method ```php.inline
 boolean public static Crypt::compareStrings ( string $a, string $b )
 ```
   -.n @TODO
   -.n.ti `:hc`$a` и `:hc`$b` — сравниваемые строки
