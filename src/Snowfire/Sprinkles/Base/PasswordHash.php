<?php


namespace Snowfire\Sprinkles\Base;


use Hash;

class PasswordHash implements \JsonSerializable {

	private $hash;

	function __construct($hash)
	{
		$this->hash = $hash;
	}

	public static function hashPassword($password)
	{
		return new static(Hash::make($password));
	}

	public function __toString()
	{
		return $this->hash;
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