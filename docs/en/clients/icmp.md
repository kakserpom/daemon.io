### icmp # ICMP #> ICMP {tpl-git PHPDaemon/Clients/ICMP}

```php
namespace PHPDaemon\Clients\ICMP;
```

<!-- include-namespace path="\PHPDaemon\Clients\ICMP" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/ICMP/Connection.php}

```php
namespace PHPDaemon\Clients\ICMP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### methods # Methods

<md:method>
/**
	 * Send echo-request
	 * @param callable $cb   Callback
	 * @param string   $data Data
	 * @callback $cb ( )
	 * @return void
	 */
public function sendEcho($cb, $data = 'phpdaemon')
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/ICMP/Connection.php#L44
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/ICMP/Connection.php#L82
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/ICMP/Pool.php}

```php
namespace PHPDaemon\Clients\ICMP;
class Pool extends \PHPDaemon\Network\Client;
```

##### methods # Methods

<md:method>
/**
	 * Establishes connection
	 * @param  string   $host Address
	 * @param  callable $cb   Callback
	 * @callback $cb ( )
	 */
public function sendPing($host, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/ICMP/Pool.php#L19
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->