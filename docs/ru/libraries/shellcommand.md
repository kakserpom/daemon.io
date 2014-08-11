### shellcommand # ShellCommand #> ShellCommand {tpl-git PHPDaemon/Core/ShellCommand.php}

```php
namespace PHPDaemon\Core;
class ShellCommand extends \PHPDaemon\Network\IOStream;
```

Класс является наследником IOStream, так что в нём доступны такие методы как read[ln], write[ln], и так далее.

#### examples # Примеры

#####$ simple # Простое выполнение, аналог функции shell_exec

```php
ShellCommand::exec('echo "foo"', function($o, $data) {
   D($data); // foo
});
```

#####$ packet-processing # Пакетная обработка вывода

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
 void public static exec ( string $binPath = null, callable $cb = null, array $args = null, array $env = null )
 ```
   -.n Выполняет команду (статический метод)
   -.n.ti `:hc`$binPath` — исполняемый путь
   -.n `:hc`$cb` — функция обратного вызова
   -.n `:hc`$args` — массив аргументов
   -.n `:hc`$env` — ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)

-.method ```php.inline
 void public static ShellCommand::exec ( string $binPath = null, callable $cb = null, array $args = null, array $env = null )
 ```
   -.n Выполняет команду (статический метод)
   -.n.ti `:hc`$binPath` — исполняемый путь
   -.n `:hc`$cb` — функция обратного вызова
   -.n `:hc`$args` — массив аргументов
   -.n `:hc`$env` — ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)


 -.method ```php.inline
 string public getCmd ( )
 ```
   -.n Возвращает строку исполняемой команды

 -.method ```php:p.inline
 [ShellCommand](#../) public setUser ( string $val )
 ```
   -.n -.n Задает имя Unix-пользователя от имени которого выполняется команда
   -.n.ti `:hc`$val` — имя пользователя

 -.method ```php:p.inline
 [ShellCommand](#../) public setGroup ( string $val )
 ```
   -.n Задает название Unix-группы от которой выполняется команда
   -.n.ti `:hc`$val` — название группы

 -.method ```php:p.inline
 [ShellCommand](#../) public setCwd ( string $dir )
 ```
   -.n Установить рабочий каталог для выполняемой команды
   -.n.ti `:hc`$dir` — путь

 -.method ```php:p.inline
 [ShellCommand](#../) public setChroot ( string $dir )
 ```
   -.n Подменяет корневой каталог для выполняемой команды
   -.n.ti `:hc`$dir` — путь

 -.method ```php:p.inline
 [ShellCommand](#../) public setArgs ( array $args = NULL )
 ```
   -.n Установить список аргументов
   -.n.ti `:hc`$args` — массив аргументов

 -.method ```php:p.inline
 [ShellCommand](#../) public setEnv ( array $env = NULL )
 ```
   -.n Задает ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)
   -.n.ti `:hc`$env` — массив

 -.method ```php:p.inline
 [ShellCommand](#../) public nice ( integer $nice = NULL )
 ```
   -.n Задает приоритет выделения процессорного времени (меньше — выше)
   -.n.ti `:hc`$nice` — целое число

 -.method ```php.inline
 string public static buildArgs ( array $args )
 ```
   -.n Строит строку аргументов по массиву
   -.n.ti `:hc`$args` — массив аргумент

 -.method ```php:p.inline
 [ShellCommand](#../) public execute ( string $binPath = NULL, array $args = NULL, array $env = NULL )
 ```
   -.n Непосредственно выполняет команду
   -.n.ti `:hc`$binPath` — исполняемый путь
   -.n `:hc`$args` — массив аргументов
   -.n `:hc`$env` — ассоциативный массив переменных окружения (можно передать `:hc`$_ENV`)

 -.method ```php.inline
 boolean public finishWrite ( )
 ```
   -.n Закрывает поток ввода исполняемого процесса, когда буфер будет прочитан

 -.method ```php.inline
 void public close ( )
 ```
   -.n Завершает процесс

 -.method ```php:p.inline
 [ShellCommand](#../) public closeWrite ( )
 ```
   -.n Безусловно закрывает поток ввода исполняемого процесса (STDIN)

 -.method ```php.inline
 boolean public eof ( )
 ```
   -.n Достигнут ли EOF (Конец Файла)?

 -.method ```php:p.inline
 [ShellCommand](#../) public onEOF ( callable $cb = NULL )
 ```
   -.n Переданная функция обратного вызова будет вызвана когда достигнут EOF (Конец Файла)
   -.n.ti `:hc`$cb` — функция обратного вызова

