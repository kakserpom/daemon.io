### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

```php
namespace PHPDaemon\Utils;
class ShmEntity;
```

Эластичное хранилище кучи в разделяемой памяти

> Используется для хранения массива состояний рабочих процессов

<!-- include-namespace path="\PHPDaemon\Utils\ShmEntity" commit="0b7ce904ceaa4d3e97ffeb23aebbffc0ee7579b3" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * @param $path
	 * @param $segsize
	 * @param $name
	 * @param bool $create
	 */
public function __construct($path, $segsize, $name, $create = false)
</md:method>

<md:method>
/**
	 * Opens segment of shared memory.
	 * @return int Segment number.
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
	 * @param string  Data
	 * @param integer Offset
	 * @return boolean Success
	 */
public function write($data, $offset)
</md:method>

<md:method>

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
