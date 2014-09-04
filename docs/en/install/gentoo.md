### gentoo # Gentoo

You may install PHPDaemon with [layman overlay](https://github.com/lexa-uw/layman-phpdaemon).

Add this reference into the overlays section in layman.cfg file: 
`https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml`

It should like that:

    overlays  : http://www.gentoo.org/proj/en/overlays/repositories.xml
                https://github.com/lexa-uw/layman-phpdaemon/blob/master/layman.xml

Execute the following commands:  
$&nbsp;`sudo layman -L`  
$&nbsp;`sudo layman -a phpdaemon`  
$&nbsp;`sudo emerge www-servers/phpdaemon`

For example, below command install phpdaemon by version 0.4.1, 1.0_beta2 and weekly release.

    $ sudo emerge "=www-servers/phpdaemon-0.4.1" "=www-servers/phpdaemon-1.0_beta2" "www-servers/phpdaemon"
    These are the packages that would be merged, in order:
    
    Calculating dependencies... done!
    [ebuild   R   ~] www-servers/phpdaemon-0.4.1:0.4::phpdaemon  USE="libevent -examples -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-1.0_beta2:1.0::phpdaemon  USE="eio event -runkit" 0 kB
    [ebuild   R   ~] www-servers/phpdaemon-20130907:weekly::phpdaemon  USE="eio event -runkit" 0 kB
    ...

After installation you can use "eselect phpdaemon set" tool for set up symlink for /usr/bin/phpd

    $ sudo eselect phpdaemon list
    Available phpdaemon targets:
      [1]   phpd0.4
      [2]   phpd1.0
      [3]   phpdweekly
    $ sudo eselect phpdaemon set 3
    $ sudo eselect phpdaemon show
    Current phpdaemon:
      weekly

Add phpdaemon to autoload:

    $ rc-update add phpd default
     * service phpd added to runlevel default

Add sepatare init.d scripts for different versions:

    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-0.4
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-1.0
    $ ln -s /etc/init.d/phpd /etc/init.d/phpd-weekly

And add phpd-1.0 to autoload:

    $ rc-update add phpd-1.0 default
     * service phpd added to runlevel default