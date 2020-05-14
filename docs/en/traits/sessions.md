### sessions # Sessions #> Sessions {tpl-git PHPDaemon/Traits/Sessions.php}

```php
namespace PHPDaemon\Traits;
trait Sessions;
```

This trait implements a session mechanism. The mechanism is implemented completely on its own and not as a mere wrapper around `session_*` functions.

Why can't we just use the native PHP session mechanism?

 -.n **Problem #1:** For long-lived processes (serving more than one client), the superglobal array `$_SESSION` will not be created anew.
 -.n **Problem #2:** Native implementation of sessions is blocking, which contradicts the PhpDaemon ideology of providing non-blocking I/O.

As with the native implementation, the behaviour of sessions is based on `php.ini`.

The current implementation supports storing sessions in files,  `session.serialize_handler = php|php_binary`, lock `r+!` files - milar to the native one - to prevent race condition.

You can safely use PhpDaemon with existing sessions, the serialization is compatible with native ([session_encode](http://php.net//manual/ru/function.session-encode.php), [session_decode](http://php.net//manual/ru/function.session-decode.php)).

Usage examples:

```php
$this->onSessionStart(function ($event) {
	if (!$event->getResult()) {
		//Session open failed
	}
	//Session open succeed
});
```

> This trait is used in [HTTPRequest](#HTTPRequest) и [Servers\WebSocket\Route](#servers/websocket/route)
