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
DESCR
const STATE_DATA = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var mixed current result
	 */
public $result
</md:prop>

<md:prop>
/**
	 * @var string flags of incoming value
	 */
public $valueFlags
</md:prop>

<md:prop>
/**
	 * @var integer length of incoming value
	 */
public $valueLength
</md:prop>

<md:prop>
/**
	 * @var string error message
	 */
public $error
</md:prop>

<md:prop>
/**
	 * @var string current incoming key
	 */
public $key
</md:prop>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Memcache/Pool.php}

```php
namespace PHPDaemon\Clients\Memcache;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers (string|array = 'tcp://127.0.0.1')`  
 Default servers

 - `:p`port (integer = 11211)`  
 Default port

 - `:p`maxconnperserv (integer = 32)`  
 Maximum connections per server

##### methods # Methods

<md:method>
/**
	 * Gets the key
	 * @param  string   $key        Key
	 * @param  callable $onResponse Callback called when response received
	 * @callback $onResponse ( )
	 * @return void
	 */
public function get($key, $onResponse)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L36
</md:method>

<md:method>
/**
	 * Sets the key
	 * @param  string   $key        Key
	 * @param  string   $value      Value
	 * @param  integer  $exp        Lifetime in seconds (0 - immortal)
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return void
	 */
public function set($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L49
</md:method>

<md:method>
/**
	 * Adds the key
	 * @param  string   $key        Key
	 * @param  string   $value      Value
	 * @param  integer  $exp        Lifetime in seconds (0 - immortal)
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return void
	 */
public function add($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L73
</md:method>

<md:method>
/**
	 * Deletes the key
	 * @param  string   $key        Key
	 * @param  callable $onResponse Callback called when the request complete
	 * @param  integer  $time       Time to block this key
	 * @callback $onResponse ( )
	 * @return void
	 */
public function delete($key, $onResponse = null, $time = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L95
</md:method>

<md:method>
/**
	 * Replaces the key
	 * @param  string   $key        Key
	 * @param  string   $value      Value
	 * @param  integer  $exp        Lifetime in seconds (0 - immortal)
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return void
	 */
public function replace($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L117
</md:method>

<md:method>
/**
	 * Appends a string to the key's value
	 * @param  string   $key        Key
	 * @param  string   $value      Value
	 * @param  integer  $exp        Lifetime in seconds (0 - immortal)
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return void
	 */
public function append($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L140
</md:method>

<md:method>
/**
	 * Prepends a string to the key's value
	 * @param  string   $key        Key
	 * @param  string   $value      Value
	 * @param  integer  $exp        Lifetime in seconds (0 - immortal)
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return void
	 */
public function prepend($key, $value, $exp = 0, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L163
</md:method>

<md:method>
/**
	 * Gets a statistics
	 * @param  callable $onResponse Callback called when the request complete
	 * @param  string   $server     Server
	 * @return void
	 */
public function stats($onResponse, $server = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Memcache/Pool.php#L183
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->