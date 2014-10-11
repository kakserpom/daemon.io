## app_resolver # Маршрутизация

Получая запросы демон первым делом должен определить какому приложению он&#160;должен передать обработку.
Для этого служит метод `getRequestRoute` в&#160;классе [AppResolver](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/AppResolver.php#L159).

Вы&#160;можете определить свой обработчик, пример которого лежит в `./conf/AppResolver.php` [https://github.com/kakserpom/phpdaemon/blob/master/conf/AppResolver.php].

Метод `getRequestRoute` принимает два параметра:

 - `$req` &#8212; объект `stdClass`, с&#160;параметрами запроса;
 - `$upstream` &#8212; объект сервера, принимающий входящие запросы, например `PHPDaemon\Servers\HTTP\Connection`.

Результатом работы может быть:

 - Имя приложения;
 - `null` для попытки передать запрос приложению по-умолчанию;
 - `false` для завершения обработки запроса.

Не&#160;забудьте указать&#160;в [конфиге](#osnovnyie-puti) путь до&#160;вашего AppResolver, например `path './conf/AppResolver.php';`.

В&#160;настройках [сервера](#serveryi), принимающего запросы, с&#160;помощью опции `responder` можно указать имя приложения по-умолчанию, которому будет передан запрос, если `getRequestRoute` вернул `null`.