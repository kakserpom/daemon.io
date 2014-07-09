### clients/http # HTTP #> [Клиенты](#clients) \ HTTP

`namespace PHPDaemon\Clients\HTTP`

Клиент HTTP предназначен для выполнения GET и POST запросов на удаленные хосты.

#### Примеры

@TODO

```php
$httpclient = \PHPDaemon\Clients\HTTP\Pool::getInstance();

$httpclient->get(['http://www.google.com/robots.txt'],
	function ($conn, $success) {
		if ($success) {
			echo $conn->body;
		}
		$this->finish();
	}
);
```

#### clients/http/pool # Pool

##### clients/http/pool/options # Опции по-умолчанию

 - `port (int = 80)`
 - `ssl-port (int = 443)`
 - `expose (boolean = true)`

##### clients/http/pool/methods # Методы

 - `:h`public void Pool::get ( string|array $url, callable|array $params )`  
 Осуществляет GET запрос.

   -.n param `$url` – строка c полным url или массив параметров.
   -.n param `$params` - callback функция или массив @TODO.
   -.n.ti callback function(`:e`[Connection](#clients/http/connection)` $conn, boolean $success).
   -.n.ti return `void`;

 - `:h`public void Pool::post ( string|array $url, array $data = [], callable|array $params )`  
 Осуществляет POST запрос.

   -.n param `$url` – строка c полным url или массив параметров.
   -.n param `$data` - массив данных.
   -.n param `$params` - callback функция или массив @TODO.
   -.n.ti callback function(`:e`[Connection](#clients/http/connection)` $conn, boolean $success).
   -.n.ti return `void`;

 - `:h`public static string Pool::buildUrl ( string|array $mixed )`  
 Преобразует массив `$mixed` в ссылку. @TODO lol

   -.n param `$mixed` - массив параметров url.
   -.n.ti return `string`;

 - `:h`public static string Pool::prepareUrl ( string|array $mixed )`  
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
 Если true, то в заголовках был получен `Transfer-Encoding: chunked`.

 - `public $protocolError;`  
 Номер строки на которой произошла ошибка.

 - `public $responseCode;`  
 Код ответа.

 - `public $lastURL;`  
 Последний запрошенный url.

 - `public $rawHeaders;`  
 Заголовки ответа в сыром виде.

##### clients/http/connection/methods # Методы

 - `public string Connection::getBody ( void )`  
 Возвращает тело ответа.

   -.n.ti return `string`;

 - `public array Connection::getHeaders ( void )`  
 Возвращает массив заголовков ответа.

   -.n.ti return `array`;

 - `public string Connection::getHeader ( string $name )`  
 Возвращает заголовок ответа по имени.

   -.n param `$name` - имя заголовка.
   -.n.ti return `string` или `null` если нет заголовка с таким именем.