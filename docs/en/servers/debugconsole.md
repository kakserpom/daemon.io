### debugconsole # DebugConsole #> DebugConsole {tpl-git PHPDaemon/Servers/DebugConsole}

Это транспортное приложение предоставляет интерактивную отладочную консоль для phpDaemon.

```
# telnet 127.0.0.1 8818
Trying 127.0.0.1...
Connected to 127.0.0.1.
Escape character is '^]'.
Welcome! DebugConsole for phpDaemon.

login secret
OK.
eval echo 123;
123
```

#### options # Опции

 - `listen (string = 'tcp://127.0.0.1')`  
 Какие адреса слушать, через запятую

 - `port (integer = 8818)`  
 Прослушиваемый порт

 - `passphrase (string = 'secret')`  
 Пароль для аутентификации