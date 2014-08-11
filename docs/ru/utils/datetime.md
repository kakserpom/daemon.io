### datetime # DateTime #> DateTime {tpl-git PHPDaemon/Utils/DateTime.php}

```php:p
namespace PHPDaemon\Utils;
class DateTime extends \[DateTime](http://php.net/manual/class.datetime.php);
```

В конструтор можно передавать метку времени Unix.

#### methods # Методы

 -.method ```php.inline
 string public static diffAsText ( mixed $datetime1, mixed $datetime2, boolean $absolute = false )
 ```
   -.n Возвращает разницу двух временных меток в виде строки. Пример: `:c`1 year. 2 mon. 6 day. 4 hours. 21 min. 10 sec.`
   -.n.ti `:hc`$datetime1` и `:hc`$datetime2` — временные метки. Может быть объектом {tpl-outlink http://php.net/manual/class.datetimeinterface.php DateTimeInterface}, строкой или меткой времени Unix
   -.n `:hc`$absolute` — используется, чтобы вернуть абсолютную разницу

 -.method &nbsp;