<?php

require_once('metrics/Metrics.php');

class MetricsTest extends PHPUnit_Framework_Testcase {
	
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
	
	/**
     * @expectedException InvalidArgumentException
	 * @expectedExceptionMessage No reporter found.
	 * @depends testCanCreateStatsDReporterWithDefaults
     */
	public function testEventWithKeyThatDoesntExist() {
		Metrics::event('badkey')->mark();
	}
	
	public function testEventWithMocks() {
		$mockReporter = $this->getMock('StdOut', array('event'));
		$mockEvent = $this->getMock('StdOutEvent', array('mark'));
		
		$mockEvent->expects($this->once())->method('mark');
		$mockReporter->expects($this->once())->method('event')->will($this->returnValue($mockEvent));
		
		Metrics::saveReporter('foo', $mockReporter);
		
		Metrics::event('foo')->mark();
	}
	
	public function testCounterWithMocks() {
		$mockReporter = $this->getMock('StdOut', array('counter'));
		$mockEvent = $this->getMock('StdOutCounter', array('increment', 'decrement'));
		
		$mockEvent->expects($this->once())->method('increment');
		$mockReporter->expects($this->once())->method('counter')->will($this->returnValue($mockEvent));
		
		Metrics::saveReporter('foo', $mockReporter);
		
		Metrics::counter('foo')->increment();
	}
	
	public function testTimerWithMocks() {
		$mockReporter = $this->getMock('StdOut', array('timer'));
		$mockEvent = $this->getMock('StdOutTimer', array('time', 'stop'));
		
		$mockEvent->expects($this->once())->method('time');
		$mockReporter->expects($this->once())->method('timer')->will($this->returnValue($mockEvent));
		
		Metrics::saveReporter('foo', $mockReporter);
		
		Metrics::timer('foo')->time();
	}
	
	public function testMeterWithMocks() {
		$mockReporter = $this->getMock('StdOut', array('meter'));
		$mockEvent = $this->getMock('StdOutMeter', array('mark'));
		
		$mockEvent->expects($this->once())->method('mark');
		$mockReporter->expects($this->once())->method('meter')->will($this->returnValue($mockEvent));
		
		Metrics::saveReporter('foo', $mockReporter);
		
		Metrics::meter('foo')->mark();
	}
}
