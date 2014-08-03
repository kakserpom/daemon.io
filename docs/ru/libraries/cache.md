### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

`:h`namespace PHPDaemon\Cache`

Механизм локального LRU-кеша ключ-значение.

> Используется для кеширования замыканий созданных через create_function. Также используется в {tpl-inlink #clients/dns Clients\DNS}

#### capped-storage # Класс CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

`:h`abstact class PHPDaemon\Cache\CappedStorage`

Базовый абстрактный класс.

##### vars # Свойства

 -.method `:h`callable public $sorter;`  
 Метод сортировки

 -.method `:h`integer public $maxCacheSize;`  
 Максимальное количество элементов в кеше

 -.method `:h`integer public $capWindow;`  
Количество элементов, которые пропускаются в кеш сверх максимального количества, для уменьшения количества сортировок

 -.method `:h`array public $cache;`  
 Ассоциативный массив хранимых элементов

##### methods # Методы

 -.method ```php.inline
 string public CappedStorage::hash ( string $key )
 ```
   -.n Возвращает хеш ключа, который идентифицирует элемент хранилища, по-умолчанию используется crc32().
   -.n.ti `:hc`$key` — ключ элемента

 -.method ```php:p.inline
 [Item](#../../item) public CappedStorage::put ( string $key, mixed $value, float $ttl = null )
 ```
   -.n Добавляет элемент в кеш {tpl-inlink #../../item Item} с значением `:hc`$value`
   -.n.ti `:hc`$key` — ключ элемента
   -.n `:hc`$value` — значение
   -.n `:hc`$ttl` — время жизни в секундах

 -.method ```php.inline
 void public CappedStorage::invalidate ( string $key )
 ```
   -.n Удаляет элемент кеша
   -.n.ti `:hc`$key` — ключ

 -.method ```php:p.inline
 [Item](#../../item) public CappedStorage::get ( string $key )
 ```
   -.n Возвращает элемент хранилища {tpl-inlink #../../item Item}
   -.n.ti `:hc`$key` — ключ

 -.method ```php.inline
 mixed public CappedStorage::getValue ( string $key )
 ```
   -.n Возвращает значение элемента хранилища
   -.n.ti `:hc`$key` — ключ элемента

#### item # Класс Item {tpl-git PHPDaemon/Cache/Item.php}

`:h`class PHPDaemon\Cache\Item`

##### vars # Свойства

 -.method `:h`integer public $hits;`  
 Количество обращений к значению элемента

 -.method `:h`integer public $expire;`  
 Временная метка до которой элемент действителен

##### methods # Методы

 -.method ```php.inline
 integer public Item::getHits ( )
 ```
   -.n Возвращает количество обращений к значению элемента

 -.method ```php.inline
 mixed public Item::getValue ( )
 ```
   -.n Возвращает значение элемента

 -.method ```php.inline
 void public Item::addListener ( callable $cb )
 ```
   -.n Переданная функция обратного вызова будет вызвана когда будет установлено значение элемента
   -.n.ti `:hc`$cb` — функция обратного вызова

 -.method ```php.inline
 void public Item::setValue ( mixed $value )
 ```
   -.n Устанавливает значение элемента
   -.n.ti `:hc`$value` — значение

#### capped-storage-hits # Класс CappedStorageHits {tpl-git PHPDaemon/Cache/CappedStorageHits.php}

`:h`class CappedStorageHits extends CappedStorage`

Реализация {tpl-inlink #../capped-storage CappedStorage} с сортировкой по количеству обращений

