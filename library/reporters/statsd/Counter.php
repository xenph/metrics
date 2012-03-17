<?php
namespace metrics\reporters\statsd;

class Counter
{
    protected $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function increment($options)
    {
    }

    public function decrement($options)
    {
    }
}
