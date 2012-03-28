<?php
namespace metrics\reporters\statsd;

class Counter
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function increment($options = array())
    {
    }

    public function decrement($options = array())
    {
    }
}
