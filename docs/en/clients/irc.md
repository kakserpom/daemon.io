### irc # IRC #> IRC {tpl-git PHPDaemon/Clients/IRC}

```php
namespace PHPDaemon\Clients\IRC;
```

<!-- include-namespace path="\PHPDaemon\Clients\IRC" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/IRC/Connection.php}

```php
namespace PHPDaemon\Clients\IRC;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Properties

<md:prop>
/**
<<<<<<< HEAD
	 * @var string
	 */
public $EOL = '\r\n'
</md:prop>

<md:prop>
/**
	 * @var
=======
	 * @var Connection
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
	 * @var
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
	 * @var string
	 */
public $latency
</md:prop>

<md:prop>
/**
	 * @var string
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
<<<<<<< HEAD
	 * Called when the connection is handshaked (at low-level), and peer is ready to recv. data
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L73
=======
	 * @param Connection $irc
	 * @param string     $name
	 */
public function __construct($irc, $name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L50
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $cmd
	 */
<<<<<<< HEAD
public function command($cmd)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L91
=======
public function who()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L58
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $cmd
	 * @param array $args
	 * @return bool
	 */
public function commandArr($cmd, $args = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L118
=======
	 * @param array|string $mask
	 * @param mixed        $msg
	 */
public function onPart($mask, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L67
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channels
	 */
<<<<<<< HEAD
public function join($channels)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L146
=======
public function setChanType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L83
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channels
	 * @param mixed $msg
	 */
<<<<<<< HEAD
public function part($channels, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L160
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L168
=======
public function exportNicksArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L91
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 */
public function ping()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L179
=======
	 * @param string $msg
	 */
public function setTopic($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L103
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param string $to
	 * @param string $msg
	 */
public function message($to, $msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L189
=======
	 * @param string $nick
	 * @param string $mode
	 */
public function addMode($nick, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L112
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $channel
	 * @param $target
	 * @param string $mode
	 */
public function addMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L199
=======
	 * @param string $target
	 * @param string $mode
	 */
public function removeMode($target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L128
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channel
	 * @param $target
	 * @param string $mode
	 */
<<<<<<< HEAD
public function removeMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L216
=======
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L140
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $from
	 * @param $cmd
	 * @param $args
	 */
<<<<<<< HEAD
public function onCommand($from, $cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L229
=======
public function join()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L147
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
<<<<<<< HEAD
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L400
=======
public function part($msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L155
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $chan
	 * @return Channel
	 */
public function channel($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L445
=======
	 * @param  string $type
	 * @return $this
	 */
public function setType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L164
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $chan
	 * @return bool
	 */
<<<<<<< HEAD
public function channelIfExists($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L457
=======
public function detach($obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L173
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/IRC/Pool.php}

```php
namespace PHPDaemon\Clients\IRC;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (6667)`  
 

##### properties # Properties

<md:prop>
/**
	 * @var string
	 */
public $identd
</md:prop>

<md:prop>
/**
<<<<<<< HEAD
	 * @var bool
=======
	 * @var string
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Pool.php#L34
</md:method>

<div class="clearboth"></div>

#### channel # Channel {tpl-git PHPDaemon/Clients/IRC/Channel.php}

```php
namespace PHPDaemon\Clients\IRC;
class Channel extends \PHPDaemon\Structures\ObjectStorage;
```

##### properties # Properties

<md:prop>
/**
	 * @var string
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
	 * @var string
	 */
public $self
</md:prop>

<md:prop>
/**
	 * @var boolean
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
<<<<<<< HEAD
	 * @param Connection $irc
	 * @param $name
	 */
public function __construct($irc, $name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L47
=======
	 * @param  string $flag
	 * @return $this
	 */
public function setFlag($flag)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L49
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @TODO DESCR
	 */
public function who()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L55
=======
	 * @param string $channel
	 * @param string $nick
	 */
public function __construct($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L68
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array|string $mask
	 * @param mixed $msg
	 */
<<<<<<< HEAD
public function onPart($mask, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L64
=======
public function onModeUpdate()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L77
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param string $type
	 */
public function setChanType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L80
=======
	 * @param  string $user
	 * @return $this
	 */
public function setUser($user)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L97
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return array
	 */
<<<<<<< HEAD
public function exportNicksArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L88
=======
public function getUsermask()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L106
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $msg
	 */
public function setTopic($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L100
=======
	 * @param  boolean $bool
	 * @return $this
	 */
public function setUnverified($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L115
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $nick
	 * @param string $mode
	 */
public function addMode($nick, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L109
=======
	 * @param  string $host
	 * @return $this
	 */
public function setHost($host)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L125
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $target
	 * @param string $mode
	 */
public function removeMode($target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L125
=======
	 * @param  array|string $mask
	 * @return $this
	 */
public function setUsermask($mask)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L135
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L137
=======
	 * @param  string $channel
	 * @param  string $nick
	 * @return static
	 */
public static function instance($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L153
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 */
public function join()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L144
=======
	 * @param  string $nick
	 * @return $this
	 */
public function setNick($nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L165
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param mixed $msg
	 */
<<<<<<< HEAD
public function part($msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L152
=======
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L179
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $type
	 * @return $this
	 */
public function setType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L161
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param object $obj
	 */
public function detach($obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L170
=======
	 * @param string $msg
	 */
public function chanMessage($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L187
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
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
	 * @var
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
	 * @var integer
	 */
public $mode
</md:prop>

<md:prop>
/**
	 * @var integer
	 */
public $unverified
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $host
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @param $flag
	 * @return $this
	 */
<<<<<<< HEAD
public function setFlag($flag)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L43
=======
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L84
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
<<<<<<< HEAD
	 * @param $channel
	 * @param $nick
	 */
public function __construct($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L62
=======
	 * @TODO DESCR
	 * @param  string $cmd
	 * @param  mixed  ...$args Arguments
	 */
public function command($cmd)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L103
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 */
public function onModeUpdate()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L71
=======
	 * @param  integer|string $cmd
	 * @param  array $args
	 * @return bool
	 */
public function commandArr($cmd, $args = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L130
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $user
	 * @return $this
	 */
public function setUser($user)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L91
=======
	 * @param array $channels
	 */
public function join($channels)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L158
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @return string
	 */
public function getUsermask()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L100
=======
	 * @param array $channels
	 * @param mixed $msg
	 */
public function part($channels, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L172
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L180
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $bool
	 * @return $this
	 */
<<<<<<< HEAD
public function setUnverified($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L109
=======
public function ping()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L191
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $host
	 * @return $this
	 */
<<<<<<< HEAD
public function setHost($host)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L119
=======
public function message($to, $msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L201
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $mask
	 * @return $this
	 */
public function setUsermask($mask)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L129
=======
	 * @param string $channel
	 * @param string $target
	 * @param string $mode
	 */
public function addMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L211
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $channel
	 * @param $nick
	 * @return static
	 */
public static function instance($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L147
=======
	 * @param string $channel
	 * @param string $target
	 * @param string $mode
	 */
public function removeMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L228
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $from
	 * @param string $cmd
	 * @param array $args
	 */
public function onCommand($from, $cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L241
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L412
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 * @param $nick
	 * @return $this
	 */
public function setNick($nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L159
=======
	 * @param  string $chan
	 * @return Channel
	 */
public function channel($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L457
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<md:method>
/**
	 * @TODO DESCR
<<<<<<< HEAD
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L173
</md:method>

=======
	 * @param  string $chan
	 * @return bool
	 */
public function channelIfExists($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L469
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

>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
<md:method>
/**
	 * @TODO DESCR
	 * @param $msg
	 */
<<<<<<< HEAD
public function chanMessage($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L181
=======
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Pool.php#L36
>>>>>>> 40d2ec1f91c257acbd06869cec284d6c2ef23c15
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->