### gentoo # Gentoo

Вы можете установить PHPDaemon с помощью [layman overlay](https://github.com/lexa-uw/layman-phpdaemon).

Добавьте ссылку в секцию overlays в файле layman.cfg:  
`https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml`

В итоге будет выглядеть примерно так:

    overlays  : http://www.gentoo.org/proj/en/overlays/repositories.xml
                https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml

Выполняем команды  
```bash
sudo layman -L
sudo layman -a phpdaemon
sudo emerge www-servers/phpdaemon
```

К примеру, нижеследующие команды устанавливают phpdaemon версии 0.4.1, 1.0_beta2 и еженедельный релиз.

    $ sudo emerge "=www-servers/phpdaemon-0.4.1" "=www-servers/phpdaemon-1.0_beta2" "www-servers/phpdaemon"
    Это пакеты, которые будут объединены по порядку:
    
    Расчёт зависимостей... готово!
    [ebuild   R   ~] www-servers/phpdaemon-0.4.1:0.4::phpdaemon  USE="libevent -examples -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-1.0_beta2:1.0::phpdaemon  USE="eio event -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-20130907:weekly::phpdaemon  USE="eio event -runkit" 0 kB
    ...

После установки вы можете использовать "eselect phpdaemon set"  для создания символической ссылки на /usr/bin/phpd

    $ sudo eselect phpdaemon list
    Available phpdaemon targets:
      [1]   phpd0.4
      [2]   phpd1.0
      [3]   phpdweekly
    $ sudo eselect phpdaemon set 3
    $ sudo eselect phpdaemon show
    Current phpdaemon:
      weekly

Добавить phpdaemon в автозагрузку:

    $ rc-update add phpd default
     * service phpd added to runlevel default

Добавить отдельные init.d скрипты для разных версий:

    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-0.4
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-1.0
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-weekly

Добавить phpd-1.0 в автозагрузку:

    $ rc-update add phpd-1.0 default
     * service phpd added to runlevel default
