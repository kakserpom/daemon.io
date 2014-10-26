### redhat # CentOS/RedHat

First of all you should install related utilities.
$&nbsp;`sudo yum install -y git gcc openssl-devel libevent`

To install latest PHP. you should add the Remi and the Epel repositories, because standard package may contain outdated version.

For RHEL/CentOS 6.4-6.0 32 Bit.  
$&nbsp;`sudo rpm -Uvh http://download.fedoraproject.org/pub/epel/6/i386/epel-release-6-8.noarch.rpm`  
$&nbsp;`sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm`

For RHEL/CentOS 6.4-6.0 64 Bit.  
$&nbsp;`sudo rpm -Uvh http://download.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm`  
$&nbsp;`sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm`

Installing PHP.
$&nbsp;`sudo yum --enablerepo=remi,remi-test install -y php-cli php-devel php-pear php-process`

Then installing PHP modules.
$&nbsp;`sudo -i`  
$&nbsp;`pecl install event eio`

Modules `event` and `eio` require module `sockets`.
In RedHat/CentOS, configuration files load up in alphabetic order, so name them `z-event.ini` and `z-eio.ini` accordingly.  
$&nbsp;`echo "extension=event.so" > /etc/php.d/z-event.ini`
$&nbsp;`echo "extension=eio.so" > /etc/php.d/z-eio.ini`

`Ctrl + D` - out of sudo

Define `date.timezone` in /etc/php.ini.

Prepare a folder for PHPDaemon.
$&nbsp;`sudo mkdir /opt/phpdaemon`  
$&nbsp;`sudo chown [your user]:[your group] /opt/phpdaemon`  
$&nbsp;`cd /opt/phpdaemon`

Installing PHPDaemon.  
$&nbsp;`cd /opt/phpdaemon`  
$&nbsp;`git clone https://github.com/kakserpom/phpdaemon.git ./`

Copying configuration file from sample:
$&nbsp;`cp /opt/phpdaemon/conf/phpd.conf.example /opt/phpdaemon/conf/phpd.conf`

Creating a link for phpd
$&nbsp;`ln -s /opt/phpdaemon/bin/phpd /usr/bin/phpd`

Then run the thing:
$&nbsp;`sudo phpd start --verbose-tty=1`

Option `--verbose-tty=1` turns on logging into STDOUT

If you see something like this:

	[PHPD] Loaded config file: '/opt/phpdaemon/conf/phpd.conf'
	[PHPD] Loaded config file: 'conf/conf.d/ExampleJabberBot.conf'
	[PHPD] Loaded config file: 'conf/conf.d/FastCGI.conf'
	[PHPD] Loaded config file: 'conf/conf.d/FlashpolicyServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/HTTPServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/IdentServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/SSL-sample.conf'
	[PHPD] Loaded config file: 'conf/conf.d/WebSocketServer.conf'

Congratulatious! PHPDaemon is working!