### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

```php
namespace PHPDaemon\Utils;
class Crypt;
```

Данный класс содержит методы, относящиеся к криптографии.

<!-- include-namespace path="\PHPDaemon\Utils\Crypt" commit="c4b2c2deeef89c893f2896e1430d3f4174563a1b" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Generate keccak hash for string with salt
	 * @param string $str
	 * @param string $salt
	 * @param boolean $plain = false
	 * @return string
	 */
public static function hash($str, $salt = '', $plain = false)
</md:method>

<md:method>
/**
	 * Returns string of pseudo random characters
	 * @param int $len Length of desired string
	 * @param string $chars String of allowed characters
	 * @param callable $cb Callback (string)
	 * @param int $pri = EIO_PRI_DEFAULT  Priority of EIO operation
	 * @param boolean $hang = false   If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return string
	 */
public static function randomString($len = 64, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789_-.', $cb = null, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns the character at index $idx in $str in constant time.
	 * @param string $str
	 * @param int $idx
	 * @return string
	 */
public static function stringIdx($str, $idx)
</md:method>

<md:method>
/**
	 * Returns string of pseudo random bytes
	 * @param int $len Length of desired string
	 * @param callable $cb Callback (string)
	 * @param int $pri = EIO_PRI_DEFAULT  Priority of EIO operation
	 * @param boolean $hang = false   If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return int
	 */
public static function randomBytes($len, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns array of pseudo random integers of machine-dependent size
	 * @param int $numInts Number of integers
	 * @param callable $cb Callback (array)
	 * @param int $pri = EIO_PRI_DEFAULT  Priority of EIO operation
	 * @param boolean $hang = false   If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return int
	 */
public static function randomInts($numInts, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Returns array of pseudo random 32-bit integers
	 * @param int $numInts Number of integers
	 * @param callable $cb Callback (array)
	 * @param int $pri = EIO_PRI_DEFAULT  Priority of EIO operation
	 * @param boolean $hang = false   If true, we shall use /dev/random instead of /dev/urandom and it may cause delay
	 * @return int
	 */
public static function randomInts32($numInts, $cb, $pri = 0, $hang = false)
</md:method>

<md:method>
/**
	 * Compare strings
	 * @param string $a
	 * @param string $b
	 * @return boolean Equal?
	 */
public static function compareStrings($a, $b)
</md:method>


<!--/ include-namespace -->
