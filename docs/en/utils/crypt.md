### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

```php
namespace PHPDaemon\Utils;
class Crypt;
```

Данный класс содержит методы, относящиеся к криптографии.

<!-- include-namespace path="\PHPDaemon\Utils\Crypt" commit="" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Generate keccak hash for string with salt
	 * @param  string  $str   Data
	 * @param  string  $salt  Salt
	 * @param  boolean $plain Is plain text?
	 * @return string
	 */
public static hash($str, $salt = '', $plain = false)
</md:method>

<md:method>
/**
	 * Returns string of pseudo random characters
	 * @param  integer  $len   Length of desired string
	 * @param  string   $chars String of allowed characters
	 * @param  callable $cb    Callback
	 * @param  integer  $pri   Priority of EIO operation
	 * @param  boolean  $hang  If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return string
	 */
public static randomString($len = null, $chars = null, $cb = null, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns the character at index $idx in $str in constant time
	 * @param  string  $str String
	 * @param  integer $idx Index
	 * @return string
	 */
public static stringIdx($str, $idx)
</md:method>

<md:method>
/**
	 * Returns string of pseudo random bytes
	 * @param  integer  $len  Length of desired string
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority of EIO operation
	 * @param  boolean  $hang If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return integer
	 */
public static randomBytes($len, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns array of pseudo random integers of machine-dependent size
	 * @param  integer  $numInts Number of integers
	 * @param  callable $cb      Callback
	 * @param  integer  $pri     Priority of EIO operation
	 * @param  boolean  $hang    If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return integer
	 */
public static randomInts($numInts, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns array of pseudo random 32-bit integers
	 * @param  integer  $numInts Number of integers
	 * @param  callable $cb      Callback
	 * @param  integer  $pri     Priority of EIO operation
	 * @param  boolean  $hang    If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return integer
	 */
public static randomInts32($numInts, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns the smallest bit mask of all 1s such that ($toRepresent & mask) = $toRepresent
	 * @param  integer $toRepresent must be an integer greater than or equal to 1
	 * @return integer
	 */
protected static getMinimalBitMask($toRepresent)
</md:method>

<md:method>
/**
	 * Compare strings
	 * @param  string  $a String 1
	 * @param  string  $b String 2
	 * @return boolean    Equal?
	 */
public static compareStrings($a, $b)
</md:method>


<!--/ include-namespace -->
