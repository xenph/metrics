<?php
require_once('reporters/StatsDReporter.php');
require_once('reporters/StdOutReporter.php');
require_once('reporters/MixPanelReporter.php');

class Reporter {
	protected $_key_mask;
	
	function __construct($key_mask) {
		$this->_key_mask = $key_mask;
	}
	
	function mixpanel($options = array()) {
		return Metrics::saveReporter($this->_key_mask, new MixPanelReporter($options));
	}
	
	function stdout($options = array()) {
		return Metrics::saveReporter($this->_key_mask, new StdOutReporter($options));
	}
	
	function statsd($options = array('host' => 'localhost', 'port' => 1111)) {
		return Metrics::saveReporter($this->_key_mask, new StatsDReporter($options));
	}
	
	function totango($options = array('host' => 'localhost')) {
		return Metrics::saveReporter($this->_key_mask, new ToTangoReporter($options));
	}
}