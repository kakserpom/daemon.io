## basics # Basics

PHPDaemon represents one master process with multiple workflows.

Application, depending on the load, is initialized to one or more workflows. In the second case, the request will be given one free workflow.

Mechanism of interaction between rebochimi processes is not provided, so for synchronization applications in different processes, you can use third-party software, such as Redis. It is also possible to specify the application option `limit-instances N;` to limit the number of copies of the application in all operating processes.

The executable file is located in dirktor `./bin/phpd`.
You can create your own executable file, as shown in the example  `./bin/sampleapp`.
Before starting the daemon checks for a variable `$configFile`, using it to load the configuration.

<!-- import pseudotypes.md -->
