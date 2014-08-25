### datetime # DateTime #> DateTime {tpl-git PHPDaemon/Utils/DateTime.php}

```php:p
namespace PHPDaemon\Utils;
class DateTime extends \[DateTime](http://php.net/manual/class.datetime.php);
```

В конструтор можно передавать метку времени Unix.

#### methods # Методы

<md:method>
string public static diffAsText ( mixed $datetime1, mixed $datetime2, boolean $absolute = false )

Возвращает разницу двух временных меток в виде строки. Пример: `:c`1 year. 2 mon. 6 day. 4 hours. 21 min. 10 sec.`

$datetime1, $datetime2
временные метки. Может быть объектом {tpl-outlink http://php.net/manual/class.datetimeinterface.php DateTimeInterface}, строкой или меткой времени Unix

$absolute
используется, чтобы вернуть абсолютную разницу
</md:method>

<md:method>
</md:method>