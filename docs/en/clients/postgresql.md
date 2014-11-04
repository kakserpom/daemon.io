### postgresql # PostgreSQL #> PostgreSQL {tpl-git PHPDaemon/Clients/PostgreSQL}

```php
namespace PHPDaemon\Clients\PostgreSQL;
```

<!-- include-namespace path="\PHPDaemon\Clients\PostgreSQL" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/PostgreSQL/Connection.php}

```php
namespace PHPDaemon\Clients\PostgreSQL;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
State: authentication packet sent
const STATE_AUTH_PACKET_SENT = 2
</md:const>

<md:const>
State: authencation error
const STATE_AUTH_ERROR = 3
</md:const>

<md:const>
State: authentication passed
const STATE_AUTH_OK = 4
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var string Protocol version
	 */
public $protover = '3.0'
</md:prop>

<md:prop>
/**
	 * @var integer Maximum packet size
	 */
public $maxPacketSize = 16777216
</md:prop>

<md:prop>
/**
	 * @var integer Charset number
	 */
public $charsetNumber = 8
</md:prop>

<md:prop>
/**
	 * @var string Database name
	 */
public $dbname = ''
</md:prop>

<md:prop>
/**
	 * @var string Default options
	 */
public $options = ''
</md:prop>

<md:prop>
/**
	 * @var integer Connection's state. 0 - start,  1 - got initial packet,  2 - auth. packet sent,  3 - auth. error,  4 - handshaked OK
	 */
public $state = 0
</md:prop>

<md:prop>
/**
	 * @var string State of pointer of incoming data. 0 - Result Set Header Packet,  1 - Field Packet,  2 - Row Packet
	 */
public $instate = 0
</md:prop>

<md:prop>
/**
	 * @var array Resulting rows
	 */
public $resultRows = [ ]
</md:prop>

<md:prop>
/**
	 * @var array Resulting fields
	 */
public $resultFields = [ ]
</md:prop>

<md:prop>
/**
	 * @var string Equals to INSERT_ID().
	 */
public $insertId
</md:prop>

<md:prop>
/**
	 * @var integer Inserted rows number
	 */
public $insertNum
</md:prop>

<md:prop>
/**
	 * @var integer Number of affected rows
	 */
public $affectedRows
</md:prop>

<md:prop>
/**
	 * @var array Runtime parameters from server
	 */
public $parameters = [ ]
</md:prop>

<md:prop>
/**
	 * @var string Backend key
	 */
public $backendKey
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the connection is ready to accept new data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L110
</md:method>

<md:method>
/**
	 * Executes the given callback when/if the connection is handshaked.
	 * @param  callable $cb Callback
	 * @callback $cb ( )
	 * @return void
	 */
public function onConnected($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L136
</md:method>

<md:method>
/**
	 * Converts binary string to integer
	 * @param  string  $str Binary string
	 * @param  boolean $l   Optional. Little endian. Default value - true.
	 * @return integer      Resulting integer
	 */
public function bytes2int($str, $l = TRUE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L157
</md:method>

<md:method>
/**
	 * Converts integer to binary string
	 * @param  integer $len Length
	 * @param  integer $int Integer
	 * @param  boolean $l   Optional. Little endian. Default value - true.
	 * @return string       Resulting binary string
	 */
function int2bytes($len, $int = 0, $l = TRUE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L179
</md:method>

<md:method>
/**
	 * Send a packet
	 * @param  string  $type   Data
	 * @param  string  $packet Packet
	 * @return boolean         Success
	 */
public function sendPacket($type = '', $packet)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L207
</md:method>

<md:method>
/**
	 * Builds length-encoded binary string
	 * @param  string $s String
	 * @return string    Resulting binary string
	 */
public function buildLenEncodedBinary($s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L225
</md:method>

<md:method>
/**
	 * Parses length-encoded binary
	 * @param  string  &$s Reference to source string
	 * @param  integer &$p
	 * @return integer     Result
	 */
public function parseEncodedBinary(&$s, &$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L253
</md:method>

<md:method>
/**
	 * Parse length-encoded string
	 * @param  string  &$s Reference to source string
	 * @param  integer &$p Reference to pointer
	 * @return integer     Result
	 */
public function parseEncodedString(&$s, &$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L295
</md:method>

<md:method>
/**
	 * Send SQL-query
	 * @param  string   $q        Query
	 * @param  callable $callback Optional. Callback called when response received.
	 * @callback $callback ( )
	 * @return boolean            Success
	 */
public function query($q, $callback = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L318
</md:method>

<md:method>
/**
	 * Send echo-request
	 * @param  callable $callback Optional. Callback called when response received
	 * @callback $callback ( )
	 * @return boolean Success
	 */
public function ping($callback = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L328
</md:method>

<md:method>
/**
	 * Sends sync-request
	 * @param  callable $cb Optional. Callback called when response received.
	 * @callback $cb ( )
	 * @return boolean Success
	 */
public function sync($cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L339
</md:method>

<md:method>
/**
	 * Send terminate-request to shutdown the connection
	 * @param  callable $cb Optional. Callback called when response received.
	 * @callback $cb ( )
	 * @return boolean Success
	 */
public function terminate($cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L349
</md:method>

<md:method>
/**
	 * Sends arbitrary command
	 * @param  integer  $cmd Command's code. See constants above.
	 * @param  string   $q   Data
	 * @param  callable $cb  Optional. Callback called when response received.
	 * @callback $cb ( )
	 * @return boolean Success
	 */
public function command($cmd, $q = '', $cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L361
</md:method>

<md:method>
/**
	 * Set default database name
	 * @param  string  $name Database name
	 * @return boolean       Success
	 */
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L377
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @param  string $buf New data
	 * @return void
	 */
public function stdin($buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L392
</md:method>

<md:method>
/**
	 * Decode strings from the NUL-terminated representation
	 * @param  string    $data  Binary data
	 * @param  integer   $limit Optional. Limit of count. Default is 1.
	 * @param  reference &$p    Optional. Pointer.
	 * @return array            Decoded strings
	 */
public function decodeNULstrings($data, $limit = 1, &$p = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L646
</md:method>

<md:method>
/**
	 * Called when the whole result received
	 * @return void
	 */
public function onResultDone()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L668
</md:method>

<md:method>
/**
	 * Called when error occured
	 * @return void
	 */
public function onError()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L683
</md:method>

<div class="clearboth"></div>

#### connection-finished # ConnectionFinished {tpl-git PHPDaemon/Clients/PostgreSQL/ConnectionFinished.php}

```php
namespace PHPDaemon\Clients\PostgreSQL;
class ConnectionFinished extends \PHPDaemon\Exceptions\ConnectionFinished;
```

#### pool # Pool {tpl-git PHPDaemon/Clients/PostgreSQL/Pool.php}

```php
namespace PHPDaemon\Clients\PostgreSQL;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`server (array|string = 'tcp://root@127.0.0.1')`  
 default server

 - `:p`port (integer = 5432)`  
 default port

 - `:p`protologging (integer = 0)`  
 @todo

 - `:p`enable (integer = 0)`  
 disabled by default


<!--/ include-namespace -->