### fs # FS #> FS {tpl-git PHPDaemon/FS}

`:h`namespace PHPDaemon\FS`

#### filesystem # Класс FileSystem {tpl-git PHPDaemon/FS/FileSystem.php}

`:h`class PHPDaemon\FS\FileSystem`

##### vars # Свойства

 -.method `:h`boolean public static $supported;`  
 @TODO

 -.method `:h`Event public static $ev;`  
 @TODO

 -.method `:h`resource public static $fd;`  
 @TODO

 -.method `:h`array public static $modeTypes;`  
 @TODO

 -.method `:h`integer public static $badFDttl = 5;`  
 @TODO

 -.method `:hp`[CappedStorage](#libraries/cache/capped-storage) public static $fdCache;`  
 @TODO

 -.method `:h`integer public static $fdCacheSize = 128;`  
 @TODO

 -.method `:h`string public static $eioVer = '1.2.1';`  
 @TODO

##### methods # Методы

 -.method ```php.inline
 void public static FileSystem::init ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public static FileSystem::initEvent ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public static FileSystem::checkFileReadable ( string $path )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO

 -.method ```php.inline
 void public static FileSystem::waitAllEvents ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public static FileSystem::updateConfig ( )
 ```
   -.n @TODO

 -.method ```php.inline
 string public static FileSystem::sanitizePath ( string $path )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO

 -.method ```php.inline
 array public static FileSystem::statPrepare ( array $stat )
 ```
   -.n @TODO
   -.n.ti `:hc`$stat` — @TODO

 -.method ```php.inline
 resource public static FileSystem::stat ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::unlink ( string $path, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::rename ( string $path, string $newpath, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$newpath` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::statvfs ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::lstat ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::realpath ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::sync ( callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::syncfs ( callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::touch ( string $path, integer $mtime, integer $atime = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$mtime` — @TODO
   -.n `:hc`$atime` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::rmdir ( string $path, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::mkdir ( string $path, integer $mode, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$mode` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::readdir ( string $path, callable $cb = null, integer $flags, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$flags` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::truncate ( string $path, integer $offset = 0, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 boolean public static FileSystem::sendfile ( mixed $outfd, string $path, callable $cb, callable $startCb = null, integer $offset = 0, integer $length = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$outfd` — @TODO
   -.n `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$startCb` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$length` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::chown ( string $path, integer $uid, integer $gid = -1, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$uid` — @TODO
   -.n `:hc`$gid` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public static FileSystem::readfile ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 void public static FileSystem::readfileChunked ( string $path, callable $cb, callable $chunkcb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$chunkcb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 string public static FileSystem::genRndTempnam ( string $dir = null, string $prefix = 'php' )
 ```
   -.n @TODO
   -.n.ti `:hc`$dir` — @TODO
   -.n `:hc`$prefix` — @TODO

 -.method ```php.inline
 string public static FileSystem::genRndTempnamPrefix ( string $dir, string $prefix )
 ```
   -.n @TODO
   -.n.ti `:hc`$dir` — @TODO
   -.n `:hc`$prefix` — @TODO

 -.method ```php.inline
 void public static FileSystem::tempnam ( string $dir, string $prefix, callable $cb )
 ```
   -.n @TODO
   -.n.ti `:hc`$dir` — @TODO
   -.n `:hc`$prefix` — @TODO
   -.n `:hc`$cb` — @TODO

 -.method ```php.inline
 resource public static FileSystem::open ( string $path, string $flags, callable $cb, integer $mode = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$flags` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$mode` — @TODO
   -.n `:hc`$pri` — @TODO

#### file # Класс File {tpl-git PHPDaemon/FS/File.php}

`:h`class PHPDaemon\FS\File`

##### vars # Свойства

-.method `:h`integer public priority = 10;`  
 @TODO

-.method `:h`integer public $chunkSize = 4096;`  
 @TODO

-.method `:h`integer public $offset = 0;`  
 @TODO

-.method `:h`string public $fdCacheKey;`  
 @TODO

-.method `:h`boolean public $append;`  
 @TODO

-.method `:h`string public $path;`  
 @TODO

-.method `:h`boolean public $writing = false;`  
 @TODO

-.method `:h`boolean public $closed = false;`  
 @TODO

##### methods # Методы

 -.method ```php.inline
 void public File::__construct ( resource $fd, string $path )
 ```
   -.n @TODO
   -.n.ti `:hc`$fd` — @TODO
   -.n `:hc`$path` — @TODO

 -.method ```php.inline
 resource public File::getFd ( )
 ```
   -.n @TODO

 -.method ```php.inline
 mixed public static File::convertFlags ( string $mode, boolean $text = false )
 ```
   -.n @TODO
   -.n.ti `:hc`$mode` — @TODO
   -.n `:hc`$text` — @TODO

 -.method ```php.inline
 resource public File::truncate ( integer $offset = 0, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$offset` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::stat ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::statRefresh ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::statvfs ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::sync ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::datasync ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::write ( string $data, callable $cb = null, integer $offset = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$data` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::chown ( integer $uid, integer $gid = -1, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$uid` — @TODO
   -.n `:hc`$gid` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::touch ( integer $mtime, integer $atime = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$mtime` — @TODO
   -.n `:hc`$atime` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 void public File::clearStatCache ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public File::read ( integer $length, integer $offset = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$length` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 boolean public File::sendfile ( mixed $outfd, callable $cb, callable $startCb = null, integer $offset = 0, integer $length = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$outfd` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$startCb` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$length` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::readahead ( integer $length, integer $offset = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$length` — @TODO
   -.n `:hc`$offset` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 boolean public File::readAll ( callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 resource public File::readAllChunked ( callable $cb = null, callable $chunkcb = null, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$cb` — @TODO
   -.n `:hc`$chunkcb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 string public File::__toString ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public File::setChunkSize ( integer $n )
 ```
   -.n @TODO
   -.n.ti `:hc`$n` — @TODO

 -.method ```php.inline
 resource public File::seek ( integer $offset, callable $cb, integer $pri = EIO_PRI_DEFAULT )
 ```
   -.n @TODO
   -.n.ti `:hc`$offset` — @TODO
   -.n `:hc`$cb` — @TODO
   -.n `:hc`$pri` — @TODO

 -.method ```php.inline
 integer public File::tell ( )
 ```
   -.n @TODO

 -.method ```php.inline
 resource public File::close ( )
 ```
   -.n @TODO

 -.method ```php.inline
 void public File::__destruct ( )
 ```
   -.n @TODO

#### filewatcher # Класс FileWatcher {tpl-git PHPDaemon/FS/FileWatcher.php}

`:h`class PHPDaemon\FS\FileWatcher`

##### vars # Свойства

-.method `:h`array public files = [];`  
 @TODO

-.method `:h`resource public $inotify;`  
 @TODO

-.method `:h`array public $descriptors = [];`  
 @TODO

##### methods # Методы

 -.method ```php.inline
 void public FileWatcher::__construct ( )
 ```
   -.n @TODO

 -.method ```php.inline
 boolean public FileWatcher::addWatch ( string $path, mixed $subscriber, integer $flags = NULL )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$subscriber` — @TODO
   -.n `:hc`$flags` — @TODO

 -.method ```php.inline
 boolean public FileWatcher::rmWatch ( string $path, mixed $subscriber )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO
   -.n `:hc`$subscriber` — @TODO

 -.method ```php.inline
 void public FileWatcher::onFileChanged ( string $path )
 ```
   -.n @TODO
   -.n.ti `:hc`$path` — @TODO

 -.method ```php.inline
 void public FileWatcher::watch ( )
 ```
   -.n @TODO
