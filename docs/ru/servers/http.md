### http # HTTP #> [Серверы](#servers) \ HTTP {tpl-git PHPDaemon/Servers/HTTP}

Сервер использует пространство имен {tpl-inlink httprequest HTTPRequest}.

Это транспортное приложение предоставляет HTTP сервер для phpDaemon. Входящие Websocket соединения будут переданы приложению WebsocketServer.

HTTP пробует определить приложение через AppResolver, не забудьте сконфигурировать его.

#### options # Опции

 - `listen (string = 'tcp://0.0.0.0')`  
 Какие адреса слушать, через запятую

 - `port (integer = 80)`  
 Прослушиваемый порт

 - `allowed-clients (string = '127.0.0.1')`  
 IP адреса (через запятую) которым позволено делать запросы. CIDR-маски поддерживаются

 - `send-file (boolean = false)`  
 Оптимизирует обработку запросов, предварительно записывая их в файл.
 Опция будет игнорироваться если передан параметр `server['DONT_USE_SENDFILE']`

 - `send-file-dir (string = '/dev/shm')`  
 Директория для sendfile

 - `send-file-prefix (string = 'http-')`  
 Префикс для sendfile файлов

 - `send-file-onlybycommand (boolean = false)`  
 Включать sendfile если передан `server['USE_SENDFILE']`

 - `expose (boolean = true)`  
 Включать версию PHPDaemon в заголовке `X-Powered-By`

 - `:p`keepalive ([Time](#config/types/time) = '0s')`  
 Таймаут бездействия перед закрытием keep-alive соединения

 - `:p`chunksize ([Size](#config/types/size) = '8k')`  
 Размер куска

 - `defaultcharset (string = 'utf-8')`  
 Кодировка по-умолчанию

 - `wss-name (string = '')`  
 Имя пула WebSocket-сервера, куда направлять WebSocket-соединения

 - `fps-name (string = '')`  
 Имя пула FlashPolicy-сервера, куда адресовать FlashPolicy-соединения

 - `:p`upload-max-size ([Size](#config/types/size) = ini_get('upload_max_filesize'))`  
 Максимальный размер загружаемого файла

 - `responder (string = null)`  
 Имя приложения по-умолчанию для обработки запросов с данного сервера
