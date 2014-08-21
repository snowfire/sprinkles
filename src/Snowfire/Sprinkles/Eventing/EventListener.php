<?php namespace Snowfire\Sprinkles\Eventing;


use ReflectionClass;

class EventListener {

	public function handle($event)
	{
		$eventName = $this->getEventName($event);

		if ($this->listenerIsRegistered($eventName))
		{
			return call_user_func([$this, $this->getMethodName($eventName)], $event);
		}
	}

	private function getEventName($event)
	{
		// Namespace\CustomerWasAddedEvent -> CustomerWasAddedEvent -> CustomerWasAdded
		return substr((new ReflectionClass($event))->getShortName(), 0, -5);
	}

	private function listenerIsRegistered($eventName)
	{
		return method_exists($this, $this->getMethodName($eventName));
	}

	/**
	 * @param $eventName
	 * @return string
	 */
	protected function getMethodName($eventName)
	{
		return 'when' . $eventName;
	}
} 