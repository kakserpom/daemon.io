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

<!-- include-namespace path="\PHPDaemon\Core\ShellCommand" level="" access="" -->
#### properties # Properties

<md:prop>
/**
	 * @var string Executable path
	 */
public $binPath;
</md:prop>

<md:prop>
/**
	 * @var string SUID
	 */
public $setUser;
</md:prop>

<md:prop>
/**
	 * @var string SGID
	 */
public $setGroup;
</md:prop>

<md:prop>
/**
	 * @var string Chroot
	 */
public $chroot;
</md:prop>

<md:prop>
/**
	 * @var string Chdir
	 */
public $cwd;
</md:prop>

<md:prop>
/**
	 * @var object Associated pool
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
	 * @return this
	 */
public function setGroup($val)
</md:method>

<md:method>
/**
	 * Set cwd
	 * @param  string $dir
	 * @return this
	 */
public function setCwd($dir)
</md:method>

<md:method>
/**
	 * Set group
	 * @param  string $val
	 * @return this
	 */
public function setUser($val)
</md:method>

<md:method>
/**
	 * Set chroot
	 * @param  string $dir
	 * @return this
	 */
public function setChroot($dir)
</md:method>

<md:method>
/**
	 * Execute
	 * @param  string   $binPath Binpath
	 * @param  callable $cb 	 Callback
	 * @param  array    $args    Optional. Arguments
	 * @param  array    $env     Optional. Hash of environment's variables
	 */
public static function exec($binPath = null, $cb = null, $args = null, $env = null)
</md:method>

<md:method>
/**
	 * Sets fd
	 * @param  resource          $fd File descriptor
	 * @param  \EventBufferEvent $bev
	 * @return void
	 */
public function setFd($fd, $bev = null)
</md:method>

<md:method>
/**
	 * Sets an array of arguments
	 * @param  array Arguments
	 * @return this
	 */
public function setArgs($args = NULL)
</md:method>

<md:method>
/**
	 * Set a hash of environment's variables
	 * @param  array Hash of environment's variables
	 * @return this
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
	 * Set priority
	 * @param  integer $nice Priority
	 * @return this
	 */
public function nice($nice = NULL)
</md:method>

<md:method>
/**
	 * Build arguments string from associative/enumerated array (may be mixed)
	 * @param  array $args
	 * @return string
	 */
public static function buildArgs($args)
</md:method>

<md:method>
/**
	 * Execute
	 * @param  string $binPath Optional. Binpath
	 * @param  array  $args    Optional. Arguments
	 * @param  array  $env     Optional. Hash of environment's variables
	 * @return this
	 */
public function execute($binPath = NULL, $args = NULL, $env = NULL)
</md:method>

<md:method>
/**
	 * Finish write stream
	 * @return boolean
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
	 * @return this
	 */
public function closeWrite()
</md:method>

<md:method>
/**
	 * Got EOF?
	 * @return boolean
	 */
public function eof()
</md:method>

<md:method>
/**
	 * Send data to the connection. Note that it just writes to buffer that flushes at every baseloop
	 * @param  string $data Data to send
	 * @return boolean Success
	 */
public function write($data)
</md:method>

<md:method>
/**
	 * Send data and appending \n to connection. Note that it just writes to buffer flushed at every baseloop
	 * @param  string Data to send
	 * @return boolean Success
	 */
public function writeln($data)
</md:method>

<md:method>
/**
	 * Sets callback which will be called once when got EOF
	 * @param  callable $cb
	 * @return this
	 */
public function onEOF($cb = NULL)
</md:method>


<!--/ include-namespace -->
