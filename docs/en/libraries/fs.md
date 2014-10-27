### fs # FS #> FS {tpl-git PHPDaemon/FS}

```php
namespace PHPDaemon\FS;
```

<!-- include-namespace path="\PHPDaemon\FS" level="" access="" -->
#### file # File {tpl-git PHPDaemon/FS/File.php}

```php
namespace PHPDaemon\FS;
class File;
```

File

##### properties # Properties

<md:prop>
/**
	 * @var integer Priority
	 */
public $priority = 10
</md:prop>

<md:prop>
/**
	 * @var integer Chunk size
	 */
public $chunkSize = 4096
</md:prop>

<md:prop>
/**
	 * @var integer Current offset
	 */
public $offset = 0
</md:prop>

<md:prop>
/**
	 * @var string Cache key
	 */
public $fdCacheKey
</md:prop>

<md:prop>
/**
	 * @var boolean Append?
	 */
public $append
</md:prop>

<md:prop>
/**
	 * @var string Path
	 */
public $path
</md:prop>

<md:prop>
/**
	 * @var boolean Writing?
	 */
public $writing = false
</md:prop>

<md:prop>
/**
	 * @var boolean Closed?
	 */
public $closed = false
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * File constructor
	 * @param resource $fd   Descriptor
	 * @param string   $path Path
	 */
public function __construct($fd, $path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L82
</md:method>

<md:method>
/**
	 * Get file descriptor
	 * @return resource File descriptor
	 */
public function getFd()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L92
</md:method>

<md:method>
/**
	 * Converts string of flags to integer or standard text representation
	 * @param  string  $mode Mode
	 * @param  boolean $text Text?
	 * @return mixed
	 */
public static function convertFlags($mode, $text = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L102
</md:method>

<md:method>
/**
	 * Truncates this file
	 * @param  integer  $offset Offset. Default is 0
	 * @param  callable $cb     Callback
	 * @param  integer  $pri    Priority
	 * @return resource|boolean
	 */
public function truncate($offset = 0, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L130
</md:method>

<md:method>
/**
	 * Stat()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|boolean
	 */
public function stat($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L155
</md:method>

<md:method>
/**
	 * Stat() non-cached
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|boolean
	 */
public function statRefresh($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L184
</md:method>

<md:method>
/**
	 * Statvfs()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|boolean
	 */
public function statvfs($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L209
</md:method>

<md:method>
/**
	 * Sync()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|false
	 */
public function sync($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L239
</md:method>

<md:method>
/**
	 * Datasync()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|false
	 */
public function datasync($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L260
</md:method>

<md:method>
/**
	 * Writes data to file
	 * @param  string   $data   Data
	 * @param  callable $cb     Callback
	 * @param  integer  $offset Offset
	 * @param  integer  $pri    Priority
	 * @return resource|false
	 */
public function write($data, $cb = null, $offset = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L283
</md:method>

<md:method>
/**
	 * Changes ownership of this file
	 * @param  integer  $uid User ID
	 * @param  integer  $gid Group ID
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|false
	 */
public function chown($uid, $gid = -1, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L331
</md:method>

<md:method>
/**
	 * touch()
	 * @param  integer  $mtime Last modification time
	 * @param  integer  $atime Last access time
	 * @param  callable $cb    Callback
	 * @param  integer  $pri   Priority
	 * @return resource|false
	 */
public function touch($mtime, $atime = null, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L360
</md:method>

<md:method>
/**
	 * Clears cache of stat() and statvfs()
	 * @return void
	 */
public function clearStatCache()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L382
</md:method>

<md:method>
/**
	 * Reads data from file
	 * @param  integer  $length Length
	 * @param  integer  $offset Offset
	 * @param  callable $cb     Callback
	 * @param  integer  $pri    Priority
	 * @return boolean
	 */
public function read($length, $offset = null, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L395
</md:method>

<md:method>
/**
	 * sendfile()
	 * @param  mixed    $outfd   File descriptor
	 * @param  callable $cb      Callback
	 * @param  callable $startCb Start callback
	 * @param  integer  $offset  Offset
	 * @param  integer  $length  Length
	 * @param  integer  $pri     Priority
	 * @return boolean           Success
	 */
public function sendfile($outfd, $cb, $startCb = null, $offset = 0, $length = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L431
</md:method>

<md:method>
/**
	 * readahead()
	 * @param  integer  $length Length
	 * @param  integer  $offset Offset
	 * @param  callable $cb     Callback
	 * @param  integer  $pri    Priority
	 * @return resource|false
	 */
public function readahead($length, $offset = null, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L511
</md:method>

<md:method>
/**
	 * Reads whole file
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return boolean       Success
	 */
public function readAll($cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L566
</md:method>

<md:method>
/**
	 * Reads file chunk-by-chunk
	 * @param  callable $cb      Callback
	 * @param  callable $chunkcb Callback of chunk
	 * @param  integer  $pri     Priority
	 * @return resource|false
	 */
public function readAllChunked($cb = null, $chunkcb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L618
</md:method>

<md:method>
/**
	 * toString handler
	 * @return string
	 */
public function __toString()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L641
</md:method>

<md:method>
/**
	 * Set chunk size
	 * @param  integer $n Chunk size
	 * @return void
	 */
public function setChunkSize($n)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L650
</md:method>

<md:method>
/**
	 * Move pointer to arbitrary position
	 * @param  integer  $offset Offset
	 * @param  callable $cb     Callback
	 * @param  integer  $pri    Priority
	 * @return resource|false
	 */
public function seek($offset, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L661
</md:method>

<md:method>
/**
	 * Get current pointer position
	 * @return integer
	 */
public function tell()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L674
</md:method>

<md:method>
/**
	 * Close the file
	 * @return resource|false
	 */
public function close()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L685
</md:method>

<md:method>
/**
	 * Destructor
	 */
public function __destruct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/File.php#L709
</md:method>

<div class="clearboth"></div>

#### file-system # FileSystem {tpl-git PHPDaemon/FS/FileSystem.php}

```php
namespace PHPDaemon\FS;
class FileSystem;
```

FileSystem

##### properties # Properties

<md:prop>
/**
	 * @var boolean Is EIO supported?
	 */
public static $supported
</md:prop>

<md:prop>
/**
	 * @var Event Main FS event
	 */
public static $ev
</md:prop>

<md:prop>
/**
	 * @var resource EIO file descriptor
	 */
public static $fd
</md:prop>

<md:prop>
/**
	 * @var array Mode types
	 */
public static $modeTypes = [
  49152 => 's',
  40960 => 'l',
  32768 => 'f',
  24576 => 'b',
  16384 => 'd',
  8192 => 'c',
  4096 => 'p',
]
</md:prop>

<md:prop>
/**
	 * @var integer TTL for bad descriptors in seconds
	 */
public static $badFDttl = 5
</md:prop>

<md:prop>
/**
	 * @var PHPDaemon\Cache\CappedStorage File descriptor cache
	 */
public static $fdCache
</md:prop>

<md:prop>
/**
	 * @var integer Maximum number of open files in cache
	 */
public static $fdCacheSize = 128
</md:prop>

<md:prop>
/**
	 * @var string Required EIO version
	 */
public static $eioVer = '1.2.1'
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Initialize FS driver
	 * @return void
	 */
public static function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L70
</md:method>

<md:method>
/**
	 * Initialize main FS event
	 * @return void
	 */
public static function initEvent()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L87
</md:method>

<md:method>
/**
	 * Checks if file exists and readable
	 * @param  string $path Path
	 * @return boolean      Exists and readable?
	 */
public static function checkFileReadable($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L106
</md:method>

<md:method>
/**
	 * Block until all FS events are completed
	 * @return void
	 */
public static function waitAllEvents()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L115
</md:method>

<md:method>
/**
	 * Called when config is updated
	 * @return void
	 */
public static function updateConfig()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L128
</md:method>

<md:method>
/**
	 * Sanitize path
	 * @param  string $path Path
	 * @return string       Sanitized path
	 */
public static function sanitizePath($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L151
</md:method>

<md:method>
/**
	 * Prepare value of stat()
	 * @param  mixed $stat Data
	 * @return array hash
	 */
public static function statPrepare($stat)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L162
</md:method>

<md:method>
/**
	 * Gets stat() information
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|true
	 */
public static function stat($path, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L177
</md:method>

<md:method>
/**
	 * Unlink file
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|boolean
	 */
public static function unlink($path, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L195
</md:method>

<md:method>
/**
	 * Rename
	 * @param  string   $path    Path
	 * @param  string   $newpath New path
	 * @param  callable $cb      Callback
	 * @param  integer  $pri     Priority
	 * @return resource|boolean
	 */
public static function rename($path, $newpath, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L215
</md:method>

<md:method>
/**
	 * statvfs()
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|false
	 */
public static function statvfs($path, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L234
</md:method>

<md:method>
/**
	 * lstat()
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|true
	 */
public static function lstat($path, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L250
</md:method>

<md:method>
/**
	 * realpath()
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|true
	 */
public static function realpath($path, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L268
</md:method>

<md:method>
/**
	 * sync()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|false
	 */
public static function sync($cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L283
</md:method>

<md:method>
/**
	 * statfs()
	 * @param  callable $cb  Callback
	 * @param  integer  $pri Priority
	 * @return resource|false
	 */
public static function syncfs($cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L300
</md:method>

<md:method>
/**
	 * touch()
	 * @param  string   $path  Path
	 * @param  integer  $mtime Last modification time
	 * @param  integer  $atime Last access time
	 * @param  callable $cb    Callback
	 * @param  integer  $pri   Priority
	 * @return resource|boolean
	 */
public static function touch($path, $mtime, $atime = null, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L320
</md:method>

<md:method>
/**
	 * Removes empty directory
	 * @param  string   $path Path
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|boolean
	 */
public static function rmdir($path, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L339
</md:method>

<md:method>
/**
	 * Creates directory
	 * @param  string   $path Path
	 * @param  integer  $mode Mode (octal)
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|boolean
	 */
public static function mkdir($path, $mode, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L359
</md:method>

<md:method>
/**
	 * Readdir()
	 * @param  string   $path  Path
	 * @param  callable $cb    Callback
	 * @param  integer  $flags Flags
	 * @param  integer  $pri   Priority
	 * @return resource|true
	 */
public static function readdir($path, $cb = null, $flags, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L379
</md:method>

<md:method>
/**
	 * Truncate file
	 * @param  string   $path   Path
	 * @param  integer  $offset Offset
	 * @param  callable $cb     Callback
	 * @param  integer  $pri    Priority
	 * @return resource|boolean
	 */
public static function truncate($path, $offset = 0, $cb = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L399
</md:method>

<md:method>
/**
	 * sendfile()
	 * @param  mixed    $outfd   File descriptor
	 * @param  string   $path    Path
	 * @param  callable $cb      Callback
	 * @param  callable $startCb Start callback
	 * @param  integer  $offset  Offset
	 * @param  integer  $length  Length
	 * @param  integer  $pri     Priority
	 * @return true              Success
	 */
public static function sendfile($outfd, $path, $cb, $startCb = null, $offset = 0, $length = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L423
</md:method>

<md:method>
/**
	 * Changes ownership of file/directory
	 * @param  string   $path Path
	 * @param  integer  $uid  User ID
	 * @param  integer  $gid  Group ID
	 * @param  callable $cb   Callback
	 * @param  integer  $pri  Priority
	 * @return resource|boolean
	 */
public static function chown($path, $uid, $gid = -1, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L455
</md:method>

<md:method>
/**
	 * Reads whole file
	 * @param  string   $path Path
	 * @param  callable $cb   Callback (Path, Contents)
	 * @param  integer  $pri  Priority
	 * @return resource|true
	 */
public static function readfile($path, $cb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L475
</md:method>

<md:method>
/**
	 * Reads file chunk-by-chunk
	 * @param  string   $path    Path
	 * @param  callable $cb      Callback (Path, Success)
	 * @param  callable $chunkcb Chunk callback (Path, Chunk)
	 * @param  integer  $pri     Priority
	 * @return resource
	 */
public static function readfileChunked($path, $cb, $chunkcb, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L498
</md:method>

<md:method>
/**
	 * Returns random temporary file name
	 * @param  string $dir    Directory
	 * @param  string $prefix Prefix
	 * @return string         Path
	 */
public static function genRndTempnam($dir = null, $prefix = 'php')
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L520
</md:method>

<md:method>
/**
	 * Returns random temporary file name
	 * @param  string $dir    Directory
	 * @param  string $prefix Prefix
	 * @return string         Path
	 */
public static function genRndTempnamPrefix($dir, $prefix)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L538
</md:method>

<md:method>
/**
	 * Obtain exclusive temporary file
	 * @param  string   $dir    Directory
	 * @param  string   $prefix Prefix
	 * @param  callable $cb     Callback (File)
	 * @return resource
	 */
public static function tempnam($dir, $prefix, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L575
</md:method>

<md:method>
/**
	 * Open file
	 * @param  string   $path  Path
	 * @param  string   $flags Flags
	 * @param  callable $cb    Callback (File)
	 * @param  integer  $mode  Mode (see EIO_S_I* constants)
	 * @param  integer  $pri   Priority
	 * @return resource
	 */
public static function open($path, $flags, $cb, $mode = null, $pri = EIO_PRI_DEFAULT)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileSystem.php#L593
</md:method>

<div class="clearboth"></div>

#### file-watcher # FileWatcher {tpl-git PHPDaemon/FS/FileWatcher.php}

```php
namespace PHPDaemon\FS;
class FileWatcher;
```

Implementation of the file watcher

##### properties # Properties

<md:prop>
/**
	 * @var array Associative array of the files being observed
	 */
public $files = [ ]
</md:prop>

<md:prop>
/**
	 * @var resource Resource returned by inotify_init()
	 */
public $inotify
</md:prop>

<md:prop>
/**
	 * @var Array of inotify descriptors
	 */
public $descriptors = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileWatcher.php#L34
</md:method>

<md:method>
/**
	 * Adds your subscription on object in FS
	 * @param  string  $path	Path
	 * @param  mixed   $cb		Callback
	 * @param  integer $flags	Look inotify_add_watch()
	 * @return true
	 */
public function addWatch($path, $cb, $flags = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileWatcher.php#L58
</md:method>

<md:method>
/**
	 * Cancels your subscription on object in FS
	 * @param  string  $path	Path
	 * @param  mixed   $cb		Callback
	 * @return boolean
	 */
public function rmWatch($path, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileWatcher.php#L77
</md:method>

<md:method>
/**
	 * Called when file $path is changed
	 * @param  string $path Path
	 * @return void
	 */
public function onFileChanged($path)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileWatcher.php#L103
</md:method>

<md:method>
/**
	 * Check the file system, triggered by timer
	 * @return void
	 */
public function watch()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/FS/FileWatcher.php#L122
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->