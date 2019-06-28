### app_instance # Application

Appendix B is a subclass phpDaemon AppInstance, to create a new application, you must create a file applications / [name] .php and call it class Example extends AppInstance. Then, the kernel will call methods in response to which the application must perform the required operations:

init() - initialize the application. The application needs to maintain the required dependencies and prepare for the launch.
onReady() - it means that the working process in which the application is ready to run processing.
onShutdown() - the completion of the application.
beginRequest(Request $ req, AppInstance $ upstream) - sought a new request object to the application. The method can return false, this means that the application is refused (or not able) to handle requests. After calling this method, the request object enters the queue and invoked iteratively.
The class is declared as class ExampleRequest extends Request. Methods:

init() - is invoked only once when creating the request object.
run() - called the dispatcher queue to ter long as it will be returned code 1 or terminate method is called ().
terminate() - it should not be rebooted. Method interrupts and terminates the request.
sleep($seconds) - the time in seconds after which you want to return to the query.
wakeup() - interrupt sleep.
onAbort() - request a reset event is called if the client fell off.
header($header) - set the HTTP-response header.
out($str) - to write to the output stream line.
combinedOut($str) - write a string to the output stream containing both headers and body.
stdin($str) - processor input stream of the request.
finish($status) - 0 - normal, -1 - abort, -2 - termination
chunked() - set Transfer-Encoding: chunked.
