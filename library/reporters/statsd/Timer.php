<?php
namespace metrics\reporters\statsd;

class Timer
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function time($options = array())
    {
    }

    public function stop($options = array())
    {
    }
}
