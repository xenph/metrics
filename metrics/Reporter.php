<?php
namespace metrics;

require_once('reporters/StatsD.php');
require_once('reporters/StdOut.php');
require_once('reporters/MixPanel.php');

class Reporter
{
    protected $_key_mask;

    public function __construct($key_mask)
    {
        $this->_key_mask = $key_mask;
    }

    public function mixpanel($options = array())
    {
        return \Metrics::saveReporter($this->_key_mask, new reporters\MixPanel($options));
    }

    public function stdout($options = array())
    {
        return \Metrics::saveReporter($this->_key_mask, new reporters\StdOut($options));
    }

    public function statsd($options = array())
    {
        return \Metrics::saveReporter($this->_key_mask, new reporters\StatsD($options));
    }

    public function totango($options = array())
    {
        return \Metrics::saveReporter($this->_key_mask, new reporters\ToTango($options));
    }
}