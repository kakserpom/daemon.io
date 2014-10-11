### http # HTTP #> HTTP {tpl-git PHPDaemon/Clients/HTTP}

```php
namespace PHPDaemon\Clients\HTTP;
```

Предназначен для выполнения GET и POST запросов на удаленные хосты.

Клиент использует пространство имен [HTTPRequest](#httprequest).

#### examples # Примеры

Получение файла [google.com/robots.txt](http://www.google.com/robots.txt) GET запросом:

```php
$httpclient = \PHPDaemon\Clients\HTTP\Pool::getInstance();

$httpclient->get('http://www.google.com/robots.txt',
	function ($conn, $success) {
		// обработка данных ответа
	}
);
```

Рабочий пример клиента представлен в {tpl-git PHPDaemon/Clients/HTTP/Examples/Simple.php Clients/HTTP/Examples/Simple.php}

#### pool # Класс Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Опции по-умолчанию

 - `port (integer = 80)`
 - `ssl-port (integer = 443)`
 - `expose (boolean = true)`

##### methods # Методы

<md:method>
void public get ( url $url, array $params )
void public get ( url $url, callable $resultcb )

Осуществляет GET запрос

$url
запрашиваемый URL

$params
ассоциативный массив параметров запроса

$resultcb
callback ( [Connection](#../../connection) $conn, boolean $success )
Вызывается когда на запрос пришел ответ, либо произошла ошибка
</md:method>

<md:method>
void public post ( url $url, array $data, array $params )
void public post ( url $url, array $data, callable $resultcb )

Осуществляет POST запрос

$url
запрашиваемый URL

$data
ассоциативный массив POST-параметров

$params
ассоциативный массив параметров запроса

$resultcb
callback ( [Connection](#../../connection) $conn, boolean $success )
Вызывается когда на запрос пришел ответ, либо произошла ошибка
</md:method>

<md:method>
string public static buildUrl ( string $str )
string public static buildUrl ( array $mixed )

Генерирует URL-кодированную строку запроса из предоставленного ассоциативного (или индексного) массива `:hc`$mixed` или возвращает строку `:hc`$str`. В случае ошибки возвращает `:hc`false`

$mixed
массив параметров URL
</md:method>

<md:method>
string public static parseUrl ( string $str )
string public static parseUrl ( array $mixed )

Разбирает массив `:hc`$mixed` или строку `:hc`$str` и возвращает ассоциативный массив, содержащий необходимые компоненты URL: `:hc`[$scheme, $host, $uri, $port]`. В случае ошибки возвращает `:hc`false`.  
См. [php.net/parse_url](http://php.net/parse_url)

$mixed
массив параметров URL
</md:method>

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/HTTP/Connection.php}

```php
namespace PHPDaemon\Clients\HTTP;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Свойства

<md:prop>
array public $headers;
Заголовки ответа
</md:prop>

<md:prop>
string public $body;
Тело ответа
</md:prop>

<md:prop>
integer public $contentLength;
Длина тела ответа
</md:prop>

<md:prop>
string public $cookie;
Ассоциативный массив Cookies пришедших в ответе
</md:prop>

<md:prop>
boolean public $chunked;
Если true, то в заголовках был получен `Transfer-Encoding: chunked`
</md:prop>

<md:prop>
integer public $protocolError;
Если не `:hc`null`, то произошла серьезная ошибка при обработке ответа на запрос. Содержит номер строки в файле {tpl-git PHPDaemon/Clients/HTTP/Connection.php Connection.php}, по которому можно определить характер ошибки
</md:prop>

<md:prop>
integer public $responseCode;

Код ответа. См. [Список кодов состояния HTTP](http://ru.wikipedia.org/wiki/Список_кодов_состояния_HTTP)
</md:prop>

<md:prop>
string public $lastURL;
Последний запрошенный url
</md:prop>

<md:prop>
string public $rawHeaders;
Заголовки ответа в сыром виде
</md:prop>

##### methods # Методы

<md:method>
string public getBody ( )

Возвращает тело ответа
</md:method>

<md:method>
string public getHeaders ( )

Возвращает ассоциативный массив заголовков ответа
</md:method>

<md:method>
string public getHeader ( string $name )

Возвращает заголовок ответа по имени или `:hc`null`

$name
имя заголовка
</md:method>