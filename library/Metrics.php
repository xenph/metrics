<?php
require_once('Reporter.php');

class Metrics {
	protected static $reporters = array();
	
	static function meter($key) {
		return self::$reporters[$key]->meter();
	}
	
	static function counter($key) {
		return self::$reporters[$key]->counter();
	}
	
	static function timer($key) {
		return self::$reporters[$key]->timer();
	}
	
	static function event($key) {
		return self::$reporters[$key]->event();
	}
	
	static function reporter($key_mask) {
		return new Reporter($key_mask);
	}
	
	static function saveReporter($key_mask, $reporter) {
		self::$reporters[$key_mask] = $reporter;
		return $reporter;
	}
}