### pubsub # PubSub #> PubSub {tpl-git PHPDaemon/PubSub}

```php
namespace PHPDaemon\PubSub;
```

<!-- include-namespace path="\PHPDaemon\PubSub" commit="63917dfafd0f183721f0b8edfcbc1f8c9c53b8d0" level="" access="" -->
#### pub-sub-event # Class PubSubEvent {tpl-git PHPDaemon/PubSub/PubSubEvent.php}

```php
namespace PHPDaemon\PubSub;
class PubSubEvent extends \SplObjectStorage;
```

##### properties # Properties

<md:prop>
/**
	 * Subscriptions
	 * @var array
	 */
public $sub;
</md:prop>

<md:prop>
/**
	 * Activation callback
	 * @var callable
	 */
public $actCb;
</md:prop>

<md:prop>
/**
	 * Deactivation callback
	 * @var callable
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
	 * Sets onActivation callback.
	 * @param callable $cb Callback
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public function onActivation($cb)
</md:method>

<md:method>
/**
	 * Sets onDeactivation callback.
	 * @param callable $cb Callback
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public function onDeactivation($cb)
</md:method>

<md:method>
/**
	 * Constructor
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public static function init()
</md:method>

<md:method>
/**
	 * Subscribe
	 * @param object $obj  Subcriber object
	 * @param callable $cb Callback
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public function sub($obj, $cb)
</md:method>

<md:method>
/**
	 * Unsubscripe
	 * @param object $obj Subscriber object
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public function unsub($obj)
</md:method>

<md:method>
/**
	 * Publish
	 * @param mixed $data Data
	 * @return \PHPDaemon\PubSub\PubSubEvent
	 */
public function pub($data)
</md:method>

#### pub-sub # Class PubSub {tpl-git PHPDaemon/PubSub/PubSub.php}

```php
namespace PHPDaemon\PubSub;
class PubSub;
```

##### methods # Methods

<md:method>

public function eventExists($id)
</md:method>

<md:method>
/**
	 * Subcribe to event
	 * @param string $id   Event ID
	 * @param object $obj  Subscriber
	 * @param callable $cb Callback
	 * @return boolean Success
	 */
public function sub($id, $obj, $cb)
</md:method>

<md:method>
/**
	 * Adds event
	 * @param string $id Event ID
	 * @param PubSubEvent
	 * @return void
	 */
public function addEvent($id, PubSubEvent $obj)
</md:method>

<md:method>
/**
	 * Removes event
	 * @param string $id Event ID
	 * @return void
	 */
public function removeEvent($id)
</md:method>

<md:method>
/**
	 * Unsubscribe object from event
	 * @param string $id Event ID
	 * @param object
	 * @return boolean Success
	 */
public function unsub($id, $obj)
</md:method>

<md:method>
/**
	 * Publish
	 * @param string $id  Event ID
	 * @param mixed $data Data
	 * @return boolean Success
	 */
public function pub($id, $data)
</md:method>

<md:method>
/**
	 * Unsubscribe object from all events
	 * @param object
	 * @return boolean Success
	 */
public function unsubFromAll($obj)
</md:method>


<!--/ include-namespace -->
