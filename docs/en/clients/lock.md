### lock # Lock #> Lock {tpl-git PHPDaemon/Clients/Lock}

```php
namespace PHPDaemon\Clients\Lock;
```

> Требует рефакторинга

<!-- include-namespace path="\PHPDaemon\Clients\Lock" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/Lock/Connection.php}

```php
namespace PHPDaemon\Clients\Lock;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### methods # Methods

<md:method>
/**
	 * Called when new data received
	 * @param string New data
	 * @return void
	 */
public function stdin($buf)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Connection.php#L14
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/Lock/Pool.php}

```php
namespace PHPDaemon\Clients\Lock;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`servers ('127.0.0.1')`  
 default server

 - `:p`port (833)`  
 default port

 - `:p`prefix ('')`  
 @todo add description

 - `:p`protologging (0)`  
 

##### methods # Methods

<md:method>
/**
	 * Runs a job
	 * @param string   Name of job
	 * @param bool     wait. If true - will wait in queue for lock.
	 * @param callback onRun. Job's runtime.
	 * @param callback onSuccess. Called when job successfully done.
	 * @param callback onFailure. Called when job failed.
	 * @return void
	 */
public function job($name, $wait, $onRun, $onSuccess = NULL, $onFailure = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L37
</md:method>

<md:method>
/**
	 * Sends done-event
	 * @param string Name of job
	 * @return void
	 */
public function done($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L53
</md:method>

<md:method>
/**
	 * Sends failed-event
	 * @param string Name of job
	 * @return void
	 */
public function failed($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L67
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by name
	 * @param string   Key
	 * @param callback Callback
	 * @param \Closure $cb
	 * @return boolean Success.
	 */
public function getConnectionByName($name, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L83
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->