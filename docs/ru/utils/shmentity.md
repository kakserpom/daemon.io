### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

```php
namespace PHPDaemon\Utils;
class ShmEntity;
```

Эластичное хранилище кучи в разделяемой памяти

> Используется для хранения массива состояний рабочих процессов

#### methods # Методы

 -.method ```php.inline
 string public __construct ( string $path, integer $segsize, string $name, boolean $create = false )
 ```
   -.n Конструктор
   -.n.ti `:hc`$path` — путь до файла
   -.n `:hc`$segsize` — размер сегмента
   -.n `:hc`$name` — название
   -.n `:hc`$create` — флаг создания сегмента

 -.method ```php.inline
 string public open ( integer $segno = 0, boolean $create = false )
 ```
   -.n Открывает сегмент разделяемой памяти
   -.n.ti `:hc`$segno` — номер сегмента
   -.n `:hc`$create` — флаг создания сегмента

 -.method ```php.inline
 string public getSegments ( )
 ```
   -.n Возвращает индексный массив всех сегментов

 -.method ```php.inline
 string public openall ( )
 ```
   -.n Открывает все сегменты

 -.method ```php.inline
 string public write ( string $data, integer $offset )
 ```
   -.n Записывает данные `:hc`$data` со смещением `:hc`$offset`
   -.n.ti `:hc`$data` — данные
   -.n `:hc`$offset` — смещение

 -.method ```php.inline
 string public read ( integer $offset, integer $length = 1 )
 ```
   -.n Считывает данные длиной `:hc`$length` со смещением `:hc`$offset`
   -.n.ti `:hc`$offset` — смещение
   -.n `:hc`$length` — длина читаемых данных

 -.method ```php.inline
 string public delete ( )
 ```
   -.n Удаляет все сегменты
