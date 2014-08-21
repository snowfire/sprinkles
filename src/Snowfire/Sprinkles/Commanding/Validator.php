<?php


namespace Snowfire\Sprinkles\Commanding;


use Illuminate\Validation\Factory;

abstract class Validator {

	protected $validator;

	protected static $rules = [];

	function __construct(Factory $validator)
	{
		$this->validator = $validator;
	}

	public function validate(Command $command)
	{
		if (!$this->validates($command))
		{
			throw new ValidationException;
		}
	}

	public function validates(Command $command)
	{
		return $this->errors($command)->isEmpty();
	}

	/**
	 * @param Command $command
	 * @return \Illuminate\Support\MessageBag
	 */
	public function errors(Command $command)
	{
		$validator = $this->makeValidator($command);

		return $validator->errors();
	}

	/**
	 * @param Command $command
	 * @return \Illuminate\Validation\Validator
	 */
	protected function makeValidator(Command $command)
	{
		$validator = $this->validator->make($command->toArray(), static::$rules);
		return $validator;
	}
}