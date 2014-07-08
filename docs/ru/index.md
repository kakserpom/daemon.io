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

<!-- import install/requirements.md -->

<!-- import install/sources.md -->

<!-- import install/composer.md -->

<!-- import install/redhat.md -->

<!-- import install/ubuntu.md -->

<!-- import install/gentoo.md -->


<!-- import control.md -->


<!-- import examples.md -->


<!-- import app_resolver.md -->


## config # Конфигурация

<!-- import config/types.md -->

<!-- import config/variables.md -->

<!-- import config/application.md -->

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

### servers/options # Опции серверов

В данном разделе перечислены опции, используемые всеми серверами.

 - `listen (string|array)`  
 Прослушиваемые сервером адреса. Можно указать несколько через разделитель&nbsp;`","`.

 - privileged  
 @TODO

 - max-concurrency  
 Максимальное количество открытых соединений.

 - max-allowed-packet  
 Максимальный допустимый размер пакета.

 - connection-class  
 Класс соединения по-умолчанию.

 - name  
 @TODO

 - allowed-clients  
 Разрешенные IP-адреса или маски через запятую.

 - ssl  
 Включает ssl.

 - ssl-port
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


### servers/http # Servers\HTTP

#### servers/http/options # Опции

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

 - `:e`keepalive ([Time](#config/types/time) = '0s')`  
 Время keepalive.

 - `:e`chunksize ([Size](#config/types/size) = '8k')`  
 Размер чанка.

 - `defaultcharset (string = 'utf-8')`  
 Кодировка по-умолчанию.

 - `wss-name (string = '')`  
 Имя пула WebSocket-сервера, куда направлять WebSocket-соединения.

 - `fps-name (string = '')`  
 Имя пула FlashPolicy-сервера, куда адресовать FlashPolicy-соединения.

 - `:e`upload-max-size ([Size](#config/types/size) = ini_get('upload_max_filesize'))`  
 Максимальный размер загружаемого файла.

 - `responder (string = null)`  
 Имя приложения по-умолчанию для обработки запросов с данного сервера.

### servers/fastcgi # Servers\FastCGI
### servers/debugconsole # Servers\DebugConsole
### servers/flashpolicy # Servers\FlashPolicy
### servers/ident # Servers\Ident
### servers/ircbouncer # Servers\IRCBouncer
### servers/lock # Servers\Lock
### servers/socks # Servers\Socks
### servers/websocket # Servers\WebSocket
## clients # Клиенты
### clients/asterisk # Clients\Asterisk
### clients/dns # Clients\DNS
### clients/gibson # Clients\Gibson
### clients/http # HTTP #> [Клиенты](#clients) \ HTTP `namespace PHPDaemon\Clients\HTTP`

#### clients/http/pool # Pool

##### clients/http/pool/options # Опции по-умолчанию

 - `port (int = 80)`
 - `ssl-port (int = 443)`
 - `expose (boolean = true)`

##### clients/http/pool/methods # Методы

 - `public function get(string|array $url, callable|array $params)`  
 Осуществляет GET запрос.

   -.n param `$url` – строка c полным url или массив параметров.
   -.n param `$params` - callback функция или массив @TODO.
   -.n.ti callback function(`:e`[Connection](#clients/http/connection)` $conn, boolean $success).
   -.n.ti return `void`;

 - `public function post(string|array $url, array $data = [], callable|array $params)`  
 Осуществляет POST запрос.

   -.n param `$url` – строка c полным url или массив параметров.
   -.n param `$data` - массив данных.
   -.n param `$params` - callback функция или массив @TODO.
   -.n.ti callback function(`:e`[Connection](#clients/http/connection)` $conn, boolean $success).
   -.n.ti return `void`;

 - `public static function buildUrl(string|array $mixed)`  
 Преобразует массив `$mixed` в ссылку. @TODO lol

   -.n param `$mixed` - массив параметров url.
   -.n.ti return `string`;

 - `public static function prepareUrl(string|array $mixed)`  
 Преобразует массив `$mixed` в нормализованный массив. @TODO дабл lol

   -.n param `$mixed` - массив параметров url.
   -.n.ti return `array`;

#### clients/http/connection # Connection

##### clients/http/connection/vars # Свойства

 - `public $headers;`  
 Заголовки ответа.

 - `public $contentLength;`  
 Длина ответа.

 - `public $body;`  
 Тело ответа.

 - `public $cookie;`  
 Coockies ответа.

 - `public $chunked;`  
 Механизм передачи данных chunked если `true`.

 - `public $protocolError;`  
 Номер строки на которой произошла ошибка.

 - `public $responseCode;`  
 Код ответа.

 - `public $lastURL;`  
 Последний запрошенный url.

 - `public $rawHeaders;`  
 Заголовки ответа в сыром виде.

##### clients/http/connection/methods # Методы



### clients/icmp # Clients\ICMP
### clients/irc # Clients\IRC
### clients/lock # Clients\Lock
### clients/memcache # Clients\Memcache
### clients/mongo # Clients\Mongo
### clients/mysql # Clients\MySQL
### clients/postgresql # Clients\PostgreSQL
### clients/redis # Clients\Redis
### clients/valve # Clients\Valve
### clients/websocket # Clients\WebSocket
### clients/xmpp # Clients\XMPP
## libraries # Библиотеки
### libraries/cache # \Cache
### libraries/complexjob # Core\ComplexJob
### libraries/shellcommand # Core\ShellCommand
### libraries/timer # Core\Timer
### libraries/transportcontext # Core\TransportContext
### libraries/dnode # \DNode
### libraries/fs # \FS
### libraries/pubsub # \PubSub
## utils # Утилиты
### utils/binary # Utils\Binary
### utils/crypt # Utils\Crypt
### utils/datetime # Utils\DateTime
### utils/encoding # Utils\Encoding
### utils/irc # Utils\IRC
### utils/mime # Utils\MIME
### utils/shmentity # Utils\ShmEntity
### utils/terminal # Utils\Terminal
## structures # Структуры
### structures/objectstorage # Structures\ObjectStorage
### structures/priorityqueuecallbacks # Structures\PriorityQueueCallbacks
### structures/stackcallbacks # Structures\StackCallbacks
## traits # Traits
### traits/classwatchdog # Traits\ClassWatchdog
### traits/deferredeventhandlers # Traits\DeferredEventHandlers
### traits/eventhandlers # Traits\EventHandlers
### traits/sessions # Traits\Sessions
### traits/staticobjectwatchdog # Traits\StaticObjectWatchdog
### traits/strictstaticobjectwatchdog # Traits\StrictStaticObjectWatchdog
## network # Network
### network/client # Network\Client
### network/clientconnection # Network\ClientConnection
### network/connection # Network\Connection
### network/iostream # Network\IOStream
### network/pool # Network\Pool
### network/server # Network\Server
## faq # FAQ
## publications # Публикации
## futures # Фьючерсы
## developers # Разработчики