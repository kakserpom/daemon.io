### ubuntu # Ubuntu

```bash
#First of all you should install related utilities.
sudo -i  
apt-get install gcc make libcurl4-openssl-dev libevent-dev git libevent

#Installing PHP 5.5.  
apt-get install php5-cli php5-dev php-pear

#Then install PHP modules.
pecl install event eio  
echo "extension=event.so" > /etc/php5/mods-available/event.ini  
echo "extension=eio.so" > /etc/php5/mods-available/eio.ini

#Creating links
ln -s /etc/php5/mods-available/event.ini /etc/php5/cli/conf.d/event.ini 
ln -s /etc/php5/mods-available/eio.ini /etc/php5/cli/conf.d/eio.ini

#Prepare a folder for PHPDaemon.  
mkdir /opt/phpdaemon
chown [your user]:[your group] /opt/phpdaemon
exit #exiting root user

#Installing PHPDaemon.  
cd /opt/phpdaemon
git clone https://github.com/kakserpom/phpdaemon.git ./

#Creating configuration file from sample.
cp /opt/phpdaemon/conf/phpd.conf.example /opt/phpdaemon/conf/phpd.conf

#Let's create an alias of `phpd` for convenience.  
alias phpd='/opt/phpdaemon/bin/phpd'

#Local alias of sudo:  
alias sudo='sudo '
```
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
```bash
echo "alias phpd='/opt/phpdaemon/bin/phpd'" >> ~/.bashrc
echo "alias sudo='sudo /opt/phpdaemon/bin/phpd'" >> ~/.bashrc
```
