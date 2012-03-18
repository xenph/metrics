<?php
namespace metrics\reporters;

require_once("./mixpanel/Event.php");

class MixPanel implements IMetrics
{
    public $options;

    public function __construct($options)
    {
        $this->options = $options;
    }

    public function event($key)
    {
        return new mixpanel\Event($key, $this);
    }

    public function meter($key)
    {
        // TODO: Implement meter() method.
    }

    public function counter($key)
    {
        // TODO: Implement counter() method.
    }

    public function timer($key)
    {
        // TODO: Implement timer() method.
    }
}
