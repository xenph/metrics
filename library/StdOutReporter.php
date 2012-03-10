<?php
class StdOutReporter {
	function meter($key) {
		return new StdOutMeter($key);
	}
	
	function counter($key) {
		return new StdOutCounter($key);
	}
	
	function timer($key) {
		return new StdOutTimer($key);
	}
	
	function event($key) {
		return new StdOutEvent($key);
	}	
}

class StdOutMeter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
		echo "Meter: Mark! Key: $this->key";
	}
}

class StdOutCounter {
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

class StdOutTimer {
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

class StdOutEvent {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
		echo "Event: Mark! Key: $this->key";
	}
}