<?php
class StdOutReporter {
	function meter() {
		return new StdOutMeter();
	}
	
	function counter() {
		return new StdOutCounter();
	}
	
	function timer() {
		return new StdOutTimer();
	}
	
	function event() {
		return new StdOutEvent();
	}	
}

class StdOutMeter {
	function mark($options) {
		echo 'Meter: Mark!'
	}
}

class StdOutCounter {
	function increment($options) {
		echo 'Counter: Increment!'
	}
	
	function decrement($options) {
		echo 'Counter: Decrement!'
	}
}

class StdOutTimer {
	function time($options) {
		echo 'Timer: Start!'
	}
	
	function stop($options) {
		echo 'Timer: Stop!'
	}
}

class StdOutEvent {
	function mark($options) {
		echo 'Event: Mark!'
	}
}