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

const REPL_ERR = 0x00
</md:const>

<md:const>

const REPL_ERR_NOT_FOUND = 0x01
</md:const>

<md:const>

const REPL_ERR_NAN = 0x02
</md:const>

<md:const>

const REPL_ERR_MEM = 0x03
</md:const>

<md:const>

const REPL_ERR_LOCKED = 0x04
</md:const>

<md:const>

const REPL_OK = 0x05
</md:const>

<md:const>

const REPL_VAL = 0x06
</md:const>

<md:const>

const REPL_KVAL = 0x07
</md:const>

<md:const>

const STATE_PACKET_HDR = 0x01
</md:const>

<md:const>

const STATE_PACKET_DATA = 0x02
</md:const>

<md:const>

const GB_ENC_PLAIN = 0x00
</md:const>

<md:const>

const GB_ENC_LZF = 0x01
</md:const>

<md:const>

const GB_ENC_NUMBER = 0x02
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L55
</md:method>

<md:method>
/**
 */
public function isFinal()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L60
</md:method>

<md:method>
/**
 */
public function getTotalNum()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L63
</md:method>

<md:method>
/**
 */
public function getReadedNum()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L66
</md:method>

<md:method>
/**
 */
public function getResponseCode()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Connection.php#L69
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Gibson/Pool.php}

```php
namespace PHPDaemon\Clients\Gibson;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers ('unix:///var/run/gibson.sock')`  
 

 - `:p`port (10128)`  
 

 - `:p`maxconnperserv (32)`  
 

 - `:p`max-allowed-packet ('1M')`  
 

##### methods # Methods

<md:method>
/**
	 * Magic __call.
	 * @method $name 
	 * @param string $name Command name
	 * @param array $args
	 * @usage $ .. Command-dependent set of arguments ..
	 * @usage $ [callback Callback. Optional.
	 * @example  $gibson->set(3600, 'key', 'value');
	 * @example  $gibson->get('key', function ($conn) {...});
	 * @return void
	 */
public function __call($name, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Pool.php#L72
</md:method>

<md:method>
/**
	 * Is command?
 	 * @param string $name
	 * @return boolean
	 */
public function isCommand($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Gibson/Pool.php#L90
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->