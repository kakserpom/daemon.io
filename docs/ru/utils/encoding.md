### encoding # Encoding #> Encoding {tpl-git PHPDaemon/Utils/Encoding.php}

```php
namespace PHPDaemon\Utils;
class Encoding;
```

Сторонняя библиотека — [forceutf8](https://github.com/neitanod/forceutf8)

#### methods # Методы

<md:method>
string public static toUTF8 ( string $text )

Приводит текст к UTF-8

$text
Текст
</md:method>

<md:method>
string public static toWin1252 ( string $text )

Приводит к текст к Windows-1251

$text
Текст
</md:method>

<md:method>
string public static toISO8859 ( string $text )

Приводит к текст к ISO-8859

$text
Текст
</md:method>

<md:method>
string public static toLatin1 ( string $text )

Приводит к текст к Windows-1251

$text
Текст
</md:method>

<md:method>
string public static fixUTF8 ( string $text )

Исправляет UTF-8

$text
Текст
</md:method>

<md:method>
string public static UTF8FixWin1252Chars ( string $text )

Исправляет UTF-8 после конвертации из Windows-1252 так, будто это была ISO-8859

$text
Текст
</md:method>

<md:method>
string public static removeBOM ( string $str = "" )

Удаляет Byte-order mark

$str
Текст
</md:method>

<md:method>
string public static normalizeEncoding ( string $encodingLabel )

Приводит название кодировки к стандартной записи

$encodingLabel
Название кодировки
</md:method>
