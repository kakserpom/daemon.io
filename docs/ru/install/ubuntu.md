### ubuntu # Ubuntu

Для начала необходимо установить все сопутствующие утилиты.  
$&nbsp;`sudo apt-get install gcc make libcurl4-openssl-dev libevent-dev git libevent`

Устанавливаем PHP 5.5.  
$&nbsp;`sudo apt-get install php5-cli php5-dev php-pear`

Далее устанавливаем pecl модули.  
$&nbsp;`sudo -i`  
$&nbsp;`pecl install event eio`  
$&nbsp;`echo "extension=event.so" > /etc/php5/mods-available/event.ini`  
$&nbsp;`echo "extension=eio.so" > /etc/php5/mods-available/eio.ini`

Создаем ссылки
$&nbsp;`ln -s /etc/php5/mods-available/event.ini /etc/php5/cli/conf.d/event.ini`  
$&nbsp;`ln -s /etc/php5/mods-available/eio.ini /etc/php5/cli/conf.d/eio.ini`

`Ctrl + D` - выходим из sudo

Подготовим директорию для установки PHPDaemon.  
$&nbsp;`sudo mkdir /opt/phpdaemon`
$&nbsp;`sudo chown [your user]:[your group] /opt/phpdaemon`  
$&nbsp;`cd /opt/phpdaemon`

Устанавливаем PHPDaemon.  
$&nbsp;`cd /opt/phpdaemon`  
$&nbsp;`git clone https://github.com/kakserpom/phpdaemon.git ./`

Создаем конфигурационный файл из примера.  
$&nbsp;`cp /opt/phpdaemon/conf/phpd.conf.example /opt/phpdaemon/conf/phpd.conf`

Сделаем ссылку на phpd для удобного управления демоном  
$&nbsp;`alias phpd='/opt/phpdaemon/bin/phpd'`

Локальный алиас для sudo  
$&nbsp;`alias sudo='sudo '`

Пробуем запустить демон.  
$&nbsp;`sudo phpd start --verbose-tty=1`

Опция `--verbose-tty=1` указывает демону выводить журнал в терминал.

Если вы видите что-то похожее на это:

    [PHPD] Loaded config file: '/opt/phpdaemon/conf/phpd.conf'
	[PHPD] Loaded config file: 'conf/conf.d/ExampleJabberBot.conf'
	[PHPD] Loaded config file: 'conf/conf.d/FastCGI.conf'
	[PHPD] Loaded config file: 'conf/conf.d/FlashpolicyServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/HTTPServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/IdentServer.conf'
	[PHPD] Loaded config file: 'conf/conf.d/SSL-sample.conf'
	[PHPD] Loaded config file: 'conf/conf.d/WebSocketServer.conf'

Поздравляем! PHPDaemon запущен!

Добавим алиасы чтобы они были доступны после перезагрузки
$&nbsp;`echo "alias phpd='/opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`
$&nbsp;`echo "alias sudo='sudo /opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`