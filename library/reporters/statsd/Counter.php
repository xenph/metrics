<?php
namespace metrics\reporters\statsd;

class Counter
{
    private $key;
	private $statsDConnection;

    public function __construct($key, $connection)
    {
        $this->key = $key;
		$this->statsDConnection = $connection;
    }

    public function increment($options = array())
    {
		$defaultOptions = array(
			'magnitude' => 1,
			'sampleRate' => 0.1
		);
		$options = array_merge($defaultOptions, $options);
		
		$this->statsDConnection->counting($this->key, $options['magnitude'], $options['sampleRate']);
    }

    public function decrement($options = array())
    {
		$defaultOptions = array(
			'magnitude' => 1,
			'sampleRate' => 0.1
		);
		$options = array_merge($defaultOptions, $options);
		
		$this->statsDConnection->counting($this->key, -$options['magnitude'], $options['sampleRate']);
    }
}
