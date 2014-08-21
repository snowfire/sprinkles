<?php namespace Snowfire\Sprinkles\Eventing;


trait EventGeneratorTrait {

	protected $pendingEvents = [];

	public function raise($event)
	{
		$this->pendingEvents[] = $event;
	}

	public function releaseEvents()
	{
		$events = $this->pendingEvents;

		$this->pendingEvents = [];

		return $events;
	}

} 