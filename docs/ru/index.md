<!-- pvar lang ru -->
<!-- pvar title Документация &laquo; phpDaemon -->

<!-- pvar menu-install Установка -->
<!-- pvar menu-examples Примеры -->
<!-- pvar menu-docs Документация -->
<!-- pvar menu-tracker Задачи/ошибки -->
<!-- pvar menu-team Команда -->
<!-- pvar menu-contribute Участие -->
<!-- pvar menu-publications Публикации -->

<!-- pvar tpl-git <a target="_blank" href="https://github.com/kakserpom/phpdaemon/tree/master/%s">%s<i class="fa fa-github"></i></a> -->
<!-- pvar tpl-outlink <a target="_blank" href="%s">%s<i class="fa fa-external-link"></i></a> -->
<!-- pvar tpl-inlink <a target="_self" href="#%s">%s<i class="fa fa-caret-square-o-up"></i></a> -->

## intro # Введение

PHPDaemon &mdash; Это асинхронный модульный демон-фреймворк, который берёт на&#160;себя обработку I/O (libevent) и&#160;другие низкоуровневые задачи, присущие сетевым демонам.
С&#160;его помощью легко писать правильные и&#160;очень быстрые сетевые приложения.
Из&#160;коробки идут сервера FastCGI, HTTP, CGI, FlashPolicy, Telnet, WebSocket, клиенты mysql, memcached, mongodb и&#160;многое другое.
Работать с&#160;сетью действительно просто. Программист средней руки может написать, к&#160;примеру, IRC-бота за&#160;считанные часы.

Официальный сайт [daemon.io](http://daemon.io/).  
GitHub репозиторий [github.com/kakserpom/phpdaemon](https://github.com/kakserpom/phpdaemon/).  
Обсудить проект можно&#160;в [Google Groups](http://groups.google.com/group/phpdaemon).  
[Багтрекер](https://github.com/kakserpom/phpdaemon/issues).

<!-- import root/basics.md -->

<!-- import install/index.md -->

<!-- import root/control.md -->

<!-- import root/examples.md -->

<!-- import root/app_resolver.md -->

<!-- import config/index.md -->

<!-- import development/index.md -->

<!-- import servers/index.md -->

<!-- import clients/index.md -->

<!-- import libraries/index.md -->

<!-- import utils/index.md -->

<!-- import structures/index.md -->

<!-- import traits/index.md -->

<!-- import network/index.md -->

<!-- import httprequest/index.md -->

<!-- import root/faq.md -->

## publications # Публикации

 - [phpDaemon и runkit: новый уровень](http://habrahabr.ru/blogs/php/104811) (23 сентября 2010)
 - [True FastCGI для PHP: миграция и тесты](http://javascript.ru/blog/Ilya-Kantor/True-FastCGI-dlya-PHP-migraciya-testy) (7 сентября 2010)
 - [WebSocket: будущее уже здесь!](http://habrahabr.ru/blogs/webdev/94921) (8 июня 2010)
 - [phpDaemon: хорошие новости](http://habrahabr.ru/blogs/php/91014) (24 мая 2010)
 - [phpDaemon: фреймворк асинхронных приложений](http://habrahabr.ru/blogs/php/79377) (11 января 2010)

## contribute # Внести свою лепту

Если хотите помочь, то даже если располагаете ограниченным временем, не стесняйтесь! Проекту пригодится любая помощь. Даже написав абзац текста, потратив десять минут, вы уже сделаете большое дело.

### contribute/this-doc # Эта документация

Мы очень хотим свести количество недокументированного кода к минимуму, но нам не хватает рук.

> Старайтесь вносить изменения в на том языке, которым владеете лучше всего.

> Если набрались смелости добавить новый язык, возьмите за основу наиболее близкий из присутствующих.

Чтобы внести изменения в эту документацию, необходимо:

 1. Сделать Fork репозитория [kakserpom/daemon.io](https://github.com/kakserpom/daemon.io)
 2. Внести изменения в Markdown (.md) файлы в папке docs/<язык>/
 3. Скомпилировать index.html — ./docs/build
 4. Посмотреть как выглядят внесенные изменения.
 5. Послать Pull Request.

#### contribute/this-doc/markdown # Формат документации
Мы используем [Markdown](http://ru.wikipedia.org/wiki/Markdown) ([о синтаксисе по-русски](http://rukeba.com/by-the-way/markdown-sintaksis-po-russki/)) с некоторыми дополнениями.

### contribute/php-doc # PHPDoc

Аналогично, чтобы восполнить пробелы в phpdoc-комментариях в коде, сделайте Fork [основного репозитория](https://github.com/kakserpom/phpdaemon), внесите изменения и пошлите Pull Request.

### contribute/code # Программный код

Улучшения программного кода всегда приветствуется. Если у вас есть модуль для публикации, и вы считаете, что он заслуживает включения в основной репозиторий, пришлите Pull Request. Аналогично поступайте с улучшениями существующего кода.

## doc-authors # Авторы документации

### doc-writers # Писатели

 - Dmitry Efimenko <[ezheg89@gmail.com](mailto:ezheg89@gmail.com)>
 - Vasily Zorin <[maintainer@daemon.io](mailto:maintainer@daemon.io)>

### doc-translators # Переводчики

...
