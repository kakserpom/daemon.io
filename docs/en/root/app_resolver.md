## app_resolver # App resolver

When receiving requests, the daemon must first determine which application it should pass processing to.
This is done using the `getRequestRoute` method in the [AppResolver](https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/Core/AppResolver.php#L159) class.

You can define your own handler - an example can be found in `./conf/AppResolver.php` [https://github.com/kakserpom/phpdaemon/blob/master/conf/AppResolver.php].

The `getRequestRoute` method has two arguments:

 - `$req` &#8212; `stdClass` object, containing the query parameters;
 - `$upstream` &#8212; a server object containing the incoming requests, for example `PHPDaemon\Servers\HTTP\Connection`.

The return value of this method can be:

 - Name of the application;
 - `null` to attempt to pass the request to the default application;
 - `false` to finish processing the request.

Don't forget to specify in [config](#osnovnyie-puti) the path to your AppResolver, for example `path './conf/AppResolver.php';`.

In the settings of the [server](#serveryi) receiving the requests, you can use the `responder` option to specify the default name of the application to which the request will be passed if `getRequestRoute` returns `null`.