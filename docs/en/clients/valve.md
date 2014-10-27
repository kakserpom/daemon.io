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
/** @var int */
public $timeout = 1
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Sends a request of type 'players'
	 * @param callable $cb Callback
	 * @return void
	 */
public function requestPlayers($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L24
</md:method>

<md:method>
/**
	 * Sends a request of type 'info'
	 * @param callable $cb Callback
	 * @return void
	 */
public function requestInfo($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L39
</md:method>

<md:method>
/**
	 * Sends a request
	 * @param string   Type of request
	 * @param string   Data
	 * @param callable $cb Callback
	 * @param string $type
	 * @return void
	 */
public function request($type, $data = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L51
</md:method>

<md:method>
/**
	 * Parses response to 'players' command into structure
	 * @param &string Data
	 * @return array Structure
	 */
public static function parsePlayers(&$st)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L122
</md:method>

<md:method>
/**
	 * Parses response to 'info' command into structure
	 * @param &string Data
	 * @param string $type
	 * @return array Structure
	 */
public static function parseInfo(&$st, $type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Connection.php#L155
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Valve/Pool.php}

```php
namespace PHPDaemon\Clients\Valve;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers ('127.0.0.1')`  
 @todo add description strings

 - `:p`port (27015)`  
 

 - `:p`maxconnperserv (32)`  
 

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
	 * @param string   Address
	 * @param string   Type of request
	 * @param string   Data
	 * @param callable $cb Callback
	 * @param string $type
	 * @return void
	 */
public function request($addr, $type, $data, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L26
</md:method>

<md:method>
/**
	 * Sends echo-request
	 * @param string   Address
	 * @param callable $cb Callback
	 * @return void
	 */
public function ping($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L43
</md:method>

<md:method>
/**
	 * Sends a request of type 'info'
	 * @param string   Address
	 * @param callable $cb Callback
	 * @return void
	 */
public function requestInfo($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L63
</md:method>

<md:method>
/**
	 * Sends a request of type 'players'
	 * @param string   Address
	 * @param callable $cb Callback
	 * @return void
	 */
public function requestPlayers($addr, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Valve/Pool.php#L73
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->