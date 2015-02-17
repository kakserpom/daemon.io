### lock # Lock #> Lock {tpl-git PHPDaemon/Servers/Lock}

> Требует рефакторинга

<!-- include-namespace path="\PHPDaemon\Servers\Lock" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/Lock/Connection.php}

```php
namespace PHPDaemon\Servers\Lock;
class Connection extends \PHPDaemon\Network\Connection;
```

##### properties # Properties

<md:prop>
/**
	 * @var bool Is this S2S-session?
	 */
public $server = false
</md:prop>

<md:prop>
/**
	 * @var array State of locks
	 */
public $locks = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when client is trying to acquire lock.
	 * @param  string  $name Name of job.
	 * @param  boolean $wait Wait if already acquired?
	 * @return string        Result
	 */
public function acquireLock($name, $wait = FALSE)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Lock/Connection.php#L30
</md:method>

<md:method>
/**
	 * Called when client sends done- or failed-event.
	 * @param  string $name   Name of job.
	 * @param  string $result Result
	 */
public function done($name, $result)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Lock/Connection.php#L58
</md:method>

<md:method>
/**
	 * Event of Connection
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Lock/Connection.php#L81
</md:method>

<md:method>
/**
	 * Called when new data received.
	 * @param  string $buf New data.
	 * @return void
	 */
public function stdin($buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Lock/Connection.php#L102
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/Lock/Pool.php}

```php
namespace PHPDaemon\Servers\Lock;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = 'tcp://0.0.0.0')`  
 Listen addresses

 - `:p`listenport (integer = 833)`  
 Listen port

 - `:p`allowedclients (string = '127.0.0.1')`  
 Allowed clients ip list

 - `:p`enable (boolean = 0)`  
 Disabled by default

 - `:p`protologging (boolean = false)`  
 Logging?

##### properties # Properties

<md:prop>
/**
	 * @var array Jobs
	 */
public $lockState = [ ]
</md:prop>

<md:prop>
/**
	 * @var array Array of connection's state
	 */
public $lockConnState = [ ]
</md:prop>

<div class="clearboth"></div>


<!--/ include-namespace -->