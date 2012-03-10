<?php
require_once('../library/Metrics.php');

class MetricsTest extends PHPUnit_Framework_Testcase {
	public function testMeterExists() {
		Metrics::reporter('foo')->statsd();
		Metrics::meter('foo');
	}
	
	public function testCounterExists() {
		Metrics::reporter('foo')->statsd();
		Metrics::counter('foo');
	}
	
	public function testTimerExists() {
		Metrics::reporter('foo')->statsd();
		Metrics::timer('foo');
	}
	
	public function testEventExists() {
		Metrics::reporter('foo')->statsd();
		Metrics::event('foo');
	}
	
	public function testCanCreateStatsDReporterWithDefaults() {
		Metrics::reporter('test')->statsd();
	}
	
	public function testCanCreateStatsDReporterWithOptions() {
		Metrics::reporter('test')->statsd(array('host' => 'localhost', 'port' => 2222));
	}
}