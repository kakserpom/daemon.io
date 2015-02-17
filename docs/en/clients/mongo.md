### mongo # Mongo #> Mongo {tpl-git PHPDaemon/Clients/Mongo}

```php
namespace PHPDaemon\Clients\Mongo;
```

<!-- include-namespace path="\PHPDaemon\Clients\Mongo" level="" access="" -->
#### mongo-id # MongoId {tpl-git PHPDaemon/Clients/Mongo/MongoId.php}

```php
namespace PHPDaemon\Clients\Mongo;
class MongoId extends \MongoId;
```

##### methods # Methods

<md:method>
/**
 */
public static function import($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L7
</md:method>

<md:method>
/**
	 * @param string $id
	 */
public function __construct($id = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L41
</md:method>

<md:method>
/**
 */
public function __toString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L52
</md:method>

<md:method>
/**
 */
public function toHex()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L55
</md:method>

<md:method>
/**
 */
public function getPlainObject()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L59
</md:method>

<div class="clearboth"></div>

#### connection-finished # ConnectionFinished {tpl-git PHPDaemon/Clients/Mongo/ConnectionFinished.php}

```php
namespace PHPDaemon\Clients\Mongo;
class ConnectionFinished extends \PHPDaemon\Exceptions\ConnectionFinished;
```

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
/** @var */
public $dbname
</md:prop>

<md:prop>
/** @var array */
public $cursors = [ ]
</md:prop>

<md:prop>
/** @var array */
public $requests = [ ]
</md:prop>

<md:prop>
/** @var int */
public $lastReqId = 0
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO DESCR
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L35
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L73
</md:method>

<md:method>
/**
 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L179
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Mongo/Pool.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Pool extends \PHPDaemon\Network\Client;
```

Class Pool

##### options # Options

 - `:p`servers ('tcp://127.0.0.1')`  
 default server list

 - `:p`port (27017)`  
 default port

 - `:p`maxconnperserv (32)`  
 

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
/** @var array */
public $collections = [ ]
</md:prop>

<md:prop>
/** @var string */
public $dbname = ''
</md:prop>

<md:prop>
/** @var */
public $lastRequestConnection
</md:prop>

<md:prop>
/** @var */
public $cache
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
 */
public static function safeModeEnc(&$o)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L80
</md:method>

<md:method>
/**
	 * Sets default database name
	 * @param string Database name
	 * @return boolean Success
	 */
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L96
</md:method>

<md:method>
/**
	 * Generates auth. key
	 * @param string Username
	 * @param string Password
	 * @param string nonce
	 * @return string MD5 hash
	 */
public static function getAuthKey($username, $password, $nonce)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L109
</md:method>

<md:method>
/**
	 * Adds mongo server
	 * @param string  URL
	 * @param integer Weight
	 * @return void
	 */
public function addServer($url, $weight = NULL, $mock = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L119
</md:method>

<md:method>
/**
	 * Gets the key
	 * @param integer Opcode (see constants above)
	 * @param string  Data
	 * @param boolean Is an answer expected?
	 * @param object  Connection. Optional.
	 * @param callable Sent callback
	 * @param integer $opcode
	 * @param string $data
	 * @param \Closure $sentcb
	 * @return void
	 * @throws ConnectionFinished
	 */
public function request($opcode, $data, $reply = false, $conn = null, $sentcb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L136
</md:method>

<md:method>
/**
	 * Finds objects in collection and fires callback when got all objects
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  await, where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function findAll($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L191
</md:method>

<md:method>
/**
	 * Finds objects in collection
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  await, where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function find($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L207
</md:method>

<md:method>
/**
	 * Finds one object in collection
	 * @param array Hash of properties (offset,   opts,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function findOne($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L306
</md:method>

<md:method>
/**
	 * Counts objects in collection
	 * @param array Hash of properties (offset,  limit,  opts,  where,  col)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function findCount($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L396
</md:method>

<md:method>
/**
	 * Sends authenciation packet
	 * @param array  Hash of properties (dbname,  user,  password,  nonce)
	 * @param mixed  Callback called when response received
	 * @param string Optional. Distribution key
	 * @return void
	 */
public function auth($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L473
</md:method>

<md:method>
/**
	 * Sends request of nonce
	 * @return void
	 */
public function getNonce($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L511
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array $keys
	 * @return string
	 */
public function getIndexName($keys)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L545
</md:method>

<md:method>
/**
	 * Ensure index
	 * @param string Collection
	 * @param array  Keys
	 * @param array  Optional. Options
	 * @param mixed  Optional. Callback called when response received
	 * @param string $ns
	 * @return void
	 */
public function ensureIndex($ns, $keys, $options = [], $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L564
</md:method>

<md:method>
/**
	 * Gets last error
	 * @param string Dbname
	 * @param mixed  Callback called when response received
	 * @param array  Parameters.
	 * @param object Connection. Optional.
	 * @return void
	 */
public function lastError($db, $cb, $params = [], $conn = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L597
</md:method>

<md:method>
/**
	 * Find objects in collection using min/max specifiers
	 * @param array Hash of properties (offset,  limit,  opts,  where,  col,  min,  max)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function range($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L628
</md:method>

<md:method>
/**
	 * Evaluates a code on the server side
	 * @param string Code
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L711
</md:method>

<md:method>
/**
	 * Returns distinct values of the property
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col, where)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function distinct($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L757
</md:method>

<md:method>
/**
	 * Find and modify
	 * @param array Hash of properties
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L856
</md:method>

<md:method>
/**
	 * Groupping function
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col,  reduce,  initial)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function group($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L922
</md:method>

<md:method>
/**
	 * Aggregate function
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L988
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param string   Collection's name
	 * @param array    Conditions
	 * @param array    Data
	 * @param integer  Optional. Flags.
	 * @param callback Callback (getLastError)
	 * @param array    Parameters (getLastError).
	 * @param string $col
	 * @return void
	 */
public function update($col, $cond, $data, $flags = 0, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1037
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param string   Collection's name
	 * @param array    Conditions
	 * @param array    Data
	 * @param callback Callback (getLastError)
	 * @param array    Parameters (getLastError).
	 * @param string $col
	 * @return void
	 */
public function updateOne($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1080
</md:method>

<md:method>
/**
	 * Updates several objects in collection
	 * @param string   Collection's name
	 * @param array    Conditions
	 * @param array    Data
	 * @param callback Callback
	 * @param array    Parameters (getLastError).
	 * @param string $col
	 * @return void
	 */
public function updateMulti($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1094
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param string  Collection's name
	 * @param array   Conditions
	 * @param array   Data
	 * @param array	  Parameters.
	 * @param string $col
	 * @return void
	 */
public function upsert($col, $cond, $data, $multi = false, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1107
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param string  Collection's name
	 * @param array   Conditions
	 * @param array   Data
	 * @param array	  Parameters.
	 * @param string $col
	 * @return void
	 */
public function upsertOne($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1120
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param string  Collection's name
	 * @param array   Conditions
	 * @param array   Data
	 * @param array	  Parameters.
	 * @param string $col
	 * @return void
	 */
public function upsertMulti($col, $cond, $data, $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1133
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param string   Collection's name
	 * @param array    Data
	 * @param callback Callback (getLastError)
	 * @param array    Parameters (getLastError).
	 * @param string $col
	 * @return MongoId
	 */
public function insert($col, $doc = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1146
</md:method>

<md:method>
/**
	 * Sends a request to kill certain cursors on the server side
	 * @param array Array of cursors
	 * @param object Connection
	 * @return void
	 */
public function killCursors($cursors = [], $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1185
</md:method>

<md:method>
/**
	 * Inserts several documents
	 * @param string Collection's name
	 * @param array  Array of docs
	 * @param string $col
	 * @return array IDs
	 */
public function insertMulti($col, $docs = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1200
</md:method>

<md:method>
/**
	 * Remove objects from collection
	 * @param string Collection's name
	 * @param array  Conditions
	 * @param mixed  Optional. Callback called when response received.
	 * @param string $col
	 * @return void
	 */
public function remove($col, $cond = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1244
</md:method>

<md:method>
/**
	 * Asks for more objects
	 * @param string  Collection's name
	 * @param string  Cursor's ID
	 * @param integer Number of objects
	 * @param object Connection
	 * @return void
	 */
public function getMore($col, $id, $number, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1287
</md:method>

<md:method>
/**
	 * Returns an object of collection
	 * @param string Collection's name
	 * @return Collection
	 */
public function getCollection($col)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1311
</md:method>

<md:method>
/**
	 * Magic getter-method. Proxy for getCollection.
	 * @param string Collection's name
	 * @return Collection
	 */
public function __get($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1331
</md:method>

<div class="clearboth"></div>

#### cursor # Cursor {tpl-git PHPDaemon/Clients/Mongo/Cursor.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Cursor;
```

##### properties # Properties

<md:prop>
/** @var mixed Cursor's ID */
public $id
</md:prop>

<md:prop>
/** @var Collection's name */
public $col
</md:prop>

<md:prop>
/** @var array Array of objects */
public $items = [ ]
</md:prop>

<md:prop>
/** @var mixed Current object */
public $item
</md:prop>

<md:prop>
/** @var bool Is this cursor finished? */
public $finished = false
</md:prop>

<md:prop>
/** @var bool Is this query failured? */
public $failure = false
</md:prop>

<md:prop>
/** @var bool awaitCapable? */
public $await = false
</md:prop>

<md:prop>
/** @var bool Is this cursor destroyed? */
public $destroyed = false
</md:prop>

<md:prop>
/** @var bool */
public $parseOplog = false
</md:prop>

<md:prop>
/** @var */
public $tailable
</md:prop>

<md:prop>
/** @var */
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
 */
public function error()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L41
</md:method>

<md:method>
/**
 */
public function keep($bool = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L44
</md:method>

<md:method>
/**
 */
public function rewind()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L47
</md:method>

<md:method>
/**
 */
public function current()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L51
</md:method>

<md:method>
/**
 */
public function key()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L55
</md:method>

<md:method>
/**
 */
public function next()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L59
</md:method>

<md:method>
/**
 */
public function grab()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L67
</md:method>

<md:method>
/**
 */
public function toArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L73
</md:method>

<md:method>
/**
 */
public function valid()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L79
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return bool
	 */
public function isBusyConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L88
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return mixed
	 */
public function getConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L99
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return bool
	 */
public function isFinished()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L107
</md:method>

<md:method>
/**
	 * Constructor
	 * @param string Cursor's ID
	 * @param string Collection's name
	 * @param object Network connection (MongoClientConnection),
	 * @param string $id
	 * @param Connection $conn
	 * @return void
	 */
public function __construct($id, $col, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L120
</md:method>

<md:method>
/**
	 * Asks for more objects
	 * @param integer Number of objects
	 * @return void
	 */
public function getMore($number = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L131
</md:method>

<md:method>
/**
 */
public function isDead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L140
</md:method>

<md:method>
/**
	 * Destroys the cursors
	 * @return boolean Success
	 */
public function destroy($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L148
</md:method>

<md:method>
/**
 */
public function free($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L162
</md:method>

<md:method>
/**
	 * Cursor's destructor. Sends a signal to the server.
	 * @return void
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L170
</md:method>

<div class="clearboth"></div>

#### collection # Collection {tpl-git PHPDaemon/Clients/Mongo/Collection.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Collection;
```

##### properties # Properties

<md:prop>
/** Related Pool object
	 * @var Pool
	 */
public $pool
</md:prop>

<md:prop>
/** Name of collection.
	 * @var string
	 */
public $name
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Contructor of MongoClientAsyncCollection
	 * @param string Name of collection
	 * @param object Pool
	 * @param Pool $pool
	 * @return void
	 */
public function __construct($name, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L25
</md:method>

<md:method>
/**
	 * Finds objects in collection
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function find($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L36
</md:method>

<md:method>
/**
	 * Finds objects in collection and fires callback when got all objects
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function findAll($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L47
</md:method>

<md:method>
/**
	 * Finds one object in collection
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,   opts,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function findOne($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L58
</md:method>

<md:method>
/**
	 * Counts objects in collection
	 * @param mixed  Callback called when response received
	 * @param array  Hash of properties (offset,  limit,  opts,  where,  col)
	 * @param string Optional. Distribution key.
	 * @return void
	 */
public function count($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L70
</md:method>

<md:method>
/**
	 * Ensure index
	 * @param array  Keys
	 * @param array  Optional. Options
	 * @param mixed  Optional. Callback called when response received
	 * @return void
	 */
public function ensureIndex($keys, $options = [], $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L82
</md:method>

<md:method>
/**
	 * Groupping function
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col,  reduce,  initial)
	 * @return void
	 */
public function group($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L92
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param array Data
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return MongoId
	 */
public function insert($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L104
</md:method>

<md:method>
/**
	 * Inserts an object
	 * @param array Data
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return MongoId
	 */
public function insertOne($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L115
</md:method>

<md:method>
/**
	 * Inserts several documents
	 * @param array Array of docs
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return array IDs
	 */
public function insertMulti($docs, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L126
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param array   Conditions
	 * @param array   Data
	 * @param integer Optional. Flags.
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function update($cond, $data, $flags = 0, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L139
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function updateOne($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L152
</md:method>

<md:method>
/**
	 * Updates one object in collection
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function updateMulti($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L164
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param array   Conditions
	 * @param array   Data
	 * @param boolean Optional. Multi-flag.
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function upsert($cond, $data, $multi = false, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L177
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function upsertOne($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L189
</md:method>

<md:method>
/**
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function upsertMulti($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L201
</md:method>

<md:method>
/**
	 * Removes objects from collection
	 * @param array Conditions
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return void
	 */
public function remove($cond = [], $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L212
</md:method>

<md:method>
/**
	 * Evaluates a code on the server side
	 * @param string Code
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L222
</md:method>

<md:method>
/**
	 * Aggregate
	 * @param array Params
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L233
</md:method>

<md:method>
/**
	 * Generation autoincrement
	 * @param Closure $cb called when response received
	 * @return void
	 */
public function autoincrement($cb, $plain = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L243
</md:method>

<md:method>
/**
	 * Generation autoincrement
	 * @param Closure $cb called when response received
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L261
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->