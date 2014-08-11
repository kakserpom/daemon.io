### sessions # Sessions #> Sessions {tpl-git PHPDaemon/Traits/Sessions.php}

```php
namespace PHPDaemon\Traits;
trait Sessions;
```

Эта примесь реализует механизм сессий, именно реализует, а не является оберткой над `session_*` функциями

Почему мы не можем использовать нативный механизм сессий PHP?

**Проблема №1:** В долго живущих процессах(обслуживающих больше одного клиента) суперглобальный массив `$_SESSION` не будет создаваться заново.  
**Проблема №2:** Нативная реализация сессий является блокируюей, что расходится с идеологией PhpDaemon - обеспечить неблокирующий I/O.

Как и нативная реализация, поведение сессий основывается на `php.ini`

Текущая реализация поддерживает хранение сессий в файлах, `session.serialize_handler = php|php_binary`, lock `r+!` файлов - аналогичный нативному
- для предотвращения race condition

Вы можете безопасно использовать PhpDaemon c существующими сессиями, сериализация совместима с нативной
(См. {tpl-outlink http://php.net//manual/ru/function.session-encode.php session_encode}, {tpl-outlink http://php.net//manual/ru/function.session-decode.php session_decode})

@TODO - добавить примеры использования

> Данная примесь используется в {tpl-inlink HTTPRequest HTTPRequest} и {tpl-inlink servers/websocket/route Servers\WebSocket\Route}
