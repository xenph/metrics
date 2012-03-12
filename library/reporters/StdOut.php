<?php
namespace metrics\reporters;

class StdOut {
	function meter($key) {
		return new stdout\Meter($key);
	}
	
	function counter($key) {
		return new stdout\Counter($key);
	}
	
	function timer($key) {
		return new stdout\Timer($key);
	}
	
	function event($key) {
		return new stdout\Event($key);
	}	
}

namespace metrics\reporters\stdout;

class Meter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
		echo "Meter: Mark! Key: $this->key";
	}
}

class Counter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function increment($options) {
		echo "Counter: Increment! Key: $this->key";
	}
	
	function decrement($options) {
		echo "Counter: Decrement! Key: $this->key";
	}
}

class Timer {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function time($options) {
		echo "Timer: Start! Key: $this->key";
	}
	
	function stop($options) {
		echo "Timer: Stop! Key: $this->key";
	}
}

class Event {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
		echo "Event: Mark! Key: $this->key";
	}
}