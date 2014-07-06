## phpdaemon # PHPDaemon

Это асинхронный модульный демон-фреймворк, который берёт на&#160;себя обработку I/O (libevent) и&#160;другие низкоуровневые задачи, присущие сетевым демонам.
С&#160;его помощью легко писать правильные и&#160;очень быстрые сетевые приложения.
Из&#160;коробки идут сервера FastCGI, HTTP, CGI, FlashPolicy, Telnet, WebSocket, клиенты mysql, memcached, mongodb и&#160;многое другое.
Работать с&#160;сетью действительно просто. Программист средней руки может написать, к&#160;примеру, IRC-бота за&#160;считанные часы.

Официальный сайт [daemon.io](http://daemon.io/).  
GitHub репозиторий [github.com/kakserpom/phpdaemon](https://github.com/kakserpom/phpdaemon/).  
Обсудить проект можно&#160;в [Google Groups](http://groups.google.com/group/phpdaemon).  
[Багтрекер](https://github.com/kakserpom/phpdaemon/issues).

## basics # Основы

PHPDaemon представляет из&#160;себя один мастер-процесс с&#160;несколькими рабочими процессами.

Приложение, в&#160;зависимости от&#160;нагрузки, инициализируется в&#160;одном или нескольких рабочих процессах.
Во&#160;втором случае запрос будет передан одному свободному рабочему процессу.

Механизма взаимодействия между ребочими процессами не&#160;предусмотрено, поэтому для синхронизации приложений в&#160;разных процессах вы&#160;можете использовать стороннее&#160;ПО, например Redis.
Также есть возможность задать опцию приложения `limit-instances N;`, чтобы ограничить кол-во копий приложения во&#160;всех рабочих процессах.

Исполняющий файл находится в дирктории `./bin/phpd`.
Вы можете создать свой исполняющий файл, как показано в примере `./bin/sampleapp`.
Перед запуском демон проверяет переменную `$configFile`, используя её для загрузки конфигурации.

## install # Установка

### install/requirements # Требования

 - `PHP` версии не ниже 5.4;
 - Модули `posix`, `pcntl`, `socket`, `shmop`;
 - `libevent 2`;
 - `pecl-event` версии не ниже 1.6.1;

Рекомендуется также установить:

 - `pecl-eio` для увеличения проиводительности файловой системы;
 - `pecl-proctitle` для именования процессов в&#160;понятные названия: &#171;phpd: worker process&#187; (для PHP версии ниже 5.5);
 - `pecl-inotify` для мониторинга файловой системы.

### install/sources # Исходный код

Вы можете клонировать PHPDaemon репозиторий  
$&nbsp;`git clone https://github.com/kakserpom/phpdaemon.git`

Или скачать текущую версию в виде архива  
$&nbsp;`wget https://github.com/kakserpom/phpdaemon/archive/master.zip`

Установите необходимые модули  
$&nbsp;`pecl install event eio proctitle inotify`

### install/composer # Composer

Добавьте раздел в ваш composer.json

    "require" : {
        "kakserpom/phpdaemon" : "dev-master"
    }

Подробная информации о пакете на [packagist.org](https://packagist.org/packages/kakserpom/phpdaemon).

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
    [PHPD] [START] phpDaemon with pid-file '/var/run/phpd.pid' is running already (PID 28308)

Поздравляем! PHPDaemon запущен!

### install/ubuntu # Ubuntu

Для начала необходимо установить все сопутстсующие утилиты.  
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
    [PHPD] [START] phpDaemon with pid-file '/var/run/phpd.pid' is running already (PID 28308)

Поздравляем! PHPDaemon запущен!

Добавим алиасы чтобы они были доступны после перезагрузки
$&nbsp;`echo "alias phpd='/opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`
$&nbsp;`echo "alias sudo='sudo /opt/phpdaemon/bin/phpd'" >> ~/.bashrc'`

### install/gentoo # Gentoo

Вы можете установить PHPDaemon с помощью [layman overlay](https://github.com/lexa-uw/layman-phpdaemon).

Добавьте ссылку в секцию overlays в файле layman.cfg:  
`https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml`

В итоге будет выглядеть примерно так:

    overlays  : http://www.gentoo.org/proj/en/overlays/repositories.xml
                https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml

Выполняем команды  
$&nbsp;`sudo layman -L`  
$&nbsp;`sudo layman -a phpdaemon`  
$&nbsp;`sudo emerge www-servers/phpdaemon`

For example, below command install phpdaemon by version 0.4.1, 1.0_beta2 and weekly release.

    $ sudo emerge "=www-servers/phpdaemon-0.4.1" "=www-servers/phpdaemon-1.0_beta2" "www-servers/phpdaemon"
    These are the packages that would be merged, in order:
    
    Calculating dependencies... done!
    [ebuild   R   ~] www-servers/phpdaemon-0.4.1:0.4::phpdaemon  USE="libevent -examples -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-1.0_beta2:1.0::phpdaemon  USE="eio event -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-20130907:weekly::phpdaemon  USE="eio event -runkit" 0 kB
    ...

After installation you can use "eselect phpdaemon set" tool for set up symlink for /usr/bin/phpd

    $ sudo eselect phpdaemon list
    Available phpdaemon targets:
      [1]   phpd0.4
      [2]   phpd1.0
      [3]   phpdweekly
    $ sudo eselect phpdaemon set 3
    $ sudo eselect phpdaemon show
    Current phpdaemon:
      weekly

Add phpdaemon to autoload:

    $ rc-update add phpd default
     * service phpd added to runlevel default

Add sepatare init.d scripts for different versions:

    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-0.4
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-1.0
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-weekly

And add phpd-1.0 to autoload:

    $ rc-update add phpd-1.0 default
     * service phpd added to runlevel default

## control # Управление

<table class="invis">
  <tr>
    <td class="nowrap">$ <code>phpd start</code></td>
    <td>Запуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd stop</code></td>
    <td>Остановка демона<br><code>SYSCTL: SIGTERM, SIGQUIT</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardstop</code></td>
    <td>Принудительная остановка демона<br><code>SYSCTL: SIGINT, SIGKILL</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd update</code></td>
    <td>Обновление конфигурации<br><code>SYSCTL: SIGHUP</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reload</code></td>
    <td>Плавный перезапуск всех рабочих процессов<br><code>SYSCTL: SIGUSR2</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd reopenlog</code></td>
    <td>Переоткрытие журналов<br><code>SYSCTL: SIGUSR1</code></td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd restart</code></td>
    <td>Плавный перезапуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd hardrestart</code></td>
    <td>Принудительный перезапуск демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd status</code></td>
    <td>Вывод статуса демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd fullstatus</code></td>
    <td>Вывод подробной информации работы демона</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd configtest</code></td>
    <td>Вывод глобальных опций. В скобках будет указано значение по-умочанию.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd log [-n K]</code></td>
    <td>Вывод журнала в реальном времени с помощью команды <code>tail -f</code>. C параметром <code>-n K</code> выводится K последних строк. Или используйте <code>-n +K</code> для вывода строк, начиная с K.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd runworker</code></td>
    <td>Запуск рабочего процесса без мастер-процесса. Используется для отладки.</td>
  </tr>
</table>

## examples # Примеры

Примеры

## app_resolver # Маршрутизация

Получая запросы демон первым делом должен определить какому приложению он&#160;должен передать обработку.
Для этого служит метод `getRequestRoute` в&#160;классе `AppResolver` [[GitHub](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/AppResolver.php#L159)].

Вы&#160;можете определить свой обработчик, пример которого лежит в `./conf/AppResolver.php` [[GitHub](https://github.com/kakserpom/phpdaemon/blob/master/conf/AppResolver.php)].

Метод `getRequestRoute` принимает два параметра:

 - `$req` &#8212; объект `stdClass`, с&#160;параметрами запроса;
 - `$upstream` &#8212; объект сервера, принимающий входящие запросы, например `PHPDaemon\Servers\HTTP\Connection`.

Результатом работы может быть:

 - Имя приложения;
 - `null` для попытки передать запрос приложению по-умолчанию;
 - `false` для завершения обработки запроса.

Не&#160;забудьте указать&#160;в [конфиге](#osnovnyie-puti) путь до&#160;вашего AppResolver, например `path './conf/AppResolver.php';`.

В&#160;настройках [сервера](#serveryi), принимающего запросы, с&#160;помощью опции `responder` можно указать имя приложения по-умолчанию, которому будет передан запрос, если `getRequestRoute` вернул `null`.

## config # Конфигурация

### config/types # Типы данных

Большинство опций phpdaemon описывается своими типами данных, позволяющие указывать значения расширенным форматом.

#### config/types/size # Size
Предназначен для записи объема информации. Можно записать в виде целого числа или целого числа с постфиксом.

Формат записи: `int [bBkKmMgG]?`

|| **Постфикс** || **Множитель** || **Пример** || **Значение** ||
|| b, B || 1 || 1b || 1 ||
|| k || 1000 || 1k || 1000 ||
|| K || 1024 || 1K || 1024 ||
|| m || 1000 * 1000 || 1m || 1000000 ||
|| M || 1024 * 1024 || 1M || 1048576 ||
|| g || 1000 * 1000 * 1000 || 1g || 1000000000 ||
|| G || 1024 * 1024 * 1024 || 1G || 1073741824 ||

<!--
Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1b || 1 ||
|| 1m || 1000000 ||
|| 1M || 1048576 ||
-->

#### config/types/time # Time
Предназначен для записи количества секунд. Число может быть с плавающей точкой с использованием только символа `"."`.

Формат записи: `float [smhd]?` или `(float [smhd])+`

|| **Постфикс** || **Множитель** || **Пример** || **Значение** ||
|| s || 1 || 1s || 1 ||
|| m || 60 || 1m || 60 ||
|| h || 60 * 60 || 2h 12s || 7212 ||
|| d || 60 * 60 * 24 || 1d 15m 32s || 87332 ||

<!--
Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1s || 1 ||
|| 1d || 86400 ||
|| 1d 15m 32s || 87332 ||
-->

#### config/types/number # Number
Предназначен для записи чисел.

Формат записи: `int [kKmMgG]?`

|| **Постфикс** || **Множитель** || **Пример** || **Значение** ||
|| k, K || 1000 || 1k || 1000 ||
|| m, M || 1000 * 1000 || 1M || 1000000 ||
|| g, G || 1000 * 1000 * 1000 || 1g || 1000000000 ||

<!--
Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1K || 1000 ||
-->


### config/variables # Глобальные опции

Два способа установки опций:

 1. Конфигурационный файл `./conf/phpd.conf`;
 2. Параметры командной строки, например `--max-workers=1`.

> Параметры командной строки имеют больший приоритет.

***
 
#### config/variables/graceful_restart # Плавный перезапуск рабочих процессов
 
 - `max-requests (Number = '10k')`  
 Максимальное количество запросов перед перезапуском рабочего процесса.
 `0` – неограничено.
 
 - `max-memory-usage (Size = '0b')`  
 Максимальный допустимый порог потребления памяти рабочим процессом.
 `0` – неограничено.
 
 - `max-idle (Time = '0s')`  
 Максимальное время простоя рабочего процесса перед перезапуском.
 `0` – неограничено.

 - `auto-reload (Time = '0s')`  
 Задает интервал проверки всех подключенных файлов. При изменении файлов плавно перезагружает рабочие процессы.

 - `auto-reimport (boolean = false)`  
 На лету импортирует методы и функции из измененных файлов с помощью runkit, без перезагрузки рабочего процесса.
 
#### config/variables/pathes # Основные пути

 - `pid-file (string = '/var/run/phpd.pid')`  
 Путь к pid-файлу. Убедитесь что имеется доступ на запись.

 - `config-file (string = '/etc/phpdaemon/phpd.conf;/etc/phpd/phpd.conf;./conf/phpd.conf')`  
 Путь к файлу конфигурации. Можно указать несколько через разделитель `";"`.  
 Будет загружен только первый найденный конфигурационный файл.

 - `path (string = '/etc/phpdaemon/AppResolver.php;./conf/AppResolver.php')`  
 Путь к Application Resolver. Можно указать несколько через разделитель `";"`.  
 Будет загружен только первый найденный файл.

 - `add-include-path (string = null)`  
 Дополнительные пути для директивы [include_path](http://www.php.net/manual/ru/ini.core.php#ini.include-path).  
 Можно указать несколько через разделитель `":"`.

#### config/variables/master # Связанные с мастер-процессом

 - `mpm-delay (Time = '0.1s')`  
 Интервал между срабатываниями Мульти-Процессного Менеджера.  
 МПМ отвечает за запуск/выключение рабочих процессов, согласно настройкам.

 - `start-workers (Number = 4)`  
 Кол-во рабочих процессов при запуске демона.

 - `min-workers (Number = 4)`  
 Минимальное допустимое кол-во рабочих процессов.

 - `max-workers (Number = 8)`  
 Максимальное допустимое кол-во рабочих процессов.

 - `min-spare-workers (Number = 2)`  
 Минимальное количество простаивающих рабочих процессов: phpDaemon запустит дополнительный рабочие процессы когда нагрузка увеличится, чтобы простаивающих рабочих процессов было достаточно. Сверху ограничивается параметром max-workers.

 - `max-spare-workers (Number = 0)`  
 Максимальное кол-во простаивающих рабочих процессов. phpDaemon выключит дополнительные рабочие процессы когда нагрузка спадёт.

 - `master-priorty (Number = 100)`  
 Приоритет мастер-процесса. Чем меньше значение, тем выше приоритет.

 - `ipc-thread-priority (Number = 100)`  
 Приоритет IPC процесса. Чем меньше значение, тем выше приоритет.

 - `worker-priority (Number = 4)`  
 Приоритет рабочего процесса. Чем меньше значение, тем выше приоритет.

 - `throw-exception-on-shutdown (boolean = false)`  
 Выбрасывать исключение `Exception('event shutdown')` по завершению процесса.

#### config/variables/requests # Запросы

 - `locale (string = '')`  
 Устанавливает настройки локали. Можно указать несколько через разделитель `","`.

 - `ob-filter-auto (boolean = true)`  
 Включить стандартный `ob_` фильтр.

#### config/variables/workers # Рабочие процессы

 - `chroot (string = '/')`  
 Смена системного корня для рабочих процессов.

 - `cwd (string = '.')`  
 Задание рабочей директории для рабочих процессов.

 - `user (string = null)`  
 Пользователь для рабочих процессов. Используйте безопасного пользователя, не используйте root, если не знаете что делаете.

 - `group (string = null)`  
 Группа для рабочих процессов. Используйте безопасную группу, не используйте root, если не знаете что делаете.

 - `auto-gc (Number = '1k')`  
 Включает сборщик мусора вызываемый каждые n запросов. `0` – выключает совсем.

#### config/variables/logging # Журналирование и отладка

 - `logging (boolean = true)`  
 Включает журналирование.

 - `log-storage (string = '/var/log/phpdaemon.log')`  
 Путь к файлу журнала.

 - `log-errors (boolean = true)`  
 Включает журналирование локальных ошибок таких как Undefined route in WebSocketServer, и т.д.

 - `log-worker-set-state (boolean = false)`  
 Включает журналирование смены состояния рабочего процесса

 - `log-events (boolean = false)`  
 Включает журналирование событий

 - `log-signals (boolean = false)`  
 Включает журналирование SYSCTL сигналов.

 - `verbose-tty (boolean = false)`  
 Если параметр включен, журнал будет выводиться в терминал (STDOUT).

 > Учтите, что в обычном варианте запуска (не runworker) ввод из терминала игнорируется, хотя после запуска с этим параметром может показаться, что программа привязана к терминалу.

 - `restrict-error-control (boolean = false)`  
 Выключает оператор управления ошибками `"@"`.

#### config/variables/eio # Подсистема ввода-вывода POSIX

 - `eio-enabled (boolean = true)`  
 Включает поддержку EIO.

 - `eio-set-max-idle (Time = null)`  
 Устанавливает максимальное количество ожидающих потоков.

 - `eio-set-min-parallel (Number = null)`  
 Устанавливает минимальное количество параллельных потоков.

 - `eio-set-max-parallel (Number = null)`  
 Устанавливает максимальное количество параллельных потоков.

 - `eio-set-max-poll-reqs (Number = null)`  
 Устанавливает максимальное количество обрабатываемых запросов.

 - `eio-set-max-poll-time (Time = null)`  
 Устанавливает максимальное время выполнения.

### config/application # Приложения



## development # Разработка
### development/app_instance # Приложение
### development/request # Обработка запросов
### development/servers_clients # Серверы и клиенты
## servers # Серверы

Серверы предназначены для приема запросов и передачи их приложениям.

Серверы должны быть записаны в конфиг с помощью приложения Pool, например:

    # контекст для ssl соединения (опционально)
    TransportContext:myContext {
        ssl;
        certFile "/path/to/cert.pem";
        pkFile "/path/to/privkey.pem";
        passphrase "";
        verifyPeer true;
        allowSelfSigned true;
    }
    
    # слушаем 80 и 443 порт
    Pool:HTTPServer {
        listen "tcp://0.0.0.0:80", "tcp://0.0.0.0:443##myContext";
        port 80;
        privileged;
        maxconcurrency 1;
    }

### servers/variables #  Опции серверов

Ниже перечислены опции для всех серверов

 - `listen (string = 'tcp://0.0.0.0')`  
 Прослушиваемые сервером адреса. Можно указать несколько через разделитель&nbsp;`","`.

 - privileged  
 @TODO

 - max-concurrency  
 @TODO

 - max-allowed-packet  
 @TODO

 - connection-class  
 @TODO

 - name  
 @TODO

 - allowed-clients  
 @TODO

 - ssl
 @TODO

 - cert-file
 @TODO

 - pk-file
 @TODO

 - passphrase
 @TODO

 - verify-peer
 @TODO

 - allow-self-signed
 @TODO

 - verify-depth
 @TODO

 - ca-file
 @TODO


### servers/http # HTTP

#### servers/http/variables # Опции

 - `port (int = 80)`  
 Прослушиваемый порт.

 - `send-file (boolean = false)`  
 Оптимизирует обработку запросов, предварительно записывая их в файл.
 Опция будет игнорироваться если передан параметр `server['DONT_USE_SENDFILE']`.

 - `send-file-dir (string = '/dev/shm')`  
 Директория для sendfile. 

 - `send-file-prefix (string = 'http-')`  
 Префикс для sendfile файлов.

 - `send-file-onlybycommand (boolean = false)`  
 Включать sendfile если передан `server['USE_SENDFILE']`.

 - `expose (boolean = true)`  
 Включать версию PHPDaemon в заголовке `X-Powered-By`.

 - `keepalive (Time = '0s')`  
 Время keepalive.

 - `chunksize (Size = '8k')`  
 Размер чанка.

 - `defaultcharset (string = 'utf-8')`  
 Кодировка по-умолчанию.

 - `wss-name (string = '')`  
 Имя пула WebSocket-сервера, куда направлять WebSocket-соединения.

 - `fps-name (string = '')`  
 Имя пула FlashPolicy-сервера, куда адресовать FlashPolicy-соединения.

 - `upload-max-size (Size = ini_get('upload_max_filesize'))`  
 Максимальный размер загружаемого файла.

 - `responder (string = null)`  
 Имя приложения по-умолчанию для обработки запросов с данного сервера.

### servers/fastcgi # FastCGI
### servers/debugconsole # DebugConsole
### servers/flashpolicy # FlashPolicy
### servers/ident # Ident
### servers/ircbouncer # IRCBouncer
### servers/lock # Lock
### servers/socks # Socks
### servers/websocket # WebSocket
## clients # Клиенты
### clients/asterisk # Asterisk
### clients/dns # DNS
### clients/gibson # Gibson
### clients/http # HTTP
### clients/icmp # ICMP
### clients/irc # IRC
### clients/lock # Lock
### clients/memcache # Memcache
### clients/mongo # Mongo
### clients/mysql # MySQL
### clients/postgresql # PostgreSQL
### clients/redis # Redis
### clients/valve # Valve
### clients/websocket # WebSocket
### clients/xmpp # XMPP
## libraries # Библиотеки
### libraries/cache # Cache
### libraries/complexjob # ComplexJob
### libraries/shellcommand # ShellCommand
### libraries/timer # Timer
### libraries/transportcontext # TransportContext
### libraries/dnode # DNode
### libraries/fs # FS
### libraries/pubsub # PubSub
## utils # Утилиты
### utils/binary # Binary
### utils/crypt # Crypt
### utils/datetime # DateTime
### utils/encoding # Encoding
### utils/irc # IRC
### utils/mime # MIME
### utils/shmentity # ShmEntity
### utils/terminal # Terminal
## structures # Структуры
### structures/objectstorage # ObjectStorage
### structures/priorityqueuecallbacks # PriorityQueueCallbacks
### structures/stackcallbacks # StackCallbacks
## traits # Traits
### traits/classwatchdog # ClassWatchdog
### traits/deferredeventhandlers # DeferredEventHandlers
### traits/eventhandlers # EventHandlers
### traits/sessions # Sessions
### traits/staticobjectwatchdog # StaticObjectWatchdog
### traits/strictstaticobjectwatchdog # StrictStaticObjectWatchdog
## network # Network
### network/client # Client
### network/clientconnection # ClientConnection
### network/connection # Connection
### network/iostream # IOStream
### network/pool # Pool
### network/server # Server
## faq # FAQ
## publications # Публикации
## futures # Фьючерсы
## developers # Разработчики