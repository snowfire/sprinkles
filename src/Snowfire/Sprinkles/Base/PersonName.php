<?php


namespace Snowfire\Sprinkles\Base;


class PersonName {

	public $first_name;

	public $last_name;

	function __construct($first_name, $last_name)
	{
		$this->first_name = $first_name;
		$this->last_name = $last_name;
	}


} 