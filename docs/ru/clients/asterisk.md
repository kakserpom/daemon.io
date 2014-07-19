### asterisk # Asterisk #> [Клиенты](#clients) \ Asterisk {tpl-git PHPDaemon/Clients/Asterisk}

`:h`namespace PHPDaemon\Clients\Asterisk`

{tpl-outlink http://www.asterisk.org/ Asterisk} - это АТС с открытым исходным кодом.
AMI - программный интерфейс (API) Asterisk для управления системой, который позволяет разработчикам отправлять команды на сервер, считывать результаты их выполнения, а так же получать уведомления о происходящих событиях в реальном времени.
Клиент Asterisk обеспечивает высокоуровневый интерфейс к AMI, позволяющий разработчикам контролировать сервер Asterisk из приложений.

В основе документирования клиента лежит материал книги {tpl-outlink http://asterisk.ru/store/files/Asterisk_RU_OReilly_DRAFT.pdf Asterisk: будущее телефонии}.

Хотя протокол AMI является строковым, драйвер при вводе-выводе работает с ассоциативными массивами. При получении ответа на действие или события все заголовки и их значения приводятся к нижнему регистру, если значение не содержит информацию, для которой важен регистр - например имя пира.

Для отправки команды и получения ответа вы можете воспользоваться либо методом-помощником, который снабжен подробным комментарием из документации Asterisk, либо универсальным методом Connection::action.

В любом случае для каждой команды вы определяете функцию обратного вызова, в которую будет передан объект сессии соединения и ассоциативный массив пар заголовок-значение ответа.

Клиент корректно обрабатывает, что порядок следования пакетов ответа не определен, корректно собирает составные пакеты ответа.

#### use # Использование

@TODO

#### examples # Примеры

@TODO

#### pool # Класс Pool {tpl-git PHPDaemon/Clients/Asterisk/Pool.php}

##### options # Опции по-умолчанию

 - `authtype (string = 'md5')`
 - `port (integer = 5280)`

##### methods # Методы

 -.method ```php.inline
 boolean public static Pool::getConnection ( callable $cb )
 boolean public static Pool::getConnection ( string $url = null, callable $cb = null, integer $pri = 0 )
 ```
   -.n Выполняет callback-функцию когда будет установлена связь с сервером. Возвращает `false` если соединение невозможно установить
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет установлена связь с сервером
   -.n `:hc`$url` &mdash; адрес сервера
   -.n `:hc`$pri` &mdash; приоритет данного вызова среди других. Чем больше значение, тем выше приоритет

 -.n &nbsp;

#### connection # Класс Connection {tpl-git PHPDaemon/Clients/Asterisk/Connection.php}

##### methods # Методы

 -.method ```php.inline
 void public Connection::getSipPeers ( callable $cb )
 ```
   -.n Выводит список сконфигурированных в данный момент равноправных участников SIP с указанием их статуса
   -.n Привилегии: system, all
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getIaxPeers ( callable $cb )
 ```
   -.n Выводит список всех равноправных участников IAX2 с указанием их текущего статуса
   -.n Привилегии: none
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getConfig ( string $filename, callable $cb )
 ```
   -.n Извлекает данные из конфигурационного файла Asterisk
   -.n Привилегии: config, all
   -.n.ti `:hc`$filename` &mdash; имя конфигурационного файла, из которого должны извлекаться данные
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::getConfigJSON ( string $filename, callable $cb )
 ```
   -.n Возвращает данные из конфигурационного файла Asterisk в JSON формате
   -.n Привилегии: config, all
   -.n.ti `:hc`$filename` &mdash; имя конфигурационного файла, из которого должны извлекаться данные
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::setVar ( string $channel, string $variable, string $value, callable $cb )
 ```
   -.n Задает значение глобальной переменной или переменной канала
   -.n Привилегии: call, all
   -.n.ti `:hc`$channel` &mdash; канал, для переменной которого задается значение. Если не указан, переменная будет задана как глобальная
   -.n `:hc`$variable` &mdash; имя переменной
   -.n `:hc`$value` &mdash; значение
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::coreShowChannels ( callable $cb )
 ```
   -.n Отображает все активные каналы
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::status ( callable $cb, string $channel = null )
 ```
   -.n Представляет статус одного или более каналов с подробной информацией об их текущем состоянии
   -.n Привилегии: call, all
   -.n.ti `:hc`$channel` &mdash; ограничивает вывод статусом заданного канала
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::redirect ( array $params, callable $cb )
 ```
   -.n Перенаправляет канал в новый контекст, добавочный номер и приоритет диалплана
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::originate ( array $params, callable $cb )
 ```
   -.n Формирует исходящий вызов из Asterisk и соединяет канал с контекстом/добавочным номером/приоритетом или приложением диалплана
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::extensionState ( array $params, callable $cb )
 ```
   -.n Сообщает о состоянии заданного добавочного номера. Если добавочный номер имеет подсказку, эта команда обеспечит передачу состояния устройства, соединенного с данным добавочным номером
   -.n Привилегии: call, all
   -.n.ti `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::ping ( callable $cb )
 ```
   -.n Посылает запрос на сервер Asterisk, чтобы убедиться, что он до сих пор отвечает. Asterisk ответит сообщением Pong. Эта команда также может использоваться, чтобы не допустить разрыва соединения в результате истечения времени ожидания
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат

 -.method ```php.inline
 void public Connection::action ( string $action, callable $cb, array $params = null, array $assertion = null )
 ```
   -.n Отправляет на сервер произвольную команду
   -.n.ti `:hc`$action` &mdash; команда
   -.n `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат
   -.n `:hc`$params` &mdash; ассоциативный массив параметров команды
   -.n `:hc`$assertion` &mdash; @TODO If more events may follow as response this is a main part or full an action complete event indicating that all data has been sent

 -.method ```php.inline
 void public Connection::logoff ( callable $cb = null )
 ```
   -.n Завершает сеанс
   -.n.ti `:hc`$cb` &mdash; `:phc`callback ( [Connection](#clients/asterisk/connection) $conn, array $packet )` &mdash; вызывается когда будет получен результат
