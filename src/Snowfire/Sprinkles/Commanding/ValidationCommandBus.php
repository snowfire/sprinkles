<?php

namespace Snowfire\Sprinkles\Commanding;


use Illuminate\Foundation\Application;

class ValidationCommandBus implements CommandBusInterface
{

	/**
	 * @var \Illuminate\Foundation\Application
	 */
	private $app;

	/**
	 * @var CommandTranslator
	 */
	protected $commandTranslator;

	/**
	 * @var CommandBus
	 */
	private $commandBus;

	public function __construct(Application $app, CommandTranslator $commandTranslator, CommandBus $commandBus)
	{
		$this->app = $app;
		$this->commandTranslator = $commandTranslator;
		$this->commandBus = $commandBus;
	}

	public function execute(Command $command)
	{

		$validator = $this->commandTranslator->toValidator($command);

		if (class_exists($validator))
		{
			$this->app->make($validator)->validate($command);
		}

		return $this->commandBus->execute($command);
	}


	/**
	 * @param Command $command
	 * @return \Illuminate\Support\MessageBag
	 */
	public function validationErrors(Command $command)
    {
        $validator = $this->commandTranslator->toValidator($command);

        return $this->app->make($validator)->errors($command);
    }

} 