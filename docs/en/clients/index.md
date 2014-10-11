## clients # Клиенты

В основе всех клиентов лежит пространство имен [Network](#network), изучение которого даст большее представление о возможностях клиентов и сетевой работы демона в целом.

### basics # Основы

#### options # Опции клиентов

 - `server (string)`
 Адрес сервера. Записывается специальным форматом, описанном в разделе [Опция server](#clients/basics/option-server)

 - `servers (array)`
 Адреса серверов, записанные в формате опции `server`, разделенные символом запятая `,`.
 При подключении клиента будет использоваться рандомно выбранный сервер.
 Учтите, данная опция будет игнорироваться если установлена опция `server`.

 - `maxconnperserv`
 - `protologging`

<!-- import asterisk.md -->

<!-- import dns.md -->

<!-- import gibson.md -->

<!-- import http.md -->

<!-- import icmp.md -->

<!-- import irc.md -->

<!-- import lock.md -->

<!-- import memcache.md -->

<!-- import mongo.md -->

<!-- import mysql.md -->

<!-- import postgresql.md -->

<!-- import redis.md -->

<!-- import valve.md -->

<!-- import websocket.md -->

<!-- import xmpp.md -->