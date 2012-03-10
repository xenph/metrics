<?php
class StatsDReporter {
	function meter($key) {
		return new StatsDMeter($key);
	}
	
	function counter($key) {
		return new StatsDCounter($key);
	}
	
	function timer($key) {
		return new StatsDTimer($key);
	}
	
	function event($key) {
		return new StatsDEvent($key);
	}	
}

class StatsDMeter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
	}
}

class StatsDCounter {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function increment($options) {
	}
	
	function decrement($options) {
	}
}

class StatsDTimer {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function time($options) {
	}
	
	function stop($options) {
	}
}

class StatsDEvent {
	protected $key;
	
	function __construct($key) {
		$this->key = $key;
	}
	
	function mark($options) {
	}
}