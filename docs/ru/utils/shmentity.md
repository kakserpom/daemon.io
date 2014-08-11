### shmentity # ShmEntity #> ShmEntity {tpl-git PHPDaemon/Utils/ShmEntity.php}

```php
namespace PHPDaemon\Utils;
class ShmEntity;
```

Эластичное хранилище кучи в разделяемой памяти

> Используется для хранения массива состояний рабочих процессов

#### methods # Методы

<md:method>
string public __construct ( string $path, integer $segsize, string $name, boolean $create = false )

Конструктор

$path
путь до файла

$segsize
размер сегмента

$name
название

$create
флаг создания сегмента
</md:method>

<md:method>
string public open ( integer $segno = 0, boolean $create = false )

Открывает сегмент разделяемой памяти

$segno
номер сегмента

$create
флаг создания сегмента
</md:method>

<md:method>
string public getSegments ( )

Возвращает индексный массив всех сегментов
</md:method>

<md:method>
string public openall ( )

Открывает все сегменты
</md:method>

<md:method>
string public write ( string $data, integer $offset )

Записывает данные `:hc`$data` со смещением `:hc`$offset`

$data
данные

$offset
смещение
</md:method>

<md:method>
string public read ( integer $offset, integer $length = 1 )

Считывает данные длиной `:hc`$length` со смещением `:hc`$offset`

$offset
смещение

$length
длина читаемых данных
</md:method>

<md:method>
string public delete ( )

Удаляет все сегменты
</md:method>