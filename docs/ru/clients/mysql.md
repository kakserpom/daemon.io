### mysql # MySQL #> MySQL {tpl-git PHPDaemon/Clients/MySQL}

```php
namespace PHPDaemon\Clients\MySQL;
```

Клиент для СУБД {tpl-outlink http://mysql.com/ MySQL}

#### use # Использование

@TODO переписать из [вики](https://github.com/kakserpom/phpdaemon/wiki/MySQLClient-%28приложение%29)

#### examples # Примеры

@TODO

#### pool # Класс Pool {tpl-git PHPDaemon/Clients/MySQL/Pool.php}

```php
namespace PHPDaemon\Clients\MySQL;
class Pool extends \PHPDaemon\Network\Client;
```

##### options # Опции по-умолчанию

 - `server (string = 'tcp://root@127.0.0.1/')`
 - `port (integer = 3306)`
 - `max-conn-per-serv (integer = 32)`

##### methods # Методы

 -.method ```php.inline
 boolean public static getConnection ( callable $cb )
 boolean public static getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )
 ```
   -.n Выполняет callback-функцию когда будет установлена связь с сервером. Возвращает `false` если соединение невозможно установить
   -.n.ti `:hc`$cb` — `:phc`callback ( [Connection](#../../connection) $conn )` — вызывается когда будет установлена связь с сервером
   -.n `:hc`$url` — адрес сервера
   -.n `:hc`$pri` — приоритет данного вызова среди других. Чем больше значение, тем выше приоритет

 -.method ```php.inline
 string public static escape ( string $string )
 ```
   -.n Экранирует специальные символы: `\0`, `\n`, `\r`, `\`, `'`, `"`
   -.n.ti `:hc`$string` — исходная строка
     
 -.method ```php.inline
 string public static likeEscape ( string $string )
 ```
   -.n Работает как метод `:hc`Pool::escape` с дополнительными символами: `%` и `_`
   -.n.ti `:hc`$string` — исходная строка

 -.method ```php.inline
 string public static value ( mixed $mixed )
 ```
   -.n Преобразует строку или число `:hc`$mixed` для использоания в SQL-выражении и возвращает значение в одинарных кавычках `'`. Для всех остальных типов возвращает `'null'`
   -.n.ti `:hc`$mixed` — конвертируемые данные

 -.method ```php.inline
 string public static values ( mixed $arr )
 ```
   -.n Преобразует массив `:hc`$arr` для использоания в SQL-выражении и возвращает список значений, разделенные запятой `,`. Для всех остальных типов возвращает пустую строку
   -.n.ti `:hc`$mixed` — конвертируемые данные

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/MySQL/Connection.php}

```php
namespace PHPDaemon\Clients\MySQL;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Свойства

 -.method `:h`string public $serverver;`  
 @TODO

 -.method `:h`string public $serverCaps;`  
 @TODO

 -.method `:h`string public $serverLang;`  
 @TODO

 -.method `:h`string public $serverStatus;`  
 @TODO

 -.method `:h`integer public $warnCount;`  
 @TODO

 -.method `:h`string public $message;`  
 @TODO Flags of this MySQL client

 -.method `:h`string public $dbname;`  
 Текущая база данных

 -.method `:h`array public $resultRows;`  
 Массив результата SQL-запроса в виде ассоциативных массивов

 -.method `:h`array public $resultFields;`  
 Массив колонок таблицы в виде ассоциативных массивов

 -.method `:h`string public $context;`  
 Контекст для выполняемых SQL-запросов

 -.method `:h`integer public $insertId;`  
 Идентификатор, сгенерированный при последнем INSERT-запросе

 -.method `:h`integer public $affectedRows;`  
 Число затронутых SQL-запросом строк

 -.method `:h`integer public $protover;`  
 @TODO

 -.method `:h`integer public $timeout;`  
 @TODO

 -.method `:h`integer public $errno;`  
 Численный код ошибки выполнения SQL-запроса

 -.method `:h`string public $errmsg;`  
 Текст ошибки выполнения SQL-запроса

##### methods # Методы

 -.method ```php.inline
 void public onConnected ( callable $callback )
 ```
   -.n Выполняет callback-функцию когда будет установлена связь с сервером
   -.n.ti `:hc`$callback` — `:phc`callback ( [Connection](#../) $conn, boolean $success )` — вызывается когда установлена связь с сервером, либо произошла ошибка

 -.method ```php.inline
 boolean public query ( string $query, callable $callback = NULL )
 ```
   -.n Осуществляет SQL-запрос к серверу
   -.n.ti `:hc`$query` — SQL-запрос
   -.n `:hc`$callback` — `:phc`callback ( [Connection](#../) $conn, boolean $success )` — вызывается когда получен результат SQL-запроса, либо произошла ошибка

 -.method ```php.inline
 boolean public ping ( callable $callback = NULL )
 ```
   -.n Проверяет работает ли соединение с сервером. Если оно утеряно, автоматически предпринимается попытка пересоединения
   -.n.ti `:hc`$callback` — `:phc`callback ( [Connection](#../) $conn, boolean $success )` — вызывается когда получен результат, либо произошла ошибка

 -.method ```php.inline
 boolean public selectDB ( string $name )
 ```
   -.n Выбирает базу данных MySQL
   -.n.ti `:hc`$name` — имя выбираемой базы данных
