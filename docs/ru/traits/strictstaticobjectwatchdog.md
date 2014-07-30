### strict-static-object-watchdog # StrictStaticObjectWatchdog #> StrictStaticObjectWatchdog {tpl-git PHPDaemon/Traits/StrictStaticObjectWatchdog.php}

Директива для использования: `use \PHPDaemon\Traits\StrictStaticObjectWatchdog;`

Поведение аналогично {tpl-inlink static-object-watchdog StaticObjectWatchdog}, но эта примесь бросает исключение, вместо записи в журнал.

Определяет следующие магические методы:

-.n.ti `__set` — бросает исключение UndefinedPropertySetting при попытке записать значение несуществующего или недоступного из этой области видимости свойства. 
-.n.ti `__unset` — бросает исключение UnsettingProperty при попытке удалить свойство.
