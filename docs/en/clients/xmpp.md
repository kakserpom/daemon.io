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
/** @var bool */
public $use_encryption = false
</md:prop>

<md:prop>
/** @var */
public $authorized
</md:prop>

<md:prop>
/** @var int */
public $lastId = 0
</md:prop>

<md:prop>
/** @var */
public $roster
</md:prop>

<md:prop>
/** @var XMLStream */
public $xml
</md:prop>

<md:prop>
/** @var */
public $fulljid
</md:prop>

<md:prop>
/** @var */
public $keepaliveTimer
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Get next ID
	 *
	 * @return string
	 */
public function getId()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L39
</md:method>

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L48
</md:method>

<md:method>
/**
	 * Called when session finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L60
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $s
	 */
public function sendXML($s)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L76
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function startXMLStream()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L84
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $xml
	 * @param callable $cb
	 * @return bool
	 */
public function iqSet($xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L96
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $to
	 * @param string $xml
	 * @param callable $cb
	 * @return bool
	 */
public function iqSetTo($to, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L113
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $xml
	 * @param callable $cb
	 * @return bool
	 */
public function iqGet($xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L130
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $to
	 * @param string $xml
	 * @param callable $cb
	 * @return bool
	 */
public function iqGetTo($to, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L147
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param mixed $to
	 * @param mixed $cb
	 * @return bool
	 */
public function ping($to = null, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L164
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $ns
	 * @param callable $cb
	 * @return bool
	 */
public function queryGet($ns, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L181
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $ns
	 * @param $xml
	 * @param callable $cb
	 * @return bool
	 */
public function querySet($ns, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L192
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $to
	 * @param string $ns
	 * @param string $xml
	 * @param callable $cb
	 * @return bool
	 */
public function querySetTo($to, $ns, $xml, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L204
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function createXMLStream()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L211
</md:method>

<md:method>
/**
	 * Send XMPP Message
	 *
	 * @param string $to
	 * @param string $body
	 * @param string $type
	 * @param string $subject
	 */
public function message($to, $body, $type = 'chat', $subject = null, $payload = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L288
</md:method>

<md:method>
/**
	 * Set Presence
	 *
	 * @param string $status
	 * @param string $show
	 * @param string $to
	 */
public function presence($status = null, $show = 'available', $to = null, $type = 'available', $priority = 0)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L317
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param mixed $jid
	 * @param callable $cb
	 */
public function getVCard($jid = null, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L363
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @param string New data
	 * @return void
	 */
public function stdin($buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/Connection.php#L397
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/XMPP/Pool.php}

```php
namespace PHPDaemon\Clients\XMPP;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (5222)`  
 

#### xmpproster # XMPPRoster {tpl-git PHPDaemon/Clients/XMPP/XMPPRoster.php}

```php
namespace PHPDaemon\Clients\XMPP;
class XMPPRoster;
```

##### properties # Properties

<md:prop>
/**
	 * @var
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
	 * @var bool
	 */
public $track_presence = true
</md:prop>

<md:prop>
/**
	 * @var bool
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
	 * @param Connection $xmpp
	 */
public function __construct($xmpp)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L35
</md:method>

<md:method>
/**
	 * @param string $xml
	 * @param callable $cb
	 */
public function rosterSet($xml, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L75
</md:method>

<md:method>
/**
	 * @param $jid
	 * @param $type
	 * @param callable $cb
	 */
public function setSubscription($jid, $type, $cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L84
</md:method>

<md:method>
/**
	 * @param callable $cb
	 */
public function fetch($cb = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L91
</md:method>

<md:method>
/**
	 *
	 * Add given contact to roster
	 *
	 * @param string $jid
	 * @param string $subscription
	 * @param string $name
	 * @param array $groups
	 */
public function _addContact($jid, $subscription, $name = '', $groups = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L136
</md:method>

<md:method>
/**
	 *
	 * Retrieve contact via jid
	 *
	 * @param string $jid
	 */
public function getContact($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L152
</md:method>

<md:method>
/**
	 *
	 * Discover if a contact exists in the roster via jid
	 *
	 * @param string $jid
	 */
public function isContact($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L165
</md:method>

<md:method>
/**
	 *
	 * Set presence
	 *
	 * @param string $presence
	 * @param integer $priority
	 * @param string $show
	 * @param string $status
	 */
public function setPresence($presence, $priority, $show, $status)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L178
</md:method>

<md:method>
/**
	 * Return best presence for jid
	 *
	 * @param string $jid
	 * @param array|bool
	 */
public function getPresence($jid)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/XMPP/XMPPRoster.php#L197
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->