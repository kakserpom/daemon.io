### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

```php
namespace PHPDaemon\Cache;
```

Механизм локального LRU-кеша ключ-значение.

> Используется для кеширования замыканий созданных через create_function. Также используется в [Clients\DNS](#clients/dns)

<!-- include-namespace path="\PHPDaemon\Cache" commit="e767fc705a6a69b4d31e543954ab8f66ee3697fa" level="" access="" -->
#### capped-storage # Class CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

```php
namespace PHPDaemon\Cache;
class CappedStorage;
```

##### properties # Properties

<md:prop>
/**
	 * @var callable Sorter function
	 */
public $sorter;
</md:prop>

<md:prop>
/**
	 * @var integer Maximum number of cached elements
	 */
public $maxCacheSize;
</md:prop>

<md:prop>
/**
	 * @var integer Additional window to decrease number of sorter calls
	 */
public $capWindow;
</md:prop>

<md:prop>
/**
	 * @var array Storage of cached items
	 */
public $cache;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Sets cache size
	 * @param  integer $size Maximum number of elements
	 * @return void
	 */
public function setMaxCacheSize($size)
</md:method>

<md:method>
/**
	 * Sets cap window
	 * @param  integer $w Additional window to decrease number of sorter calls
	 * @return void
	 */
public function setCapWindow($w)
</md:method>

<md:method>
/**
	 * Hash function
	 * @param  string $key Key
	 * @return integer
	 */
public function hash($key)
</md:method>

<md:method>
/**
	 * Puts element in cache
	 * @param  string  $key   Key
	 * @param  mixed   $value Value
	 * @param  integer $ttl   Time to live
	 * @return mixed
	 */
public function put($key, $value, $ttl = null)
</md:method>

<md:method>
/**
	 * Invalidates cache element
	 * @param  string $key Key
	 * @return void
	 */
public function invalidate($key)
</md:method>

<md:method>
/**
	 * Gets element by key
	 * @param  string $key Key
	 * @return object Item
	 */
public function get($key)
</md:method>

<md:method>
/**
	 * Gets value of element by key
	 * @param  string $key Key
	 * @return mixed
	 */
public function getValue($key)
</md:method>

#### capped-storage-hits # Class CappedStorageHits {tpl-git PHPDaemon/Cache/CappedStorageHits.php}

```php
namespace PHPDaemon\Cache;
class CappedStorageHits extends \PHPDaemon\Cache\CappedStorage;
```

##### properties # Properties

<md:prop>
/**
	 * @var callable Sorter function
	 */
public $sorter;
</md:prop>

<md:prop>
/**
	 * @var integer Maximum number of cached elements
	 */
public $maxCacheSize;
</md:prop>

<md:prop>
/**
	 * @var integer Additional window to decrease number of sorter calls
	 */
public $capWindow;
</md:prop>

<md:prop>
/**
	 * @var array Storage of cached items
	 */
public $cache;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param  integer $max Maximum number of cached elements
	 */
public function __construct($max = null)
</md:method>

#### item # Class Item {tpl-git PHPDaemon/Cache/Item.php}

```php
namespace PHPDaemon\Cache;
class Item;
```

##### properties # Properties

<md:prop>
/**
	 * @var integer Hits counter
	 */
public $hits;
</md:prop>

<md:prop>
/**
	 * @var integer Expire time
	 */
public $expire;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct($value)
</md:method>

<md:method>
/**
	 * Get hits number
	 * @return integer
	 */
public function getHits()
</md:method>

<md:method>
/**
	 * Get value
	 * @return mixed
	 */
public function getValue()
</md:method>

<md:method>
/**
	 * Adds listener callback
	 * @param callable $cb
	 */
public function addListener($cb)
</md:method>

<md:method>
/**
	 * Sets the value
	 * @param mixed $value
	 */
public function setValue($value)
</md:method>


<!--/ include-namespace -->
