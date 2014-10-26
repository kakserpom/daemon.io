### object-storage # ObjectStorage #> ObjectStorage {tpl-git PHPDaemon/Structures/ObjectStorage.php}

```php:p
namespace PHPDaemon\Structures;
class ObjectStorage extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php);
```

Данный класс предоставляет хранилище объектов с несколькими дополнительными методами

> Можно создавать классы-наследники

<!-- include-namespace path="\PHPDaemon\Structures\ObjectStorage" level="" access="" -->
#### methods # Methods

<md:method>
/**
	 * Call given method of all objects in storage
	 * @param  string $method  Method name
	 * @param  mixed  ...$args Arguments
	 * @return integer Number of called objects
	 */
public function each()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L19
</md:method>

<md:method>
/**
	 * Remove all objects from this storage, which contained in another storage
	 * @param  \SplObjectStorage $obj
	 * @return void
	 */
public function removeAll($obj = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L38
</md:method>

<md:method>
/**
	 * Detaches first object and returns it
	 * @return object
	 */
public function detachFirst()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L49
</md:method>

<md:method>
/**
	 * Returns first object
	 * @return object
	 */
public function getFirst()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L63
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
if ($this->count() === 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
return $n;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
*/
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
foreach ($this as $obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Structures/ObjectStorage.php#L26
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->