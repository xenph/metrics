<?php
require_once('Reporter.php');

class Metrics {
	protected static $reporters = array();
	
	static function meter($key) {
		return $this->reporters[$key]->meter();
	}
	
	static function counter($key) {
		return $this->reporters[$key]->counter();
	}
	
	static function timer($key) {
		return $this->reporters[$key]->timer();
	}
	
	static function event($key) {
		return $this->reporters[$key]->event();
	}
	
	static function reporter($key_mask) {
		return new Reporter($key_mask);
	}
	
	static function saveReporter($key_mask, $reporter) {
		$this->reporters[$key_mask] = $reporter;
		return $reporter;
	}
}