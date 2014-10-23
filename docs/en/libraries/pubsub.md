### pubsub # PubSub #> PubSub {tpl-git PHPDaemon/PubSub}

```php
namespace PHPDaemon\PubSub;
```

<!-- include-namespace path="\PHPDaemon\PubSub" level="" access="" -->
#### pub-sub # Class PubSub {tpl-git PHPDaemon/PubSub/PubSub.php}

```php
namespace PHPDaemon\PubSub;
class PubSub;
```

##### methods # Methods

<md:method>
/**
	 * Is event exists?
	 * @param  string  $id Event ID
	 * @return boolean
	 */
public function eventExists($id)
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
</md:method>

<md:method>
/**
	 * Adds event
	 * @param  string      $id  Event ID
	 * @param  PubSubEvent $obj
	 * @return void
	 */
public function addEvent($id, PubSubEvent $obj)
</md:method>

<md:method>
/**
	 * Removes event
	 * @param  string $id Event ID
	 * @return void
	 */
public function removeEvent($id)
</md:method>

<md:method>
/**
	 * Unsubscribe object from event
	 * @param  string  $id  Event ID
	 * @param  object  $obj Subscriber
	 * @return boolean      Success
	 */
public function unsub($id, $obj)
</md:method>

<md:method>
/**
	 * Publish
	 * @param  string  $id   Event ID
	 * @param  mixed   $data Data
	 * @return boolean       Success
	 */
public function pub($id, $data)
</md:method>

<md:method>
/**
	 * Unsubscribe object from all events
	 * @param  object  $obj Subscriber
	 * @return boolean      Success
	 */
public function unsubFromAll($obj)
</md:method>

#### pub-sub-event # Class PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

```php
namespace PHPDaemon\PubSub;
class PubSubEvent extends \SplObjectStorage;
```

##### properties # Properties

<md:prop>
/**
	 * @var array Subscriptions
	 */
public $sub;
</md:prop>

<md:prop>
/**
	 * @var callable Activation callback
	 */
public $actCb;
</md:prop>

<md:prop>
/**
	 * @var callable Deactivation callback
	 */
public $deactCb;
</md:prop>

##### methods # Methods

<md:method>
/**
	 * Constructor
	 */
public function __construct($act = null, $deact = null)
</md:method>

<md:method>
/**
	 * Sets onActivation callback
	 * @param  callable $cb Callback
	 * @return this
	 */
public function onActivation($cb)
</md:method>

<md:method>
/**
	 * Sets onDeactivation callback
	 * @param callable $cb Callback
	 * @return this
	 */
public function onDeactivation($cb)
</md:method>

<md:method>
/**
	 * Init
	 * @return object
	 */
public static function init()
</md:method>

<md:method>
/**
	 * Subscribe
	 * @param  object   $obj Subcriber object
	 * @param  callable $cb  Callback
	 * @return this
	 */
public function sub($obj, $cb)
</md:method>

<md:method>
/**
	 * Unsubscripe
	 * @param  object $obj Subscriber object
	 * @return this
	 */
public function unsub($obj)
</md:method>

<md:method>
/**
	 * Publish
	 * @param  mixed $data Data
	 * @return this
	 */
public function pub($data)
</md:method>


<!--/ include-namespace -->
