### variables # Глобальные опции

Два способа установки опций:

 1. Конфигурационный файл `./conf/phpd.conf`;
 2. Параметры командной строки, например `--max-workers=1`.

> Параметры командной строки имеют больший приоритет.

#### file # Конфигурационный файл

Формат записи опции `название-опции [значение];`

Название опции не чувствительно к регистру и использованию знака дефиса&nbsp;`-`.
Следующие варианты написания равнозначны:

 - `add-include-path`;
 - `addincludepath`;
 - `addIncludePath`;
 - `ADDInclude-path`.

Значение может отсутствовать, что приравнивется к `bool(true)`, либо может быть записано следующими способами:

 - `null`;
 - булевым выражением `false` или `true`;
 - целым числом;
 - числом с плавающей точкой;
 - строкой; если в строке присутствует символ пробела&nbsp;` `&nbsp;или запятая&nbsp;`,`, то строку необходимо обернуть одинарными или двойными кавычками;
 - массивом.

Для записи массива используется разделитель пробел&nbsp;` `&nbsp;или запятая&nbsp;`,`. В одном значении можно использовать оба разделителя одновременно.

| Пример опции | Вывод var_dump |
|--|--|
| var-name; | bool(true) |
| var-name null; | NULL |
| var-name true; | bool(true) |
| var-name false; | bool(false) |
| var-name 0; | int(0) |
| var-name 1; | int(1) |
| var-name 3.14; | float(3.14) |
| var-name "3.14"; | string(4) "3.14" |
| var-name "пример. длинной строки,второй пример"; | string(67) "пример. длинной строки,второй пример" |
| var-name пример. длинной строки,второй пример; | array(5) {<br>&nbsp;&nbsp;&nbsp;&nbsp;[0]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(13) "пример."<br>&nbsp;&nbsp;&nbsp;&nbsp;[1]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(14) "длинной"<br>&nbsp;&nbsp;&nbsp;&nbsp;[2]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(12) "строки"<br>&nbsp;&nbsp;&nbsp;&nbsp;[3]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(12) "второй"<br>&nbsp;&nbsp;&nbsp;&nbsp;[4]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(12) "пример"<br>} |
| var-name 1, 'a' null 3.14 'пару слов'; | array(5) {<br>&nbsp;&nbsp;&nbsp;&nbsp;[0]=><br>&nbsp;&nbsp;&nbsp;&nbsp;int(1)<br>&nbsp;&nbsp;&nbsp;&nbsp;[1]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(1) "a"<br>&nbsp;&nbsp;&nbsp;&nbsp;[2]=><br>&nbsp;&nbsp;&nbsp;&nbsp;NULL<br>&nbsp;&nbsp;&nbsp;&nbsp;[3]=><br>&nbsp;&nbsp;&nbsp;&nbsp;float(3.14)<br>&nbsp;&nbsp;&nbsp;&nbsp;[4]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(17) "пару слов"<br>} |

Ниже будут перечислены глобальные опции демона в формате:  
`название-опции (тип-данных = значение-по-умолчанию);`
 
#### graceful_restart # Плавный перезапуск рабочих процессов
 
 - `:p`max-requests ([Number](#config/types/number) = '10k')`  
 Максимальное количество запросов перед перезапуском рабочего процесса.
 `0` – неограничено.
 
 - `:p`max-memory-usage ([Size](#config/types/size) = '0b')`  
 Максимальный допустимый порог потребления памяти рабочим процессом.
 `0` – неограничено.
 
 - `:p`max-idle ([Time](#config/types/time) = '0s')`  
 Максимальное время простоя рабочего процесса перед перезапуском.
 `0` – неограничено.

 - `:p`auto-reload ([Time](#config/types/time) = '0s')`  
 Задает интервал проверки всех подключенных файлов. При изменении файлов плавно перезагружает рабочие процессы.

 - `auto-reimport (boolean = false)`  
 На лету импортирует методы и функции из измененных файлов с помощью runkit, без перезагрузки рабочего процесса.
 
#### pathes # Основные пути

 - `pid-file (string = '/var/run/phpd.pid')`  
 Путь к pid-файлу. Убедитесь что имеется доступ на запись.

 - `config-file (string = '/etc/phpdaemon/phpd.conf;/etc/phpd/phpd.conf;./conf/phpd.conf')`  
 Путь к файлу конфигурации. Можно указать несколько через разделитель `;` (точка с запятой).  
 Будет загружен только первый найденный конфигурационный файл.

 - `path (string = '/etc/phpdaemon/AppResolver.php;./conf/AppResolver.php')`  
 Путь к Application Resolver. Можно указать несколько через разделитель `;` (точка с запятой).  
 Будет загружен только первый найденный файл.

 - `add-include-path (string = null)`  
 Дополнительные пути для директивы [include_path](http://www.php.net/manual/ru/ini.core.php#ini.include-path).  
 Можно указать несколько через разделитель `:` (двоеточие).

#### master # Связанные с мастер-процессом

 - `:p`mpm-delay ([Time](#config/types/time) = '0.1s')`  
 Интервал между срабатываниями Мульти-Процессного Менеджера.  
 МПМ отвечает за запуск/выключение рабочих процессов, согласно настройкам.

 - `:p`start-workers ([Number](#config/types/number) = 4)`  
 Кол-во рабочих процессов при запуске демона.

 - `:p`min-workers ([Number](#config/types/number) = 4)`  
 Минимальное допустимое кол-во рабочих процессов.

 - `:p`max-workers ([Number](#config/types/number) = 8)`  
 Максимальное допустимое кол-во рабочих процессов.

 - `:p`min-spare-workers ([Number](#config/types/number) = 2)`  
 Минимальное количество простаивающих рабочих процессов: phpDaemon запустит дополнительный рабочие процессы когда нагрузка увеличится, чтобы простаивающих рабочих процессов было достаточно. Сверху ограничивается параметром max-workers.

 - `:p`max-spare-workers ([Number](#config/types/number) = 0)`  
 Максимальное кол-во простаивающих рабочих процессов. phpDaemon выключит дополнительные рабочие процессы когда нагрузка спадёт.

 - `:p`master-priorty ([Number](#config/types/number) = 100)`  
 Приоритет мастер-процесса. Чем меньше значение, тем выше приоритет.

 - `:p`ipc-thread-priority ([Number](#config/types/number) = 100)`  
 Приоритет IPC процесса. Чем меньше значение, тем выше приоритет.

 - `:p`worker-priority ([Number](#config/types/number) = 4)`  
 Приоритет рабочего процесса. Чем меньше значение, тем выше приоритет.

 - `throw-exception-on-shutdown (boolean = false)`  
 Выбрасывать исключение `Exception('event shutdown')` по завершению процесса.

#### requests # Запросы

 - `locale (string = '')`  
 Устанавливает настройки локали. Можно указать несколько через разделитель `,` (запятая).

 - `ob-filter-auto (boolean = true)`  
 Включить стандартный `ob_` фильтр.

#### workers # Рабочие процессы

 - `chroot (string = '/')`  
 Смена системного корня для рабочих процессов.

 - `cwd (string = '.')`  
 Задание рабочей директории для рабочих процессов.

 - `user (string = null)`  
 Пользователь для рабочих процессов. Используйте безопасного пользователя, не используйте root, если не знаете что делаете.

 - `group (string = null)`  
 Группа для рабочих процессов. Используйте безопасную группу, не используйте root, если не знаете что делаете.

 - `:p`auto-gc ([Number](#config/types/number) = '1k')`  
 Включает сборщик мусора вызываемый каждые n запросов. `0` – выключает совсем.

#### logging # Журналирование и отладка

 - `logging (boolean = true)`  
 Включает журналирование.

 - `log-storage (string = '/var/log/phpdaemon.log')`  
 Путь к файлу журнала.

 - `log-errors (boolean = true)`  
 Включает журналирование локальных ошибок таких как Undefined route in WebSocketServer, и т.д.

 - `log-worker-set-state (boolean = false)`  
 Включает журналирование смены состояния рабочего процесса.

 - `log-events (boolean = false)`  
 Включает журналирование сетевых событий.

 - `log-signals (boolean = false)`  
 Включает журналирование системных сигналов.

 - `verbose-tty (boolean = false)`  
 Если параметр включен, журнал будет выводиться в терминал (STDOUT).

 > Учтите, что в обычном варианте запуска (не runworker) ввод из терминала игнорируется, хотя после запуска с этим параметром может показаться, что программа привязана к терминалу.

 - `restrict-error-control (boolean = false)`  
 Выключает оператор управления ошибками `@`.

#### eio # Подсистема ввода-вывода POSIX

 - `eio-enabled (boolean = true)`  
 Включает поддержку EIO.

 - `:p`eio-set-max-idle ([Time](#config/types/time) = null)`  
 Устанавливает максимальное количество ожидающих потоков.

 - `:p`eio-set-min-parallel ([Number](#config/types/number) = null)`  
 Устанавливает минимальное количество параллельных потоков.

 - `:p`eio-set-max-parallel ([Number](#config/types/number) = null)`  
 Устанавливает максимальное количество параллельных потоков.

 - `:p`eio-set-max-poll-reqs ([Number](#config/types/number) = null)`  
 Устанавливает максимальное количество обрабатываемых запросов.

 - `:p`eio-set-max-poll-time ([Time](#config/types/time) = null)`  
 Устанавливает максимальное время выполнения.