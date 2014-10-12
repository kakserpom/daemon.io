### datetime # DateTime #> DateTime {tpl-git PHPDaemon/Utils/DateTime.php}

```php:p
namespace PHPDaemon\Utils;
class DateTime extends \[DateTime](http://php.net/manual/class.datetime.php);
```

В конструтор можно передавать метку времени Unix.

<!-- include-namespace path="\PHPDaemon\Utils\DateTime" commit="" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Support timestamp and available date format
	 * @param string       $time
	 * @param DateTimeZone $timezone
	 * @link http://php.net/manual/en/datetime.construct.php
	 */
public function __construct($time = 'now', DateTimeZone $timezone = null)
</md:method>

<md:method>
/**
	 * Calculates a difference between two dates
	 * @see http://www.php.net/manual/en/datetime.diff.php
	 * @param  integer $datetime1
	 * @param  integer $datetime2
	 * @param  boolean $absolute
	 * @return string Something like this: 1 year. 2 mon. 6 day. 4 hours. 21 min. 10 sec.
	 */
public static function diffAsText($datetime1, $datetime2, $absolute = false)
</md:method>


<!--/ include-namespace -->
