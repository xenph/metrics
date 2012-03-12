<?php
namespace metrics\reporters;

class StatsD {
	function meter($key) {
		return new statsd\Meter($key);
	}
	
	function counter($key) {
		return new statsd\Counter($key);
	}
	
	function timer($key) {
		return new statsd\Timer($key);
	}
	
	function event($key) {
		return new statsd\Event($key);
	}	
}

namespace metrics\reporters\statsd;

class Meter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
	}
}

class Counter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function increment($options) {
	}
	
	function decrement($options) {
	}
}

class Timer {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function time($options) {
	}
	
	function stop($options) {
	}
}

class Event {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
	}
}