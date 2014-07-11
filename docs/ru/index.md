<!-- pvar title Документация &laquo; phpDaemon -->

## phpdaemon # PHPDaemon

Это асинхронный модульный демон-фреймворк, который берёт на&#160;себя обработку I/O (libevent) и&#160;другие низкоуровневые задачи, присущие сетевым демонам.
С&#160;его помощью легко писать правильные и&#160;очень быстрые сетевые приложения.
Из&#160;коробки идут сервера FastCGI, HTTP, CGI, FlashPolicy, Telnet, WebSocket, клиенты mysql, memcached, mongodb и&#160;многое другое.
Работать с&#160;сетью действительно просто. Программист средней руки может написать, к&#160;примеру, IRC-бота за&#160;считанные часы.

Официальный сайт [daemon.io](http://daemon.io/).  
GitHub репозиторий [github.com/kakserpom/phpdaemon](https://github.com/kakserpom/phpdaemon/).  
Обсудить проект можно&#160;в [Google Groups](http://groups.google.com/group/phpdaemon).  
[Багтрекер](https://github.com/kakserpom/phpdaemon/issues).

<!-- import root/basics.md -->

## install # Установка

<!-- import install/requirements.md -->

<!-- import install/sources.md -->

<!-- import install/composer.md -->

<!-- import install/redhat.md -->

<!-- import install/ubuntu.md -->

<!-- import install/gentoo.md -->


<!-- import root/control.md -->


<!-- import root/examples.md -->


<!-- import root/app_resolver.md -->


## config # Конфигурация

<!-- import config/types.md -->

<!-- import config/variables.md -->

<!-- import config/application.md -->

## development # Разработка
### development/app_instance # Приложение
### development/request # Обработка запросов
### development/servers_clients # Серверы и клиенты

<!-- import servers/index.md -->

<!-- import servers/options.md -->

<!-- import servers/http.md -->

### servers/fastcgi # Servers\FastCGI
### servers/debugconsole # Servers\DebugConsole
### servers/flashpolicy # Servers\FlashPolicy
### servers/ident # Servers\Ident
### servers/ircbouncer # Servers\IRCBouncer
### servers/lock # Servers\Lock
### servers/socks # Servers\Socks
### servers/websocket # Servers\WebSocket

<!-- import clients/index.md -->

### clients/asterisk # Clients\Asterisk
### clients/dns # Clients\DNS
### clients/gibson # Clients\Gibson

<!-- import clients/http.md -->

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

 - Vasily Zorin <<mailto:maintainer@daemon.io>> &mdash; founder, maintainer, active core developer
 - Ruslan Osmanov <<mailto:osmanov@daemon.io>> &mdash; maintainer of related PHP extensions: <a href="http://pecl.php.net/package/event" target="_blank">pecl-event</a> and <a href="http://pecl.php.net/package/eio" target="_blank">pecl-eio</a>. His invaluable contribution enabled to get rid of old nasty libevent 1.x code
 - Alexey Sharov <<mailto:www.pismeco@gmail.com>> &mdash; a lot of core bugfixes, phpdoc comments
 - Denis "TyShkan" <<mailto:denis@tyshkan.ru>> &mdash; new maintainer of Asterisk PBX client
 - Mikhail Semakhin <<mailto:mike.semakhin@gmail.com>> &mdash; contributions to core HTTPRequest class
 - Eugene Tuboltsev <<mailto:normandiggs@gmail.com>> &mdash; various contributions incl. refactoring for namespaces
 - "nehxby" <<mailto:nehxby@gmail.com>> &mdash; contributions to Asterisk client

## authors # Авторы документации

 - Dmitry Efimenko <<mailto:edg89@mail.ru>>
 - Vasily Zorin <<mailto:maintainer@daemon.io>>
 - Твое имя может быть здесь!

## translators # Переводчики