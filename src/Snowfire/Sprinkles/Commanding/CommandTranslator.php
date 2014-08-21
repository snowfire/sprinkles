<?php namespace Snowfire\Sprinkles\Commanding;


class CommandTranslator {

	public function toCommandHandler(Command $command)
	{
		$handler = get_class($command) . 'Handler';

		if (!class_exists($handler))
		{
			throw new \Exception("Command handler [{$handler}] does not exist.");
		}

		return $handler;
	}

	public function toValidator(Command $command)
	{
		return str_replace('Command', 'Validator', get_class($command));
	}
} 