### sockjs # SockJS #> SockJS {tpl-git PHPDaemon/SockJS}

```php
namespace PHPDaemon\SockJS;
```

#### application # Класс Application {tpl-git PHPDaemon/SockJS/Application.php}

```php
namespace PHPDaemon\SockJS;
class Application extends \PHPDaemon\Core\AppInstance;
```
С помощью этого класса можно создавать SockJS сервера. SockJS - это простой протокол и клиент/сервер набор библиотек, на базе которых строиться реал-тайм веб приложения, где браузер автоматически выбирает транспортный протокол, базируясь на возможностях конкретного клиента (обеспечивается совместимость начиная с IE6+). При этом, с точки зрения API, разработчик получает практически полную совместимость с WebSocket API. 

Детальнее: 
- Клиентская библиотека sockjs-client (текущая версия 1.0.3, устаревшая стабильная - 0.3.4) https://github.com/sockjs/sockjs-client
- Описание протокола SockJS - https://github.com/sockjs/sockjs-protocol

> Работа с любыми другими протоколами, кроме WebSocket, требует наличия Redis-сервера (при старте приложение попытается создать дефолтное соединение с localhost:6379, для отдельных настроек в конфигурации приложения можно задать свой пул соединений).




##### methods # Методы

<md:method>
public function getLocalSubscribersCount ( $chan )

@DESC

$params
params
</md:method>

<md:method>
public function subscribe ( $chan, $cb, $opcb = null )

@DESC

$params
params
</md:method>

<md:method>
public function setnx ( $key, $value, $cb = null )

@DESC

$params
params
</md:method>

<md:method>
public function setkey ( $key, $value, $cb = null )

@DESC

$params
params
</md:method>

<md:method>
public function getkey ( $key, $cb = null )

@DESCNS

$params
params
</md:method>

<md:method>
public function expire ( $key, $seconds, $cb = null )

@DESC

$params
params
</md:method>

<md:method>
public function unsubscribe ( $chan, $cb, $opcb = null )

@DESC

$params
params
</md:method>

<md:method>
public function unsubscribeReal ( $chan, $opcb = null )

@DESC

$params
params
</md:method>

<md:method>
public function publish ( $chan, $cb, $opcb = null )

@DESC

$params
params
</md:method>

<md:method>
public function onReady (  )

@DESCспользуется в DNS

$params
params
</md:method>

<md:method>
public function onFinish (  )

@DESCпользуется в DNS

$params
params
</md:method>

<md:method>
public function attachWss ( $wss )

@DESCуется в DNS

$params
params
</md:method>

<md:method>
public function wsHandler ( $ws, $path, $client, $state )

@DESC

$params
params
</md:method>

<md:method>
public function detachWss ( $wss )

@DESCуется в DNS

$params
params
</md:method>

<md:method>
public function beginSession ( $path, $sessId, $server )

@DESC

$params
params
</md:method>

<md:method>
public function getRouteOptions ( $path )

@DESC DNS

$params
params
</md:method>

<md:method>
public function endSession ( $session )

@DESC в DNS

$params
params
</md:method>

<md:method>
public function beginRequest ( $req, $upstream )

@DESC

$params
params
</md:method>

<md:method>
public function callMethod ( $method, $req, $upstream )

@DESC

$params
params
</md:method>
