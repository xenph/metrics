<?php
namespace metrics\reporters;
require_once("Reportable.php");
require_once("statsd/Counter.php");
require_once("statsd/Meter.php");
require_once("statsd/Timer.php");
require_once("statsd/Event.php");

class StdOut implements Reportable
{
    public function meter($key)
    {
        return new stdout\Meter($key);
    }

    public function counter($key)
    {
        return new stdout\Counter($key);
    }

    public function timer($key)
    {
        return new stdout\Timer($key);
    }

    public function event($key)
    {
        return new stdout\Event($key);
    }
}
