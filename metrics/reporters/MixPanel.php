<?php
namespace metrics\reporters;
require_once("Reportable.php");
require_once("mixpanel/Event.php");

class MixPanel implements Reportable
{
    public $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function meter($key)
    {
        throw new Exception('The meter function isn\'t implemented for the MixPanel reporter.');
    }

    public function counter($key)
    {
        throw new Exception('The counter function isn\'t implemented for the MixPanel reporter.');
    }

    public function timer($key)
    {
        throw new Exception('The timer function isn\'t implemented for the MixPanel reporter.');
    }

    public function event($key)
    {
        return new mixpanel\Event($key, $this);
    }
}
