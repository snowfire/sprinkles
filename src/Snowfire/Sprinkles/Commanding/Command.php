<?php

namespace Snowfire\Sprinkles\Commanding;


abstract class Command {

	protected $attributes = [];

	public function __construct(array $attributes = [])
	{
		$this->attributes = $attributes;
	}

	public function __get($key)
	{
		return $this->attributes[$key];
	}

	public function toArray()
	{
		$array = $this->attributes;

		if (!$array)
		{
			foreach ($this as $key => $value)
			{
				$array[$key] = $value;
			}
		}

		return $array;
	}
} 