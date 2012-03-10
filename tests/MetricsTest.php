<?php
require_once('../library/Metrics.php');

class MetricsTest extends PHPUnit_Framework_Testcase {
	public function testMeterExists() {
		Metrics::meter('foo');
	}
	
	public function testCanCreateStatsDReporterWithDefaults() {
		Metrics::reporter('test')->statsd();
	}
	
	public function testCanCreateStatsDReporterWithOptions() {
		Metrics::reporter('test')->statsd(array('host' => 'localhost', 'port' => 2222));
	}
	
}