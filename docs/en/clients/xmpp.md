### xmpp # XMPP #> XMPP {tpl-git PHPDaemon/Clients/XMPP}

```php
namespace PHPDaemon\Clients\XMPP;
```

<!-- include-namespace path="\PHPDaemon\Clients\XMPP" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/XMPP/Connection.php}

```php
namespace PHPDaemon\Clients\XMPP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Properties

<md:prop>
/**
	 * @var boolean
	 */
public $use_encryption = false
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $authorized
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $lastId = 0
</md:prop>

<md:prop>
/**
	 * @var XMPPRoster
	 */
public $roster
</md:prop>

<md:prop>
/**
	 * @var XMLStream
	 */
public $xml
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $fulljid
</md:prop>

<md:prop>
/**
	 * @var integer|string Timer ID
	 */
public $keepaliveTimer
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Get next ID
	 * @return string
	 */
public function getId()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L57
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L66
</md:method>

<md:method>
/**
	 * Called when session finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L78
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $s
	 */
public function sendXML($s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L94
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function startXMLStream()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L102
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function iqSet($xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L115
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $to
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function iqSetTo($to, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L133
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function iqGet($xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L151
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $to
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function iqGetTo($to, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L169
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $to
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function ping($to = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L187
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $ns
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function queryGet($ns, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L205
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $ns
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function querySet($ns, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L217
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string   $to
	 * @param  string   $ns
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 * @return boolean
	 */
public function querySetTo($to, $ns, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L230
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function createXMLStream()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L237
</md:method>

<md:method>
/**
	 * Send XMPP Message
	 * @param string $to
	 * @param string $body
	 * @param string $type
	 * @param string $subject
	 */
public function message($to, $body, $type = 'chat', $subject = null, $payload = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L313
</md:method>

<md:method>
/**
	 * Set Presence
	 * @param string  $status
	 * @param string  $show
	 * @param string  $to
	 * @param string  $type
	 * @param integer $priority
	 */
public function presence($status = null, $show = 'available', $to = null, $type = 'available', $priority = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L343
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string   $jid
	 * @param callable $cb
	 * @callback $cb ( )
	 */
public function getVCard($jid = null, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L390
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L423
</md:method>

<div class="clearboth"></div>

#### xmpproster # XMPPRoster {tpl-git PHPDaemon/Clients/XMPP/XMPPRoster.php}

```php
namespace PHPDaemon\Clients\XMPP;
class XMPPRoster;
```

##### properties # Properties

<md:prop>
/**
	 * @var Connection
	 */
public $xmpp
</md:prop>

<md:prop>
/**
	 * @var array
	 */
public $roster_array = [ ]
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $track_presence = true
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $auto_subscribe = true
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $ns = 'jabber:iq:roster'
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @param Connection $xmpp
	 */
public function __construct($xmpp)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L40
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string   $xml
	 * @param  callable $cb
	 * @callback $cb ( )
	 */
public function rosterSet($xml, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L82
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  string   $jid
	 * @param  string   $type
	 * @param  callable $cb
	 * @callback $cb ( )
	 */
public function setSubscription($jid, $type, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L93
</md:method>

<md:method>
/**
	 * @TODO
	 * @param  callable $cb
	 * @callback $cb ( )
	 */
public function fetch($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L102
</md:method>

<md:method>
/**
	 * Add given contact to roster
	 * @param string $jid
	 * @param string $subscription
	 * @param string $name
	 * @param array  $groups
	 */
public function _addContact($jid, $subscription, $name = '', $groups = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L145
</md:method>

<md:method>
/**
	 * Retrieve contact via jid
	 * @param  string  $jid
	 * @return array|null
	 */
public function getContact($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L160
</md:method>

<md:method>
/**
	 * Discover if a contact exists in the roster via jid
	 * @param  string  $jid
	 * @return boolean
	 */
public function isContact($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L172
</md:method>

<md:method>
/**
	 * Set presence
	 * @param string  $presence
	 * @param integer $priority
	 * @param string  $show
	 * @param string  $status
	 */
public function setPresence($presence, $priority, $show, $status)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L183
</md:method>

<md:method>
/**
	 * Return best presence for jid
	 * @param  string $jid
	 * @return array|false
	 */
public function getPresence($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L201
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/XMPP/Pool.php}

```php
namespace PHPDaemon\Clients\XMPP;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (integer = 5222)`  
 Default port


<!--/ include-namespace -->