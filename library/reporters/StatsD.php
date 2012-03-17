<?php
namespace metrics\reporters;

class StatsD
{
    public function meter($key)
    {
        return new statsd\Meter($key);
    }

    public function counter($key)
    {
        return new statsd\Counter($key);
    }

    public function timer($key)
    {
        return new statsd\Timer($key);
    }
}
