### shellcommand # ShellCommand #> ShellCommand {tpl-git PHPDaemon/Core/ShellCommand.php}

`:h`class PHPDaemon\Core\ShellCommand extends \PHPDaemon\Network\IOStream`

Класс является наследником IOStream, так что в нём доступны такие методы как read[ln], write[ln], и так далее.

#### examples # Примеры

##### simple # Простое выполнение, аналог функции shell_exec

```php
ShellCommand::exec('echo "foo"', function($o, $data) {
   D($data); // foo
});
```

##### packet-processing # Пакетная обработка вывода

```php
ShellCommand::exec('echo "foo"', function($o, $data) {
   D($data); // foo
});
```

#### properties # Свойства

 -.method `:h`string public $binPath;`  
 Исполняемый путь

 -.method `:h`string public $setUser;`  
 Имя Unix-пользователя от имени которого выполняется команда

 -.method `:h`string public $setGroup;`  
Имя Unix-группы от имени которого выполняется команда

 -.method `:h`string public $chroot = '/';`  
Подмена корневого каталога для выполняемой команды

 -.method `:h`string public $cwd;`  
 

#### methods # Методы

-.method ```php.inline
 void public static ShellCommand::exec ( string $binPath = null, callable $cb = null, array $args = null, array $env = null )
 ```
   -.n Выполняет команду (статический метод)
   -.n.ti `:hc`$binPath` — исполняемый путь
   -.n `:hc`$cb` — функция обратного вызова
   -.n `:hc`$args` — массив аргументов
   -.n `:hc`$env` — ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)


 -.method ```php.inline
 string public ShellCommand::getCmd ( )
 ```
   -.n Возвращает строку исполняемой команды

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setUser ( string $val )
 ```
   -.n -.n Задает имя Unix-пользователя от имени которого выполняется команда
   -.n.ti `:hc`$val` — имя пользователя

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setGroup ( string $val )
 ```
   -.n Задает название Unix-группы от которой выполняется команда
   -.n.ti `:hc`$val` — название группы

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setCwd ( string $dir )
 ```
   -.n Установить рабочий каталог для выполняемой команды
   -.n.ti `:hc`$dir` — путь

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setChroot ( string $dir )
 ```
   -.n Подменяет корневой каталог для выполняемой команды
   -.n.ti `:hc`$dir` — путь


 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setArgs ( array $args = NULL )
 ```
   -.n Установить список аргументов
   -.n.ti `:hc`$args` — массив аргументов

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setEnv ( array $env = NULL )
 ```
   -.n Задает ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)
   -.n.ti `:hc`$env` — массив

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::nice ( integer $nice = NULL )
 ```
   -.n Задает приоритет выделения процессорного времени (меньше — выше)
   -.n.ti `:hc`$nice` — целое число

 -.method ```php.inline
 string public static ShellCommand::buildArgs ( array $args )
 ```
   -.n Строит строку аргументов по массиву
   -.n.ti `:hc`$args` — массив аргумент

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::execute ( string $binPath = NULL, array $args = NULL, array $env = NULL )
 ```
   -.n Непосредственно выполняет команду
   -.n.ti `:hc`$binPath` — исполняемый путь
   -.n `:hc`$args` — массив аргументов
   -.n `:hc`$env` — ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)

 -.method ```php.inline
 boolean public ShellCommand::finishWrite ( )
 ```
   -.n Закрывает поток ввода исполняемого процесса, когда буфер будет прочитан

 -.method ```php.inline
 void public ShellCommand::close ( )
 ```
   -.n Завершает процесс

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::closeWrite ( )
 ```
   -.n Безусловно закрывает поток ввода исполняемого процесса (STDIN)

 -.method ```php.inline
 boolean public ShellCommand::eof ( )
 ```
   -.n Достигнут ли EOF (Конец Файла)?

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::onEOF ( callable $cb = NULL )
 ```
   -.n Переданная функция обратного вызова будет вызвана когда достигнут EOF (Конец Файла)
   -.n.ti `:hc`$cb` — функция обратного вызова

