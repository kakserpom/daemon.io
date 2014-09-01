### client # Client #> Client {tpl-git PHPDaemon/Network/Client.php}

```php
namespace PHPDaemon\Network;
class Client extends Pool;
```

@TODO

#### methods # Методы

<md:method>
void public addServer ( string $url, integer $weight = NULL )

Adds server

$url
Server URL

$weight
Weight
</md:method>

<md:method>
boolean public getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )

Returns available connection from the pool

$url
Address

$cb
onConnected

$pri
Optional. Priority.
</md:method>

<md:method>
void public detach ( @TODO $conn )

Detach Connection

$conn
Connection
</md:method>

<md:method>
void public markConnFree ( [ClientConnection](#../../clientconnection) $conn, string $url )

Mark connection as free

$conn
Connection

$url
URL
</md:method>

<md:method>
void public markConnBusy ( [ClientConnection](#../../clientconnection) $conn, string $url )

Mark connection as busy

$conn
Connection

$url
URL
</md:method>

<md:method>
void public detachConnFromUrl ( [ClientConnection](#../../clientconnection) $conn, string $url )

Detaches connection from URL

$conn
Connection

$url
URL
</md:method>

<md:method>
void public touchPending ( string $url )

Touch pending "requests for connection"

$url
URL
</md:method>

<md:method>
boolean public getConnectionByKey ( string $key, callable $cb = null )

Returns available connection from the pool by key

$key
Key

$cb
Callback
</md:method>

<md:method>
boolean public getConnectionRR ( callable $cb = null )

Returns available connection from the pool

$cb
Callback
</md:method>

<md:method>
boolean public requestByServer ( string $server, string $data, callable $onResponse = null )

Sends a request to arbitrary server

$server
Server

$data
Request

$onResponse
Callback called when the request complete
</md:method>

<md:method>
boolean public requestByKey ( string $key, string $data, callable $onResponse = null )

Sends a request to server according to the key

$key
Key

$data
Request

$onResponse
Callback called when the request complete
</md:method>

<md:method>
boolean public onShutdown ( boolean $graceful = false )

Called when application instance is going to shutdown

$graceful
@TODO
</md:method>