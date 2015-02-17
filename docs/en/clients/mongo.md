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

<<<<<<< HEAD
=======
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

>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
##### methods # Methods

<md:method>
/**
<<<<<<< HEAD
 */
public static function import($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L7
=======
	 * Contructor of MongoClientAsyncCollection
	 * @param  string $name Name of collection
	 * @param  Pool   $pool Pool
	 * @return void
	 */
public function __construct($name, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L29
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @param string $id
	 */
public function __construct($id = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L41
=======
	 * Finds objects in collection
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function find($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L41
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function __toString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L52
=======
	 * Finds objects in collection and fires callback when got all objects
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function findAll($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L53
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function toHex()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L55
=======
	 * Finds one object in collection
	 * @param  callable $cb Callback called when response received
	 * @param  array    $p  Hash of properties (offset,  opts, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @callback $cb ( )
	 * @return void
	 */
public function findOne($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L65
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L73
=======
	 * Generation autoincrement
	 * @param  callable $cb    Called when response received
	 * @param  boolean  $plain Plain?
	 * @callback $cb ( )
	 * @return void
	 */
public function autoincrement($cb, $plain = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L266
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L179
=======
	 * Generation autoincrement
	 * @param  array    $p  Params
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L286
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
<<<<<<< HEAD
 */
public static function safeModeEnc(&$o)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L80
=======
	 * @TODO DESCR
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L63
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * Sets default database name
	 * @param string Database name
	 * @return boolean Success
	 */
<<<<<<< HEAD
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L96
=======
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Connection.php#L101
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15

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
<<<<<<< HEAD
	 * Sends request of nonce
	 * @return void
	 */
public function getNonce($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L511
=======
	 * Error
	 * @return mixed
	 */
public function error()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L86
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @TODO DESCR
	 * @param array $keys
	 * @return string
	 */
public function getIndexName($keys)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L545
=======
	 * Keep
	 * @param  boolean $bool
	 * @return void
	 */
public function keep($bool = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L95
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Rewind
	 * @return void
	 */
public function rewind()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L103
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Gets last error
	 * @param string Dbname
	 * @param mixed  Callback called when response received
	 * @param array  Parameters.
	 * @param object Connection. Optional.
	 * @return void
	 */
public function lastError($db, $cb, $params = [], $conn = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L597
=======
	 * Current
	 * @return mixed
	 */
public function current()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L111
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Find objects in collection using min/max specifiers
	 * @param array Hash of properties (offset,  limit,  opts,  where,  col,  min,  max)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function range($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L628
=======
	 * Key
	 * @return string
	 */
public function key()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L119
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Evaluates a code on the server side
	 * @param string Code
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L711
=======
	 * Next
	 * @return void
	 */
public function next()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L127
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Returns distinct values of the property
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col, where)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function distinct($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L757
=======
	 * Grab
	 * @return array
	 */
public function grab()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L139
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Find and modify
	 * @param array Hash of properties
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L856
=======
	 * To array
	 * @return array
	 */
public function toArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L149
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Groupping function
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col,  reduce,  initial)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function group($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L922
=======
	 * Valid
	 * @return boolean
	 */
public function valid()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L159
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Aggregate function
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col)
	 * @param mixed Callback called when response received
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L988
=======
	 * @TODO DESCR
	 * @return boolean
	 */
public function isBusyConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L168
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * @TODO DESCR
	 * @return Connection
	 */
public function getConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L179
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * @TODO DESCR
	 * @return boolean
	 */
public function isFinished()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L187
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Constructor
	 * @param  string     $id   Cursor's ID
	 * @param  string     $col  Collection's name
	 * @param  Connection $conn Network connection (MongoClientConnection)
	 * @return void
	 */
public function __construct($id, $col, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L198
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Asks for more objects
	 * @param  integer $number Number of objects
	 * @return void
	 */
public function getMore($number = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L209
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * isDead
	 * @return boolean
	 */
public function isDead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L222
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Destroys the cursors
	 * @param  boolean $notify
	 * @return boolean Success
	 */
public function destroy($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L231
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Destroys the cursors
	 * @param  boolean $notify
	 * @return boolean Success
	 */
public function free($notify = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L250
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Sends a request to kill certain cursors on the server side
	 * @param array Array of cursors
	 * @param object Connection
	 * @return void
	 */
public function killCursors($cursors = [], $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1185
=======
	 * Cursor's destructor. Sends a signal to the server
	 * @return void
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L258
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Inserts several documents
	 * @param string Collection's name
	 * @param array  Array of docs
	 * @param string $col
	 * @return array IDs
	 */
public function insertMulti($col, $docs = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1200
=======
	 * Import
	 * @param  mixed $id ID
	 * @return mixed
	 */
public static function import($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L19
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
<<<<<<< HEAD
public function remove($col, $cond = [], $cb = NULL, $params = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1244
=======
public function __construct($id = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L53
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Asks for more objects
	 * @param string  Collection's name
	 * @param string  Cursor's ID
	 * @param integer Number of objects
	 * @param object Connection
	 * @return void
	 */
public function getMore($col, $id, $number, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1287
=======
	 * __toString
	 * @return string
	 */
public function __toString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L69
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Returns an object of collection
	 * @param string Collection's name
	 * @return Collection
	 */
public function getCollection($col)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1311
=======
	 * toHex
	 * @return string
	 */
public function toHex()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L77
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Magic getter-method. Proxy for getCollection.
	 * @param string Collection's name
	 * @return Collection
	 */
public function __get($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1331
=======
	 * getPlainObject
	 * @return \MongoId
	 */
public function getPlainObject()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/MongoId.php#L85
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<div class="clearboth"></div>

#### cursor # Cursor {tpl-git PHPDaemon/Clients/Mongo/Cursor.php}

```php
namespace PHPDaemon\Clients\Mongo;
class Cursor;
```

<<<<<<< HEAD
##### properties # Properties
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15

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
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
<<<<<<< HEAD
 */
public function error()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L41
=======
	 * @TODO
	 * @param  array $o
	 * @return void
	 */
public static function safeModeEnc(&$o)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L107
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function keep($bool = true)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L44
=======
	 * Sets default database name
	 * @param  string  $name Database name
	 * @return boolean       Success
	 */
public function selectDB($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L123
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function rewind()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L47
=======
	 * Generates auth. key
	 * @param  string $username Username
	 * @param  string $password Password
	 * @param  string $nonce    Nonce
	 * @return string           MD5 hash
	 */
public static function getAuthKey($username, $password, $nonce)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L136
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function current()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L51
=======
	 * Adds mongo server
	 * @param string  $url    URL
	 * @param integer $weight Weight
	 * @param mixed   $mock   @deprecated
	 * @return void
	 */
public function addServer($url, $weight = NULL, $mock = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L147
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
 */
public function key()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L55
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Finds objects in collection and fires callback when got all objects
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, await, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAll($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L219
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @TODO DESCR
	 * @return mixed
	 */
public function getConn()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L99
=======
	 * Finds objects in collection
	 * @param  array    $p  Hash of properties (offset, limit, opts, tailable, await, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function find($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L236
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @TODO DESCR
	 * @return bool
	 */
public function isFinished()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L107
=======
	 * Finds one object in collection
	 * @param  array    $p  Hash of properties (offset,  opts, where, col, fields, sort, hint, explain, snapshot, orderby, parse_oplog)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findOne($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L336
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Counts objects in collection
	 * @param  array    $p  Hash of properties (offset, limit, opts, where, col)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findCount($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L427
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Asks for more objects
	 * @param integer Number of objects
	 * @return void
	 */
public function getMore($number = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Cursor.php#L131
=======
	 * Sends authenciation packet
	 * @param  array    $p  Hash of properties (dbname, user, password, nonce)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function auth($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L504
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * Sends request of nonce
	 * @param  array    $p  Hash of properties
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function getNonce($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L545
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
	 * @TODO DESCR
	 * @param  array  $keys
	 * @return string
	 */
public function getIndexName($keys)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L579
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
<<<<<<< HEAD
	 * Contructor of MongoClientAsyncCollection
	 * @param string Name of collection
	 * @param object Pool
	 * @param Pool $pool
	 * @return void
	 */
public function __construct($name, $pool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L25
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Finds objects in collection
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function find($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L36
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Finds objects in collection and fires callback when got all objects
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  tailable,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function findAll($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L47
=======
	 * Find objects in collection using min/max specifiers
	 * @param  array    $p  Hash of properties (offset, limit, opts, where, col, min, max)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function range($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L664
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Finds one object in collection
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,   opts,  where,  col,  fields,  sort,  hint,  explain,  snapshot,  orderby,  parse_oplog)
	 * @return void
	 */
public function findOne($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L58
=======
	 * Evaluates a code on the server side
	 * @param  string   $code Code
	 * @param  callable $cb   Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L748
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Counts objects in collection
	 * @param mixed  Callback called when response received
	 * @param array  Hash of properties (offset,  limit,  opts,  where,  col)
	 * @param string Optional. Distribution key.
	 * @return void
	 */
public function count($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L70
=======
	 * Returns distinct values of the property
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col, where)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function distinct($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L795
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Ensure index
	 * @param array  Keys
	 * @param array  Optional. Options
	 * @param mixed  Optional. Callback called when response received
	 * @return void
	 */
public function ensureIndex($keys, $options = [], $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L82
=======
	 * Find and modify
	 * @param  array    $p  Hash of properties
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L905
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * Groupping function
<<<<<<< HEAD
	 * @param mixed Callback called when response received
	 * @param array Hash of properties (offset,  limit,  opts,  key,  col,  reduce,  initial)
	 * @return void
	 */
public function group($cb, $p = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L92
=======
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col, reduce, initial)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function group($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L972
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Inserts an object
	 * @param array Data
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return MongoId
	 */
public function insert($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L104
=======
	 * Aggregate function
	 * @param  array    $p  Hash of properties (offset, limit, opts, key, col)
	 * @param  callable $cb Callback called when response received
	 * @callback $cb ( )
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1039
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Inserts an object
	 * @param array Data
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return MongoId
	 */
public function insertOne($doc, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L115
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Inserts several documents
	 * @param array Array of docs
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return array IDs
	 */
public function insertMulti($docs, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L126
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Updates one object in collection
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function updateOne($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L152
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Updates one object in collection
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function updateMulti($cond, $data, $cb = null, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L164
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
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
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function upsertOne($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L189
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Upserts an object (updates if exists,  insert if not exists)
	 * @param array   Conditions
	 * @param array   Data
	 * @param mixed   Optional. Callback called when response received.
	 * @param array   Optional. Params.
	 * @return void
	 */
public function upsertMulti($cond, $data, $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L201
=======
	 * Sends a request to kill certain cursors on the server side
	 * @param  array      $cursors Array of cursors
	 * @param  Connection $conn    Connection
	 * @return void
	 */
public function killCursors($cursors = [], $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1240
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Removes objects from collection
	 * @param array Conditions
	 * @param mixed Optional. Callback called when response received.
	 * @param array Optional. Params.
	 * @return void
	 */
public function remove($cond = [], $cb = NULL, $params = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L212
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Evaluates a code on the server side
	 * @param string Code
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function evaluate($code, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L222
=======
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
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Aggregate
	 * @param array Params
	 * @param mixed  Callback called when response received
	 * @return void
	 */
public function aggregate($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L233
=======
	 * Asks for more objects
	 * @param  string     $col    Collection's name
	 * @param  string     $id     Cursor's ID
	 * @param  integer    $number Number of objects
	 * @param  Connection $conn   Connection
	 * @return void
	 */
public function getMore($col, $id, $number, $conn)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1345
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Generation autoincrement
	 * @param Closure $cb called when response received
	 * @return void
	 */
public function autoincrement($cb, $plain = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L243
=======
	 * Returns an object of collection
	 * @param  string $col Collection's name
	 * @return Collection
	 */
public function getCollection($col)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1369
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * Generation autoincrement
	 * @param Closure $cb called when response received
	 * @return void
	 */
public function findAndModify($p, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Collection.php#L261
=======
	 * Magic getter-method. Proxy for getCollection
	 * @param  string $name Collection's name
	 * @return Collection
	 */
public function __get($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Mongo/Pool.php#L1389
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->