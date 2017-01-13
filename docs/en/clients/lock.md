### lock # Lock #> Lock {tpl-git PHPDaemon/Clients/Lock}

```php
namespace PHPDaemon\Clients\Lock;
```

> It requires refactoring

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
	 * @param  string $buf New data
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

 - `:p`servers (string = '127.0.0.1')`  
 default server

 - `:p`port (string = 833)`  
 default port

 - `:p`prefix (string = '')`  
 prefix

 - `:p`protologging (integer = 0)`  
 protologging

##### methods # Methods

<md:method>
/**
	 * Runs a job
	 * @param  string   $name      Name of job
	 * @param  boolean  $wait      Wait. If true - will wait in queue for lock.
	 * @param  callable $onRun     Job's runtime
	 * @param  callable $onSuccess Called when job successfully done
	 * @param  callable $onFailure Called when job failed
	 * @callback $onRun ( )
	 * @callback $onSuccess ( )
	 * @callback $onFailure ( )
	 * @return void
	 */
public function job($name, $wait, $onRun, $onSuccess = NULL, $onFailure = NULL)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L40
</md:method>

<md:method>
/**
	 * Sends done-event
	 * @param string $name Name of job
	 * @return void
	 */
public function done($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L56
</md:method>

<md:method>
/**
	 * Sends failed-event
	 * @param string $name Name of job
	 * @return void
	 */
public function failed($name)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L70
</md:method>

<md:method>
/**
	 * Returns available connection from the pool by name
	 * @param  string   $name Key
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 * @return boolean
	 */
public function getConnectionByName($name, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/Lock/Pool.php#L86
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
