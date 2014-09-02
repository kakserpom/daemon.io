### clientconnection # ClientConnection #> ClientConnection {tpl-git PHPDaemon/Network/ClientConnection.php}

```php
namespace PHPDaemon\Network;
class ClientConnection extends Connection;
```

@TODO

#### methods # Methods

<md:method>
void public __construct ( resource $fd, object $pool = null )

Constructor

$fd
File descriptor

$pool
ConnectionPool
</md:method>

<md:method>
boolean public isBusy ( )

Busy?
</md:method>

<md:method>
void public onResponse ( callable $cb )

Push callback to onReponse stack

$cb
callable
</md:method>

<md:method>
void public onReady ( )

Called when the connection is handshaked (at low-level), and peer is ready to recv. data
</md:method>

<md:method>
void public setFree ( boolean $free = true )

Set connection free/busy

$free
Free?
</md:method>

<md:method>
void public release ( )

Set connection free
</md:method>

<md:method>
void public checkFree ( )

Set connection free/busy according to onResponse emptiness and ->finished
</md:method>

<md:method>
integer public getQueueLength ( )

@TODO
</md:method>

<md:method>
boolean public isQueueEmpty ( )

@TODO
</md:method>

<md:method>
void public onFinish ( )

Called when connection finishes
</md:method>