### encoding # Encoding #> Encoding {tpl-git PHPDaemon/Utils/Encoding.php}

```php
namespace PHPDaemon\Utils;
class Encoding;
```

Сторонняя библиотека — [forceutf8](https://github.com/neitanod/forceutf8)

<!-- include-namespace path="\PHPDaemon\Utils\Encoding" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Function Encoding::toUTF8
	 *
	 * This function leaves UTF8 characters alone, while converting almost all non-UTF8 to UTF8.
	 * 
	 * It assumes that the encoding of the original string is either Windows-1252 or ISO 8859-1.
	 *
	 * It may fail to convert characters to UTF-8 if they fall into one of these scenarios:
	 *
	 * 1) when any of these characters:   ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞß
	 *    are followed by any of these:  ("group B")
	 *                                    ¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶•¸¹º»¼½¾¿
	 * For example:   %ABREPRESENT%C9%BB. «REPRESENTÉ»
	 * The "«" (%AB) character will be converted, but the "É" followed by "»" (%C9%BB) 
	 * is also a valid unicode character, and will be left unchanged.
	 *
	 * 2) when any of these: àáâãäåæçèéêëìíîï  are followed by TWO chars from group B,
	 * 3) when any of these: ðñòó  are followed by THREE chars from group B.
	 *
	 * @name toUTF8
	 * @param string $text  Any string.
	 * @return string  The same string, UTF8 encoded
	 *
	 */
static function toUTF8($text)
</md:method>

<md:method>

static function toWin1252($text)
</md:method>

<md:method>

static function toISO8859($text)
</md:method>

<md:method>

static function toLatin1($text)
</md:method>

<md:method>

static function fixUTF8($text)
</md:method>

<md:method>

static function UTF8FixWin1252Chars($text)
</md:method>

<md:method>

static function removeBOM($str="")
</md:method>

<md:method>

public static function normalizeEncoding($encodingLabel)
</md:method>

<md:method>

public static function encode($encodingLabel, $text)
</md:method>


<!--/ include-namespace -->
