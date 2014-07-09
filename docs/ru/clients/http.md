### clients/http # HTTP #> [Клиенты](#clients) \ HTTP

`:h`namespace PHPDaemon\Clients\HTTP`

Клиент HTTP предназначен для выполнения GET и POST запросов на удаленные хосты.

#### Примеры

Рабочий пример представлен в [Examples\ExampleHTTPClient.php](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Examples/ExampleHTTPClient.php).

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

#### clients/http/pool # Класс Pool

##### clients/http/pool/options # Опции по-умолчанию

 - `port (int = 80)`
 - `ssl-port (int = 443)`
 - `expose (boolean = true)`

##### clients/http/pool/methods # Методы

 -.n.nm `:h`public void Pool::get ( string|array $url, callable|array $params )`  
 &nbsp;&nbsp;&nbsp;&nbsp;Осуществляет GET запрос.

   -.n <span class="hljs-variable">$url</span> &mdash; строка c полным url или массив параметров
   -.n <span class="hljs-variable">$params</span> &mdash; callback функция или массив @TODO
   -.n.ti callback ( [Connection](#clients/http/connection) <span class="hljs-variable">$conn</span>, boolean <span class="hljs-variable">$success</span> )

 -.n.nm `:h`public void Pool::post ( string|array $url, array $data = [], callable|array $params )`  
 Осуществляет POST запрос.

   -.n `$url` – строка c полным url или массив параметров.
   -.n `$data` - массив данных.
   -.n `$params` - callback функция или массив @TODO.
   -.n.ti callback function ( <span class="hljs-class"><span class="hljs-title">[Connection](#clients/http/connection)</span></span> <span class="hljs-variable">$conn</span>, <span class="hljs-keyword">boolean</span> <span class="hljs-variable">$success</span> ).
   -.n.ti return `void`;

 -.n.nm `:h`public static string Pool::buildUrl ( string|array $mixed )`  
 Преобразует массив `$mixed` в ссылку. @TODO lol

   -.n `$mixed` - массив параметров url.
   -.n.ti return `string`;

 -.n.nm `:h`public static string Pool::prepareUrl ( string|array $mixed )`  
 Преобразует массив `$mixed` в нормализованный массив. @TODO дабл lol

   -.n `$mixed` - массив параметров url.
   -.n.ti return `array`;

#### clients/http/connection # Класс Connection

##### clients/http/connection/vars # Свойства

 -.n.nm `:h`public $headers;`  
 Заголовки ответа.

 -.n.nm `:h`public $contentLength;`  
 Длина ответа.

 -.n.nm `:h`public $body;`  
 Тело ответа.

 -.n.nm `:h`public $cookie;`  
 Coockies ответа.

 -.n.nm `:h`public $chunked;`  
 Если true, то в заголовках был получен `Transfer-Encoding: chunked`.

 -.n.nm `:h`public $protocolError;`  
 Если не `null`, то произошла серьезная ошибка при обработке ответа на запрос. Содержит номер строки в файле [Connection.php](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Clients/HTTP/Connection.php), по которому можно определить характер ошибки.

 -.n.nm `:h`public $responseCode;`  
 Код ответа.

 -.n.nm `:h`public $lastURL;`  
 Последний запрошенный url.

 -.n.nm `:h`public $rawHeaders;`  
 Заголовки ответа в сыром виде.

##### clients/http/connection/methods # Методы

 -.n.nm `:h`public string Connection::getBody ( void )`  
 Возвращает тело ответа.

   -.n.ti return `string`;

 -.n.nm `:h`public array Connection::getHeaders ( void )`  
 Возвращает массив заголовков ответа.

   -.n.ti return `array`;

 -.n.nm `:h`public string Connection::getHeader ( string $name )`  
 Возвращает заголовок ответа по имени.

   -.n `$name` - имя заголовка.
   -.n.ti return `string` или `null` если нет заголовка с таким именем.