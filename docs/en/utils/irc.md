### irc # IRC #> IRC {tpl-git PHPDaemon/Utils/IRC.php}

```php
namespace PHPDaemon\Utils;
class IRC;
```

Класс используемый в IRC-клиенте и IRC-баунсере

<!-- include-namespace path="\PHPDaemon\Utils\IRC" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var array IRC codes
	 */
public static $codes;
</md:prop>

<md:prop>
/**
	 * @var array Flipped IRC codes
	 */
public static $codesFlip;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * @param  integer $code Code
	 * @return string
	 */
public static function getCommandByCode($code)
</md:method>

<md:method>
/**
	 * @param  string  $cmd Command
	 * @return integer
	 */
public static function getCodeByCommand($cmd)
</md:method>

<md:method>
/**
	 * @param  string $mask
	 * @return array
	 */
public static function parseUsermask($mask)
</md:method>


<!--/ include-namespace -->
