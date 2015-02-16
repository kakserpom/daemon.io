### flashpolicy # FlashPolicy #> FlashPolicy {tpl-git PHPDaemon/Servers/FlashPolicy}

Это простое приложение предоставляет Flashpolicy сервер для phpDaemon.

Это приложение необходимо включить в случае если вы хотите присоединяться к серверу посредством Flash.

<!-- include-namespace path="\PHPDaemon\Servers\FlashPolicy" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Servers/FlashPolicy/Connection.php}

```php
namespace PHPDaemon\Servers\FlashPolicy;
class Connection extends \PHPDaemon\Network\Connection;
```

##### methods # Methods

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FlashPolicy/Connection.php#L24
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Servers/FlashPolicy/Pool.php}

```php
namespace PHPDaemon\Servers\FlashPolicy;
class Pool extends \PHPDaemon\Network\Server;
```

##### options # Options

 - `:p`listen (string|array = '0.0.0.0')`  
 Listen addresses

 - `:p`port (integer = 843)`  
 Listen port

 - `:p`file (string = getcwd() . '/conf/crossdomain.xml')`  
 Path to crossdomain.xml file

##### properties # Properties

<md:prop>
/**
	 * @var string Cached policy file contents
	 */
public $policyData
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when worker is ready
	 * @return void
	 */
public function onReady()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FlashPolicy/Pool.php#L37
</md:method>

<md:method>
/**
	 * Called when worker is going to update configuration
	 * @return void
	 */
public function onConfigUpdated()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Servers/FlashPolicy/Pool.php#L45
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->