### binary # Binary #> Binary {tpl-git PHPDaemon/Utils/Binary.php}

```php
namespace PHPDaemon\Utils;
class Binary;
```

Данный класс предоставляет набор статических методов для работы с бинарными данными.

<!-- include-namespace path="\PHPDaemon\Utils\Binary" commit="254e4366d6c961d8db8ef438d2499e394fdd77c3" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Build structure of labels
	 * @param string Dot-separated labels list
	 * @return \PHPDaemon\Utils\binary
	 */
public static function labels($q)
</md:method>

<md:method>
/**
	 * Parse structure of labels
	 * @param string Binary data
	 * @param string Original packet
	 * @return string Dot-separated labels list
	 */
public static function parseLabels(&$data, $orig = null)
</md:method>

<md:method>
/**
	 * Build length-value binary snippet
	 * @param string Data
	 * @param [string Number of bytes to encode length. Default is 1
	 * @return \PHPDaemon\Utils\binary
	 */
public static function LV($str, $len = 1, $lrev = FALSE)
</md:method>

<md:method>
/**
	 * Build nul-terminated string, with 2-byte of length
	 * @param string Data
	 * @return \PHPDaemon\Utils\binary
	 */
public static function LVnull($str)
</md:method>

<md:method>
/**
	 * Build byte
	 * @param integer Byte number
	 * @return \PHPDaemon\Utils\binary
	 */
public static function byte($int)
</md:method>

<md:method>
/**
	 * Build word (2 bytes) big-endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function word($int)
</md:method>

<md:method>
/**
	 * Build word (2 bytes) little-endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function wordl($int)
</md:method>

<md:method>
/**
	 * Build double word (4 bytes) big-endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function dword($int)
</md:method>

<md:method>
/**
	 * Build double word (4 bytes) little endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function dwordl($int)
</md:method>

<md:method>
/**
	 * Build quadro word (8 bytes) big endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function qword($int)
</md:method>

<md:method>
/**
	 * Build quadro word (8 bytes) little endian
	 * @param integer Integer
	 * @return \PHPDaemon\Utils\binary
	 */
public static function qwordl($int)
</md:method>

<md:method>
/**
	 * Parse byte, and remove it
	 * @param &string Data
	 * @return integer
	 */
public static function getByte(&$p)
</md:method>

<md:method>
/**
	 * Get single-byte character
	 * @param &string Data
	 * @return string
	 */
public static function getChar(&$p)
</md:method>

<md:method>
/**
	 * Parse word (2 bytes)
	 * @param &string Data
	 * @param boolean Little endian?
	 * @return integer
	 */
public static function getWord(&$p, $l = false)
</md:method>

<md:method>
/**
	 * Get word (2 bytes)
	 * @param &string Data
	 * @param boolean Little endian?
	 * @return \PHPDaemon\Utils\binary
	 */
public static function getStrWord(&$p, $l = false)
</md:method>

<md:method>
/**
	 * Get double word (4 bytes)
	 * @param &string Data
	 * @param boolean Little endian?
	 * @return integer
	 */
public static function getDWord(&$p, $l = false)
</md:method>

<md:method>
/**
	 * Parse quadro word (8 bytes)
	 * @param &string Data
	 * @param boolean Little endian?
	 * @return integer
	 */
public static function getQword(&$p, $l = false)
</md:method>

<md:method>
/**
	 * Get quadro word (8 bytes)
	 * @param &string Data
	 * @param boolean Little endian?
	 * @return \PHPDaemon\Utils\binary
	 */
public static function getStrQWord(&$p, $l = false)
</md:method>

<md:method>
/**
	 * Parse nul-terminated string
	 * @param &string Data
	 * @return \PHPDaemon\Utils\binary
	 */
public static function getString(&$str)
</md:method>

<md:method>
/**
	 * Parse length-value structure
	 * @param &string Data
	 * @param number  Number of length bytes
	 * @param boolean Nul-terminated? Default is false
	 * @param boolean Length is little endian?
	 * @return string
	 */
public static function getLV(&$p, $l = 1, $nul = false, $lrev = false)
</md:method>

<md:method>
/**
	 * Converts integer to binary string
	 * @param integer Length
	 * @param integer Integer
	 * @param boolean Optional. Little endian. Default value - false.
	 * @return string Resulting binary string
	 */
public static function int2bytes($len, $int = 0, $l = false)
</md:method>

<md:method>
/**
	 * Convert array of flags into bit array
	 * @param array   Flags
	 * @param integer Length. Default is 4
	 * @return string
	 */
public static function flags2bitarray($flags, $len = 4)
</md:method>

<md:method>
/**
	 * @alias int2bytes
	 */
public static function i2b($len, $int = 0, $l = false)
</md:method>

<md:method>
/**
	 * Convert bytes into integer
	 * @param string  Bytes
	 * @param boolean Little endian? Default is false
	 * @return integer
	 */
public static function bytes2int($str, $l = false)
</md:method>

<md:method>
/**
	 * @alias bytes2int
	 */
public static function b2i($str = 0, $l = false)
</md:method>

<md:method>
/**
	 * Convert bitmap into bytes
	 * @param string  Bitmap
	 * @param boolean Check length?
	 * @return \PHPDaemon\Utils\binary
	 */
public static function bitmap2bytes($bitmap, $check_len = 0)
</md:method>

<md:method>
/**
	 * Get bitmap
	 * @param byte
	 * @return string
	 */
public static function getbitmap($byte)
</md:method>


<!--/ include-namespace -->
