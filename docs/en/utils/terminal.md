### terminal # Terminal #> Terminal {tpl-git PHPDaemon/Utils/Terminal.php}

```php
namespace PHPDaemon\Utils;
class Terminal;
```

{tpl-catimg contribute/code}<br />Данный класс нуждается в доработке: не хватает полноценной поддержки ncurses.
Если хотите помочь, нажмите на кота!<br />

<!-- include-namespace path="\PHPDaemon\Utils\Terminal" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L26
</md:method>

<md:method>
/**
	 * Read a line from STDIN
	 * @return string Line
	 */
public function readln()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L34
</md:method>

<md:method>
/**
	 * Enables/disable color
	 * @param  boolean $bool Enable?
	 * @return void
	 */
public function enableColor($bool = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L43
</md:method>

<md:method>
/**
	 * Clear the terminal with CLR
	 * @return void
	 */
public function clearScreen()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L51
</md:method>

<md:method>
/**
	 * Set text style
	 * @param  string $c Style
	 * @return void
	 */
public function setStyle($c)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L60
</md:method>

<md:method>
/**
	 * Reset style to default
	 * @return void
	 */
public function resetStyle()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L70
</md:method>

<md:method>
/**
	 * Draw param (like in man)
	 * @param string $name        Param name
	 * @param string $description Param description
	 * @param array  $values      Param allowed values
	 * @return void
	 */
public function drawParam($name, $description, $values = '')
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L98
</md:method>

<md:method>
/**
	 * Draw a table
	 * @param  array Array of table's rows
	 * @return void
	 */
public function drawTable($rows)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Utils/Terminal.php#L179
</md:method>


<!--/ include-namespace -->
