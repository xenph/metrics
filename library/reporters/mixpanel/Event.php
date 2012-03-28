<?php
namespace metrics\reporters\mixpanel;

class Event
{
    protected $key;
    protected $reporter;

    function __construct($key, $reporter)
    {
        $this->key = $key;
        $this->reporter = $reporter;
    }

    function mark($options = array())
    {
        $params = array(
            'event' => $this->key,
            'properties' => $options
        );
        if (!isset($params['properties']['token'])) {
            $params['properties']['token'] = $this->reporter->options['token'];
        }
        $url = 'http://api.mixpanel.com/track/?data=' . base64_encode(json_encode($params));
        exec("curl '" . $url . "' >/dev/null 2>&1 &");
    }
}
