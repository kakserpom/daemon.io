### dns # DNS #> DNS {tpl-git PHPDaemon/Clients/DNS}

```php
namespace PHPDaemon\Clients\DNS;
```

<!-- include-namespace path="\PHPDaemon\Clients\DNS" level="" access="" -->
#### connection # Connection {tpl-git PHPDaemon/Clients/DNS/Connection.php}

```php
namespace PHPDaemon\Clients\DNS;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### consts # Constants

<md:const>
@TODO DESCR
const STATE_PACKET = 1
</md:const>

<div class="clearboth"></div>

##### properties # Properties

<md:prop>
/**
	 * Response
	 * @var array
	 */
public $response = [ ]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Called when new UDP packet received.
	 * @param string $pct
	 * @return void
	 */
public function onUdpPacket($pct)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Connection.php#L64
</md:method>

<md:method>
/**
	 * Called when new data received
	 * @return void
	 */
public function onRead()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Connection.php#L169
</md:method>

<md:method>
/**
	 * Gets the host information
	 * @param string   Hostname
	 * @param callable $cb Callback
	 * @return void
	 */
public function get($hostname, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Connection.php#L199
</md:method>

<md:method>
/**
	 * Called when connection finishes
	 * @return void
	 */
public function onFinish()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Connection.php#L247
</md:method>

<div class="clearboth"></div>

#### pool # Pool {tpl-git PHPDaemon/Clients/DNS/Pool.php}

```php
namespace PHPDaemon\Clients\DNS;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Options

 - `:p`port (53)`  
 @todo add description strings

 - `:p`resolvecachesize (128)`  
 

 - `:p`servers ('')`  
 

 - `:p`hostsfile ('/etc/hosts')`  
 

 - `:p`resolvfile ('/etc/resolv.conf')`  
 

 - `:p`expose (1)`  
 

##### properties # Properties

<md:prop>
/**
	 * Record Types
	 * @var array hash [code => "name", ...]
	 */
public static $type = [
  1 => 'A',
  2 => 'NS',
  3 => 'MD',
  4 => 'MF',
  5 => 'CNAME',
  6 => 'SOA',
  7 => 'MB',
  8 => 'MG',
  9 => 'MR',
  10 => 'RR',
  11 => 'WKS',
  12 => 'PTR',
  13 => 'HINFO',
  14 => 'MINFO',
  15 => 'MX',
  16 => 'TXT',
  17 => 'RP',
  18 => 'AFSDB',
  19 => 'X25',
  20 => 'ISDN',
  21 => 'RT',
  22 => 'NSAP',
  23 => 'NSAP-PTR',
  24 => 'SIG',
  25 => 'KEY',
  26 => 'PX',
  27 => 'GPOS',
  28 => 'AAAA',
  29 => 'LOC',
  30 => 'NXT',
  31 => 'EID',
  32 => 'NIMLOC',
  33 => 'SRV',
  34 => 'ATMA',
  35 => 'NAPTR',
  36 => 'KX',
  37 => 'CERT',
  38 => 'A6',
  39 => 'DNAME',
  40 => 'SINK',
  41 => 'OPT',
  42 => 'APL',
  43 => 'DS',
  44 => 'SSHFP',
  45 => 'IPSECKEY',
  46 => 'RRSIG',
  47 => 'NSEC',
  48 => 'DNSKEY',
  49 => 'DHCID',
  50 => 'NSEC3',
  51 => 'NSEC3PARAM',
  55 => 'HIP',
  99 => 'SPF',
  100 => 'UINFO',
  101 => 'UID',
  102 => 'GID',
  103 => 'UNSPEC',
  249 => 'TKEY',
  250 => 'TSIG',
  251 => 'IXFR',
  252 => 'AXFR',
  253 => 'MAILB',
  254 => 'MAILA',
  255 => 'ALL',
  32768 => 'TA',
  32769 => 'DLV',
]
</md:prop>

<md:prop>
/**
	 * Hosts file parsed
	 * @var array hash [hostname => [addr, ...], ...]
	 */
public $hosts = [ ]
</md:prop>

<md:prop>
/**
	 * Preloading ComplexJob
	 * @var \PHPDaemon\Core\ComplexJob
	 */
public $preloading
</md:prop>

<md:prop>
/**
	 * Resolve cache
	 * @var CappedStorageHits
	 */
public $resolveCache
</md:prop>

<md:prop>
/**
	 * Classes
	 * @var array [code => "class"]
	 */
public static $class = [
  1 => 'IN',
  3 => 'CH',
  255 => 'ANY',
]
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Applies config
	 * @return void
	 */
public function applyConfig()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Pool.php#L90
</md:method>

<md:method>
/**
	 * Resolves the host
	 * @param string   Hostname
	 * @param callable $cb Callback
	 * @param [boolean Noncache?]
	 * @return void
	 */
public function resolve($hostname, $cb, $noncache = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Pool.php#L136
</md:method>

<md:method>
/**
	 * Gets the host information
	 * @param string   Hostname
	 * @param callable $cb Callback
	 * @param [boolean Noncache?]
	 * @param string $hostname
	 * @return void
	 */
public function get($hostname, $cb, $noncache = false)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/DNS/Pool.php#L204
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->