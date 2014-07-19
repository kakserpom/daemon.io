## servers # Серверы

Серверы предназначены для приема запросов и передачи их приложениям.

Каждый сервер представляет собой класс наследуемый от {tpl-inlink network/server Сеть\Сервер}, который в свой очередь наследуется от {tpl-inlink network/pool Сеть\Пул}. 
Сервер можно инициировать прямо в пользовательском приложении,  например:

```php
/* ... */
$this->pool = \PHPDaemon\Servers\FlashPolicy::getInstance([
    'listen' => 'tcp://0.0.0.0:843'
]);
$this->pool->onReady();
/* ... */
```

Но не забывайте, что в таком случае следует отправлять ему onReady(), onShutdown() и onConfigUpdated() события.

В большинстве случаев сервер запускается одноименнным приложением Pool.

```ruby
# контекст для ssl соединения (опционально)
TransportContext:myContext {
    ssl;
    certFile "/path/to/cert.pem";
    pkFile "/path/to/privkey.pem";
    passphrase "";
    verifyPeer true;
    allowSelfSigned true;
}

# слушаем 80 и 443 порт
Pool:HTTPServer {
    listen "tcp://0.0.0.0:80", "tcp://0.0.0.0:443##myContext";
    port 80;
    privileged;
    maxconcurrency 1;
}
```

<!-- import options.md -->

<!-- import http.md -->

<!-- import fastcgi.md -->

<!-- import debugconsole.md -->

<!-- import flashpolicy.md -->

<!-- import ident.md -->

<!-- import ircbouncer.md -->

<!-- import lock.md -->

<!-- import socks.md -->

<!-- import websocket.md -->