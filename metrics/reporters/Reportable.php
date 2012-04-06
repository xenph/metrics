<?php
namespace metrics\reporters;

interface Reportable
{
    public function meter($key);

    public function counter($key);

    public function timer($key);

    public function event($key);
}
