<?php


namespace Snowfire\Sprinkles\Base;


class EmailAddress implements \JsonSerializable {

	private $address;

	function __construct($address)
	{
		$this->disallowInvalidEmailAddress($address);

		$this->address = $address;
	}

	private function disallowInvalidEmailAddress($address)
	{
		if (!filter_var($address, FILTER_VALIDATE_EMAIL))
		{
			throw new \InvalidArgumentException("Email address {$address} is invalid.");
		}
	}

	public function __toString()
	{
		return $this->address;
	}

	/**
	 * (PHP 5 &gt;= 5.4.0)<br/>
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return mixed data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 */
	public function jsonSerialize()
	{
		return (string)$this;
	}
}