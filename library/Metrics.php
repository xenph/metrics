<?php
namespace metrics;

require_once('Reporter.php');

class Metrics {
	protected static $reporters = array();
	
	static function meter($key) {
		$result = self::findMatchingKeyMask($key);
		if (!$result) {
			return false;
		}
		return self::$reporters[$result['key_mask']]->meter($result['matchedKey']);
	}
	
	static function counter($key) {
		$result = self::findMatchingKeyMask($key);
		if (!$result) {
			return false;
		}
		return self::$reporters[$result['key_mask']]->counter($result['matchedKey']);
	}
	
	static function timer($key) {
		$result = self::findMatchingKeyMask($key);
		if (!$result) {
			return false;
		}
		return self::$reporters[$result['key_mask']]->timer($result['matchedKey']);
	}
	
	static function event($key) {
		$result = self::findMatchingKeyMask($key);
		if (!$result) {
			return false;
		}
		return self::$reporters[$result['key_mask']]->event($result['matchedKey']);
	}
	
	static function reporter($key_mask) {
		return new Reporter($key_mask);
	}
	
	static function saveReporter($key_mask, $reporter) {
		self::$reporters[$key_mask] = $reporter;
		return $reporter;
	}
	
	private static function findMatchingKeyMask($key) {
		foreach (self::$reporters as $regex => $reporter) {
			if (preg_match('/' . $regex . '/', $key, $matches)) {
				return array('matchedKey' => $matches[sizeof($matches) - 1], 'key_mask' => $regex);
			}
		}
		return false;
	}
}