### binary # Binary #> Binary {tpl-git PHPDaemon/Utils/Binary.php}

@TODO desc

#### methods # Методы

 -.method ```php.inline
 string public static Binary::labels ( string $q )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$q` — ...

 -.method ```php.inline
 string public static Binary::parseLabels ( string &$data, string $orig = null )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$data` — ...
   -.n `:hc`$orig` — ...

 -.method ```php.inline
 string public static Binary::LV ( string $str, integer $len = 1, boolean $lrev = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$str` — ...
   -.n `:hc`$len` — ...
   -.n `:hc`$lrev` — ...

 -.method ```php.inline
 string public static Binary::LVnull ( string $str )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$str` — ...

 -.method ```php.inline
 string public static Binary::byte ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::word ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::wordl ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::dword ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::dwordl ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::qword ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 string public static Binary::qwordl ( integer $int )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$int` — ...

 -.method ```php.inline
 integer public static Binary::getByte ( string &$p )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...

 -.method ```php.inline
 string public static Binary::getChar ( string &$p )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...

 -.method ```php.inline
 integer public static Binary::getWord ( string &$p, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 string public static Binary::getStrWord ( string &$p, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 integer public static Binary::getDWord ( string &$p, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 integer public static Binary::getQword ( string &$p, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 string public static Binary::getStrQWord ( string &$p, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 string public static Binary::getString ( string &$str )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$str` — ...

 -.method ```php.inline
 string public static Binary::getLV ( string &$p, boolean $l = 1, boolean $nul = false, boolean $lrev = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`&$p` — ...
   -.n `:hc`$l` — ...
   -.n `:hc`$nul` — ...
   -.n `:hc`$lrev` — ...

 -.method ```php.inline
 string public static Binary::int2bytes ( integer $len, integer $int = 0, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$len` — ...
   -.n `:hc`$int` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 string public static Binary::flags2bitarray ( array $flags, integer $len = 4 )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$flags` — ...
   -.n `:hc`$len` — ...

 -.method ```php.inline
 string public static Binary::i2b ( string $bytes, integer $int = 0, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$bytes` — ...
   -.n `:hc`$int` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 integer public static Binary::bytes2int ( string $str, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$str` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 integer public static Binary::b2i ( integer $hex = 0, boolean $l = false )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$hex` — ...
   -.n `:hc`$l` — ...

 -.method ```php.inline
 string public static Binary::bitmap2bytes ( string $bitmap, integer $check_len = 0 )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$bitmap` — ...
   -.n `:hc`$check_len` — ...

 -.method ```php.inline
 string public static Binary::getbitmap ( string $byte )
 ```
   -.n @TODO desc
   -.n.ti `:hc`$byte` — ...
