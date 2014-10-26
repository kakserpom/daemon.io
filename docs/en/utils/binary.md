### binary # Binary #> Binary {tpl-git PHPDaemon/Utils/Binary.php}

```php
namespace PHPDaemon\Utils;
class Binary;
```

Данный класс предоставляет набор статических методов для работы с бинарными данными.

<!-- include-namespace path="\PHPDaemon\Utils\Binary" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Build structure of labels
	 * @param  string $q Dot-separated labels list
	 * @return string
	 */
public static function labels($q)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L20
</md:method>

<md:method>
/**
	 * Parse structure of labels
	 * @param  string &$data Binary data
	 * @param  string $orig  Original packet
	 * @return string        Dot-separated labels list
	 */
public static function parseLabels(&$data, $orig = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L38
</md:method>

<md:method>
/**
	 * Build length-value binary snippet
	 * @param string  $str  Data
	 * @param integer $len  Number of bytes to encode length. Default is 1
	 * @param boolean $lrev Reverse?
	 * @return string
	 */
public static function LV($str, $len = 1, $lrev = FALSE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L67
</md:method>

<md:method>
/**
	 * Build nul-terminated string, with 2-byte of length
	 * @param string $str Data
	 * @return string
	 */
public static function LVnull($str)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L80
</md:method>

<md:method>
/**
	 * Build byte
	 * @param  integer $int Byte number
	 * @return string
	 */
public static function byte($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L89
</md:method>

<md:method>
/**
	 * Build word (2 bytes) big-endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function word($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L98
</md:method>

<md:method>
/**
	 * Build word (2 bytes) little-endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function wordl($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L107
</md:method>

<md:method>
/**
	 * Build double word (4 bytes) big-endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function dword($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L116
</md:method>

<md:method>
/**
	 * Build double word (4 bytes) little endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function dwordl($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L125
</md:method>

<md:method>
/**
	 * Build quadro word (8 bytes) big endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function qword($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L134
</md:method>

<md:method>
/**
	 * Build quadro word (8 bytes) little endian
	 * @param  integer $int Integer
	 * @return string
	 */
public static function qwordl($int)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L143
</md:method>

<md:method>
/**
	 * Parse byte, and remove it
	 * @param  string &$p Data
	 * @return integer
	 */
public static function getByte(&$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L152
</md:method>

<md:method>
/**
	 * Get single-byte character
	 * @param  string &$p Data
	 * @return string
	 */
public static function getChar(&$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L163
</md:method>

<md:method>
/**
	 * Parse word (2 bytes)
	 * @param  string  &$p Data
	 * @param  boolean $l  Little endian?
	 * @return integer
	 */
public static function getWord(&$p, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L175
</md:method>

<md:method>
/**
	 * Get word (2 bytes)
	 * @param  string  &$p Data
	 * @param  boolean $l  Little endian?
	 * @return string
	 */
public static function getStrWord(&$p, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L187
</md:method>

<md:method>
/**
	 * Get double word (4 bytes)
	 * @param  string  &$p Data
	 * @param  boolean $l  Little endian?
	 * @return integer
	 */
public static function getDWord(&$p, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L202
</md:method>

<md:method>
/**
	 * Parse quadro word (8 bytes)
	 * @param  string  &$p Data
	 * @param  boolean $l  Little endian?
	 * @return integer
	 */
public static function getQword(&$p, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L214
</md:method>

<md:method>
/**
	 * Get quadro word (8 bytes)
	 * @param  string  &$p Data
	 * @param  boolean $l  Little endian?
	 * @return string
	 */
public static function getStrQWord(&$p, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L226
</md:method>

<md:method>
/**
	 * Parse nul-terminated string
	 * @param  string &$str Data
	 * @return string
	 */
public static function getString(&$str)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L240
</md:method>

<md:method>
/**
	 * Parse length-value structure
	 * @param  string  &$p   Data
	 * @param  integer $l    Number of length bytes
	 * @param  boolean $nul  Nul-terminated? Default is false
	 * @param  boolean $lrev Length is little endian?
	 * @return string
	 */
public static function getLV(&$p, $l = 1, $nul = false, $lrev = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L258
</md:method>

<md:method>
/**
	 * Converts integer to binary string
	 * @param  integer $len Length
	 * @param  integer $int Integer
	 * @param  boolean $l   Optional. Little endian. Default value - false
	 * @return string       Resulting binary string
	 */
public static function int2bytes($len, $int = 0, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L295
</md:method>

<md:method>
/**
	 * Convert array of flags into bit array
	 * @param  array   $flags Flags
	 * @param  integer $len   Length. Default is 4
	 * @return string
	 */
public static function flags2bitarray($flags, $len = 4)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L323
</md:method>

<md:method>
/**
	 * Converts integer to binary string
	 * @alias Binary::int2bytes
	 * @param  integer $len Length
	 * @param  integer $int Integer
	 * @param  boolean $l   Optional. Little endian. Default value - false
	 * @return string       Resulting binary string
	 */
public static function i2b($len, $int = 0, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L339
</md:method>

<md:method>
/**
	 * Convert bytes into integer
	 * @param  string  $str Bytes
	 * @param  boolean $l   Little endian? Default is false
	 * @return integer
	 */
public static function bytes2int($str, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L349
</md:method>

<md:method>
/**
	 * Convert bytes into integer
	 * @alias Binary::bytes2int
	 * @param  string  $str Bytes
	 * @param  boolean $l   Little endian? Default is false
	 * @return integer
	 */
public static function b2i($str = 0, $l = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L368
</md:method>

<md:method>
/**
	 * Convert bitmap into bytes
	 * @param  string  $bitmap    Bitmap
	 * @param  integer $check_len Check length?
	 * @return string|false
	 */
public static function bitmap2bytes($bitmap, $check_len = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L378
</md:method>

<md:method>
/**
	 * Get bitmap
	 * @param  integer $byte Byte
	 * @return string
	 */
public static function getbitmap($byte)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L395
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
public static function labels($q)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
}
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
* @return string
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
if (binarySubstr($r, -1) !== "\x00")
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Binary.php#L26
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
