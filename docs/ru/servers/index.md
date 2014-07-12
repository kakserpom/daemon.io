## servers # Серверы

Серверы предназначены для приема запросов и передачи их приложениям.

Серверы должны быть записаны в конфиг с помощью приложения Pool, например:

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

### servers/fastcgi # Servers\FastCGI
### servers/debugconsole # Servers\DebugConsole
### servers/flashpolicy # Servers\FlashPolicy
### servers/ident # Servers\Ident
### servers/ircbouncer # Servers\IRCBouncer

<!-- import lock.md -->

### servers/socks # Servers\Socks
### servers/websocket # Servers\WebSocket