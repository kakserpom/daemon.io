### variables # Global Options

There are two ways to set options:

 1. Configuration file `./conf/phpd.conf`;
 2. Command line parameters, e.g. `--max-workers=1`.

> The command line parameters have higher priority.

#### file # Configuration file

Options are specified in the following format:
`option-name;` or `option-name value;`

`option-name` is case insensitive, hyphens `"-"` are ignored.
Thus, the following spellings are equivalent:

 - `add-include-path`;
 - `addincludepath`;
 - `addIncludePath`;
 - `ADDInclude-path`.

The value may not exist at all, which equals to `bool(true)`, or may be written in the following ways:

 - `null`;
 - a boolean expression `false` or `true`;
 - a whole number;
 - a floating point number;
 - a string; if the string contains a space character `" "` or a comma `","` then the string must be wrapped in single or double quotes.;
 - an array.

To write an array, the space `" "` or comma `","` separator is used. You can use both separators within the same value.

| Example option | var_dump output |
|--|--|
| var-name; | bool(true) |
| var-name null; | NULL |
| var-name true; | bool(true) |
| var-name false; | bool(false) |
| var-name 0; | int(0) |
| var-name 1; | int(1) |
| var-name 3.14; | float(3.14) |
| var-name "3.14"; | string(4) "3.14" |
| var-name "example. long line, second example"; | string(34) "example. long line, second example" |
| var-name example. long line, second example; | array(5) {<br>&nbsp;&nbsp;&nbsp;&nbsp;[0]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(8) "example."<br>&nbsp;&nbsp;&nbsp;&nbsp;[1]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(4) "long"<br>&nbsp;&nbsp;&nbsp;&nbsp;[2]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(4) "line"<br>&nbsp;&nbsp;&nbsp;&nbsp;[3]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(6) "second"<br>&nbsp;&nbsp;&nbsp;&nbsp;[4]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(7) "example"<br>} |
| var-name 1, 'a' null 3.14 'a word or two'; | array(5) {<br>&nbsp;&nbsp;&nbsp;&nbsp;[0]=><br>&nbsp;&nbsp;&nbsp;&nbsp;int(1)<br>&nbsp;&nbsp;&nbsp;&nbsp;[1]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(1) "a"<br>&nbsp;&nbsp;&nbsp;&nbsp;[2]=><br>&nbsp;&nbsp;&nbsp;&nbsp;NULL<br>&nbsp;&nbsp;&nbsp;&nbsp;[3]=><br>&nbsp;&nbsp;&nbsp;&nbsp;float(3.14)<br>&nbsp;&nbsp;&nbsp;&nbsp;[4]=><br>&nbsp;&nbsp;&nbsp;&nbsp;string(13) "a word or two"<br>} |

The available global options for the daemon are listed below in the following format:
`option-name (data-type = default-value);`

#### graceful_restart # Graceful restart of worker processes

 - `:p`max-requests ([Number](#config/types/number) = '10k')`
 Maximum number of requests before restarting the worker.
 `0` – unlimited

 - `:p`max-memory-usage ([Size](#config/types/size) = '0b')`
 Maximum allowed memory consumption threshold for the worker.
 `0` – unlimited

 - `:p`max-idle ([Time](#config/types/time) = '0s')`
 Maximum process time running in idle before restarting.
 `0` – unlimited

 - `:p`auto-reload ([Time](#config/types/time) = '0s')`
Sets the check interval for all loaded files. Gracefully reboots worker if any files are changed.

 - `auto-reimport (boolean = false)`
Imports methods and functions on-the-fly from modified files using runkit, without rebooting the worker.

#### pathes # Main paths

 - `pid-file (string = '/var/run/phpd.pid')`
 The path to the pid file. Make sure you have write access.

 - `config-file (string = '/etc/phpdaemon/phpd.conf;/etc/phpd/phpd.conf;./conf/phpd.conf')`
The path to the configuration file. You can specify several through the separator `"; `. Only the first found configuration file will be loaded.

 - `path (string = '/etc/phpdaemon/AppResolver.php;./conf/AppResolver.php')`
 Path to the Application Resolver. You can specify several via the separator `"; `. Only the first found file will be loaded.

 - `add-include-path (string = null)`
 Additional paths for the php.ini option [include_path](http://www.php.net/manual/ru/ini.core.php#ini.include-path).
 You can specify multiple paths by using the colon `":"` separator.

#### master # Related to the master process

 - `:p`mpm-delay ([Time](#config/types/time) = '0.1s')`
 Multi-Process Manager interval.
 The MPM is responsible for starting/shutting down worker processes according to the settings.

 - `:p`start-workers ([Number](#config/types/number) = 4)`
 The number of initial workers when you start the daemon.

 - `:p`min-workers ([Number](#config/types/number) = 4)`
 Minimum number of worker processes allowed.

 - `:p`max-workers ([Number](#config/types/number) = 8)`
 Maximum number of worker processes allowed.

 - `:p`min-spare-workers ([Number](#config/types/number) = 2)`
 Minimum number of idle workers: phpDaemon will run additional workers when the load increases so that there are enough idle workers but no more in total than specified in the max-workers parameter.

 - `:p`max-spare-workers ([Number](#config/types/number) = 0)`
 Maximum number of idle worker processes. phpDaemon will shut down additional worker processes when the load drops.

 - `:p`master-priorty ([Number](#config/types/number) = 100)`
 The priority of the master process. The lower the value, the higher the priority.

 - `:p`ipc-thread-priority ([Number](#config/types/number) = 100)`
 IPC process priority. The lower the value, the higher the priority.

 - `:p`worker-priority ([Number](#config/types/number) = 4)`
 Worker priority. The lower the value, the higher the priority.

 - `throw-exception-on-shutdown (boolean = false)`
 Throw exception `Exception('event shutdown')` after the process has finished.

#### requests # Requests

 - `locale (string = '')`
 Sets the locale. You can specify several via a separator `","`.

 - `ob-filter-auto (boolean = true)`
 Enable standard `ob_` filter.

#### workers # Worker processes

 - `chroot (string = '/')`
 Changing the system root for worker processes.

 - `cwd (string = '.')`
 Setting up the current work directory for worker processes.

 - `user (string = null)`
 The user for worker processes. Use a secure user, do not use root if you don't know what you're doing.

 - `group (string = null)`
 A group for worker processes. Use a secure group, do not use root if you don't know what you're doing.

 - `:p`auto-gc ([Number](#config/types/number) = '1k')`
 Enables a garbage collector called every n requests. `0` – turns off the garbage collector completely.

#### logging # Logging and debugging

 - `logging (boolean = true)`
 Enables logging.

 - `log-storage (string = '/var/log/phpdaemon.log')`
 The path to the log file.

 - `log-errors (boolean = true)`
Enables logging of local errors such as Undefined route in WebSocketServer, etc.

 - `log-worker-set-state (boolean = false)`
 Enables logging of worker status changes.

 - `log-events (boolean = false)`
 Enables logging of events.

 - `log-signals (boolean = false)`
 Enables logging of system signals.

 - `verbose-tty (boolean = false)`
 If this parameter is enabled, the log is printed to the terminal (STDOUT).

 > Please note that in the normal launch variant (not runworker) the input from the terminal is ignored, although after launch with this parameter it may seem that the program is bound to the terminal.

 - `restrict-error-control (boolean = false)`
 Switches off the error control operator "@".

#### eio # POSIX I/O subsystem

 - `eio-enabled (boolean = true)`
 Enables EIO support.

 - `:p`eio-set-max-idle ([Time](#config/types/time) = null)`
 Sets the maximum number of waiting threads.

 - `:p`eio-set-min-parallel ([Number](#config/types/number) = null)`
 Sets the minimum number of parallel threads.

 - `:p`eio-set-max-parallel ([Number](#config/types/number) = null)`
 Sets the maximum number of parallel threads.

 - `:p`eio-set-max-poll-reqs ([Number](#config/types/number) = null)`
 Sets the maximum number of requests processed.

 - `:p`eio-set-max-poll-time ([Time](#config/types/time) = null)`
 Sets the maximum run time.
