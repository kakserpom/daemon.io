### websocket # WebSocket #> WebSocket {tpl-git PHPDaemon/Servers/WebSocket}

Сервер использует пространство имен [HTTPRequest](#httprequest).

Это транспортное приложение представляет WebSocket сервер для phpDaemon.

Ваше приложение должно получать ссылку на экземпляр WebSocketServer и вызывать addRoute() для добавления своих путей. Callback-функция пути должна возвращать новый экземпляр вашего класса, который наследуется от WebSocketRoute и определяет метод onFrame. Внутри метода onFrame мы можете обращаться к $this->client->sendFrame() для отправки пакетов клиенту.

#### options # Опции

 - `listen (string = '0.0.0.0')`
 Какие адреса слушать, через запятую

 - `port (integer = 8047)`
 Прослушиваемый порт

 - `:p`max-allowed-packet ([Size](#config/types/size) = new \PHPDaemon\Config\Entry\Size('1M'))`
 Максимальный размер пакета
 
 - `expose (boolean = true)`
 Включать версию PHPDaemon в заголовке `X-Powered-By`

 - `fps-name (string = '')`
 Имя пула FlashPolicy-сервера, куда адресовать FlashPolicy-соединения
