<?php
namespace metrics\reporters;

class MixPanel {
	public static $api_url = 'http://api.mixpanel.com/track/?data=';
	public $options;
	
	function __construct($options) {
		$this->options = $options;
	}
	
	function meter($key) {
		throw new Exception('The meter function isn\'t implemented for the MixPanel reporter.');
	}
	
	function counter($key) {
		throw new Exception('The counter function isn\'t implemented for the MixPanel reporter.');
	}
	
	function timer($key) {
		throw new Exception('The timer function isn\'t implemented for the MixPanel reporter.');
	}
	
	function event($key) {
		return new MixPanelEvent($key, $this);
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