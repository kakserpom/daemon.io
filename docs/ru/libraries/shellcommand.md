### shellcommand # ShellCommand #> ShellCommand {tpl-git PHPDaemon/Core/ShellCommand.php}

`:h`class PHPDaemon\Core\ShellCommand`

#### vars # Свойства

 -.method `:h`boolean public $writeState;`  
 @TODO

 -.method `:h`boolean public $finishWrite;`  
 @TODO

 -.method `:h`sring public $binPath;`  
 @TODO

 -.method `:h`sring public $setUser;`  
 @TODO

 -.method `:h`sring public $setGroup;`  
 @TODO

 -.method `:h`string public $chroot = '/';`  
 @TODO

 -.method `:h`string public $cwd;`  
 @TODO

#### methods # Методы

 -.method ```php.inline
 string public ShellCommand::getCmd ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setGroup ( string $val )
 ```
   -.n @TODO
   -.n.ti `:hc`$val` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setCwd ( string $dir )
 ```
   -.n @TODO
   -.n.ti `:hc`$dir` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setUser ( string $val )
 ```
   -.n @TODO
   -.n.ti `:hc`$val` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setChroot ( string $dir )
 ```
   -.n @TODO
   -.n.ti `:hc`$dir` — @TODO

 -.method ```php.inline
 void public static ShellCommand::exec ( string $binPath = null, callable $cb = null, array $args = null, array $env = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$binPath` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$args` — @TODO
   -.n `:hc`$env` — @TODO

 -.method ```php.inline
 void public ShellCommand::setFd ( mixed $fd, EventBufferEvent $bev = null )
 ```
   -.n @TODO
   -.n.ti `:hc`$fd` — @TODO
   -.n `:hc`$bev` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setArgs ( array $args = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$args` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::setEnv ( array $env = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$env` — @TODO

 -.method ```php.inline
 void public ShellCommand::onEofEvent ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::nice ( integer $nice = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$nice` — @TODO

 -.method ```php.inline
 string public static ShellCommand::buildArgs ( array $args )
 ```
   -.n @TODO
   -.n.ti `:hc`$args` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::execute ( string $binPath = NULL, array $args = NULL, array $env = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$binPath` — @TODO
   -.n `:hc`$args` — @TODO
   -.n `:hc`$env` — @TODO

 -.method ```php.inline
 boolean public ShellCommand::finishWrite ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public ShellCommand::close ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public ShellCommand::onFinish ( )
 ```
   -.n @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::closeWrite ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public ShellCommand::eof ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public ShellCommand::write ( string $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO

 -.method ```php.inline
 boolean public ShellCommand::writeln ( string $data )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO

 -.method ```php:p.inline
 [ShellCommand](#../) public ShellCommand::onEOF ( callable $cb = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
