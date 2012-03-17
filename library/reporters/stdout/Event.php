<?php
namespace metrics\reporters\stdout;

class Event
{
    protected $key;

    function __construct($key)
    {
        $this->key = $key;
    }

    function mark($options)
    {
        echo "Event: Mark! Key: $this->key";
    }
}