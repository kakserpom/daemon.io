### client # Client #> Client {tpl-git PHPDaemon/Network/Client.php}

```php:p
namespace PHPDaemon\Network;
abstract class Client extends [Pool](#../pool);
```

@TODO

<!-- include-namespace path="\PHPDaemon\Network\Client" level="" access="" -->
#### options # Options

 - `:p`expose (boolean = 1)`  
 Expose?

 - `:p`servers (string|array = '127.0.0.1')`  
 Default servers

 - `:p`server (string = '127.0.0.1')`  
 Default server

 - `:p`maxconnperserv (integer = 32)`  
 Maximum connections per server

#### methods # Methods

<md:method>
/**
	 * Adds server
	 * @param  string  $url    Server URL
	 * @param  integer $weight Weight
	 * @return void
	 */
public function addServer($url, $weight = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L106
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  string   $url Address
	 * @param  callback $cb  onConnected
	 * @param  integer  $pri Optional. Priority
	 * @call   ( callable $cb )
	 * @call   ( string $url = null, callable $cb = null, integer $pri = 0 )
	 * @return boolean       Success|Connection
	 */
public function getConnection($url = null, $cb = null, $pri = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L119
</md:method>

<md:method>
/**
	 * Detach Connection
	 * @param  object $conn Connection
	 * @return void
	 */
public function detach($conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L186
</md:method>

<md:method>
/**
	 * Mark connection as free
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function markConnFree(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L197
</md:method>

<md:method>
/**
	 * Mark connection as busy
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function markConnBusy(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L210
</md:method>

<md:method>
/**
	 * Detaches connection from URL
	 * @param  ClientConnection $conn Connection
	 * @param  string           $url  URL
	 * @return void
	 */
public function detachConnFromUrl(ClientConnection $conn, $url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L223
</md:method>

<md:method>
/**
	 * Touch pending "requests for connection"
	 * @param  string $url URL
	 * @return void
	 */
public function touchPending($url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L237
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by key
	 * @param  string   $key Key
	 * @param  callable $cb  Callback
	 * @callback $cb ( )
	 * @return boolean       Success
	 */
public function getConnectionByKey($key, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L252
</md:method>

<md:method>
/**
	 * Returns available connection from the pool
	 * @param  callable $cb Callback
	 * @callback $cb ( )
	 * @return boolean      Success
	 */
public function getConnectionRR($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L277
</md:method>

<md:method>
/**
	 * Sends a request to arbitrary server
	 * @param  string   $server     Server
	 * @param  string   $data       Data
	 * @param  callable $onResponse Called when the request complete
	 * @callback $onResponse ( )
	 * @return boolean              Success
	 */
public function requestByServer($server, $data, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L289
</md:method>

<md:method>
/**
	 * Sends a request to server according to the key
	 * @param  string   $key        Key
	 * @param  string   $data       Data
	 * @param  callable $onResponse Callback called when the request complete
	 * @callback $onResponse ( )
	 * @return boolean              Success
	 */
public function requestByKey($key, $data, $onResponse = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L308
</md:method>

<md:method>
/**
	 * Called when application instance is going to shutdown
	 * @param  boolean $graceful Graceful?
	 * @return boolean           Ready to shutdown?
	 */
public function onShutdown($graceful = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Network/Client.php#L324
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
