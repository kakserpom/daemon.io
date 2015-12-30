### ubuntu # Ubuntu 
```bash
#Для начала необходимо установить все сопутствующие утилиты.  
sudo apt-get install gcc make libcurl4-openssl-dev libevent-dev git libevent

#Устанавливаем PHP 5.5.  
sudo apt-get install php5-cli php5-dev php-pear

#Далее устанавливаем pecl модули.  
sudo -i
pecl install event eio
echo "extension=event.so" > /etc/php5/mods-available/event.ini
echo "extension=eio.so" > /etc/php5/mods-available/eio.ini

#Создаем ссылки
ln -s /etc/php5/mods-available/event.ini /etc/php5/cli/conf.d/event.ini
ln -s /etc/php5/mods-available/eio.ini /etc/php5/cli/conf.d/eio.ini

#Подготовим директорию для установки PHPDaemon.  
mkdir /opt/phpdaemon
chown [your user]:[your group] /opt/phpdaemon

exit #выходим из sudo

#Устанавливаем PHPDaemon.  
cd /opt/phpdaemon
git clone https://github.com/kakserpom/phpdaemon.git ./

#Создаем конфигурационный файл из примера.  
cp /opt/phpdaemon/conf/phpd.conf.example /opt/phpdaemon/conf/phpd.conf

#Добавляем права на исполнение
chmod ug+x /opt/phpdaemon/bin/*

#Сделаем ссылку на phpd для удобного управления демоном  
alias phpd='/opt/phpdaemon/bin/phpd'

#Локальный алиас для sudo  
alias sudo='sudo '
```

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
```bash
echo "alias phpd='/opt/phpdaemon/bin/phpd'" >> ~/.bashrc'
echo "alias sudo='sudo '" >> ~/.bashrc'
```
