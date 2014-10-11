### flashpolicy # FlashPolicy #> FlashPolicy {tpl-git PHPDaemon/Servers/FlashPolicy}

Это простое приложение предоставляет Flashpolicy сервер для phpDaemon.

Это приложение необходимо включить в случае если вы хотите присоединяться к серверу посредством Flash.

#### options # Опции

 - `listen (string = '0.0.0.0')`  
 Какие адреса слушать, через запятую

 - `port (integer = 843)`  
 Прослушиваемый порт

 - `file (string = getcwd() . '/conf/crossdomain.xml')`  
 Файл Flash-политики