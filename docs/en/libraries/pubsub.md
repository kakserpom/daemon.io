### pubsub # PubSub #> PubSub {tpl-git PHPDaemon/PubSub}

```php
namespace PHPDaemon\PubSub;
```

<!-- include-namespace path="\PHPDaemon\PubSub" level="" access="" -->
#### pub-sub # PubSub {tpl-git PHPDaemon/PubSub/PubSub.php}

```php
namespace PHPDaemon\PubSub;
class PubSub;
```

PubSub

##### methods # Methods

<md:method>
/**
	 * Is event exists?
	 * @param  string  $id Event ID
	 * @return boolean
	 */
public function eventExists($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L25
</md:method>

<md:method>
/**
	 * Subcribe to event
	 * @param  string   $id  Event ID
	 * @param  object   $obj Subscriber
	 * @param  callable $cb  Callback
	 * @return boolean       Success
	 */
public function sub($id, $obj, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L36
</md:method>

<md:method>
/**
	 * Adds event
	 * @param  string      $id  Event ID
	 * @param  PubSubEvent $obj
	 * @return void
	 */
public function addEvent($id, PubSubEvent $obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L49
</md:method>

<md:method>
/**
	 * Removes event
	 * @param  string $id Event ID
	 * @return void
	 */
public function removeEvent($id)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L58
</md:method>

<md:method>
/**
	 * Unsubscribe object from event
	 * @param  string  $id  Event ID
	 * @param  object  $obj Subscriber
	 * @return boolean      Success
	 */
public function unsub($id, $obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L68
</md:method>

<md:method>
/**
	 * Publish
	 * @param  string  $id   Event ID
	 * @param  mixed   $data Data
	 * @return boolean       Success
	 */
public function pub($id, $data)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L81
</md:method>

<md:method>
/**
	 * Unsubscribe object from all events
	 * @param  object  $obj Subscriber
	 * @return boolean      Success
	 */
public function unsubFromAll($obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L93
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
/**
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
* Subcribe to event
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
protected $events = [];
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
return isset($this->events[$id]);
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSub.php#L26
</md:method>

<div class="clearboth"></div>

#### pub-sub-event # PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

```php
namespace PHPDaemon\PubSub;
class PubSubEvent extends \SplObjectStorage;
```

PubSubEvent

##### properties # Properties

<md:prop>
/**
	 * @var array Subscriptions
	 */
public $sub = [ ]
</md:prop>

<md:prop>
/**
	 * @var callable Activation callback
	 */
public $actCb
</md:prop>

<md:prop>
/**
	 * @var callable Deactivation callback
	 */
public $deactCb
</md:prop>

<div class="clearboth"></div>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct($act = null, $deact = null)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L33
</md:method>

<md:method>
/**
	 * Sets onActivation callback
	 * @param  callable $cb Callback
	 * @return this
	 */
public function onActivation($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L48
</md:method>

<md:method>
/**
	 * Sets onDeactivation callback
	 * @param callable $cb Callback
	 * @return this
	 */
public function onDeactivation($cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L58
</md:method>

<md:method>
/**
	 * Init
	 * @return object
	 */
public static function init()
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L67
</md:method>

<md:method>
/**
	 * Subscribe
	 * @param  object   $obj Subcriber object
	 * @param  callable $cb  Callback
	 * @return this
	 */
public function sub($obj, $cb)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L77
</md:method>

<md:method>
/**
	 * Unsubscripe
	 * @param  object $obj Subscriber object
	 * @return this
	 */
public function unsub($obj)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L93
</md:method>

<md:method>
/**
	 * Publish
	 * @param  mixed $data Data
	 * @return this
	 */
public function pub($data)
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L108
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined method
	 * @return mixed
	 */
*/
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L20
</md:method>

<md:method>
/**
	 * @param  string $method Method name
	 * @param  array  $args   Arguments
	 * @throws UndefinedMethodCalled if call to undefined static method
	 * @return mixed
	 */
/**
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L30
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @param  mixed  $value
	 * @return void
	 */
/**
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L18
</md:method>

<md:method>
/**
	 * @param  string $prop
	 * @return void
	 */
public $deactCb;
link:https://github.com/kakserpom/phpdaemon/blob/master/PHPDaemon/PubSub/PubSubEvent.php#L26
</md:method>

<div class="clearboth"></div>


<!--/ include-namespace -->
