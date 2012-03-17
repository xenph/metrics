<?php

namespace metrics\reporters;

class StdOut
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
