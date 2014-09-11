### fastcgi # FastCGI #> FastCGI {tpl-git PHPDaemon/Servers/FastCGI}

Сервер использует пространство имен [HTTPRequest](#httprequest).

Это транспортное приложение представляет FastCGI сервер для phpDaemon.

После конфигурирования phpDaemon вам также следует задействовать веб-сервер, который поддерживает FastCGI. Если вы еще не сделали выбор в пользу одного из них, мы советуем [NGINX](http://nginx.org).

Веб-сервер может передавать FastCGI-серверу параметр APPNAME, который содержит название приложения которое должно обработать данный запрос. Если параметр не передан, FastCGI-сервер попробует определить это через AppResolver.

Пример конфигурации NGINX:

```nginx
location /Example/ {
	fastcgi_pass unix:/tmp/phpdaemon.fcgi.sock;
	fastcgi_param APPNAME Example;
	include fastcgi_params;
}
```

#### options # Опции

 - `listen (string = 'tcp://127.0.0.1,unix:///tmp/phpdaemon.fcgi.sock')`  
 Какие адреса слушать, через запятую

 - `port (integer = 80)`  
 Прослушиваемый порт

 - `auto-read-body-file (boolean = true)`  
 Автоматически реагирует на FastCGI параметр REQUEST_BODY_FILE и читает тело запроса из файла, созданного веб-сервером

 - `allowed-clients (string = '127.0.0.1')`  
 IP адреса (через запятую) которым позволено делать запросы. CIDR-маски поддерживаются

 - `send-file (boolean = false)`  
 Оптимизирует обработку запросов, предварительно записывая их в файл.
 Опция будет игнорироваться если передан параметр `server['DONT_USE_SENDFILE']`

 - `send-file-dir (string = '/dev/shm')`  
 Директория для sendfile

 - `send-file-prefix (string = 'fcgi-')`  
 Префикс для sendfile файлов

 - `send-file-onlybycommand (boolean = false)`  
 Включать sendfile если передан `server['USE_SENDFILE']`

 - `expose (boolean = true)`  
 Включать версию PHPDaemon в заголовке `X-Powered-By`

 - `:p`keepalive ([Time](#config/types/time) = '0s')`  
 Таймаут бездействия перед закрытием keep-alive соединения
 > Если вы используете значение отличное от 0, учтите что nginx и некоторые другие веб-сервера НЕ ПОДДЕРЖИВАЮТ keep-alive соединения с FastCGI-бекэндами.

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
