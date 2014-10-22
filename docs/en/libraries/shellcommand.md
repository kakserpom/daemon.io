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

<!-- include-namespace path="\PHPDaemon\Core\ShellCommand" commit="5af07ac182a1104fd4bc61da87154dd6f55e5155" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * Executable path
	 * @var string
	 */
public $binPath;
</md:prop>

<md:prop>
/**
	 * SUID
	 * @var string
	 */
public $setUser;
</md:prop>

<md:prop>
/**
	 * SGID
	 * @var string
	 */
public $setGroup;
</md:prop>

<md:prop>
/**
	 * Chroot
	 * @var string
	 */
public $chroot;
</md:prop>

<md:prop>
/**
	 * Chdir
	 * @var string
	 */
public $cwd;
</md:prop>

<md:prop>
/**
	 * Associated pool
	 * @var object ConnectionPool
	 */
public $pool;
</md:prop>

#### methods # Methods

<md:method>
/**
	 * Get command string
	 * @return string
	 */
public function getCmd()
</md:method>

<md:method>
/**
	 * Set group
	 * @param string $group
	 * @return object $this
	 */
public function setGroup($val)
</md:method>

<md:method>
/**
	 * Set cwd
	 * @param string $dir
	 * @return object $this
	 */
public function setCwd($dir)
</md:method>

<md:method>
/**
	 * Set group
	 * @param string $user
	 * @return object $this
	 */
public function setUser($val)
</md:method>

<md:method>
/**
	 * Set chroot
	 * @param string $dir
	 * @return object $this
	 */
public function setChroot($dir)
</md:method>

<md:method>
/**
	 * Execute
	 * @param string $binPath Optional. Binpath.
	 * @param callable $cb 	  Callback
	 * @param array $args     Optional. Arguments.
	 * @param array $env      Optional. Hash of environment's variables.
	 * @return object ShellCommand
	 */
public static function exec($binPath = null, $cb = null, $args = null, $env = null)
</md:method>

<md:method>
/**
	 * Sets fd
	 * @param mixed File descriptor
	 * @param [object EventBufferEvent]
	 * @return void
	 */
public function setFd($fd, $bev = null)
</md:method>

<md:method>
/**
	 * Sets an array of arguments
	 * @param array Arguments
	 * @return object ShellCommand
	 */
public function setArgs($args = NULL)
</md:method>

<md:method>
/**
	 * Set a hash of environment's variables
	 * @param array Hash of environment's variables
	 * @return object ShellCommand
	 */
public function setEnv($env = NULL)
</md:method>

<md:method>
/**
	 * Called when got EOF
	 * @return void
	 */
public function onEofEvent()
</md:method>

<md:method>
/**
	 * Set priority.
	 * @param integer $nice Priority
	 * @return object ShellCommand
	 */
public function nice($nice = NULL)
</md:method>

<md:method>
/**
	 * Build arguments string from associative/enumerated array (may be mixed)
	 * @param array $args
	 * @return string
	 */
public static function buildArgs($args)
</md:method>

<md:method>
/**
	 * Execute
	 * @param string $binPath Optional. Binpath.
	 * @param array $args     Optional. Arguments.
	 * @param array $env      Optional. Hash of environment's variables.
	 * @return object ShellCommand
	 */
public function execute($binPath = NULL, $args = NULL, $env = NULL)
</md:method>

<md:method>
/**
	 * Finish write stream
	 * @return bool
	 */
public function finishWrite()
</md:method>

<md:method>
/**
	 * Close the process
	 * @return void
	 */
public function close()
</md:method>

<md:method>
/**
	 * Called when stream is finished
	 */
public function onFinish()
</md:method>

<md:method>
/**
	 * Close write stream
	 * @return $this
	 */
public function closeWrite()
</md:method>

<md:method>
/**
	 * Got EOF?
	 * @return bool
	 */
public function eof()
</md:method>

<md:method>
/**
	 * Send data to the connection. Note that it just writes to buffer that flushes at every baseloop
	 * @param string Data to send.
	 * @return boolean Success.
	 */
public function write($data)
</md:method>

<md:method>
/**
	 * Send data and appending \n to connection. Note that it just writes to buffer flushed at every baseloop
	 * @param string Data to send.
	 * @return boolean Success.
	 */
public function writeln($data)
</md:method>

<md:method>
/**
	 * Sets callback which will be called once when got EOF 
	 * @param callable $cb
	 * @return $this
	 */
public function onEOF($cb = NULL)
</md:method>


<!--/ include-namespace -->
