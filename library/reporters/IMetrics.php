<?php
namespace metrics\reporters;

interface IMetrics
{
    public function meter($key);

    public function counter($key);

    public function timer($key);

    public function event($key);
}
