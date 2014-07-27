### staticobjectwatchdog # StaticObjectWatchdog #> StaticObjectWatchdog {tpl-git PHPDaemon/Traits/StaticObjectWatchdog.php}

Трейт содержит два "волшебных" метода `__set` и `__unset`.

При записи данных в недоступные свойства или вызове `unset()` на недоступном свойстве действие будет сопровождаться записью `[CODE WARN]` в журнале.