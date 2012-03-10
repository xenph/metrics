<?php
class StatsDReporter {
	function meter() {
		return new StatsDMeter();
	}
	
	function counter() {
		return new StatsDCounter();
	}
	
	function timer() {
		return new StatsDTimer();
	}
	
	function event() {
		return new StatsDEvent();
	}	
}

class StatsDMeter {
	function mark($options) {
	}
}

class StatsDCounter {
	function increment($options) {
	}
	
	function decrement($options) {
	}
}

class StatsDTimer {
	function time($options) {
	}
	function stop($options) {
	}
}

class StatsDEvent {
	function mark($options) {
	}
}