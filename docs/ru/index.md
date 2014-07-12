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
<!-- pvar tpl-link <a target="_blank" href="%s">%s<i class="fa fa-external-link"></i></a> -->
<!-- pvar tpl-inlink <a href="#%s">%s<i class="fa fa-caret-square-o-up"></i></a> -->

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

<!-- import root/faq.md -->

## publications # Публикации

 - <a target="_blank" href="http://habrahabr.ru/blogs/php/104811">phpDaemon и runkit: новый уровень</a> (23 сентября 2010)
 - <a target="_blank" href="http://javascript.ru/blog/Ilya-Kantor/True-FastCGI-dlya-PHP-migraciya-testy">True FastCGI для PHP: миграция и тесты</a> (7 сентября 2010)
 - <a target="_blank" href="http://habrahabr.ru/blogs/webdev/94921">WebSocket: будущее уже здесь!</a> (8 июня 2010)
 - <a target="_blank" href="http://habrahabr.ru/blogs/php/91014">phpDaemon: хорошие новости</a> (24 мая 2010)
 - <a target="_blank" href="http://habrahabr.ru/blogs/php/79377">phpDaemon: фреймворк асинхронных приложений</a> (11 января 2010)

## contribute # Внести вклад


### contribute/this-doc # Эта документация

Мы очень хотим свести количество недокументированного кода к минимуму, но нам не хватает рук.
Если хотите помочь, то даже если располагаете ограниченным временем, не стесняйтесь! Проекту пригодится любая помощь.

Чтобы внести изменения в эту документацию, необходимо:

 1. Сделать Fork репозитория kakserpom/daemon.io.
 2. Внести изменения в Markdown (.md) файлы в папке docs/<язык>/
 3. Скомпилировать index.html — ./docs/git-hook-post-merge
 4. Посмотреть как выглядят внесенные изменения.
 5. Послать Pull Request.


### contribute/php-doc # PHPDoc

Аналогично, чтобы восполнить пробелы в phpdoc-комментариях в коде, сделайте Fork основного репозитория, внесите изменения и пошлите Pull Request.

### contribute/code # Программный код

Улучшения программного кода всегда приветствуется. Если у вас есть модуль для публикации, и вы считаете, что он заслуживает включения в основной репозиторий, пришлите Pull Request.

























## docauthors # Авторы документации

 - Dmitry Efimenko <<mailto:ezheg89@gmail.com>>
 - Vasily Zorin <<mailto:maintainer@daemon.io>>

## translators # Переводчики