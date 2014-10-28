### memcache # Memcache #> Memcache {tpl-git PHPDaemon/Clients/Memcache}

```php
namespace PHPDaemon\Clients\Memcache;
```

<!-- include-namespace path="\PHPDaemon\Clients\Memcache" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Memcache/Connection.php}

```php
namespace PHPDaemon\Clients\Memcache;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
@TODO DESCR
const STATE_DATA = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/** @var */
public $result
</md:prop>

<md:prop>
/** @var */
public $valueFlags
</md:prop>

<md:prop>
/** @var */
public $valueLength
</md:prop>

<md:prop>
/** @var */
public $error
</md:prop>

<md:prop>
/** @var */
public $key
</md:prop>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Memcache/Pool.php}

```php
namespace PHPDaemon\Clients\Memcache;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers ('tcp://127.0.0.1')`  
 

 - `:p`port (11211)`  
 

 - `:p`maxconnperserv (32)`  
 

##### methods # Methods

<md:method>
/**
	 * Gets the key
	 * @param string Key
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function get($key, $onResponse)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L44
</md:method>

<md:method>
/**
	 * Sets the key
	 * @param string  Key
	 * @param string  Value
	 * @param integer Lifetime in seconds (0 - immortal)
	 * @param mixed   Callback called when the request complete
	 * @return void
	 */
public function set($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L56
</md:method>

<md:method>
/**
	 * Adds the key
	 * @param string  Key
	 * @param string  Value
	 * @param integer Lifetime in seconds (0 - immortal)
	 * @param mixed   Callback called when the request complete
	 * @return void
	 */
public function add($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L79
</md:method>

<md:method>
/**
	 * Deletes the key
	 * @param string  Key
	 * @param mixed   Callback called when the request complete
	 * @param integer Time to block this key
	 * @return void
	 */
public function delete($key, $onResponse = null, $time = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L100
</md:method>

<md:method>
/**
	 * Replaces the key
	 * @param string  Key
	 * @param string  Value
	 * @param integer Lifetime in seconds (0 - immortal)
	 * @param mixed   Callback called when the request complete
	 * @return void
	 */
public function replace($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L121
</md:method>

<md:method>
/**
	 * Appends a string to the key's value
	 * @param string  Key
	 * @param string  Value to append
	 * @param integer Lifetime in seconds (0 - immortal)
	 * @param mixed   Callback called when the request complete
	 * @return void
	 */
public function append($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L143
</md:method>

<md:method>
/**
	 * Prepends a string to the key's value
	 * @param string  Key
	 * @param string  Value to prepend
	 * @param integer Lifetime in seconds (0 - immortal)
	 * @param mixed   Callback called when the request complete
	 * @return void
	 */
public function prepend($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L165
</md:method>

<md:method>
/**
	 * Gets a statistics
	 * @param mixed  Callback called when the request complete
	 * @param string Server
	 * @return void
	 */
public function stats($onResponse, $server = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L185
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->