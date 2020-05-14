### strict-static-object-watchdog # StrictStaticObjectWatchdog #> StrictStaticObjectWatchdog {tpl-git PHPDaemon/Traits/StrictStaticObjectWatchdog.php}

```php
namespace PHPDaemon\Traits;
trait StrictStaticObjectWatchdog;
```

The behavior is similar to [StaticObjectWatchdog](#../static-object-watchdog), but this trait throws an exception instead of logging.

Defines the following magic methods:

-.n.ti `__set` — throws a UndefinedPropertySetting exception when trying to write a value of a property that does not exist or is inaccessible from this scope.
-.n.ti `__unset` — throws a UnsettingProperty exception when trying to remove a property.
