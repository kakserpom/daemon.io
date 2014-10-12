### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

```php
namespace PHPDaemon\Utils;
class ShmEntity;
```

Эластичное хранилище кучи в разделяемой памяти

> Используется для хранения массива состояний рабочих процессов

<!-- include-namespace path="\PHPDaemon\Utils\ShmEntity" commit="" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param string  $path    Path
	 * @param integer $segsize Segment size
	 * @param string  $name    Name
	 * @param boolean $create  Create
	 */
public function __construct($path, $segsize, $name, $create = false)
</md:method>

<md:method>
/**
	 * Opens segment of shared memory
	 * @param  integer $segno  Segment number
	 * @param  boolean $create Create
	 * @return integer         Segment number
	 */
public function open($segno = 0, $create = false)
</md:method>

<md:method>
/**
	 * Get open segments
	 * @return array
	 */
public function getSegments()
</md:method>

<md:method>
/**
	 * Open all segments
	 * @return void
	 */
public function openall()
</md:method>

<md:method>
/**
	 * Write to shared memory
	 * @param  string  $data   Data
	 * @param  integer $offset Offset
	 * @return boolean         Success
	 */
public function write($data, $offset)
</md:method>

<md:method>
/**
	 * Read from shared memory
	 * @param  integer $offset Offset
	 * @param  integer $length Length
	 * @return string          Data
	 */
public function read($offset, $length = 1)
</md:method>

<md:method>
/**
	 * Deletes all segments
	 * @return void
	 */
public function delete()
</md:method>


<!--/ include-namespace -->
