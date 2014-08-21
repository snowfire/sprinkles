<?php

namespace Snowfire\Sprinkles\Commanding;


use Illuminate\Foundation\Application;

class CommandBus implements CommandBusInterface {

	/**
	 * @var \Illuminate\Foundation\Application
	 */
	private $app;

	/**
	 * @var CommandTranslator
	 */
	protected $commandTranslator;

	public function __construct(Application $app, CommandTranslator $commandTranslator)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
	}

	public function execute(Command $command)
	{

		$handler = $this->commandTranslator->toCommandHandler($command);

		return $this->app->make($handler)->handle($command);
	}

} 