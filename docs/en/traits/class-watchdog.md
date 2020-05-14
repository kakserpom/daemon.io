### class-watchdog # ClassWatchdog #> ClassWatchdog {tpl-git PHPDaemon/Traits/ClassWatchdog.php}

```php
namespace PHPDaemon\Traits;
trait ClassWatchdog;
```

> This trait is already used in all base classes and there is no need to reuse it when inheriting from them.

This trait is needed to prevent an E_ERROR (Fatal error) level error from occurring when calling a non-existent method. E_ERROR, however, interrupts the entire workflow, which is unacceptable in the phpDaemon reality. It is strongly recommended for all classes to use.


This trait defines the following [magic methods](http://php.net/language.oop5.magic):

-.n.ti `__call` — throws the exception UndefinedMethodCalled
-.n.ti `__callStatic` — throws the exception UndefinedMethodCalled.
