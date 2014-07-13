## servers # Серверы

Серверы предназначены для приема запросов и передачи их приложениям.

В основе всех серверов лежит пространство имен {tpl-inlink network Network}, изучение которого даст большее представление о возможностях серверов и сетевой работы демона в целом.

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

<!-- import fastcgi.md -->

<!-- import debugconsole.md -->

<!-- import flashpolicy.md -->

<!-- import ident.md -->

<!-- import ircbouncer.md -->

<!-- import lock.md -->

<!-- import socks.md -->

<!-- import websocket.md -->