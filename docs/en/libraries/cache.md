### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

```php
namespace PHPDaemon\Cache;
```

Механизм локального LRU-кеша ключ-значение.

> Используется для кеширования замыканий созданных через create_function. Также используется в [Clients\DNS](#clients/dns)

<!-- include-namespace path="\PHPDaemon\Cache" commit="254e4366d6c961d8db8ef438d2499e394fdd77c3" level="" access="" -->
#### capped-storage-hits # Class CappedStorageHits {tpl-git PHPDaemon/Cache/CappedStorageHits.php}

```php
namespace PHPDaemon\Cache;
class CappedStorageHits extends \PHPDaemon\Cache\CappedStorage;
```

##### properties # Properties

<md:prop>
/**
	 * Sorter function
	 * @var callable
	 */
public $sorter;
</md:prop>

<md:prop>
/**
	 * Maximum number of cached elements
	 * @var integer
	 */
public $maxCacheSize;
</md:prop>

<md:prop>
/**
	 * Additional window to decrease number of sorter calls.
	 * @var integer
	 */
public $capWindow;
</md:prop>

<md:prop>
/**
	 * Storage of cached items
	 * @var array
	 */
public $cache;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param [integer Maximum number of cached elements]
	 * @return object
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
/** Hits counter
	 * @var integer
	 */
public $hits;
</md:prop>

<md:prop>
/** Expire time
	 * @var integer
	 */
public $expire;
</md:prop>

##### methods # Methods

<md:method>
/** Establish TCP connection
	 * @return boolean Success
	 */
public function __construct($value)
</md:method>

<md:method>
/**
	 * Get hits number
	 * @return int
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
	 * @param $value
	 */
public function setValue($value)
</md:method>

#### capped-storage # Class CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

```php
namespace PHPDaemon\Cache;
class CappedStorage;
```

##### properties # Properties

<md:prop>
/**
	 * Sorter function
	 * @var callable
	 */
public $sorter;
</md:prop>

<md:prop>
/**
	 * Maximum number of cached elements
	 * @var integer
	 */
public $maxCacheSize;
</md:prop>

<md:prop>
/**
	 * Additional window to decrease number of sorter calls.
	 * @var integer
	 */
public $capWindow;
</md:prop>

<md:prop>
/**
	 * Storage of cached items
	 * @var array
	 */
public $cache;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Sets cache size
	 * @param integer Maximum number of elements.
	 * @return void
	 */
public function setMaxCacheSize($size)
</md:method>

<md:method>
/**
	 * Sets cap window
	 * @param integer
	 * @return void
	 */
public function setCapWindow($w)
</md:method>

<md:method>
/**
	 * Hash function
	 * @param string Key
	 * @return mixed
	 */
public function hash($key)
</md:method>

<md:method>
/**
	 * Puts element in cache
	 * @param string Key
	 * @param mixed  Value
	 * @param [integer Time-to-Life]
	 * @return mixed
	 */
public function put($key, $value, $ttl = null)
</md:method>

<md:method>
/**
	 * Invalidates cache element
	 * @param string Key
	 * @return void
	 */
public function invalidate($key)
</md:method>

<md:method>
/**
	 * Gets element by key
	 * @param string Key
	 * @return object Item
	 */
public function get($key)
</md:method>

<md:method>
/**
	 * Gets value of element by key
	 * @param string Key
	 * @return mixed
	 */
public function getValue($key)
</md:method>


<!--/ include-namespace -->
