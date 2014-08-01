### cache # Cache #> Cache {tpl-git PHPDaemon/Cache}

`:h`namespace PHPDaemon\Cache`

@TODO desc

#### capped-storage # Класс CappedStorage {tpl-git PHPDaemon/Cache/CappedStorage.php}

##### methods # Методы

 -.method ```php.inline
 string public CappedStorage::hash ( string $key )
 ```
   -.n Возвращает хеш ключа, который идентифицирует элемент хранилища
   -.n.ti `:hc`$key` — ключ элемента

 -.method ```php:p.inline
 [Item](#../../item) public CappedStorage::put ( string $key, mixed $value, float $ttl = null )
 ```
   -.n Создает элемент {tpl-inlink #../../item Item} с значением `:hc`$value`, добавляет элемент в конец хранилища и производит пересортироку. Если элемент с таким ключом уже существует, то будет обновлено его значение
   -.n.ti `:hc`$key` — ключ элемента
   -.n `:hc`$value` — значение добавляемого элемент
   -.n `:hc`$ttl` — позволяет задать время жизни элемента в секундах

 -.method ```php.inline
 void public CappedStorage::invalidate ( string $key )
 ```
   -.n Удаляет элемент хранилища
   -.n.ti `:hc`$key` — ключ элемента

 -.method ```php:p.inline
 [Item](#../../item) public CappedStorage::get ( string $key )
 ```
   -.n Возвращает элемент хранилища {tpl-inlink #../../item Item}
   -.n.ti `:hc`$key` — ключ элемента

 -.method ```php.inline
 mixed public CappedStorage::getValue ( string $key )
 ```
   -.n Возвращает значение элемента хранилища
   -.n.ti `:hc`$key` — ключ элемента

#### item # Класс Item {tpl-git PHPDaemon/Cache/Item.php}