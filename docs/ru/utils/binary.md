### binary # Binary #> Binary {tpl-git PHPDaemon/Utils/Binary.php}

```php
namespace PHPDaemon\Utils;
class Binary;
```

Данный класс предоставляет набор статических методов для работы с бинарными данными.

#### methods # Методы

<md:method>
string public static labels ( string $q )

Возвращает структуру имен. Используется в DNS

$q
Список имен через точку
</md:method>

<md:method>
string public static parseLabels ( string &$data, string $orig = null )

азбирает структуру имен. Используется в DNS

&$data
Структура

$orig
Изначальный пакет данных для обработки ссылок на подстроки
</md:method>

<md:method>
string public static LV ( string $str, integer $len = 1, boolean $lrev = false )
 
Возвращает структуру Длина-Значение

$str
Значение

$len
Количество байтов для записи длины

$lrev
Если true, то Little-Endian
</md:method>

<md:method>
string public static LVnull ( string $str )
 
Возвращает структуру Длина-Значение с Little-Endian размером длины в два байта и NUL-байтом после строки

$str
Значение
</md:method>

<md:method>
string public static byte ( integer $int )
 
Кодирует целое число в один байт

$int
Число от 0 до 255
</md:method>

<md:method>
string public static word ( integer $int )
 
Кодирует целое число в два байта

$int
Целое от 0 до 65535
</md:method>

<md:method>
string public static wordl ( integer $int )
 
Кодирует целое число в два байта Little-Endian

$int
Целое от 0 до 65535
</md:method>

<md:method>
string public static dword ( integer $int )
 
Кодирует целое число в четыре байта

$int
Целое от 0 до 4294967295
</md:method>

<md:method>
string public static dwordl ( integer $int )
 
Кодирует целое число в четыре байта Little-Endian

$int
Целое от 0 до 4294967295
</md:method>

<md:method>
string public static qword ( integer $int )
 
Кодирует целое число в восемь байт

$int
Целое от 0 до 18446744073709551615
</md:method>

<md:method>
string public static qwordl ( integer $int )
 
Кодирует целое число в восемь байт Little-Endian

$int
Целое от 0 до 18446744073709551615
</md:method>

<md:method>
integer public static getByte ( string &$p )
 
Удаляет первый байт из строки и возвращает его в виде целого числа от 0 до 255

&$p
Строка
</md:method>

<md:method>
string public static getChar ( string &$p )
 
Удаляет первый байт из строки и возвращает его в виде строки

&$p
Строка
</md:method>

<md:method>
integer public static getWord ( string &$p, boolean $l = false )
 
Удаляет первые два байта из строки и возвращает их в виде целого числа от 0 до 65535

&$p
Строка

$l
Если true, то Little-Endian
</md:method>

<md:method>
string public static getStrWord ( string &$p, boolean $l = false )
 
Удаляет первые два байта из строки и возвращает их

&$p
Строка

$l
Если true, то Little-Endian
</md:method>

<md:method>
integer public static getDWord ( string &$p, boolean $l = false )
 
Удаляет первые четыре байта из строки и возвращает их в виде целого от 0 до 4294967295

&$p
Строка

$l
Если true, то Little-Endian
</md:method>

<md:method>
integer public static getQword ( string &$p, boolean $l = false )
 
Удаляет первые восемь байт из строки и возвращает их в виде целого от 0 до 18446744073709551615

&$p
Строка

$l
Если true, то Little-Endian
</md:method>

<md:method>
string public static getStrQWord ( string &$p, boolean $l = false )
 
Удаляет первые восемь байт из строки и возвращает их в виде строки

&$p
Строка

$l
Если true, то Little-Endian
</md:method>

<md:method>
string public static getString ( string &$str )
 
Возвращает подстроку до первого NUL-байта и удаляет её из исходной вместе с NUL-байтом

&$str
Строка
</md:method>

<md:method>
string public static getLV ( string &$p, boolean $l = 1, boolean $nul = false, boolean $lrev = false )
 
Разбирает пару Длина-Значение, удаляет её из начала исходной строки и возвращает значение

&$p
Строка

$l
Количество байтов для записи длины

$nul
Если true, то воспринимать как NUL-завершенную строку

$lrev
Если true, то Little-Endian
</md:method>

<md:method>
string public static flags2bitarray ( array $flags, integer $len = 4 )
 
Кодирует массив флагов (числа должны быть степенями двойки – 2, 4, 16, 32...)

$flags
массив чисел

$len
Количество байтов на выходе
</md:method>

<md:method>
string public static int2bytes ( integer $len, integer $int = 0, boolean $l = false )
 
Кодирует целое число

$len
Количество байтов на выходе

$int
Целое число

$l
Если true, то Little-Endian
</md:method>

<md:method>
string public static i2b ( integer $len, integer $int = 0, boolean $l = false )
 
Псевдоним метода `:hc`int2bytes`
</md:method>

<md:method>
integer public static bytes2int ( string $str, boolean $l = false )
 
Конвертирует строку в целое число

$str
Строку

$l
Если true, то Little-Endian
</md:method>

<md:method>
integer public static b2i ( string $str, boolean $l = false )
 
Псевдоним метода `:hc`bytes2int`
</md:method>

<md:method>
string public static bitmap2bytes ( string $bitmap, integer $check_len = 0 )
 
Конвертирует побитовое представление в массив байтов

$bitmap
Строка состоящая из 1 и 0 

$check_len
Ожидаемое количество байт на выходе, при несовпадении будет возвращено false
</md:method>

<md:method>
string public static getbitmap ( string $byte )
 
Получить побитовое представление в виде строки из 1 и 0

$byte
Строка из одного байта
</md:method>