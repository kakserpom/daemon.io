### serverstatus # ServerStatus #> ServerStatus {tpl-git PHPDaemon/Applications/ServerStatus.php}

```php:p
namespace PHPDaemon\Applications;
class ServerStatus;
```

This application provides information about the state of phpDaemon over HTTP, similar to the console command `phpd fullstatus`.

#### use # Use

It is necessary to add `conf/phpd.conf`:

```
ServerStatus {
    enable    1;
}
HTTP {
    enable 1;
    privileged;
}
```

Also `conf/AppResolver.php` in the method of `getRequestRoute()` adding a condition to start the method beginRequest() in ServerStatus application. For example, to get information about phpDaemon at http://<host>/ServerStatus/:

```php
/**
 * Routes incoming request to related application. Method is for overloading.   
 * @param object Request.
 * @param object AppInstance of Upstream.
 * @return string Application's name.
 */
public function getRequestRoute($req, $upstream) {
    if (preg_match('~^/(ServerStatus|Example)/~', $req->attrs->server['DOCUMENT_URI'], $m)) {
        return $m[1];
    }
}
```

Sample answer:

```
Uptime: 1 day. 11 hour. 33 min. 51 sec.
State of workers:
        Total: 4
        Idle: 4
        Busy: 0
        Shutdown: 20
        Pre-init: 0
        Wait-init: 0
        Init: 0
```

#### note # Note

If you are using --logworkersetstatus option, the line is:

 - 1 - idle
 - 2 - busy
 - 3 - shutdown
 - 4 - pre-init
 - 5 - wait-init
 - 6 - init
