### strict-static-object-watchdog # StrictStaticObjectWatchdog #> StrictStaticObjectWatchdog {tpl-git PHPDaemon/Traits/StrictStaticObjectWatchdog.php}

```php
namespace PHPDaemon\Traits;
trait StrictStaticObjectWatchdog;
```

Поведение аналогично [StaticObjectWatchdog](#../static-object-watchdog), но эта примесь бросает исключение, вместо записи в журнал.

Определяет следующие магические методы:

-.n.ti `__set` — бросает исключение UndefinedPropertySetting при попытке записать значение несуществующего или недоступного из этой области видимости свойства. 
-.n.ti `__unset` — бросает исключение UnsettingProperty при попытке удалить свойство.
