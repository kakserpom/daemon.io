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
	 * @var
	 */
public $irc
</md:prop>

<md:prop>
/**
	 * @var
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
	 * @var
	 */
public $type
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $topic
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * @param Connection $irc
	 * @param $name
	 */
public function __construct($irc, $name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L47
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function who()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L55
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param array|string $mask
	 * @param mixed $msg
	 */
public function onPart($mask, $msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L64
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $type
	 */
public function setChanType($type)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L80
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return array
	 */
public function exportNicksArray()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L88
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $msg
	 */
public function setTopic($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L100
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $nick
	 * @param string $mode
	 */
public function addMode($nick, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L109
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $target
	 * @param string $mode
	 */
public function removeMode($target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L125
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L137
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function join()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L144
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param mixed $msg
	 */
public function part($msg = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Channel.php#L152
</md:method>

<md:method>
/**
	 * @TODO DESCR
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
	 * @var
	 */
public $nick
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $user
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $flag
</md:prop>

<md:prop>
/**
	 * @var
	 */
public $mode
</md:prop>

<md:prop>
/**
	 * @var
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
public function setFlag($flag)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L43
</md:method>

<md:method>
/**
	 * @param $channel
	 * @param $nick
	 */
public function __construct($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L62
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function onModeUpdate()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L71
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $user
	 * @return $this
	 */
public function setUser($user)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L91
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @return string
	 */
public function getUsermask()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L100
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $bool
	 * @return $this
	 */
public function setUnverified($bool)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L109
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $host
	 * @return $this
	 */
public function setHost($host)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L119
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $mask
	 * @return $this
	 */
public function setUsermask($mask)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L129
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channel
	 * @param $nick
	 * @return static
	 */
public static function instance($channel, $nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L147
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $nick
	 * @return $this
	 */
public function setNick($nick)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L159
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function destroy()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L173
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $msg
	 */
public function chanMessage($msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/ChannelParticipant.php#L181
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
	 * @var
	 */
public $nick
</md:prop>

<md:prop>
/**
	 * @var
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
	 * @var
	 */
public $latency
</md:prop>

<md:prop>
/**
	 * @var
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L73
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $cmd
	 */
public function command($cmd)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L91
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $cmd
	 * @param array $args
	 * @return bool
	 */
public function commandArr($cmd, $args = [])
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L118
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channels
	 */
public function join($channels)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L146
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channels
	 * @param mixed $msg
	 */
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
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 */
public function ping()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L179
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param string $to
	 * @param string $msg
	 */
public function message($to, $msg)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L189
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channel
	 * @param $target
	 * @param string $mode
	 */
public function addMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L199
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $channel
	 * @param $target
	 * @param string $mode
	 */
public function removeMode($channel, $target, $mode)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L216
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $from
	 * @param $cmd
	 * @param $args
	 */
public function onCommand($from, $cmd, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L229
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L400
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $chan
	 * @return Channel
	 */
public function channel($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L445
</md:method>

<md:method>
/**
	 * @TODO DESCR
	 * @param $chan
	 * @return bool
	 */
public function channelIfExists($chan)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Connection.php#L457
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
	 * @var
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
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/IRC/Pool.php#L34
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->