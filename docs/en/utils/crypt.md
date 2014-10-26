### crypt # Crypt #> Crypt {tpl-git PHPDaemon/Utils/Crypt.php}

```php
namespace PHPDaemon\Utils;
class Crypt;
```

Данный класс содержит методы, относящиеся к криптографии.

<!-- include-namespace path="\PHPDaemon\Utils\Crypt" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Generate keccak hash for string with salt
	 * @param  string  $str   Data
	 * @param  string  $salt  Salt
	 * @param  boolean $plain Is plain text?
	 * @return string
	 */
public static function hash($str, $salt = '', $plain = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L21
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
public static function randomString($len = null, $chars = null, $cb = null, $pri = 0, $hang = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L59
</md:method>

<md:method>
/**
	 * Returns the character at index $idx in $str in constant time
	 * @param  string  $str String
	 * @param  integer $idx Index
	 * @return string
	 */
public static function stringIdx($str, $idx)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L115
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
public static function randomBytes($len, $cb, $pri = 0, $hang = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L139
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
public static function randomInts($numInts, $cb, $pri = 0, $hang = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L158
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
public static function randomInts32($numInts, $cb, $pri = 0, $hang = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L186
</md:method>

<md:method>
/**
	 * Compare strings
	 * @param  string  $a String 1
	 * @param  string  $b String 2
	 * @return boolean    Equal?
	 */
public static function compareStrings($a, $b)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L227
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
*/
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
if (isset($ee[1]) && ctype_digit($e[1]))
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Crypt.php#L30
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
