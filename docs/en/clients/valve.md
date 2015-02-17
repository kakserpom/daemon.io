### valve # Valve #> Valve {tpl-git PHPDaemon/Clients/Valve}

```php
namespace PHPDaemon\Clients\Valve;
```

<!-- include-namespace path="\PHPDaemon\Clients\Valve" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Valve/Connection.php}

```php
namespace PHPDaemon\Clients\Valve;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Properties

<md:prop>
/**
	 * @var integer Timeout
	 */
public $timeout = 1
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sends a request of type 'players'
	 * @param  callable $cb Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function requestPlayers($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L26
</md:method>

<md:method>
/**
	 * Sends a request of type 'info'
	 * @param  callable $cb Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function requestInfo($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L42
</md:method>

<md:method>
/**
	 * Sends a request
	 * @param  string   $type Type of request
	 * @param  string   $data Data
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function request($type, $data = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L54
</md:method>

<md:method>
/**
	 * Parses response to 'players' command into structure
	 * @param  string &$st Data
	 * @return array       Structure
	 */
public static function parsePlayers(&$st)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L125
</md:method>

<md:method>
/**
	 * Parses response to 'info' command into structure
	 * @param  string &$st  Data
	 * @param  string $type Type of request
	 * @return array        Structure
	 */
public static function parseInfo(&$st, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L158
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Valve/Pool.php}

```php
namespace PHPDaemon\Clients\Valve;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers (string|array = '127.0.0.1')`  
 Default servers

 - `:p`port (integer = 27015)`  
 Default port

 - `:p`maxconnperserv (integer = 32)`  
 Maximum connections per server

##### consts # Constants

<md:const>

const A2S_INFO = "\x54"
</md:const>

<md:const>

const S2A_INFO = "\x49"
</md:const>

<md:const>

const S2A_INFO_SOURCE = "\x6d"
</md:const>

<md:const>

const A2S_PLAYER = "\x55"
</md:const>

<md:const>

const S2A_PLAYER = "\x44"
</md:const>

<md:const>

const A2S_SERVERQUERY_GETCHALLENGE = "\x57"
</md:const>

<md:const>

const S2A_SERVERQUERY_GETCHALLENGE = "\x41"
</md:const>

<md:const>

const A2A_PING = "\x69"
</md:const>

<md:const>

const S2A_PONG = "\x6A"
</md:const>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sends a request
	 * @param  string   $addr Address
	 * @param  string   $type Type of request
	 * @param  string   $data Data
	 * @param  callable $cb Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function request($addr, $type, $data, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L30
</md:method>

<md:method>
/**
	 * Sends echo-request
	 * @param  string   $addr Address
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function ping($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L48
</md:method>

<md:method>
/**
	 * Sends a request of type 'info'
	 * @param  string   $addr Address
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function requestInfo($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L69
</md:method>

<md:method>
/**
	 * Sends a request of type 'players'
	 * @param  string   $addr Address
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function requestPlayers($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L80
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->