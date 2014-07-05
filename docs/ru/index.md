## PHPDaemon

Это асинхронный модульный демон-фреймворк, который берёт на&#160;себя обработку I/O (libevent) и&#160;другие низкоуровневые задачи, присущие сетевым демонам.
С&#160;его помощью легко писать правильные и&#160;очень быстрые сетевые приложения.
Из&#160;коробки идут сервера FastCGI, HTTP, CGI, FlashPolicy, Telnet, WebSocket, клиенты mysql, memcached, mongodb и&#160;многое другое.
Работать с&#160;сетью действительно просто. Программист средней руки может написать, к&#160;примеру, IRC-бота за&#160;считанные часы.

Официальный сайт [daemon.io](http://daemon.io/).  
GitHub репозиторий [github.com/kakserpom/phpdaemon](https://github.com/kakserpom/phpdaemon/).  
Обсудить проект можно&#160;в [Google Groups](http://groups.google.com/group/phpdaemon).  
[Багтрекер](https://github.com/kakserpom/phpdaemon/issues).

## Основы

PHPDaemon представляет из&#160;себя один мастер-процесс с&#160;несколькими рабочими процессами.

Приложение, в&#160;зависимости от&#160;нагрузки, инициализируется в&#160;одном или нескольких рабочих процессах.
Во&#160;втором случае запрос будет передан одному свободному рабочему процессу.

Механизма взаимодействия между ребочими процессами не&#160;предусмотрено, поэтому для синхронизации приложений в&#160;разных процессах вы&#160;можете использовать стороннее&#160;ПО, например Redis.
Также есть возможность задать опцию приложения `limit-instances N;`, чтобы ограничить кол-во копий приложения во&#160;всех рабочих процессах.

Исполняющий файл находится в дирктории `./bin/phpd`.
Вы можете создать свой исполняющий файл, как показано в примере `./bin/sampleapp`.
Перед запуском демон проверяет переменную `$configFile`, используя её для загрузки конфигурации.

## Установка

### Требования

 - `PHP` версии не ниже 5.4;
 - Модули `posix`, `pcntl`, `socket`, `shmop`;
 - `libevent 2`;
 - `pecl-event` версии не ниже 1.6.1;

Рекомендуется также установить:

 - `pecl-eio` для увеличения проиводительности файловой системы;
 - `pecl-proctitle` для именования процессов в&#160;понятные названия: &#171;phpd: worker process&#187; (для PHP версии ниже 5.5);
 - `pecl-inotify` для мониторинга файловой системы.

### Исходники

### Composer

Добавьте раздел в ваш composer.json

    "require" : {
        "kakserpom/phpdaemon" : "dev-master"
    }

Подробная информации о пакете на [packagist.org](https://packagist.org/packages/kakserpom/phpdaemon).

### CentOS/RedHat

### Ubuntu

### Gentoo

## Управление

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
    <td>Переоткрытие лог-файлов<br><code>SYSCTL: SIGUSR1</code></td>
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
    <td>Вывод лог-файла в реальном времени с помощью команды <code>tail -f</code>. C параметром <code>-n K</code> выводится K последних строк. Или используйте <code>-n +K</code> для вывода строк, начиная с K.</td>
  </tr>
  <tr>
    <td class="nowrap">$ <code>phpd runworker</code></td>
    <td>Запуск рабочего процесса без мастер-процесса. Используется для отладки.</td>
  </tr>
</table>

## Примеры

Примеры

## Маршрутизация

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

## Конфигурация

### Типы данных

Большинство опций phpdaemon описывается своими типами данных, позволяющие указывать значения расширенным форматом.

#### Size
Предназначен для записи объема информации. Можно записать в виде целого числа или целого числа с постфиксом.

Формат записи: `int [bBkKmMgG]?`

|| **Постфикс** || **Множитель** ||
|| b, B || 1 ||
|| k || 1000 ||
|| K || 1024 ||
|| m || 1000 * 1000 ||
|| M || 1024 * 1024 ||
|| g || 1000 * 1000 * 1000 ||
|| G || 1024 * 1024 * 1024 ||

Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1b || 1 ||
|| 1m || 1000000 ||
|| 1M || 1048576 ||

#### Time
Предназначен для записи количества секунд. Число может быть с плавающей точкой с использованием только символа `"."`.

Формат записи: `float [smhd]?` или `(float [smhd])+`

|| **Постфикс** || **Множитель** ||
|| s || 1 ||
|| m || 60 ||
|| h || 60 * 60 ||
|| d || 60 * 60 * 24 ||

Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1s || 1 ||
|| 1d || 86400 ||
|| 1d 15m 32s || 87332 ||

#### Number
Предназначен для записи чисел.

Формат записи: `int [kKmMgG]?`

|| **Постфикс** || **Множитель** ||
|| k, K || 1000 ||
|| m, M || 1000 * 1000 ||
|| g, G || 1000 * 1000 * 1000 ||

Примеры:

|| **Пример** || **Значение** ||
|| 1 || 1 ||
|| 1K || 1000 ||


### Глобальные опции

Два способа установки опций:

 1. Конфигурационный файл `./conf/phpd.conf`;
 2. Параметры командной строки, например `--max-workers=1`.

> Параметры командной строки имеют больший приоритет.

***
 
#### Плавный перезапуск рабочих процессов
 
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
 
#### Основные пути

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

#### Связанные с мастер-процессом

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

#### Запросы

 - `locale (string = '')`

 Устанавливает настройки локали. Можно указать несколько через разделитель `","`.

 - `ob-filter-auto (boolean = true)`

 Включить стандартный `ob_` фильтр.

#### Рабочие процессы

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

#### Логирование и отладка

 - `logging (boolean = true)`

 Включает логирование.

 - `log-storage (string = '/var/log/phpdaemon.log')`

 Путь к лог-файлу.

 - `log-errors (boolean = true)`

 Включает логирование локальных ошибок таких как Undefined route in WebSocketServer, и т.д.

 - `log-worker-set-state (boolean = false)`

 Включает логирование смены состояния рабочего процесса

 - `log-events (boolean = false)`

 Включает логирование событий

 - `log-signals (boolean = false)`

 Включает логирование SYSCTL сигналов.

 - `verbose-tty (boolean = false)`

 Если true, STDIN, STDOUT и STDERR не будут закрыты.

 - `restrict-error-control (boolean = false)`

 Выключает оператор управления ошибками `"@"`.

#### Подсистема ввода-вывода POSIX

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

### Приложения



## Разработка
### Приложение
### Обработка запросов
### Клиенты и серверы
## Серверы
### HTTP
### FastCGI
### DebugConsole
### FlashPolicy
### Ident
### IRCBouncer
### Lock
### Socks
### WebSocket
## Клиенты
### Asterisk
### DNS
### Gibson
### HTTP
### ICMP
### IRC
### Lock
### Memcache
### Mongo
### MySQL
### PostgreSQL
### Redis
### Valve
### WebSocket
### XMPP
## Библиотеки
### Cache
### ComplexJob
### ShellCommand
### Timer
### TransportContext
### DNode
### FS
### PubSub
## Утилиты
### Binary
### Crypt
### DateTime
### Encoding
### IRC
### MIME
### ShmEntity
### Terminal
## Структуры
### ObjectStorage
### PriorityQueueCallbacks
### StackCallbacks
## Traits
### ClassWatchdog
### DeferredEventHandlers
### EventHandlers
### Sessions
### StaticObjectWatchdog
### StrictStaticObjectWatchdog
## Network
### Client
### ClientConnection
### Connection
### IOStream
### Pool
### Server
## FAQ
## Публикации
## Фьючерсы
## Разработчики