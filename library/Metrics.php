<?php
require_once('Reporter.php');

class Metrics {
	
	protected static $keys = array();
	
	static function meter($key) {
	}
	
	static function reporter($key_mask) {
		return new Reporter();
	}
}