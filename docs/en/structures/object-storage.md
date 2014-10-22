### object-storage # ObjectStorage #> ObjectStorage {tpl-git PHPDaemon/Structures/ObjectStorage.php}

```php:p
namespace PHPDaemon\Structures;
class ObjectStorage extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php);
```

Данный класс предоставляет хранилище объектов с несколькими дополнительными методами

> Можно создавать классы-наследники

<!-- include-namespace path="\PHPDaemon\Structures\ObjectStorage" commit="bf8d120e0240dd117b67aa0351152ed9b60d052d" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Call given method of all objects in storage
	 * @param string $Method
	 * @param ... arguments ...
	 * @return integer Number of called objects
	 */
public function each()
</md:method>

<md:method>
/**
	 * Remove all objects from this storage, which contained in another storage
	 * @param \SplObjectStorage
	 * @return void
	 */
public function removeAll($obj = null)
</md:method>

<md:method>
/**
	 * Detaches first object and returns it
	 * @return object
	 */
public function detachFirst()
</md:method>

<md:method>
/**
	 * Returns first object
	 * @return object
	 */
public function getFirst()
</md:method>


<!--/ include-namespace -->