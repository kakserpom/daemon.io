### requirements # Requirements

 - `PHP` version not under 5.4;
 - Modules `posix`, `pcntl`, `socket`, `shmop`;
 - `libevent 2`;
 - `pecl-event` not under 1.6.1;

It's recommended to install these non-mandatory modules:

 - `pecl-eio` for non-blocking filesystem I/O;
 - `pecl-proctitle` for human-readable process titles: &#171;phpd: worker process&#187; (for PHP version under 5.5);
 - `pecl-inotify` for monitoring of changes in filesystem.