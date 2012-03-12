<?php
namespace metrics\reporters;

class MixPanel {
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
		return new mixpanel\Event($key, $this);
	}	
}

namespace metrics\reporters\mixpanel;

class Event {
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
		$url = 'http://api.mixpanel.com/track/?data=' . base64_encode(json_encode($params));
        exec("curl '" . $url . "' >/dev/null 2>&1 &");
	}
}