### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

```php
namespace PHPDaemon\Cache;
```

Механизм локального LRU-кеша ключ-значение.

> Используется для кеширования замыканий созданных через create_function. Также используется в {tpl-inlink #clients/dns Clients\DNS}

#### capped-storage # Класс CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

```php
namespace PHPDaemon\Cache;
abstact class CappedStorage;
```

Базовый абстрактный класс.

##### properties # Свойства

<md:prop>
callable public $sorter;
Метод сортировки
</md:prop>

<md:prop>
integer public $maxCacheSize;
Максимальное количество элементов в кеше
</md:prop>

<md:prop>
integer public $capWindow;
Количество элементов, которые пропускаются в кеш сверх максимального количества, для уменьшения количества сортировок
</md:prop>

<md:prop>
array public $cache;
Ассоциативный массив хранимых элементов
</md:prop>

##### methods # Методы

<md:method>
string public hash ( string $key )

Возвращает хеш ключа, который идентифицирует элемент хранилища, по-умолчанию используется crc32()

$key
ключ элемента
</md:method>

<md:method>
[Item](#../../item) public put ( string $key, mixed $value, float $ttl = null )

Добавляет элемент в кеш {tpl-inlink #../../item Item} с значением `:hc`$value`

$key
ключ элемента

$value
значение

$ttl
время жизни в секундах
</md:method>

<md:method>
void public invalidate ( string $key )

Удаляет элемент кеша

$key
ключ
</md:method>

<md:method>
[Item](#../../item) public get ( string $key )

Возвращает элемент хранилища {tpl-inlink #../../item Item}

$key
ключ
</md:method>

<md:method>
mixed public getValue ( string $key )

Возвращает значение элемента хранилища

$key
ключ элемента
</md:method>

#### item # Класс Item {tpl-git PHPDaemon/Cache/Item.php}

```php
namespace PHPDaemon\Cache;
class Item;
```

##### properties # Свойства

<md:prop>
integer public $hits;
Количество обращений к значению элемента
</md:prop>

<md:prop>
integer public $expire;
Временная метка до которой элемент действителен
</md:prop>

##### methods # Методы

<md:method>
integer public getHits ( )

Возвращает количество обращений к значению элемента
</md:method>

<md:method>
mixed public getValue ( )

Возвращает значение элемента
</md:method>

<md:method>
void public addListener ( callable $cb )

Переданная функция обратного вызова будет вызвана когда будет установлено значение элемента

$cb
функция обратного вызова
</md:method>

<md:method>
void public setValue ( mixed $value )

Устанавливает значение элемента

$value
значение
</md:method>

#### capped-storage-hits # Класс CappedStorageHits {tpl-git PHPDaemon/Cache/CappedStorageHits.php}

```php
namespace PHPDaemon\Cache;
class CappedStorageHits extends CappedStorage;
```

Реализация {tpl-inlink #../capped-storage CappedStorage} с сортировкой по количеству обращений

