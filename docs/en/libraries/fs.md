### fs # FS #> FS {tpl-git PHPDaemon/FS}

```php
namespace PHPDaemon\FS;
```

<!-- include-namespace path="\PHPDaemon\FS" commit="4f3f9caa6d11b98700b552bd84e7de8807f48695" level="" access="" -->
#### file-system # Class FileSystem {tpl-git PHPDaemon/FS/FileSystem.php}

```php
namespace PHPDaemon\FS;
class FileSystem;
```

##### properties # Properties

<md:prop>
/**
	 * Is EIO supported?
	 * @var boolean
	 */
public static $supported;
</md:prop>

<md:prop>
/**
	 * Main FS event
	 * @var Event
	 */
public static $ev;
</md:prop>

<md:prop>
/**
	 * EIO file descriptor
	 * @var resource
	 */
public static $fd;
</md:prop>

<md:prop>
/**
	 * Mode types
	 * @var array
	 */
public static $modeTypes;
</md:prop>

<md:prop>
/**
	 * TTL for bad descriptors in seconds
	 * @var integer
	 */
public static $badFDttl;
</md:prop>

<md:prop>
/**
	 * File descriptor cache
	 * @var CappedStorage
	 */
public static $fdCache;
</md:prop>

<md:prop>
/**
	 * Maximum number of open files in cache
	 * @var number
	 */
public static $fdCacheSize;
</md:prop>

<md:prop>
/**
	 * Required EIO version
	 * @var string
	 */
public static $eioVer;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Initialize FS driver
	 * @return void
	 */
public static function init()
</md:method>

<md:method>
/**
	 * Initialize main FS event
	 * @return void
	 */
public static function initEvent()
</md:method>

<md:method>
/**
	 * Checks if file exists and readable
	 * @param string Path
	 * @return boolean Exists and readable?
	 */
public static function checkFileReadable($path)
</md:method>

<md:method>
/**
	 * Block until all FS events are completed
	 * @return void
	 */
public static function waitAllEvents()
</md:method>

<md:method>
/**
	 * Called when config is updated
	 * @return void
	 */
public static function updateConfig()
</md:method>

<md:method>
/**
	 * Sanitize path
	 * @param string Path
	 * @return string Sanitized path
	 */
public static function sanitizePath($path)
</md:method>

<md:method>
/**
	 * Prepare value of stat()
	 * @param $stat
	 * @return array hash
	 */
public static function statPrepare($stat)
</md:method>

<md:method>
/**
	 * Gets stat() information
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function stat($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Unlink file
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function unlink($path, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Rename
	 * @param string $path  Path
	 * @param string $newpath  New path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function rename($path, $newpath, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * statvfs()
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function statvfs($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * lstat()
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function lstat($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * realpath()
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function realpath($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * sync()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function sync($cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * statfs()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function syncfs($cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * touch()
	 * @param string $path  Path
	 * @param integer $mtime Last modification time
	 * @param integer $atime Last access time
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function touch($path, $mtime, $atime = null, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Removes empty directory
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function rmdir($path, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Creates directory
	 * @param string $path  Path
	 * @param int $mode  Mode (octal)
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function mkdir($path, $mode, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Readdir()
	 * @param string $path  Path
	 * @param callable $cb Callback
	 * @param integer $flags Flags
	 * @param int $pri priority
	 * @return resource
	 */
public static function readdir($path, $cb = null, $flags, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Truncate file
	 * @param string $path  Path
	 * @param int $offset
	 * @param callable $cb  Callback
	 * @param int $pri      priority
	 * @return resource
	 */
public static function truncate($path, $offset = 0, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * sendfile()
	 * @param mixed $outfd      File descriptor
	 * @param string $path      Path
	 * @param $cb
	 * @param callable $startCb Start callback
	 * @param integer $offset   Offset
	 * @param integer $length   Length
	 * @param int $pri          priority
	 * @return boolean Success
	 */
public static function sendfile($outfd, $path, $cb, $startCb = null, $offset = 0, $length = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Changes ownership of file/directory
	 * @param string $path  Path
	 * @param integer $uid User ID
	 * @param integer $gid Group ID
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public static function chown($path, $uid, $gid = -1, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Reads whole file
	 * @param string $path  Path
	 * @param callable $cb Callback (Path, Contents)
	 * @param int $pri priority
	 * @return resource
	 */
public static function readfile($path, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Reads file chunk-by-chunk
	 * @param string $path  Path
	 * @param callable $cb Callback (Path, Success)
	 * @param callable $chunkcb Chunk callback (Path, Chunk)
	 * @param int $pri priority
	 * @return resource
	 */
public static function readfileChunked($path, $cb, $chunkcb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Returns random temporary file name
	 * @param string $dir Directory
	 * @param string $prefix Prefix
	 * @return string Path
	 */
public static function genRndTempnam($dir = null, $prefix = 'php')
</md:method>

<md:method>
/**
	 * Returns random temporary file name
	 * @param string $dir Directory
	 * @param string $prefix Prefix
	 * @return string Path
	 */
public static function genRndTempnamPrefix($dir, $prefix)
</md:method>

<md:method>
/**
	 * Obtain exclusive temporary file
	 * @param string $dir  Directory
	 * @param string $prefix  Prefix
	 * @param callable $cb Callback (File)
	 * @return resource
	 */
public static function tempnam($dir, $prefix, $cb)
</md:method>

<md:method>
/**
	 * Open file
	 * @param string $path  Path
	 * @param string $flags Flags
	 * @param callable $cb Callback (File)
	 * @param integer $mode Mode (see EIO_S_I* constants)
	 * @param int $pri priority
	 * @return resource
	 */
public static function open($path, $flags, $cb, $mode = null, $pri = EIO_PRI_DEFAULT)
</md:method>

#### file # Class File {tpl-git PHPDaemon/FS/File.php}

```php
namespace PHPDaemon\FS;
class File;
```

##### properties # Properties

<md:prop>
/**
	 * Priority
	 * @var integer
	 */
public $priority;
</md:prop>

<md:prop>
/**
	 * Chunk size
	 * @var integer
	 */
public $chunkSize;
</md:prop>

<md:prop>
/**
	 * Current offset
	 * @var integer
	 */
public $offset;
</md:prop>

<md:prop>
/**
	 * Cache key
	 * @var string
	 */
public $fdCacheKey;
</md:prop>

<md:prop>
/**
	 * Append?
	 * @var boolean
	 */
public $append;
</md:prop>

<md:prop>
/**
	 * Path
	 * @var string
	 */
public $path;
</md:prop>

<md:prop>
/**
	 * Writing?
	 * @var boolean
	 */
public $writing;
</md:prop>

<md:prop>
/**
	 * Closed?
	 * @var boolean
	 */
public $closed;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * File constructor
	 * @param \PHPDaemon\FS\File $fd resource descriptor
	 * @param $path
	 * @return \PHPDaemon\FS\File
	 */
public function __construct($fd, $path)
</md:method>

<md:method>
/**
	 * Get file descriptor
	 * @return mixed File descriptor
	 */
public function getFd()
</md:method>

<md:method>
/**
	 * Converts string of flags to integer or standard text representation
	 * @param string $mode  Mode
	 * @param boolean $text Text?
	 * @param int $pri priority
	 * @return mixed
	 */
public static function convertFlags($mode, $text = false)
</md:method>

<md:method>
/**
	 * Truncates this file
	 * @param integer $offset Offset, default is 0
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function truncate($offset = 0, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Stat()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function stat($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Stat() non-cached
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function statRefresh($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Statvfs()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function statvfs($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Sync()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function sync($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Datasync()
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function datasync($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Writes data to file
	 * @param string $data  Data
	 * @param callable $cb Callback
	 * @param integer $offset Offset
	 * @param int $pri priority
	 * @return resource
	 */
public function write($data, $cb = null, $offset = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Changes ownership of this file
	 * @param integer $uid User ID
	 * @param integer $gid Group ID
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function chown($uid, $gid = -1, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * touch()
	 * @param integer $mtime Last modification time
	 * @param integer $atime Last access time
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function touch($mtime, $atime = null, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Clears cache of stat() and statvfs()
	 * @return void
	 */
public function clearStatCache()
</md:method>

<md:method>
/**
	 * Reads data from file
	 * @param integer $length Length
	 * @param integer $offset Offset
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function read($length, $offset = null, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * sendfile()
	 * @param mixed $outfd      File descriptor
	 * @param callable $cb
	 * @param callable $startCb Start callback
	 * @param integer $offset   Offset
	 * @param integer $length   Length
	 * @param int $pri          priority
	 * @return boolean Success
	 */
public function sendfile($outfd, $cb, $startCb = null, $offset = 0, $length = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * readahead()
	 * @param integer $length Length
	 * @param integer $offset Offset
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function readahead($length, $offset = null, $cb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Reads whole file
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return boolean Success
	 */
public function readAll($cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Reads file chunk-by-chunk
	 * @param callable $cb Callback
	 * @param mixed $chunkcb
	 * @param int $pri     priority
	 * @return resource
	 */
public function readAllChunked($cb = null, $chunkcb = null, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * toString handler
	 * @return string
	 */
public function __toString()
</md:method>

<md:method>
/**
	 * Set chunk size
	 * @param integer $n Chunk size
	 * @return void
	 */
public function setChunkSize($n)
</md:method>

<md:method>
/**
	 * Move pointer to arbitrary position
	 * @param integer $offset offset
	 * @param callable $cb Callback
	 * @param int $pri priority
	 * @return resource
	 */
public function seek($offset, $cb, $pri = EIO_PRI_DEFAULT)
</md:method>

<md:method>
/**
	 * Get current pointer position
	 * @return integer
	 */
public function tell()
</md:method>

<md:method>
/**
	 * Close the file
	 * @return resource
	 */
public function close()
</md:method>

<md:method>
/**
	 * Destructor
	 * @return void
	 */
public function __destruct()
</md:method>

#### file-watcher # Class FileWatcher {tpl-git PHPDaemon/FS/FileWatcher.php}

```php
namespace PHPDaemon\FS;
class FileWatcher;
```

##### properties # Properties

<md:prop>
/** @var array */
public $files;
</md:prop>

<md:prop>
/** @var */
public $inotify;
</md:prop>

<md:prop>
/** @var array */
public $descriptors;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 * @return object
	 */
public function __construct()
</md:method>

<md:method>
/**
	 * Adds your subscription on object in FS
	 * @param $path
	 * @param $subscriber
	 * @param int $flags
	 * @return bool
	 */
public function addWatch($path, $subscriber, $flags = NULL)
</md:method>

<md:method>
/**
	 * Cancels your subscription on object in FS
	 * @param $path
	 * @param $subscriber
	 * @return bool
	 */
public function rmWatch($path, $subscriber)
</md:method>

<md:method>
/**
	 * Called when file $path is changed
	 * @param $path
	 * @return void
	 */
public function onFileChanged($path)
</md:method>

<md:method>
/**
	 * Check the file system, triggered by timer
	 * @return void
	 */
public function watch()
</md:method>


<!--/ include-namespace -->