### pool # Пул

Хранит в себе активные объекты {tpl-inlink network/connection Соединение} и {tpl-inlink network/boundsocket ОткрытыйСокет}.

Пул можно инстанцировать прямо в пользовательском приложении, например:

```php
/* ... */
$this->pool = \PHPDaemon\Servers\FlashPolicy::getInstance([
    'listen' => 'tcp://0.0.0.0:843'
]);
$this->pool->onReady();
/* ... */
```

Но не забывайте отправлять ему onReady(), onShutdown() и onConfigUpdated() события.

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
