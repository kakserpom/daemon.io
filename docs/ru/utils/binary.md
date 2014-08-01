### binary # Binary #> Binary {tpl-git PHPDaemon/Utils/Binary.php}

Данный класс предоставляет набор статических методов для работы с бинарными данными.

#### methods # Методы

 -.method ```php.inline
 string public static Binary::labels ( string $q )
 ```
   -.n Возвращает структуру имен. Используется в DNS
   -.n.ti `:hc`$q` — Список имен через точку

 -.method ```php.inline
 string public static Binary::parseLabels ( string &$data, string $orig = null )
 ```
   -.n Разбирает структуру имен. Используется в DNS
   -.n.ti `:hc`&$data` — Структура
   -.n `:hc`$orig` — Изначальный пакет данных для обработки ссылок на подстроки

 -.method ```php.inline
 string public static Binary::LV ( string $str, integer $len = 1, boolean $lrev = false )
 ```
   -.n Возвращает структуру Длина-Значение
   -.n.ti `:hc`$str` — Значение
   -.n `:hc`$len` — Количество байтов для записи длины
   -.n `:hc`$lrev` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::LVnull ( string $str )
 ```
   -.n Возвращает структуру Длина-Значение с Little-Endian размером длины в два байта и NUL-байтом после строки
   -.n.ti `:hc`$str` — Значение

 -.method ```php.inline
 string public static Binary::byte ( integer $int )
 ```
   -.n Кодирует целое число в один байт
   -.n.ti `:hc`$int` — Число от 0 до 255

 -.method ```php.inline
 string public static Binary::word ( integer $int )
 ```
   -.n Кодирует целое число в два байта
   -.n.ti `:hc`$int` — Целое от 0 до 65535

 -.method ```php.inline
 string public static Binary::wordl ( integer $int )
 ```
   -.n Кодирует целое число в два байта Little-Endian
   -.n.ti `:hc`$int` — Целое от 0 до 65535

 -.method ```php.inline
 string public static Binary::dword ( integer $int )
 ```
   -.n Кодирует целое число в четыре байта
   -.n.ti `:hc`$int` — Целое от 0 до 4294967295

 -.method ```php.inline
 string public static Binary::dwordl ( integer $int )
 ```
   -.n Кодирует целое число в четыре байта Little-Endian
   -.n.ti `:hc`$int` — Целое от 0 до 4294967295

 -.method ```php.inline
 string public static Binary::qword ( integer $int )
 ```
   -.n Кодирует целое число в восемь байт
   -.n.ti `:hc`$int` — Целое от 0 до 18446744073709551615

 -.method ```php.inline
 string public static Binary::qwordl ( integer $int )
 ```
   -.n Кодирует целое число в восемь байт Little-Endian
   -.n.ti `:hc`$int` — Целое от 0 до 18446744073709551615

 -.method ```php.inline
 integer public static Binary::getByte ( string &$p )
 ```
   -.n Удаляет первый байт из строки и возвращает его в виде целого числа от 0 до 255
   -.n.ti `:hc`&$p` — Строка

 -.method ```php.inline
 string public static Binary::getChar ( string &$p )
 ```
   -.n Удаляет первый байт из строки и возвращает его в виде строки
   -.n.ti `:hc`&$p` — Строка

 -.method ```php.inline
 integer public static Binary::getWord ( string &$p, boolean $l = false )
 ```
   -.n Удаляет первые два байта из строки и возвращает их в виде целого числа от 0 до 65535
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::getStrWord ( string &$p, boolean $l = false )
 ```
   -.n Удаляет первые два байта из строки и возвращает их
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 integer public static Binary::getDWord ( string &$p, boolean $l = false )
 ```
   -.n Удаляет первые четыре байта из строки и возвращает их в виде целого от 0 до 4294967295
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 integer public static Binary::getQword ( string &$p, boolean $l = false )
 ```
   -.n Удаляет первые восемь байт из строки и возвращает их в виде целого от 0 до 18446744073709551615
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::getStrQWord ( string &$p, boolean $l = false )
 ```
   -.n Удаляет первые восемь байт из строки и возвращает их в виде строки
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::getString ( string &$str )
 ```
   -.n Возвращает подстроку до первого NUL-байта и удаляет её из исходной вместе NUL-байтом
   -.n.ti `:hc`&$str` — Строка

 -.method ```php.inline
 string public static Binary::getLV ( string &$p, boolean $l = 1, boolean $nul = false, boolean $lrev = false )
 ```
   -.n Разбирает пару Длина-Значение, удаляет её из начала исходной строки и возвращает значение
   -.n.ti `:hc`&$p` — Строка
   -.n `:hc`$l` — Количество байтов для записи длины
   -.n `:hc`$nul` — Если true, то воспринимать как NUL-завершенную строку
   -.n `:hc`$lrev` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::flags2bitarray ( array $flags, integer $len = 4 )
 ```
   -.n Кодирует массив флагов (числа должны быть степенями двойки – 2, 4, 16, 32...)
   -.n.ti `:hc`$flags` — массив чисел
   -.n `:hc`$len` — Количество байтов на выходе

 -.method ```php.inline
 string public static Binary::int2bytes ( integer $len, integer $int = 0, boolean $l = false )
 ```
   -.n Кодирует целое число
   -.n.ti `:hc`$len` — Количество байтов на выходе
   -.n `:hc`$int` — Целое число
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 string public static Binary::i2b ( integer $len, integer $int = 0, boolean $l = false )
 ```
   -.n Псевдоним метода `:hc`Binary::int2bytes`

 -.method ```php.inline
 integer public static Binary::bytes2int ( string $str, boolean $l = false )
 ```
   -.n Конвертирует строку в целое число
   -.n.ti `:hc`$str` — Строку
   -.n `:hc`$l` — Если true, то Little-Endian

 -.method ```php.inline
 integer public static Binary::b2i ( string $str, boolean $l = false )
 ```
   -.n Псевдоним метода `:hc`Binary::bytes2int`

 -.method ```php.inline
 string public static Binary::bitmap2bytes ( string $bitmap, integer $check_len = 0 )
 ```
   -.n Конвертирует побитовое представление в массив байтов
   -.n.ti `:hc`$bitmap` — Строка состоящая из 1 и 0 
   -.n `:hc`$check_len` — Ожидаемое количество байт на выходе, при несовпадении будет возвращено false

 -.method ```php.inline
 string public static Binary::getbitmap ( string $byte )
 ```
   -.n Получить побитовое представление в виде строки из 1 и 0
   -.n.ti `:hc`$byte` — Строка из одного байта
