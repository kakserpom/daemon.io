### debugconsole # DebugConsole #> DebugConsole {tpl-git PHPDaemon/Servers/DebugConsole}

Это транспортное приложение предоставляет интерактивную отладочную консоль для phpDaemon.

```
# telnet 127.0.0.1 8818
Trying 127.0.0.1...
Connected to 127.0.0.1.
Escape character is '^]'.
Welcome! DebugConsole for phpDaemon.

login secret
OK.
eval echo 123;
123
```

<!-- include-namespace path="\PHPDaemon\Servers\DebugConsole" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/DebugConsole/Connection.php}

```php
namespace PHPDaemon\Servers\DebugConsole;
class Connection extends \PHPDaemon\Network\Connection;
```

##### properties # Properties

<md:prop>
/**
	 * @var integer Timeout
	 */
public $timeout = 60
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * onReady
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/DebugConsole/Connection.php#L32
</md:method>

<md:method>
/**
	 * Called when new data received.
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/DebugConsole/Connection.php#L105
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/DebugConsole/Pool.php}

```php
namespace PHPDaemon\Servers\DebugConsole;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = 'tcp://127.0.0.1')`  
 Listen addresses

 - `:p`port (integer = 8818)`  
 Listen port

 - `:p`passphrase (string = 'secret')`  
 Password for auth


<!--/ include-namespace -->