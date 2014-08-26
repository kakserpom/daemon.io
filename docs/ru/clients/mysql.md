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

<md:method>
boolean public static getConnection ( callable $cb )
boolean public static getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )

Выполняет callback-функцию когда будет установлена связь с сервером. Возвращает `false` если соединение невозможно установить

$cb
callback ( [Connection](#../../connection) $conn )
вызывается когда будет установлена связь с сервером

$url
адрес сервера

$pri
приоритет данного вызова среди других. Чем больше значение, тем выше приоритет
</md:method>

<md:method>
string public static escape ( string $string )

Экранирует специальные символы: `\0`, `\n`, `\r`, `\`, `'`, `"`

$string
исходная строка
</md:method>

<md:method>
string public static likeEscape ( string $string )

Работает как метод `:hc`Pool::escape` с дополнительными символами: `%` и `_`

$string
исходная строка
</md:method>

<md:method>
string public static value ( mixed $mixed )

Преобразует строку или число `:hc`$mixed` для использоания в SQL-выражении и возвращает значение в одинарных кавычках `'`. Для всех остальных типов возвращает `'null'`

$mixed
конвертируемые данные
</md:method>

<md:method>
string public static values ( mixed $arr )

Преобразует массив `:hc`$arr` для использоания в SQL-выражении и возвращает список значений, разделенные запятой `,`. Для всех остальных типов возвращает пустую строку

$mixed
конвертируемые данные
</md:method>

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/MySQL/Connection.php}

```php
namespace PHPDaemon\Clients\MySQL;
class Connection extends \PHPDaemon\Network\ClientConnection;
```

##### properties # Свойства

<md:prop>
string public $serverver;
@TODO
</md:prop>

<md:prop>
string public $serverCaps;
@TODO
</md:prop>

<md:prop>
string public $serverLang;
@TODO
</md:prop>

<md:prop>
string public $serverStatus;
@TODO
</md:prop>

<md:prop>
integer public $warnCount;
@TODO
</md:prop>

<md:prop>
string public $message;
@TODO Flags of this MySQL client
</md:prop>

<md:prop>
string public $dbname;
Текущая база данных
</md:prop>

<md:prop>
array public $resultRows;
Массив результата SQL-запроса в виде ассоциативных массивов
</md:prop>

<md:prop>
array public $resultFields;
Массив колонок таблицы в виде ассоциативных массивов
</md:prop>

<md:prop>
string public $context;
Контекст для выполняемых SQL-запросов
</md:prop>

<md:prop>
integer public $insertId;
Идентификатор, сгенерированный при последнем INSERT-запросе
</md:prop>

<md:prop>
integer public $affectedRows;
Число затронутых SQL-запросом строк
</md:prop>

<md:prop>
integer public $protover;
@TODO
</md:prop>

<md:prop>
integer public $timeout;
@TODO
</md:prop>

<md:prop>
integer public $errno;
Численный код ошибки выполнения SQL-запроса
</md:prop>

<md:prop>
string public $errmsg;
Текст ошибки выполнения SQL-запроса
</md:prop>

##### methods # Методы

<md:method>
void public onConnected ( callable $callback )

Выполняет callback-функцию когда будет установлена связь с сервером

$callback
callback ( [Connection](#../) $conn, boolean $success )
вызывается когда установлена связь с сервером, либо произошла ошибка
</md:method>

<md:method>
boolean public query ( string $query, callable $callback = NULL )

Осуществляет SQL-запрос к серверу

$query
SQL-запрос

$callback
callback ( [Connection](#../) $conn, boolean $success )
вызывается когда получен результат SQL-запроса, либо произошла ошибка
</md:method>

<md:method>
boolean public ping ( callable $callback = NULL )

Проверяет работает ли соединение с сервером. Если оно утеряно, автоматически предпринимается попытка пересоединения

$callback
callback ( [Connection](#../) $conn, boolean $success )
вызывается когда получен результат, либо произошла ошибка
</md:method>

<md:method>
boolean public selectDB ( string $name )

Выбирает базу данных MySQL

$name
имя выбираемой базы данных
</md:method>