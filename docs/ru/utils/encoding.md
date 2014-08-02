### encoding # Encoding #> Encoding {tpl-git PHPDaemon/Utils/Encoding.php}

`:h`class PHPDaemon\Utils\Encoding`

Сторонняя библиотека — {tpl-outlink https://github.com/neitanod/forceutf8 forceutf8}

#### methods # Методы

 -.method ```php.inline
 string public static Encoding::toUTF8 ( string $text )
 ```
   -.n Приводит текст к UTF-8
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::toWin1252 ( string $text )
 ```
   -.n Приводит к текст к Windows-1251
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::toISO8859 ( string $text )
 ```
   -.n Приводит к текст к ISO-8859
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::toLatin1 ( string $text )
 ```
   -.n Приводит к текст к Windows-1251
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::fixUTF8 ( string $text )
 ```
   -.n Исправляет UTF-8
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::UTF8FixWin1252Chars ( string $text )
 ```
   -.n Исправляет UTF-8 после конвертации из Windows-1252 так, будто это была ISO-8859
   -.n.ti `:hc`$text` — Текст

 -.method ```php.inline
 string public static Encoding::removeBOM ( string $str = "" )
 ```
   -.n Удаляет Byte-order mark
   -.n.ti `:hc`$str` — Текст

 -.method ```php.inline
 string public static Encoding::normalizeEncoding ( string $encodingLabel )
 ```
   -.n Приводит название кодировки к стандартной записи
   -.n.ti `:hc`$encodingLabel` — Название кодировки
