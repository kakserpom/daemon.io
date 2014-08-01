### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

Эластичное хранилище кучи в разделяемой памяти

> Используется для хранения массива состояний рабочих процессов

#### methods # Методы

 -.method ```php.inline
 string public ShmEntity::__construct ( string $path, integer $segsize, string $name, boolean $create = false )
 ```
   -.n Конструктор
   -.n.ti `:hc`$path` — путь до файла
   -.n `:hc`$segsize` — размер сегмента
   -.n `:hc`$name` — название
   -.n `:hc`$create` — флаг создания сегмента

 -.method ```php.inline
 string public ShmEntity::open ( integer $segno = 0, boolean $create = false )
 ```
   -.n Открывает сегмент разделяемой памяти
   -.n.ti `:hc`$segno` — номер сегмента
   -.n `:hc`$create` — флаг создания сегмента

 -.method ```php.inline
 string public ShmEntity::getSegments ( )
 ```
   -.n Возвращает индексный массив всех сегментов

 -.method ```php.inline
 string public ShmEntity::openall ( )
 ```
   -.n Открывает все сегменты

 -.method ```php.inline
 string public ShmEntity::write ( string $data, integer $offset )
 ```
   -.n Записывает данные `:hc`$data` со смещением `:hc`$offset`
   -.n.ti `:hc`$data` — данные
   -.n `:hc`$offset` — смещение

 -.method ```php.inline
 string public ShmEntity::read ( integer $offset, integer $length = 1 )
 ```
   -.n Считывает данные длиной `:hc`$length` со смещением `:hc`$offset`
   -.n.ti `:hc`$offset` — смещение
   -.n `:hc`$length` — длина читаемых данных

 -.method ```php.inline
 string public ShmEntity::delete ( )
 ```
   -.n Удаляет все сегменты
