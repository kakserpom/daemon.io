### mongonode # MongoNode #> MongoNode {tpl-git PHPDaemon/Examples/MongoNode.php}

```php:p
namespace PHPDaemon\Examples;
class MongoNode;
```

This application provides MongoDB replication node. This makes it possible to install arbitrary hooks to add / edit / delete objects.

#### requirements # Requirements

Required module installed pecl / mongo and included phpdaemon / MongoCllient.

#### use # Use

MongoNode When enabled, it immediately gets the new changes in the database.

Default:

If the object has the property "_key" serialized its value is sent to the Memcache key under that name, which is set within the meaning of _key. When an object is deleted from the MongoDB, it is removed from Memcache.

If the object has the property "_ev", its value is sent to the RTEP-event under the name that is specified in the value _ev.
