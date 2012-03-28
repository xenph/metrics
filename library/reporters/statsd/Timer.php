<?php
namespace metrics\reporters\statsd;

class Timer
{
	private $key;
	private $statsDConnection;

    public function __construct($key, $connection)
    {
        $this->key = $key;
		$this->statsDConnection = $connection;
    }

    public function time($options = array(), $callback)
    {
		$this->statsDConnection->time_this($this->key, function() 
		{
			callback();
		});
    }
}
