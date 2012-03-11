<?php
class MixPanelReporter {
	public static $api_url = 'http://api.mixpanel.com/track/?data=';
	public $options;
	
	function __construct($options) {
		$this->options = $options;
	}
	
	function meter($key) {
		return new MixPanelMeter($key, $this);
	}
	
	function counter($key) {
		return new MixPanelCounter($key, $this);
	}
	
	function timer($key) {
		return new MixPanelTimer($key, $this);
	}
	
	function event($key) {
		return new MixPanelEvent($key, $this);
	}	
}

class MixPanelMeter {
	protected $key;
	protected $reporter;
	
	function __construct($key, $reporter) {
		$this->key = $key;
		$this->reporter = $reporter;
	}
	
	function mark($options = array()) {
		echo "Meter: Mark! Key: $this->key";
	}
}

class MixPanelCounter {
	protected $key;
	protected $reporter;
	
	function __construct($key, $reporter) {
		$this->key = $key;
		$this->reporter = $reporter;
	}
	
	function increment($options) {
		echo "Counter: Increment! Key: $this->key";
	}
	
	function decrement($options) {
		echo "Counter: Decrement! Key: $this->key";
	}
}

class MixPanelTimer {
	protected $key;
	protected $reporter;
	
	function __construct($key, $reporter) {
		$this->key = $key;
		$this->reporter = $reporter;
	}
	
	function time($options) {
		echo "Timer: Start! Key: $this->key";
	}
	
	function stop($options) {
		echo "Timer: Stop! Key: $this->key";
	}
}

class MixPanelEvent {
	protected $key;
	protected $reporter;
	
	function __construct($key, $reporter) {
		$this->key = $key;
		$this->reporter = $reporter;
	}
	
	function mark($options = array()) {
		$params = array(
            'event' => $this->key,
            'properties' => $options
        );
		if (!isset($params['properties']['token'])){
            $params['properties']['token'] = $this->reporter->options['token'];
        }
		$url = MixPanelReporter::$api_url . base64_encode(json_encode($params));
        exec("curl '" . $url . "' >/dev/null 2>&1 &");
	}
}