<?php
namespace metrics\reporters\statsd;

class Meter
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function mark($options)
    {
    }
}
