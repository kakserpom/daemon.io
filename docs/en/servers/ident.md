### ident # Ident #> Ident {tpl-git PHPDaemon/Servers/Ident}

<!-- include-namespace path="\PHPDaemon\Servers\Ident" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/Ident/Connection.php}

```php
namespace PHPDaemon\Servers\Ident;
class Connection extends \PHPDaemon\Network\Connection;
```

#### pool # Pool {tpl-git PHPDaemon/Servers/Ident/Pool.php}

```php
namespace PHPDaemon\Servers\Ident;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = '0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 113)`  
 Listen port

##### methods # Methods

<md:method>
/**
	 * Function handles incoming Remote Procedure Calls
	 * You can override it
	 * @param  string $method Method name.
	 * @param  array  $args   Arguments.
	 * @return void
	 */
public function RPCall($method, $args)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Ident/Pool.php#L35
</md:method>

<md:method>
/**
	 * Register pair
	 * @param  integer $local   Local
	 * @param  integer $foreign Foreign
	 * @param  string  $user    User
	 * @return void
	 */
public function registerPair($local, $foreign, $user)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Ident/Pool.php#L54
</md:method>

<md:method>
/**
	 * Unregister pair
	 * @param  integer $local   Local
	 * @param  integer $foreign Foreign
	 * @return void
	 */
public function unregisterPair($local, $foreign)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Ident/Pool.php#L68
</md:method>

<md:method>
/**
	 * Find pair
	 * @param  integer $local   Local
	 * @param  integer $foreign Foreign
	 * @return string           User
	 */
public function findPair($local, $foreign)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/Ident/Pool.php#L78
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->