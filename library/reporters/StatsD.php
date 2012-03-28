<?php
namespace metrics\reporters;
require_once("./statsd/Counter.php");
require_once("./statsd/Meter.php");
require_once("./statsd/Timer.php");
require_once("./statsd/Event.php");

class StatsD implements Reportable
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

    public function event($key)
    {
        return new statsd\Event($key);
    }
}
