### clients/http # HTTP #> [Клиенты](#clients) \ HTTP {tpl-git PHPDaemon/Clients/HTTP}

`:h`namespace PHPDaemon\Clients\HTTP`

Клиент HTTP предназначен для выполнения GET и POST запросов на удаленные хосты.

#### Примеры

Рабочий пример представлен в [Examples\ExampleHTTPClient.php](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Examples/ExampleHTTPClient.php).

```php
$httpclient = \PHPDaemon\Clients\HTTP\Pool::getInstance();

$httpclient->get(['http://www.google.com/robots.txt'],
	function ($conn, $success) {
		// обработка данных ответа
	}
);
```

#### clients/http/pool # Класс Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

##### clients/http/pool/options # Опции по-умолчанию

 - `port (integer = 80)`
 - `ssl-port (integer = 443)`
 - `expose (boolean = true)`

##### clients/http/pool/methods # Методы

 -.method ```php.inline
 void public Pool::get ( url $url, array $params )
 void public Pool::get ( url $url, callable $resultcb )
 ```
   -.n Осуществляет GET запрос
   -.n.ti `:h.clear`$url` &mdash; строка c полным url или массив параметров
   -.n `:h.clear`$params` &mdash; массив параметров
   -.n `:h.clear`$resultcb` &mdash; `:ph.clear`callback ( [Connection](#clients/http/connection) $conn, boolean $success )` &mdash; Вызывается когда на запрос пришел ответ, либо произошла ошибка

 -.method ```php.inline
 void public Pool::post ( url $url, array $data, array $params )
 void public Pool::post ( url $url, array $data, callable $resultcb )
 ```
   -.n Осуществляет POST запрос
   -.n.ti `:h.clear`$url` &mdash; строка c полным url или массив параметров
   -.n `:h.clear`$data` &mdash; ассоциативный массив POST-параметров
   -.n `:h.clear`$params` &mdash; callback функция или массив @TODO
   -.n `:h.clear`$resultcb` &mdash; `:ph.clear`callback ( [Connection](#clients/http/connection) $conn, boolean $success )` &mdash; Вызывается когда на запрос пришел ответ, либо произошла ошибка

 -.method  ```php.inline
 string public static Pool::buildUrl ( string $mixed )
 string public static Pool::buildUrl ( array $mixed )
 ```
   -.n Преобразует массив `:h.clear`$mixed` в ссылку
   -.n.ti `:h.clear`$mixed` &mdash; массив параметров url

 -.method ```php.inline
 string public static Pool::prepareUrl ( string $mixed )
 string public static Pool::prepareUrl ( array $mixed )
 ```
   -.n Преобразует массив `:h.clear`$mixed` в нормализованный массив @TODO дабл lol
   -.n.ti `:h.clear`$mixed` &mdash; массив параметров url

#### clients/http/connection # Класс Connection {tpl-git PHPDaemon/Clients/HTTP/Connection.php}

##### clients/http/connection/vars # Свойства

 -.method `:h`array public $headers;`  
 Заголовки ответа

 -.method `:h`string public $body;`  
 Тело ответа

 -.method `:h`integer public $contentLength;`  
 Длина тела ответа

 -.method `:h`string public $cookie;`  
 Ассоциативный массив Cookies пришедших в ответе

 -.method `:h`boolean public $chunked;`  
 Если true, то в заголовках был получен `Transfer-Encoding: chunked`

 -.method `:h`integer public $protocolError;`  
 Если не `null`, то произошла серьезная ошибка при обработке ответа на запрос. Содержит номер строки в файле [Connection.php](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php), по которому можно определить характер ошибки

 -.method `:h`integer public $responseCode;`  
 Код ответа. См. [Список кодов состояния HTTP](http://ru.wikipedia.org/wiki/Список_кодов_состояния_HTTP)

 -.method `:h`string public $lastURL;`  
 Последний запрошенный url

 -.method `:h`string public $rawHeaders;`  
 Заголовки ответа в сыром виде

##### clients/http/connection/methods # Методы

 -.method ```php.inline
 string public Connection::getBody ( void )
 ```
   -.n Возвращает тело ответа

 -.method ```php.inline
 string public Connection::getHeaders ( void )
 ```
   -.n Возвращает массив заголовков ответа

 -.method ```php.inline
 string public Connection::getHeader ( string $name )
 ```
   -.n Возвращает заголовок ответа по имени или `null`
   -.n.ti `:h.clear`$name` &mdash; имя заголовка
