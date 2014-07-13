### clients/mysql # MySQL #> [Клиенты](#clients) \ MySQL {tpl-git PHPDaemon/Clients/MySQL}

`:h`namespace PHPDaemon\Clients\MySQL`

Клиент для СУБД [MySQL](http://mysql.com/).

#### Использование

@TODO переписать из [вики](https://github.com/kakserpom/phpdaemon/wiki/MySQLClient-%28приложение%29)

#### Примеры

@TODO

#### clients/mysql/pool # Класс Pool {tpl-git PHPDaemon/Clients/HTTP/Pool.php}

##### clients/mysql/pool/options # Опции по-умолчанию

 - `server (string = 'tcp://root@127.0.0.1/')`
 - `port (integer = 3306)`
 - `max-conn-per-serv (integer = 32)`

##### clients/http/pool/methods # Методы

 -.method ```php.inline
 string public static Pool::escape ( string $string )
 ```
   -.n Преобразует специальные символы
   -.n.ti `:hc`$string` &mdash; конвертируемая строка
   -.n.ti Производятся следующие преобразования:
     - `"\x00"` => `'\0'`,
     - `"\n"` => `'\n'`,
     - `"\r"` => `'\r'`,
     - `'\\'` => `'\\\\'`,
     - `'\''` => `'\\\''`,
     - `'"'` => `'\\"'`

 -.method ```php.inline
 string public static Pool::likeEscape ( string $string )
 ```
   -.n Преобразует специальные символы как метод `:hc`Pool::escape` с дополнительными правилами:
     - `'%'` => `'\%'`,
     - `'_'` => `'\_'`
   -.n.ti `:hc`$string` &mdash; конвертируемая строка

 -.method ```php.inline
 string public static Pool::value ( mixed $mixed )
 ```
   -.n Преобразует строку или число `:hc`$mixed` для использоания в SQL выражении и возвращает значение в одинарных кавычках `'`. Для всех остальных типов возвращает строку `'null'`
   -.n.ti `:hc`$mixed` &mdash; конвертируемые данные

 -.method ```php.inline
 string public static Pool::values ( mixed $arr )
 ```
   -.n Преобразует массив `:hc`$arr` для использоания в SQL выражении и возвращает список значений, разделенные запятой `,`. Для всех остальных типов возвращает пустую строку `''`
   -.n.ti `:hc`$mixed` &mdash; конвертируемые данные

#### clients/mysql/connection # Класс Connection {tpl-git PHPDaemon/Clients/MySQL/Connection.php}

##### clients/mysql/connection/vars # Свойства

 -.method `:h`string public $serverver;`  
 @TODO

 -.method `:h`string public $serverCaps;`  
 @TODO

 -.method `:h`string public $serverLang;`  
 @TODO

 -.method `:h`string public $serverStatus;`  
 @TODO

 -.method `:h`int public $warnCount;`  
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

 -.method `:h`int public $insertId;`  
 Идентификатор, сгенерированный при последнем INSERT-запросе

 -.method `:h`int public $affectedRows;`  
 Число затронутых SQL-запросом строк

 -.method `:h`int public $protover;`  
 @TODO

 -.method `:h`int public $timeout;`  
 @TODO

 -.method `:h`int public $errno;`  
 Численный код ошибки выполнения SQL-запроса

 -.method `:h`string public $errmsg;`  
 Текст ошибки выполнения SQL-запроса

##### clients/mysql/connection/methods # Методы

 -.method ```php.inline
 boolean public Connection::query ( string $query, callable $callback = NULL )
 ```
   -.n Осуществляет SQL-запрос к серверу
   -.n.ti `:hc`$query` &mdash; SQL-запрос
   -.n `:hc`$callback` &mdash; `:ph.clear`callback ( [Connection](#clients/mysql/connection) $conn, boolean $success )` &mdash; вызывается когда получен результат SQL-запроса, либо произошла ошибка

 -.method ```php.inline
 boolean public Connection::ping ( callable $callback = NULL )
 ```
   -.n Проверяет работает ли соединение с сервером. Если оно утеряно, автоматически предпринимается попытка пересоединения
   -.n.ti `:hc`$callback` &mdash; `:ph.clear`callback ( [Connection](#clients/mysql/connection) $conn, boolean $success )` &mdash; Вызывается когда получен результат, либо произошла ошибка

 -.method ```php.inline
 boolean public Connection::selectDB ( string $name )
 ```
   -.n Выбирает базу данных MySQL
   -.n.ti `:hc`$name` &mdash; имя выбираемой базы данных