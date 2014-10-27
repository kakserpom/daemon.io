### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

```php
namespace PHPDaemon\Cache;
```

Механизм локального LRU-кеша ключ-значение.

> Используется для кеширования замыканий созданных через create_function. Также используется в [Clients\DNS](#clients/dns)

<!-- include-namespace path="\PHPDaemon\Cache" level="" access="" -->
#### capped-storage # CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

```php
namespace PHPDaemon\Cache;
class CappedStorage;
```

CappedStorage

##### properties # Properties

<md:prop>
/**
	 * @var callable Sorter function
	 */
public $sorter
</md:prop>

<md:prop>
/**
	 * @var integer Maximum number of cached elements
	 */
public $maxCacheSize = 64
</md:prop>

<md:prop>
/**
	 * @var integer Additional window to decrease number of sorter calls
	 */
public $capWindow = 16
</md:prop>

<md:prop>
/**
	 * @var array Storage of cached items
	 */
public $cache = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sets cache size
	 * @param  integer $size Maximum number of elements
	 * @return void
	 */
public function setMaxCacheSize($size)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L38
</md:method>

<md:method>
/**
	 * Sets cap window
	 * @param  integer $w Additional window to decrease number of sorter calls
	 * @return void
	 */
public function setCapWindow($w)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L47
</md:method>

<md:method>
/**
	 * Hash function
	 * @param  string $key Key
	 * @return integer
	 */
public function hash($key)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L56
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L67
</md:method>

<md:method>
/**
	 * Invalidates cache element
	 * @param  string $key Key
	 * @return void
	 */
public function invalidate($key)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L97
</md:method>

<md:method>
/**
	 * Gets element by key
	 * @param  string $key Key
	 * @return object Item
	 */
public function get($key)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L107
</md:method>

<md:method>
/**
	 * Gets value of element by key
	 * @param  string $key Key
	 * @return mixed
	 */
public function getValue($key)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorage.php#L127
</md:method>

<div class="clearboth"></div>

#### capped-storage-hits # CappedStorageHits {tpl-git PHPDaemon/Cache/CappedStorageHits.php}

```php
namespace PHPDaemon\Cache;
class CappedStorageHits extends \PHPDaemon\Cache\CappedStorage;
```

CappedStorageHits

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param  integer $max Maximum number of cached elements
	 */
public function __construct($max = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/CappedStorageHits.php#L15
</md:method>

<div class="clearboth"></div>

#### item # Item {tpl-git PHPDaemon/Cache/Item.php}

```php
namespace PHPDaemon\Cache;
class Item;
```

Item

##### properties # Properties

<md:prop>
/**
	 * @var integer Hits counter
	 */
public $hits = 1
</md:prop>

<md:prop>
/**
	 * @var integer Expire time
	 */
public $expire
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct($value)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/Item.php#L38
</md:method>

<md:method>
/**
	 * Get hits number
	 * @return integer
	 */
public function getHits()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/Item.php#L47
</md:method>

<md:method>
/**
	 * Get value
	 * @return mixed
	 */
public function getValue()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/Item.php#L55
</md:method>

<md:method>
/**
	 * Adds listener callback
	 * @param callable $cb
	 */
public function addListener($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/Item.php#L64
</md:method>

<md:method>
/**
	 * Sets the value
	 * @param mixed $value
	 */
public function setValue($value)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Cache/Item.php#L72
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
