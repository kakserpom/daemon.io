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
	 * Protocol version
	 * @var string
	 */
public $protover = '3.0'
</md:prop>

<md:prop>
/**
	 * Maximum packet size
	 * @var integer
	 */
public $maxPacketSize = 16777216
</md:prop>

<md:prop>
/**
	 * Charset number
	 * @var integer
	 */
public $charsetNumber = 8
</md:prop>

<md:prop>
/**
	 * Database name
	 * @var string
	 */
public $dbname = ''
</md:prop>

<md:prop>
/**
	 * Default options
	 * @var string
	 */
public $options = ''
</md:prop>

<md:prop>
/**
	 * Connection's state. 0 - start,  1 - got initial packet,  2 - auth. packet sent,  3 - auth. error,  4 - handshaked OK
	 * @var integer
	 */
public $state = 0
</md:prop>

<md:prop>
/**
	 * State of pointer of incoming data. 0 - Result Set Header Packet,  1 - Field Packet,  2 - Row Packet
	 * @var string
	 */
public $instate = 0
</md:prop>

<md:prop>
/**
	 * Resulting rows
	 * @var array
	 */
public $resultRows = [ ]
</md:prop>

<md:prop>
/**
	 * Resulting fields
	 * @var array
	 */
public $resultFields = [ ]
</md:prop>

<md:prop>
/**
	 * Equals to INSERT_ID().
	 * @var string
	 */
public $insertId
</md:prop>

<md:prop>
/**
	 * Inserted rows number
	 * @var integer
	 */
public $insertNum
</md:prop>

<md:prop>
/**
	 * Number of affected rows
	 * @var integer
	 */
public $affectedRows
</md:prop>

<md:prop>
/**
	 * Runtime parameters from server
	 * @var array
	 */
public $parameters = [ ]
</md:prop>

<md:prop>
/**
	 * Backend key
	 * @var string
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L123
</md:method>

<md:method>
/**
	 * Executes the given callback when/if the connection is handshaked.
	 * Callback.
	 * @return void
	 */
public function onConnected($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L148
</md:method>

<md:method>
/**
	 * Converts binary string to integer
	 * @param string  Binary string
	 * @param boolean Optional. Little endian. Default value - true.
	 * @return integer Resulting integer
	 */
public function bytes2int($str, $l = TRUE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L169
</md:method>

<md:method>
/**
	 * Converts integer to binary string
	 * @param integer Length
	 * @param integer Integer
	 * @param boolean Optional. Little endian. Default value - true.
	 * @return string Resulting binary string
	 */
function int2bytes($len, $int = 0, $l = TRUE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L191
</md:method>

<md:method>
/**
	 * Send a packet
	 * @param string Data
	 * @return boolean Success
	 */
public function sendPacket($type = '', $packet)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L218
</md:method>

<md:method>
/**
	 * Builds length-encoded binary string
	 * @param string String
	 * @return string Resulting binary string
	 */
public function buildLenEncodedBinary($s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L236
</md:method>

<md:method>
/**
	 * Parses length-encoded binary
	 * @param string Reference to source string
	 * @return integer Result
	 */
public function parseEncodedBinary(&$s, &$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L263
</md:method>

<md:method>
/**
	 * Parse length-encoded string
	 * @param string  Reference to source string
	 * @param integer Reference to pointer
	 * @return integer Result
	 */
public function parseEncodedString(&$s, &$p)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L305
</md:method>

<md:method>
/**
	 * Send SQL-query
	 * @param string $q  Query
	 * @param callable $callback Optional. Callback called when response received.
	 * @return boolean Success
	 */
public function query($q, $callback = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L327
</md:method>

<md:method>
/**
	 * Send echo-request
	 * @param callback Optional. Callback called when response received
	 * @return boolean Success
	 */
public function ping($callback = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L336
</md:method>

<md:method>
/**
	 * Sends sync-request
	 * @param callback Optional. Callback called when response received.
	 * @return boolean Success
	 */
public function sync($cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L346
</md:method>

<md:method>
/**
	 * Send terminate-request to shutdown the connection
	 * @return boolean Success
	 */
public function terminate($cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L354
</md:method>

<md:method>
/**
	 * Sends arbitrary command
	 * @param integer  Command's code. See constants above.
	 * @param string   Data
	 * @param callback Optional. Callback called when response received.
	 * @return boolean Success
	 */
public function command($cmd, $q = '', $cb = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L365
</md:method>

<md:method>
/**
	 * Set default database name
	 * @param string Database name
	 * @return boolean Success
	 */
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L381
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @param string New data
	 * @return void
	 */
public function stdin($buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L396
</md:method>

<md:method>
/**
	 * Decode strings from the NUL-terminated representation
	 * @param string    Binary data
	 * @param integer   Optional. Limit of count. Default is 1.
	 * @param reference Optional. Pointer.
	 * @return array Decoded strings
	 */
public function decodeNULstrings($data, $limit = 1, &$p = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L650
</md:method>

<md:method>
/**
	 * Called when the whole result received
	 * @return void
	 */
public function onResultDone()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L672
</md:method>

<md:method>
/**
	 * Called when error occured
	 * @return void
	 */
public function onError()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/PostgreSQL/Connection.php#L687
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

 - `:p`server ('tcp://root@127.0.0.1')`  
 default server

 - `:p`port (5432)`  
 default port

 - `:p`protologging (0)`  
 @todo add description

 - `:p`enable (0)`  
 disabled by default


<!--/ include-namespace -->