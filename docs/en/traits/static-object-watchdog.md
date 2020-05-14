### static-object-watchdog # StaticObjectWatchdog #> StaticObjectWatchdog {tpl-git PHPDaemon/Traits/StaticObjectWatchdog.php}

```php
namespace PHPDaemon\Traits;
trait StaticObjectWatchdog;
```

> This trait is already used in all base classes and there is no need to reuse it when inheriting from them.

A PHP machine can store a set of object properties in two ways: as a fixed array and as an associative hash table using the [B-tree] (http://ru.wikipedia.org/wiki/B-дерево). Initially, when creating any object, properties are stored in the form of an array with quick access. At the first attempt to set the value of a property not declared by the directive `<i>visibility</i> $<i>name</i>`, the set of properties is converted to an associative table. The same happens when you delete ([unset](http://php.net/unset)) any property). This operation in itself is not the fastest, especially with a large number of properties), but access to properties after it slows down. Of course, there are objects with intentionally dynamic set of properties, which are akin to associative arrays and they are all right. But it often happens that the programmer forgets to add a property declaration or even misprints its name. Sometimes it leads to severe performance degradation which is difficult to investigate.

> Before saying that PHP is slow, it's a good idea to learn how to cook it.

This trait defines the following magic methods:

-.n.ti `__set` — writes to the journal with the `[CODE WARN]` prefix when trying to write the value of a property that does not exist or is inaccessible from this visibility area.
-.n.ti `__unset` — writes to the journal with the `[CODE WARN]` prefix when trying to delete the property.
