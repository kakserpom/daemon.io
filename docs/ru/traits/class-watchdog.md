### class-watchdog # ClassWatchdog #> ClassWatchdog {tpl-git PHPDaemon/Traits/ClassWatchdog.php}

`:hp`trait \PHPDaemon\Traits\ClassWatchdog`

> Данная примесь уже использована во всех базовых классах и при наследовании от них не нужно использовать её повторно.

Эта примесь нужна, чтобы предотвратить появление ошибки уровня E_ERROR (Fatal error) при обращении к несуществующему методу. E_ERROR же прерывает работу всего рабочего процесса, что недопустимо в реалиях phpDaemon. Настоятельно рекомендуется к использованию во всех используемых классах.


Определены следующие {tpl-outlink http://php.net/language.oop5.magic магические методы}:

-.n.ti `__call` — бросает исключение UndefinedMethodCalled
-.n.ti `__callStatic` — бросает исключение UndefinedMethodCalled
