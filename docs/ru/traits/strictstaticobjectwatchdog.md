### strictstaticobjectwatchdog # StrictStaticObjectWatchdog #> StrictStaticObjectWatchdog {tpl-git PHPDaemon/Traits/StrictStaticObjectWatchdog.php}

Трейт содержит два "волшебных" метода `__set` и `__unset`.

При записи данных в недоступные свойства или вызове `unset()` на недоступном свойстве будет выброшено исключение `UndefinedPropertySetting` или `UnsettingProperty` соответственно.