### shellcommand # ShellCommand #> ShellCommand {tpl-git PHPDaemon/Core/ShellCommand.php}

```php
namespace PHPDaemon\Core;
class ShellCommand extends \PHPDaemon\Network\IOStream;
```

Класс является наследником IOStream, так что в нём доступны такие методы как read[ln], write[ln], и так далее.

#### examples # Примеры

#####$ simple # Простое выполнение, аналог функции shell_exec

```php
ShellCommand::exec('echo "foo"', function($commandInstance, $output) {
   D($output); // foo
});
```

#####$ with_params # С дополнительными параметрами и переменными окружения

```php
$command = 'git log';
$cb = function($commandInstance, $output) {
	 D($output); // foo
};
$arguments = ['-1', '--pretty' => 'oneline'];
$env = [];
ShellCommand::exec($command, $cb, $arguments, $env);
```

> Аргументы будут экранированы с помощью `escapeshellarg`

#####$ packet-processing # Пакетная обработка вывода

@TODO

#### properties # Свойства

<md:prop>
string public $binPath;
Исполняемый путь
</md:prop>

<md:prop>
string public $setUser;
Имя Unix-пользователя от имени которого выполняется команда
</md:prop>

<md:prop>
string public $setGroup;
Имя Unix-группы от имени которого выполняется команда
</md:prop>

<md:prop>
string public $chroot = '/';
Подмена корневого каталога для выполняемой команды
</md:prop>

<md:prop>
string public $cwd;
@TODO
</md:prop>

#### methods # Методы

<md:method>
void public static exec ( string $binPath = null, callable $cb = null, array $args = null, array $env = null )

Выполняет команду (статический метод)

$binPath
исполняемый путь

$cb
функция обратного вызова

$args
массив аргументов

$env
ассоциативный массив переменных окружения (можно передать $_ENV`)
</md:method>

<md:method>
string public getCmd ( )

Возвращает строку исполняемой команды
</md:method>

<md:method>
[ShellCommand](#../) public setUser ( string $val )

Задает имя Unix-пользователя от имени которого выполняется команда

$val
имя пользователя
</md:method>

<md:method>
[ShellCommand](#../) public setGroup ( string $val )

Задает название Unix-группы от которой выполняется команда

$val
название группы
</md:method>

<md:method>
[ShellCommand](#../) public setCwd ( string $dir )

Установить рабочий каталог для выполняемой команды

$dir
путь
</md:method>

<md:method>
[ShellCommand](#../) public setChroot ( string $dir )

Подменяет корневой каталог для выполняемой команды

$dir
путь
</md:method>

<md:method>
[ShellCommand](#../) public setArgs ( array $args = NULL )

Установить список аргументов

$args
массив аргументов
</md:method>

<md:method>
[ShellCommand](#../) public setEnv ( array $env = NULL )

Задает ассоциативный массив переменных окружения (можно передать $_ENV`)

$env
массив
</md:method>

<md:method>
[ShellCommand](#../) public nice ( integer $nice = NULL )

Задает приоритет выделения процессорного времени (меньше — выше)

$nice
целое число
</md:method>

<md:method>
string public static buildArgs ( array $args )

Строит строку аргументов по массиву

$args
массив аргумент
</md:method>

<md:method>
[ShellCommand](#../) public execute ( string $binPath = NULL, array $args = NULL, array $env = NULL )

Непосредственно выполняет команду

$binPath
исполняемый путь

$args
массив аргументов

$env
ассоциативный массив переменных окружения (можно передать $_ENV`)
</md:method>

<md:method>
boolean public finishWrite ( )

Закрывает поток ввода исполняемого процесса, когда буфер будет прочитан
</md:method>

<md:method>
void public close ( )

Завершает процесс
</md:method>

<md:method>
[ShellCommand](#../) public closeWrite ( )

Безусловно закрывает поток ввода исполняемого процесса (STDIN)
</md:method>

<md:method>
boolean public eof ( )

Достигнут ли EOF (Конец Файла)?
</md:method>

<md:method>
[ShellCommand](#../) public onEOF ( callable $cb = NULL )

Переданная функция обратного вызова будет вызвана когда достигнут EOF (Конец Файла)

$cb
функция обратного вызова
</md:method>