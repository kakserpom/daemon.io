### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

@TODO описалово

#### methods # Методы

 -.method ```php.inline
 string public ShmEntity::__construct ( string $path, integer $segsize, string $name, boolean $create = false )
 ```
   -.n Конструктор
   -.n.ti `:hc`$path` &mdash; путь до файла
   -.n `:hc`$segsize` &mdash; размер сегмента
   -.n `:hc`$name` &mdash; название
   -.n `:hc`$create` &mdash; флаг создания сегмента

 -.method ```php.inline
 string public ShmEntity::open ( integer $segno = 0, boolean $create = false )
 ```
   -.n Открывает сегмент разделяемой памяти
   -.n.ti `:hc`$segno` &mdash; номер сегмента
   -.n `:hc`$create` &mdash; флаг создания сегмента

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
   -.n.ti `:hc`$data` &mdash; данные
   -.n `:hc`$offset` &mdash; смещение

 -.method ```php.inline
 string public ShmEntity::read ( integer $offset, integer $length = 1 )
 ```
   -.n Считывает данные длиной `:hc`$length` со смещением `:hc`$offset`
   -.n.ti `:hc`$offset` &mdash; смещение
   -.n `:hc`$length` &mdash; длина читаемых данных

 -.method ```php.inline
 string public ShmEntity::delete ( )
 ```
   -.n Удаляет все сегменты
