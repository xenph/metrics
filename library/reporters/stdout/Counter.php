<?php
namespace metrics\reporters\stdout;

class Counter
{
    protected $key;

    function __construct($key)
    {
        $this->key = $key;
    }

    function increment($options = array())
    {
        echo "Counter: Increment! Key: $this->key";
    }

    function decrement($options = array())
    {
        echo "Counter: Decrement! Key: $this->key";
    }
}
