### objectstorage # ObjectStorage #> ObjectStorage {tpl-git PHPDaemon/Structures/ObjectStorage.php}

Данный класс наследуется от {tpl-outlink http://php.net/manual/ru/class.splobjectstorage.php SplObjectStorage} и предоставляет контейнер объектов с несколькими дополнительными методами

#### methods # Методы

 -.method ```php.inline
 integer public ObjectStorage::each ( string $method, mixed $args, ... )
 ```
   -.n Проходит по всем объектам, вызывая у каждого из них метод `:phc`$method` c заданными аргументами `:phc`$args` и возвращает количество объектов в контейнере
   -.n.ti `:hc`$method` &mdash; вызываемый метод объекта
   -.n `:hc`$args` &mdash; аргументы

 -.method ```php.inline
 void public ObjectStorage::removeAll ( object $obj = null )
 ```
   -.n Удаляет из текущего контейнера все объекты, которых нет в контейнере `:phc`$obj`
   -.n.ti `:hc`$obj` &mdash; контейнер, содержащий элементы, которые должны остаться в текущем контейнере

 -.method ```php.inline
 object public ObjectStorage::detachFirst ( )
 ```
   -.n Возвращает первый объект, удалив его из контейнера

 -.method ```php.inline
 object public ObjectStorage::getFirst ( )
 ```
   -.n Возвращает первый объект контейнера