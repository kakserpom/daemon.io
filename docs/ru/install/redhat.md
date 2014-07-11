### install/redhat # CentOS/RedHat

Для начала необходимо установить все сопутстсующие утилиты.  
$&nbsp;`sudo yum install -y git gcc openssl-devel libevent`

Чтобы установить PHP 5.5 необходимо добавить Remi и Epel репозитории, потому что стандартный содержит старую версию.

Для RHEL/CentOS 6.4-6.0 32 Bit.  
$&nbsp;`sudo rpm -Uvh http://download.fedoraproject.org/pub/epel/6/i386/epel-release-6-8.noarch.rpm`  
$&nbsp;`sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm`

Для RHEL/CentOS 6.4-6.0 64 Bit.  
$&nbsp;`sudo rpm -Uvh http://download.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm`  
$&nbsp;`sudo rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm`

Устанавливаем PHP.  
$&nbsp;`sudo yum --enablerepo=remi,remi-test install -y php-cli php-devel php-pear php-process`

Далее устанавливаем pecl модули.  
$&nbsp;`sudo -i`  
$&nbsp;`pecl install event eio`

В PHP отсутсвует контроль подгрузки модулей. Для корректной работы модуля event и eio необходим модуль sockets.
В системах RedHat/CentOS модули подгружаются в порядке названия, поэтому назовем конфиги этих модулей как z-event.ini и z-eio.ini соответсвенно.  
$&nbsp;`echo "extension=event.so" > /etc/php.d/z-event.ini`
$&nbsp;`echo "extension=eio.so" > /etc/php.d/z-eio.ini`

`Ctrl + D` - выходим из sudo

Установите `date.timezone` в /etc/php.ini в соответствие с временной зоной сервера.
Раскомментируйте и отредактируйте строку `;date.timezone = ` (например, `date.timezone = Europe/Moscow`)  
$&nbsp;`sudo vi /etc/php.ini`

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
$&nbsp;`ln -s /opt/phpdaemon/bin/phpd /usr/bin/phpd`

Пробуем запустить демон.  
$&nbsp;`sudo phpd start --verbose-tty=1`

Опция `--verbose-tty=1` указывет демону выводить журнал в терминал.

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