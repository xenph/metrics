<?php
namespace metrics\reporters\stdout;

class Counter
{
    protected $key;

    function __construct($key)
    {
        $this->key = $key;
    }

    function increment($options)
    {
        echo "Counter: Increment! Key: $this->key";
    }

    function decrement($options)
    {
        echo "Counter: Decrement! Key: $this->key";
    }
}
