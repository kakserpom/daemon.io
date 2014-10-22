### terminal # Terminal #> Terminal {tpl-git PHPDaemon/Utils/Terminal.php}

```php
namespace PHPDaemon\Utils;
class Terminal;
```

{tpl-catimg contribute/code}<br />Данный класс нуждается в доработке: не хватает полноценной поддержки ncurses.
Если хотите помочь, нажмите на кота!<br />

<!-- include-namespace path="\PHPDaemon\Utils\Terminal" commit="2787f4c32d31f6555bbf8be44f08914ccf062e05" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct()
</md:method>

<md:method>
/**
	 * Read a line from STDIN
	 * @return string Line
	 */
public function readln()
</md:method>

<md:method>
/**
	 * Enables/disable color
	 * @param  boolean $bool Enable?
	 * @return void
	 */
public function enableColor($bool = true)
</md:method>

<md:method>
/**
	 * Clear the terminal with CLR
	 * @return void
	 */
public function clearScreen()
</md:method>

<md:method>
/**
	 * Set text style
	 * @param  string $c Style
	 * @return void
	 */
public function setStyle($c)
</md:method>

<md:method>
/**
	 * Reset style to default
	 * @return void
	 */
public function resetStyle()
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
</md:method>

<md:method>
/**
	 * Draw a table
	 * @param  array Array of table's rows
	 * @return void
	 */
public function drawTable($rows)
</md:method>


<!--/ include-namespace -->
