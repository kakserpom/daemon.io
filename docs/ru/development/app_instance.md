### app_instance # Приложение

Приложением в демоне является класс, наследуемый от `\PHPDaemon\Core\AppInstance`.
Название файла должно совпадать с названием приложения.

Разместите свое приложение в каталоге со стандартными приложениями демона `./PHPDaemon/Applications`. Укажите `namespace PHPDaemon\Applications;`.

> Вы можете разместить свое приложение в любом каталоге. Для этого слудет указать путь до каталога в опции [add-include-path](#config/variables/pathes) и `namespace` относительно этого каталога.

Для обработки входящих запросов надо объявить метод `beginRequest`, который должен возвращать объект запроса. Про него будет сказано чуть ниже.

Пример простейшего приложения `./PHPDaemon/Applications/MyApp.php`:

```php
namespace PHPDaemon\Applications;

class MyApp extends \PHPDaemon\Core\AppInstance {
	public function beginRequest($req, $upstream) {
		return new MyAppRequest($this, $upstream, $req);
	}
}
```

Основные методы приложения:

<md:method>
void protected init ( )

Инициализация приложения. Приложению необходимо сохранить необходимые зависимости и подготовиться к запуску.
</md:method>

<md:method>
void public onReady ( )

Означает что рабочий процесс, в котором запущено приложение, готов к обработке.
</md:method>

<md:method>
boolean protected onShutdown ( $graceful = false )

Завершение приложения. По-умолчанию возвращает `true`. Если вернуть `false`, приложение не будет завершено. Повторная попытка будет через 1 секунду.

$graceful
Флаг плавного завершения приложения.
</md:method>

<md:method>
object public beginRequest ( object $req, object $upstream )

Запрашивает объект нового запроса к приложению. Метод может вернуть false, это значит что приложение отказывается (или не умеет) обрабатывать запросы. После вызова этого метода, объект запроса попадает в очередь и вызывается итеративно.

$req
Объект запроса.

$upstream
Объект сервера.
</md:method>

> Если не объявлять метод `beginRequest` приложение при инициализации попытается найти и вернуть объект класса c постфиксом Request. Т.е. для приложения `MyApp` приложение попытается найти `MyAppRequest`.
