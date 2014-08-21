<?php

namespace Snowfire\Sprinkles\Commanding;


use Snowfire\Sprinkles\Eventing\EventDispatcher;

abstract class CommandHandler {

	protected $dispatcher;

	function __construct(EventDispatcher $dispatcher)
	{
		$this->dispatcher = $dispatcher;
	}


	abstract public function handle(Command $command);

} 