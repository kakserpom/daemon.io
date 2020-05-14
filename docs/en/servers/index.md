## servers # Servers

Servers are responsible for receiving requests and passing them to applications.

Each server is a class inherited from [Network\Server](#network/server), which in turn is inherited from [Network\Pool](#network/pool).
The server can be initiated directly in the user application, for example:

```php
/* ... */
$this->pool = \PHPDaemon\Servers\FlashPolicy::getInstance([
    'listen' => 'tcp://0.0.0.0:843'
]);
$this->pool->onReady();
/* ... */
```

But do not forget that in this case you should send onReady(), onShutdown() and onConfigUpdated() events.

In most cases, the server is run by the Pool application of the same name.

```ruby
# context for ssl connection (optional)
TransportContext:myContext {
    tls;
    certFile "/path/to/cert.pem";
    pkFile "/path/to/privkey.pem";
    passphrase "";
    verifyPeer true;
    allowSelfSigned true;
}

# listening to port 80 and 443
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