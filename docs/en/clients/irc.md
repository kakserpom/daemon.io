### irc # IRC #> IRC {tpl-git PHPDaemon/Clients/IRC}

```php
namespace PHPDaemon\Clients\IRC;
```

<!-- include-namespace path="\PHPDaemon\Clients\IRC" level="" access="" -->
#### channel # Channel {tpl-git PHPDaemon/Clients/IRC/Channel.php}

```php
namespace PHPDaemon\Clients\IRC;
class Channel extends \PHPDaemon\Structures\ObjectStorage;
```

##### properties # Properties

<md:prop>
/**
	 * @var Connection
	 */
public $irc
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $name
</md:prop>

<md:prop>
/**
	 * @var array
	 */
public $nicknames = [ ]
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $self
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $type
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $topic
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @param Connection $irc
	 * @param string     $name
	 */
public function __construct($irc, $name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L50
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function who()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L58
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array|string $mask
	 * @param mixed        $msg
	 */
public function onPart($mask, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L67
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $type
	 */
public function setChanType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L83
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return array
	 */
public function exportNicksArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L91
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $msg
	 */
public function setTopic($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L103
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $nick
	 * @param string $mode
	 */
public function addMode($nick, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L112
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $target
	 * @param string $mode
	 */
public function removeMode($target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L128
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L140
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function join()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L147
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param mixed $msg
	 */
public function part($msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L155
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $type
	 * @return $this
	 */
public function setType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L164
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param object $obj
	 */
public function detach($obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L173
</md:method>

<div class="clearboth"></div>

#### channel-participant # ChannelParticipant {tpl-git PHPDaemon/Clients/IRC/ChannelParticipant.php}

```php
namespace PHPDaemon\Clients\IRC;
class ChannelParticipant;
```

##### properties # Properties

<md:prop>
/**
	 * @var string
	 */
public $channel
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $nick
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $user
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $flag
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $mode
</md:prop>

<md:prop>
/**
	 * @var boolean
	 */
public $unverified
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $host
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @param  string $flag
	 * @return $this
	 */
public function setFlag($flag)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L49
</md:method>

<md:method>
/**
	 * @param string $channel
	 * @param string $nick
	 */
public function __construct($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L68
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onModeUpdate()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L77
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $user
	 * @return $this
	 */
public function setUser($user)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L97
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return string
	 */
public function getUsermask()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L106
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  boolean $bool
	 * @return $this
	 */
public function setUnverified($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L115
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $host
	 * @return $this
	 */
public function setHost($host)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L125
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  array|string $mask
	 * @return $this
	 */
public function setUsermask($mask)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L135
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $channel
	 * @param  string $nick
	 * @return static
	 */
public static function instance($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L153
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $nick
	 * @return $this
	 */
public function setNick($nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L165
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L179
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $msg
	 */
public function chanMessage($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L187
</md:method>

<div class="clearboth"></div>

#### connection # Connection {tpl-git PHPDaemon/Clients/IRC/Connection.php}

```php
namespace PHPDaemon\Clients\IRC;
class Connection extends \PHPDaemon\Network\ClientConnection;
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
	 * @var string
	 */
public $nick
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $realname
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $mode = ''
</md:prop>

<md:prop>
/**
	 * @var array
	 */
public $buffers = [ ]
</md:prop>

<md:prop>
/**
	 * @var string
	 */
public $servername
</md:prop>

<md:prop>
/**
	 * @var array
	 */
public $channels = [ ]
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
	 * @var int
	 */
public $timeout = 300
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L84
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $cmd
	 */
public function command($cmd)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L102
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  integer|string $cmd
	 * @param  array $args
	 * @return bool
	 */
public function commandArr($cmd, $args = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L129
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array $channels
	 */
public function join($channels)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L157
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array $channels
	 * @param mixed $msg
	 */
public function part($channels, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L171
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L179
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function ping()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L190
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $to
	 * @param string $msg
	 */
public function message($to, $msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L200
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $channel
	 * @param string $target
	 * @param string $mode
	 */
public function addMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L210
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $channel
	 * @param string $target
	 * @param string $mode
	 */
public function removeMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L227
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $from
	 * @param string $cmd
	 * @param array $args
	 */
public function onCommand($from, $cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L240
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L411
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $chan
	 * @return Channel
	 */
public function channel($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L456
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param  string $chan
	 * @return bool
	 */
public function channelIfExists($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L468
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/IRC/Pool.php}

```php
namespace PHPDaemon\Clients\IRC;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (integer = 6667)`  
 Port

##### properties # Properties

<md:prop>
/**
	 * @var Pool
	 */
public $identd
</md:prop>

<md:prop>
/**
	 * @var bool
	 */
public $protologging = false
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @TODO DESCR
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Pool.php#L36
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->