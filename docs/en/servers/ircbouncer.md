### ircbouncer # IRCBouncer #> IRCBouncer {tpl-git PHPDaemon/Servers/IRCBouncer}

<!-- include-namespace path="\PHPDaemon\Servers\IRCBouncer" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/IRCBouncer/Connection.php}

```php
namespace PHPDaemon\Servers\IRCBouncer;
class Connection extends \PHPDaemon\Network\Connection;
```

##### properties # Properties

<md:prop>
/**
	 * @var string
	 */
public $EOL = '\r\n'
</md:prop>

<md:prop>
/**
	 * @var object
	 */
public $attachedServer
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $usermask
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $latency
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $lastPingTS
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $timeout = 180
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $protologging = false
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L55
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L65
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function ping()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L76
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $from    From
	 * @param  string $cmd     Command
	 * @param  mixed  ...$args Arguments
	 */
public function command($from, $cmd)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L88
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string $from From
	 * @param  string $cmd  Command
	 * @param  array  $args Arguments
	 */
public function commandArr($from, $cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L116
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function detach()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L144
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function attachTo()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L154
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param object $chan
	 */
public function exportChannel($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L174
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $cmd  Command
	 * @param array  $args Arguments
	 */
public function onCommand($cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L195
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $msg
	 */
public function msgFromBNC($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L267
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Connection.php#L278
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/IRCBouncer/Pool.php}

```php
namespace PHPDaemon\Servers\IRCBouncer;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = '0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 6667)`  
 Listen port

 - `:p`url (string = 'irc://user@host/nickname/realname')`  
 URL

 - `:p`servername (string = 'bnchost.tld')`  
 Server name

 - `:p`defaultchannels (string = '')`  
 Default channels

 - `:p`protologging (boolean = 0)`  
 Logging?

 - `:p`dbname (string = 'bnc')`  
 Database name

 - `:p`password (string = 'SecretPwd')`  
 Password

##### properties # Properties

<md:prop>
/**
	 * @var Pool
	 */
public $client
</md:prop>

<md:prop>
/**
	 * @var Connection
	 */
public $conn
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $protologging = false
</md:prop>

<md:prop>
/**
	 * @var Pool
	 */
public $db
</md:prop>

<md:prop>
/**
	 * @var object
	 */
public $messages
</md:prop>

<md:prop>
/**
	 * @var object
	 */
public $channels
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO DESCR
	 */
public function applyConfig()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Pool.php#L87
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Pool.php#L98
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $url
	 */
public function getConnection($url)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/IRCBouncer/Pool.php#L108
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->