### telnethoneypot # ServerStatus #> ServerStatus {tpl-git PHPDaemon/Applications/ServerStatus.php}

```php:p
namespace PHPDaemon\Applications;
class ServerStatus;
```

Это приложение обеспечивает получение информации о состоянии phpDaemon по протоколу HTTP, аналогично консольной команде `phpd fullstatus`.

#### use # Использование

Необходимо добавить в `conf/phpd.conf`:

```
ServerStatus {
    enable    1;
}
HTTP {
    enable 1;
    privileged;
}
```

Также в `conf/AppResolver.php` в методе `getRequestRoute()` добавить условие для запуска метода `beginRequest()` в приложении ServerStatus. Например, чтобы получить информацию о phpDaemon по адресу http://<host>/ServerStatus/:

```php
<?php
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
?>
```

Пример ответа:

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

#### note # Примечание

Если вы используете опцию --logworkersetstatus, то соответствие такое:

 - 1 - idle
 - 2 - busy
 - 3 - shutdown
 - 4 - pre-init
 - 5 - wait-init
 - 6 - init