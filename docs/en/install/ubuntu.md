### ubuntu # Ubuntu

First of all you should install related utilities.
$&nbsp;`sudo apt-get install gcc make libcurl4-openssl-dev libevent-dev git libevent`

Installing PHP 5.5.  
$&nbsp;`sudo apt-get install php5-cli php5-dev php-pear`

Then install PHP modules.
$&nbsp;`sudo -i`  
$&nbsp;`pecl install event eio`  
$&nbsp;`echo "extension=event.so" > /etc/php5/mods-available/event.ini`  
$&nbsp;`echo "extension=eio.so" > /etc/php5/mods-available/eio.ini`

Creating links
$&nbsp;`ln -s /etc/php5/mods-available/event.ini /etc/php5/cli/conf.d/event.ini`  
$&nbsp;`ln -s /etc/php5/mods-available/eio.ini /etc/php5/cli/conf.d/eio.ini`

`Ctrl + D` - out of sudo

Prepare a folder for PHPDaemon.  
$&nbsp;`sudo mkdir /opt/phpdaemon`
$&nbsp;`sudo chown [your user]:[your group] /opt/phpdaemon`  
$&nbsp;`cd /opt/phpdaemon`

Installing PHPDaemon.  
$&nbsp;`cd /opt/phpdaemon`  
$&nbsp;`git clone https://github.com/kakserpom/phpdaemon.git ./`

Creating configuration file from sample.
$&nbsp;`cp /opt/phpdaemon/conf/phpd.conf.example /opt/phpdaemon/conf/phpd.conf`

Let's create an alias of `phpd` for convenience.
$&nbsp;`alias phpd='/opt/phpdaemon/bin/phpd'`

Local alias of sudo: 
$&nbsp;`alias sudo='sudo '`

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

Let's make the aliases permanent:
$&nbsp;`echo "alias phpd='/opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`
$&nbsp;`echo "alias sudo='sudo /opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`