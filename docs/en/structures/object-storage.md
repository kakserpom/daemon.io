### object-storage # ObjectStorage #> ObjectStorage {tpl-git PHPDaemon/Structures/ObjectStorage.php}

```php:p
namespace PHPDaemon\Structures;
class ObjectStorage extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php);
```

Данный класс предоставляет хранилище объектов с несколькими дополнительными методами

> Можно создавать классы-наследники

#### methods # Методы

<md:method>
integer public each ( string $method, mixed ...$args )

Проходит по всем объектам, вызывая у каждого из них метод `:hc`$method` c заданными аргументами `:hc`$args` и возвращает количество объектов в хранилище

$method
вызываемый метод объекта

...$args
аргументы
</md:method>

<md:method>
void public removeAll ( object $obj = null )

Удаляет из текущего контейнера все объекты, которых нет в контейнере `:hc`$obj`

$obj
контейнер, содержащий элементы, которые должны остаться в текущем контейнере
</md:method>

<md:method>
object public detachFirst ( )

Возвращает первый объект, удалив его из контейнера
</md:method>

<md:method>
object public getFirst ( )

Возвращает первый объект контейнера
</md:method>