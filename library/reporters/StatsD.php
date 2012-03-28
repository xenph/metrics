<?php
namespace metrics\reporters;
require_once("Reportable.php");
require_once(dirname(__FILE__)."/../externals/php-statsd/libraries/statsd.php");
require_once("statsd/Counter.php");
require_once("statsd/Meter.php");
require_once("statsd/Timer.php");
require_once("statsd/Event.php");

class StatsD implements Reportable
{
	private $statsDConnection;
	
	public function __construct($options = array()) 
	{
		$defaultOptions = array(
			'host' => 'localhost',
			'port' => 8125
		);
		$options = array_merge($defaultOptions, $options);
		
		$this->statsDConnection = new \StatsD($options['host'], $options['port']);
	}
	
    public function meter($key)
    {
        return new statsd\Meter($key, $this->statsDConnection);
    }

    public function counter($key)
    {
        return new statsd\Counter($key, $this->statsDConnection);
    }

    public function timer($key)
    {
        return new statsd\Timer($key, $this->statsDConnection);
    }

    public function event($key)
    {
        return new statsd\Event($key, $this->statsDConnection);
    }
}
