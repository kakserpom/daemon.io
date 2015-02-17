### mongo # Mongo #> Mongo {tpl-git PHPDaemon/Clients/Mongo}

```php
namespace PHPDaemon\Clients\Mongo;
```

<!-- include-namespace path="\PHPDaemon\Clients\Mongo" level="" access="" -->
#### collection # Collection {tpl-git PHPDaemon/Clients/Mongo/Collection.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Collection;
```

##### properties # Properties

<md:prop>
/**
	 * @var Pool Related Pool object
	 */
public $pool
</md:prop>

<md:prop>
/**
	 * @var string Name of collection
	 */
public $name
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Contructor of MongoClientAsyncCollection
	 * @param  string $name Name of collection
	 * @param  Pool   $pool Pool
	 * @return void
	 */
public function __construct($name, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L29
</md:method>

<md:method>
/**
	 * Finds objects in collection
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function find($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L41
</md:method>

<md:method>
/**
	 * Finds objects in collection and fires callback when got all objects
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function findAll($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L53
</md:method>

<md:method>
/**
	 * Finds one object in collection
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset,  opts, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function findOne($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L65
</md:method>

<md:method>
/**
	 * Counts objects in collection
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, where, col)
	 * @callback $cb ( )
	 * @return void
	 */
public function count($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L77
</md:method>

<md:method>
/**
	 * Ensure index
	 * @param  array    $keys    Keys
	 * @param  array    $options Optional. Options
	 * @param  callable $cb      Optional. Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function ensureIndex($keys, $options = [], $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L90
</md:method>

<md:method>
/**
	 * Groupping function
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col, reduce, initial)
	 * @callback $cb ( )
	 * @return void
	 */
public function group($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L101
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param  array    $doc    Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return MongoId
	 */
public function insert($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L114
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param  array    $doc    Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return MongoId
	 */
public function insertOne($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L126
</md:method>

<md:method>
/**
	 * Inserts several documents
	 * @param  array    $docs   Array of docs
	 * @param  callable $cb     Optional. Callback called when response received.
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return array    IDs
	 */
public function insertMulti($docs, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L138
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  integer  $flags  Optional. Flags
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function update($cond, $data, $flags = 0, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L152
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function updateOne($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L166
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function updateMulti($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L179
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  boolean  $multi  Optional. Multi-flag
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function upsert($cond, $data, $multi = false, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L193
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function upsertOne($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L206
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function upsertMulti($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L219
</md:method>

<md:method>
/**
	 * Removes objects from collection
	 * @param  array    $cond   Conditions
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Params
	 * @callback $cb ( )
	 * @return void
	 */
public function remove($cond = [], $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L231
</md:method>

<md:method>
/**
	 * Evaluates a code on the server side
	 * @param  string   $code Code
	 * @param  callable $cb   Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L242
</md:method>

<md:method>
/**
	 * Aggregate
	 * @param  array    $p  Params
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L254
</md:method>

<md:method>
/**
	 * Generation autoincrement
	 * @param  callable $cb    Called when response received
	 * @param  boolean  $plain Plain?
	 * @callback $cb ( )
	 * @return void
	 */
public function autoincrement($cb, $plain = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L266
</md:method>

<md:method>
/**
	 * Generation autoincrement
	 * @param  array    $p  Params
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L286
</md:method>

<div class="clearboth"></div>

#### connection # Connection {tpl-git PHPDaemon/Clients/Mongo/Connection.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
@TODO DESCR
const STATE_PACKET = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var string Database name
	 */
public $dbname
</md:prop>

<md:prop>
/**
	 * @var array Active cursors
	 */
public $cursors = [ ]
</md:prop>

<md:prop>
/**
	 * @var array Pending requests
	 */
public $requests = [ ]
</md:prop>

<md:prop>
/**
	 * @var integer ID of the last request
	 */
public $lastReqId = 0
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO DESCR
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L63
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L101
</md:method>

<md:method>
/**
	 * onFinish
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L209
</md:method>

<div class="clearboth"></div>

#### connection-finished # ConnectionFinished {tpl-git PHPDaemon/Clients/Mongo/ConnectionFinished.php}

```php
namespace PHPDaemon\Clients\Mongo;
class ConnectionFinished extends \PHPDaemon\Exceptions\ConnectionFinished;
```

#### cursor # Cursor {tpl-git PHPDaemon/Clients/Mongo/Cursor.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Cursor;
```

##### properties # Properties

<md:prop>
/**
	 * @var mixed Cursor's ID
	 */
public $id
</md:prop>

<md:prop>
/**
	 * @var string Collection's name
	 */
public $col
</md:prop>

<md:prop>
/**
	 * @var array Array of objects
	 */
public $items = [ ]
</md:prop>

<md:prop>
/**
	 * @var mixed Current object
	 */
public $item
</md:prop>

<md:prop>
/**
	 * @var boolean Is this cursor finished?
	 */
public $finished = false
</md:prop>

<md:prop>
/**
	 * @var boolean Is this query failured?
	 */
public $failure = false
</md:prop>

<md:prop>
/**
	 * @var boolean awaitCapable?
	 */
public $await = false
</md:prop>

<md:prop>
/**
	 * @var boolean Is this cursor destroyed?
	 */
public $destroyed = false
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $parseOplog = false
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $tailable
</md:prop>

<md:prop>
/**
	 * @var callable
	 */
public $callback
</md:prop>

<md:prop>
/**
 */
public $counter = 0
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Error
	 * @return mixed
	 */
public function error()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L86
</md:method>

<md:method>
/**
	 * Keep
	 * @param  boolean $bool
	 * @return void
	 */
public function keep($bool = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L95
</md:method>

<md:method>
/**
	 * Rewind
	 * @return void
	 */
public function rewind()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L103
</md:method>

<md:method>
/**
	 * Current
	 * @return mixed
	 */
public function current()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L111
</md:method>

<md:method>
/**
	 * Key
	 * @return string
	 */
public function key()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L119
</md:method>

<md:method>
/**
	 * Next
	 * @return void
	 */
public function next()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L127
</md:method>

<md:method>
/**
	 * Grab
	 * @return array
	 */
public function grab()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L139
</md:method>

<md:method>
/**
	 * To array
	 * @return array
	 */
public function toArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L149
</md:method>

<md:method>
/**
	 * Valid
	 * @return boolean
	 */
public function valid()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L159
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return boolean
	 */
public function isBusyConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L168
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return Connection
	 */
public function getConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L179
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return boolean
	 */
public function isFinished()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L187
</md:method>

<md:method>
/**
	 * Constructor
	 * @param  string     $id   Cursor's ID
	 * @param  string     $col  Collection's name
	 * @param  Connection $conn Network connection (MongoClientConnection)
	 * @return void
	 */
public function __construct($id, $col, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L198
</md:method>

<md:method>
/**
	 * Asks for more objects
	 * @param  integer $number Number of objects
	 * @return void
	 */
public function getMore($number = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L209
</md:method>

<md:method>
/**
	 * isDead
	 * @return boolean
	 */
public function isDead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L222
</md:method>

<md:method>
/**
	 * Destroys the cursors
	 * @param  boolean $notify
	 * @return boolean Success
	 */
public function destroy($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L231
</md:method>

<md:method>
/**
	 * Destroys the cursors
	 * @param  boolean $notify
	 * @return boolean Success
	 */
public function free($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L250
</md:method>

<md:method>
/**
	 * Cursor's destructor. Sends a signal to the server
	 * @return void
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L258
</md:method>

<div class="clearboth"></div>

#### mongo-id # MongoId {tpl-git PHPDaemon/Clients/Mongo/MongoId.php}

```php
namespace PHPDaemon\Clients\Mongo;
class MongoId extends \MongoId;
```

##### methods # Methods

<md:method>
/**
	 * Import
	 * @param  mixed $id ID
	 * @return mixed
	 */
public static function import($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L19
</md:method>

<md:method>
/**
	 * @param string $id
	 */
public function __construct($id = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L53
</md:method>

<md:method>
/**
	 * __toString
	 * @return string
	 */
public function __toString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L69
</md:method>

<md:method>
/**
	 * toHex
	 * @return string
	 */
public function toHex()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L77
</md:method>

<md:method>
/**
	 * getPlainObject
	 * @return \MongoId
	 */
public function getPlainObject()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L85
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Mongo/Pool.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers (string|array = 'tcp://127.0.0.1')`  
 default server list

 - `:p`port (integer = 27017)`  
 default port

 - `:p`maxconnperserv (integer = 32)`  
 maxconnperserv

##### consts # Constants

<md:const>
@TODO DESCR
const OP_REPLY = 1
</md:const>

<md:const>
@TODO DESCR
const OP_MSG = 1000
</md:const>

<md:const>
@TODO DESCR
const OP_UPDATE = 2001
</md:const>

<md:const>
@TODO DESCR
const OP_INSERT = 2002
</md:const>

<md:const>
@TODO DESCR
const OP_QUERY = 2004
</md:const>

<md:const>
@TODO DESCR
const OP_GETMORE = 2005
</md:const>

<md:const>
@TODO DESCR
const OP_DELETE = 2006
</md:const>

<md:const>
@TODO DESCR
const OP_KILL_CURSORS = 2007
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * @var array Objects of MongoClientAsyncCollection
	 */
public $collections = [ ]
</md:prop>

<md:prop>
/**
	 * @var string Current database
	 */
public $dbname = ''
</md:prop>

<md:prop>
/**
	 * @var Connection Holds last used MongoClientAsyncConnection object
	 */
public $lastRequestConnection
</md:prop>

<md:prop>
/**
	 * @var object Object of MemcacheClient
	 */
public $cache
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO
	 * @param  array $o
	 * @return void
	 */
public static function safeModeEnc(&$o)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L107
</md:method>

<md:method>
/**
	 * Sets default database name
	 * @param  string  $name Database name
	 * @return boolean       Success
	 */
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L123
</md:method>

<md:method>
/**
	 * Generates auth. key
	 * @param  string $username Username
	 * @param  string $password Password
	 * @param  string $nonce    Nonce
	 * @return string           MD5 hash
	 */
public static function getAuthKey($username, $password, $nonce)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L136
</md:method>

<md:method>
/**
	 * Adds mongo server
	 * @param string  $url    URL
	 * @param integer $weight Weight
	 * @param mixed   $mock   @deprecated
	 * @return void
	 */
public function addServer($url, $weight = NULL, $mock = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L147
</md:method>

<md:method>
/**
	 * Gets the key
	 * @param  integer    $opcode Opcode (see constants above)
	 * @param  string     $data   Data
	 * @param  boolean    $reply  Is an answer expected?
	 * @param  Connection $conn   Connection. Optional
	 * @param  callable   $sentcb Sent callback
	 * @callback $sentcb ( )
	 * @throws ConnectionFinished
	 * @return void
	 */
public function request($opcode, $data, $reply = false, $conn = null, $sentcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L162
</md:method>

<md:method>
/**
	 * Finds objects in collection and fires callback when got all objects
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, await, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAll($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L219
</md:method>

<md:method>
/**
	 * Finds objects in collection
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, await, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function find($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L236
</md:method>

<md:method>
/**
	 * Finds one object in collection
	 * @param  array    $p  Hash of properties (offset,  opts, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findOne($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L336
</md:method>

<md:method>
/**
	 * Counts objects in collection
	 * @param  array    $p  Hash of properties (offset, limit, opts, where, col)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findCount($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L427
</md:method>

<md:method>
/**
	 * Sends authenciation packet
	 * @param  array    $p  Hash of properties (dbname, user, password, nonce)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function auth($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L504
</md:method>

<md:method>
/**
	 * Sends request of nonce
	 * @param  array    $p  Hash of properties
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function getNonce($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L545
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  array  $keys
	 * @return string
	 */
public function getIndexName($keys)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L579
</md:method>

<md:method>
/**
	 * Ensure index
	 * @param  string   $ns      Collection
	 * @param  array    $keys    Keys
	 * @param  array    $options Optional. Options
	 * @param  callable $cb      Optional. Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function ensureIndex($ns, $keys, $options = [], $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L598
</md:method>

<md:method>
/**
	 * Gets last error
	 * @param  string     $db     Dbname
	 * @param  callable   $cb     Callback called when response received
	 * @param  array      $params Parameters.
	 * @param  Connection $conn   Connection. Optional
	 * @callback $cb ( )
	 * @return void
	 */
public function lastError($db, $cb, $params = [], $conn = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L632
</md:method>

<md:method>
/**
	 * Find objects in collection using min/max specifiers
	 * @param  array    $p  Hash of properties (offset, limit, opts, where, col, min, max)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function range($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L664
</md:method>

<md:method>
/**
	 * Evaluates a code on the server side
	 * @param  string   $code Code
	 * @param  callable $cb   Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L748
</md:method>

<md:method>
/**
	 * Returns distinct values of the property
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col, where)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function distinct($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L795
</md:method>

<md:method>
/**
	 * Find and modify
	 * @param  array    $p  Hash of properties
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L905
</md:method>

<md:method>
/**
	 * Groupping function
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col, reduce, initial)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function group($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L972
</md:method>

<md:method>
/**
	 * Aggregate function
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1039
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  integer  $flags  Optional. Flags
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function update($col, $cond, $data, $flags = 0, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1088
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function updateOne($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1131
</md:method>

<md:method>
/**
	 * Updates several objects in collection
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function updateMulti($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1145
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  boolean  $multi  Optional. Multi
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function upsert($col, $cond, $data, $multi = false, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1160
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function upsertOne($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1174
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists, insert if not exists)
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  array    $data   Data
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function upsertMulti($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1188
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param  string   $col    Collection's name
	 * @param  array    $doc    Document
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return MongoId
	 */
public function insert($col, $doc = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1201
</md:method>

<md:method>
/**
	 * Sends a request to kill certain cursors on the server side
	 * @param  array      $cursors Array of cursors
	 * @param  Connection $conn    Connection
	 * @return void
	 */
public function killCursors($cursors = [], $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1240
</md:method>

<md:method>
/**
	 * Inserts several documents
	 * @param  string   $col    Collection's name
	 * @param  array    $docs   Array of docs
	 * @param  callable $cb     Optional. Callback
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return array IDs
	 */
public function insertMulti($col, $docs = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1257
</md:method>

<md:method>
/**
	 * Remove objects from collection
	 * @param  string   $col    Collection's name
	 * @param  array    $cond   Conditions
	 * @param  callable $cb     Optional. Callback called when response received
	 * @param  array    $params Optional. Parameters
	 * @callback $cb ( )
	 * @return void
	 */
public function remove($col, $cond = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1302
</md:method>

<md:method>
/**
	 * Asks for more objects
	 * @param  string     $col    Collection's name
	 * @param  string     $id     Cursor's ID
	 * @param  integer    $number Number of objects
	 * @param  Connection $conn   Connection
	 * @return void
	 */
public function getMore($col, $id, $number, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1345
</md:method>

<md:method>
/**
	 * Returns an object of collection
	 * @param  string $col Collection's name
	 * @return Collection
	 */
public function getCollection($col)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1369
</md:method>

<md:method>
/**
	 * Magic getter-method. Proxy for getCollection
	 * @param  string $name Collection's name
	 * @return Collection
	 */
public function __get($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1389
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->