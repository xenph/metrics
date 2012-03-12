<?php
namespace metrics;

require_once('../library/Metrics.php');

class MetricsTest extends \PHPUnit_Framework_Testcase {
	
	public function testCanCreateStdOutReporterWithDefaults() {
		Metrics::reporter('foo')->stdout();
	}
	
	public function testCanCreateStatsDReporterWithDefaults() {
		Metrics::reporter('foo')->statsd();
	}
	
	public function testCanCreateStatsDReporterWithOptions() {
		Metrics::reporter('test')->statsd(array('host' => 'localhost', 'port' => 2222));
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testMeterExists() {
		Metrics::meter('foo');
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testCounterExists() {
		Metrics::counter('foo');
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testCounterIncrementExists() {
		Metrics::counter('foo')->increment(array('sampleRate' => 1));
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testCounterDecrementExists() {
		Metrics::counter('foo')->decrement(array('sampleRate' => 1));
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testTimerExists() {
		Metrics::timer('foo');
	}
	
	/**
     * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testEventExists() {
		Metrics::event('foo');
	}
}