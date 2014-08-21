<?php namespace Snowfire\Sprinkles\Base;


class Url implements \JsonSerializable {

    private $url;

    function __construct($url)
    {
		if ( $url )
		{
			if (!preg_match('@^https?://@', $url))
			{
				$url = 'http://' . $url;
			}

			$this->disallowInvalidUrl($url);
		}

        $this->url = $url;
    }

    private function disallowInvalidUrl($url)
    {
        if (!filter_var($url, FILTER_VALIDATE_URL))
        {
            throw new \InvalidArgumentException("Url {$url} is invalid.");
        }
    }

    public function __toString()
    {
        return $this->url;
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