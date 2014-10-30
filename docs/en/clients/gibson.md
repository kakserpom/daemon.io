### gibson # Gibson #> Gibson {tpl-git PHPDaemon/Clients/Gibson}

```php
namespace PHPDaemon\Clients\Gibson;
```

<!-- include-namespace path="\PHPDaemon\Clients\Gibson" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Gibson/Connection.php}

```php
namespace PHPDaemon\Clients\Gibson;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
Generic error while executing the query.
const REPL_ERR = 0x00
</md:const>

<md:const>
Specified key was not found.
const REPL_ERR_NOT_FOUND = 0x01
</md:const>

<md:const>
Expected a number ( TTL or TIME ) but the specified value was invalid.
const REPL_ERR_NAN = 0x02
</md:const>

<md:const>
The server reached configuration memory limit and will not accept any new value until its freeing routine will be executed.
const REPL_ERR_MEM = 0x03
</md:const>

<md:const>
The specificed key was locked by a OP_LOCK or a OP_MLOCK query.
const REPL_ERR_LOCKED = 0x04
</md:const>

<md:const>
Query succesfully executed, no data follows.
const REPL_OK = 0x05
</md:const>

<md:const>
Query succesfully executed, value data follows.
const REPL_VAL = 0x06
</md:const>

<md:const>
Query succesfully executed, multiple key => value data follows.
const REPL_KVAL = 0x07
</md:const>

<md:const>

const STATE_PACKET_HDR = 0x01
</md:const>

<md:const>

const STATE_PACKET_DATA = 0x02
</md:const>

<md:const>
Raw string data follows.
const GB_ENC_PLAIN = 0x00
</md:const>

<md:const>
Compressed data, this is a reserved value not used for replies.
const GB_ENC_LZF = 0x01
</md:const>

<md:const>
Packed long number follows, four bytes for 32bit architectures, eight bytes for 64bit.
const GB_ENC_NUMBER = 0x02
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var string error message
	 */
public $error
</md:prop>

<md:prop>
/**
 */
public $responseCode
</md:prop>

<md:prop>
/**
 */
public $encoding
</md:prop>

<md:prop>
/**
 */
public $responseLength
</md:prop>

<md:prop>
/**
 */
public $result
</md:prop>

<md:prop>
/**
 */
public $isFinal = false
</md:prop>

<md:prop>
/**
 */
public $totalNum
</md:prop>

<md:prop>
/**
 */
public $readedNum
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L98
</md:method>

<md:method>
/**
	 * @TODO isFinal
	 * @return boolean
	 */
public function isFinal()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L107
</md:method>

<md:method>
/**
	 * @TODO getTotalNum
	 * @return integer
	 */
public function getTotalNum()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L115
</md:method>

<md:method>
/**
	 * @TODO getReadedNum
	 * @return integer
	 */
public function getReadedNum()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L123
</md:method>

<md:method>
/**
	 * @TODO getResponseCode
	 * @return integer
	 */
public function getResponseCode()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L131
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Gibson/Pool.php}

```php
namespace PHPDaemon\Clients\Gibson;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers (string|array = 'unix:///var/run/gibson.sock')`  
 Default servers

 - `:p`port (integer = 10128)`  
 Default port

 - `:p`maxconnperserv (integer = 32)`  
 Maximum connections per server

 - `:p`max-allowed-packet (integer = '1M')`  
 Maximum allowed size of packet

##### methods # Methods

<md:method>
/**
	 * Magic __call
	 * Example:
	 * $gibson->set(3600, 'key', 'value');
	 * $gibson->get('key', function ($conn) {...});
	 * @param  string $name    Command name
	 * @param  array  ...$args Arguments
	 * @usage $ .. Command-dependent set of arguments ..
	 * @usage $ [callback Callback. Optional.
	 * @return void
	 */
public function __call($name, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Pool.php#L62
</md:method>

<md:method>
/**
	 * Is command?
 	 * @param  string $name Command
	 * @return boolean
	 */
public function isCommand($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Pool.php#L80
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->