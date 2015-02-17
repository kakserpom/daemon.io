### socks # Socks #> Socks {tpl-git PHPDaemon/Servers/Socks}

<!-- include-namespace path="\PHPDaemon\Servers\Socks" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/Socks/Connection.php}

```php
namespace PHPDaemon\Servers\Socks;
class Connection extends \PHPDaemon\Network\Connection;
```

##### consts # Constants

<md:const>
@TODO DESCR
const STATE_ABORTED = 1
</md:const>

<md:const>
@TODO DESCR
const STATE_HANDSHAKED = 2
</md:const>

<md:const>
@TODO DESCR
const STATE_AUTHORIZED = 3
</md:const>

<md:const>
@TODO DESCR
const STATE_DATAFLOW = 4
</md:const>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when new data received.
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/Connection.php#L50
</md:method>

<md:method>
/**
	 * @TODO
	 * @param integer $code
	 * @param string  $addr
	 * @param integer $port
	 */
public function onSlaveReady($code, $addr, $port)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/Connection.php#L215
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/Connection.php#L239
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/Socks/Pool.php}

```php
namespace PHPDaemon\Servers\Socks;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = 'tcp://0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 1080)`  
 Listen port

 - `:p`auth (boolean = 0)`  
 Authentication required

 - `:p`username (string = 'User')`  
 User name

 - `:p`password (string = 'Password')`  
 Password

 - `:p`allowedclients (string = null)`  
 Allowed clients ip list

#### slave-connection # SlaveConnection {tpl-git PHPDaemon/Servers/Socks/SlaveConnection.php}

```php
namespace PHPDaemon\Servers\Socks;
class SlaveConnection extends \PHPDaemon\Servers\Socks\Connection;
```

##### methods # Methods

<md:method>
/**
	 * Set client
	 * @param  SocksServerConnection $client
	 * @return void
	 */
public function setClient($client)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/SlaveConnection.php#L15
</md:method>

<md:method>
/**
	 * Called when new data received.
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/SlaveConnection.php#L23
</md:method>

<md:method>
/**
	 * Event of Connection
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Socks/SlaveConnection.php#L36
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->