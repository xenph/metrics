<?php
namespace metrics\reporters\stdout;

class Meter
{
    protected $key;

    function __construct($key)
    {
        $this->key = $key;
    }

    function mark($options = array())
    {
        echo "Meter: Mark! Key: $this->key";
    }
}
