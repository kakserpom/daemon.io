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
	 * @param  string $text Any string
	 * @return string       The same string, UTF8 encoded
	 *
	 */
public static function toUTF8($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L175
</md:method>

<md:method>
/**
	 * toWin1252
	 * @param  string $text Any string
	 * @return string       The same string, Win1252 encoded
	 */
public static function toWin1252($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L253
</md:method>

<md:method>
/**
	 * toISO8859
	 * @param  string $text Any string
	 * @return string       The same string, Win1252 encoded
	 */
public static function toISO8859($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L271
</md:method>

<md:method>
/**
	 * toLatin1
	 * @param  string $text Any string
	 * @return string       The same string, Win1252 encoded
	 */
public static function toLatin1($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L280
</md:method>

<md:method>
/**
	 * fixUTF8
	 * @param  string $text Any string
	 * @return string
	 */
public static function fixUTF8($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L289
</md:method>

<md:method>
/**
	 * If you received an UTF-8 string that was converted from Windows-1252 as it was ISO8859-1 
	 * (ignoring Windows-1252 chars from 80 to 9F) use this function to fix it.
	 * See: http://en.wikipedia.org/wiki/Windows-1252
	 * @param  string $text Any string
	 * @return string
	 */
public static function UTF8FixWin1252Chars($text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L313
</md:method>

<md:method>
/**
	 * Remove BOM
	 * @param  string $str Any string
	 * @return string
	 */
public static function removeBOM($str="")
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L322
</md:method>

<md:method>
/**
	 * Normalize encoding name
	 * @param  string $str Encoding name
	 * @return string
	 */
public static function normalizeEncoding($encodingLabel)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L334
</md:method>

<md:method>
/**
	 * Encode
	 * @param  string $str Any string
	 * @return string
	 */
public static function encode($encodingLabel, $text)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Encoding.php#L361
</md:method>


<!--/ include-namespace -->
