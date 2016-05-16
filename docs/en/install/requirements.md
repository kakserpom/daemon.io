### requirements # Requirements

 - `PHP` version not under 5.6;
 - Modules `posix`, `pcntl`, `socket`, `shmop`;
 - `libevent 2`;
 - `pecl-event` not under 1.6.1;

It's recommended to install these non-mandatory modules:

 - `pecl-eio` for non-blocking filesystem I/O;
 - `pecl-inotify` for monitoring of changes in filesystem.