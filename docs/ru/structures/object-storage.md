### object-storage # ObjectStorage #> ObjectStorage {tpl-git PHPDaemon/Structures/ObjectStorage.php}

`:hp`class PHPDaemon\Structures\ObjectStorage extends \[SplObjectStorage](http://php.net/manual/class.splobjectstorage.php)`

Данный класс предоставляет хранилище объектов с несколькими дополнительными методами

> Можно создавать классы-наследники

#### methods # Методы

 -.method ```php.inline
 integer public each ( string $method, mixed $arg, ... )
 ```
   -.n Проходит по всем объектам, вызывая у каждого из них метод `:hc`$method` c заданными аргументами `:hc`$args` и возвращает количество объектов в хранилище
   -.n.ti `:hc`$method` — вызываемый метод объекта
   -.n `:hc`$arg`, ... — аргументы

 -.method ```php.inline
 void public removeAll ( object $obj = null )
 ```
   -.n Удаляет из текущего контейнера все объекты, которых нет в контейнере `:hc`$obj`
   -.n.ti `:hc`$obj` — контейнер, содержащий элементы, которые должны остаться в текущем контейнере

 -.method ```php.inline
 object public detachFirst ( )
 ```
   -.n Возвращает первый объект, удалив его из контейнера

 -.method ```php.inline
 object public getFirst ( )
 ```
   -.n Возвращает первый объект контейнера