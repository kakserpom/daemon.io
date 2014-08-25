### fs # FS #> FS {tpl-git PHPDaemon/FS}

```php
namespace PHPDaemon\FS;
```

#### filesystem # Класс FileSystem {tpl-git PHPDaemon/FS/FileSystem.php}

```php
namespace PHPDaemon\FS;
class FileSystem;
```

##### properties # Свойства

<md:prop>
boolean public static $supported;
@TODO
</md:prop>

<md:prop>
Event public static $ev;
@TODO
</md:prop>

<md:prop>
resource public static $fd;
@TODO
</md:prop>

<md:prop>
array public static $modeTypes;
@TODO
</md:prop>

<md:prop>
integer public static $badFDttl = 5;
@TODO
</md:prop>

<md:prop>
[CappedStorage](#libraries/cache/capped-storage) public static $fdCache;
@TODO
</md:prop>

<md:prop>
integer public static $fdCacheSize = 128;
@TODO
</md:prop>

<md:prop>
string public static $eioVer = '1.2.1';
@TODO
</md:prop>

##### methods # Методы

<md:method>
void public static init ( )

@TODO
</md:method>

<md:method>
void public static initEvent ( )

@TODO
</md:method>

<md:method>
boolean public static checkFileReadable ( string $path )

@TODO

$path
@TODO
</md:method>

<md:method>
void public static waitAllEvents ( )

@TODO
</md:method>

<md:method>
void public static updateConfig ( )

@TODO
</md:method>

<md:method>
string public static sanitizePath ( string $path )

@TODO

$path
@TODO
</md:method>

<md:method>
array public static statPrepare ( array $stat )

@TODO

$stat
@TODO
</md:method>

<md:method>
resource public static stat ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static unlink ( string $path, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static rename ( string $path, string $newpath, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$newpath
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static statvfs ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static lstat ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static realpath ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static sync ( callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static syncfs ( callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static touch ( string $path, integer $mtime, integer $atime = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$mtime
@TODO

$atime
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static rmdir ( string $path, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static mkdir ( string $path, integer $mode, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$mode
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static readdir ( string $path, callable $cb = null, integer $flags, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$flags
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static truncate ( string $path, integer $offset = 0, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$offset
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
boolean public static sendfile ( mixed $outfd, string $path, callable $cb, callable $startCb = null, integer $offset = 0, integer $length = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$outfd
@TODO

$path
@TODO

$cb
@TODO

$startCb
@TODO

$offset
@TODO

$length
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static chown ( string $path, integer $uid, integer $gid = -1, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$uid
@TODO

$gid
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public static readfile ( string $path, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
void public static readfileChunked ( string $path, callable $cb, callable $chunkcb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$cb
@TODO

$chunkcb
@TODO

$pri
@TODO
</md:method>

<md:method>
string public static genRndTempnam ( string $dir = null, string $prefix = 'php' )

@TODO

$dir
@TODO

$prefix
@TODO
</md:method>

<md:method>
string public static genRndTempnamPrefix ( string $dir, string $prefix )

@TODO

$dir
@TODO

$prefix
@TODO
</md:method>

<md:method>
void public static tempnam ( string $dir, string $prefix, callable $cb )

@TODO

$dir
@TODO

$prefix
@TODO

$cb
@TODO
</md:method>

<md:method>
resource public static open ( string $path, string $flags, callable $cb, integer $mode = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$path
@TODO

$flags
@TODO

$cb
@TODO

$mode
@TODO

$pri
@TODO
</md:method>

#### file # Класс File {tpl-git PHPDaemon/FS/File.php}

```php
namespace PHPDaemon\FS;
class File;
```

##### properties # Свойства

<md:prop>
integer public priority = 10;
@TODO
</md:prop>

<md:prop>
integer public $chunkSize = 4096;
@TODO
</md:prop>

<md:prop>
integer public $offset = 0;
@TODO
</md:prop>

<md:prop>
string public $fdCacheKey;
@TODO
</md:prop>

<md:prop>
boolean public $append;
@TODO
</md:prop>

<md:prop>
string public $path;
@TODO
</md:prop>

<md:prop>
boolean public $writing = false;
@TODO
</md:prop>

<md:prop>
boolean public $closed = false;
@TODO
</md:prop>

##### methods # Методы

<md:method>
void public __construct ( resource $fd, string $path )

@TODO

$fd
@TODO

$path
@TODO
</md:method>

<md:method>
resource public getFd ( )

@TODO
</md:method>

<md:method>
mixed public static convertFlags ( string $mode, boolean $text = false )

@TODO

$mode
@TODO

$text
@TODO
</md:method>

<md:method>
resource public truncate ( integer $offset = 0, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$offset
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public stat ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public statRefresh ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public statvfs ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public sync ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public datasync ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public write ( string $data, callable $cb = null, integer $offset = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$data
@TODO

$cb
@TODO

$offset
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public chown ( integer $uid, integer $gid = -1, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$uid
@TODO

$gid
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public touch ( integer $mtime, integer $atime = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$mtime
@TODO

$atime
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
void public clearStatCache ( )

@TODO
</md:method>

<md:method>
boolean public read ( integer $length, integer $offset = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$length
@TODO

$offset
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
boolean public sendfile ( mixed $outfd, callable $cb, callable $startCb = null, integer $offset = 0, integer $length = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$outfd
@TODO

$cb
@TODO

$startCb
@TODO

$offset
@TODO

$length
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public readahead ( integer $length, integer $offset = null, callable $cb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$length
@TODO

$offset
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
boolean public readAll ( callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
resource public readAllChunked ( callable $cb = null, callable $chunkcb = null, integer $pri = EIO_PRI_DEFAULT )

@TODO

$cb
@TODO

$chunkcb
@TODO

$pri
@TODO
</md:method>

<md:method>
string public __toString ( )

@TODO
</md:method>

<md:method>
void public setChunkSize ( integer $n )

@TODO

$n
@TODO
</md:method>

<md:method>
resource public seek ( integer $offset, callable $cb, integer $pri = EIO_PRI_DEFAULT )

@TODO

$offset
@TODO

$cb
@TODO

$pri
@TODO
</md:method>

<md:method>
integer public tell ( )

@TODO
</md:method>

<md:method>
resource public close ( )

@TODO
</md:method>

<md:method>
void public __destruct ( )

@TODO
</md:method>

#### filewatcher # Класс FileWatcher {tpl-git PHPDaemon/FS/FileWatcher.php}

```php
namespace PHPDaemon\FS;
class FileWatcher;
```

##### properties # Свойства

<md:prop>
array public files = [];
@TODO
</md:prop>

<md:prop>
resource public $inotify;
@TODO
</md:prop>

<md:prop>
array public $descriptors = [];
@TODO
</md:prop>

##### methods # Методы

<md:method>
void public __construct ( )

@TODO
</md:method>

<md:method>
boolean public addWatch ( string $path, mixed $subscriber, integer $flags = NULL )

@TODO

$path
@TODO

$subscriber
@TODO

$flags
@TODO
</md:method>

<md:method>
boolean public rmWatch ( string $path, mixed $subscriber )

@TODO

$path
@TODO

$subscriber
@TODO
</md:method>

<md:method>
void public onFileChanged ( string $path )

@TODO

$path
@TODO
</md:method>

<md:method>
void public watch ( )

@TODO
</md:method>