<?php
namespace metrics\reporters;

class MongoDB implements \metrics\reports\IMetrics
{
    private $mongo;
    private $db;
    private $collections;

    public function __construct()
    {
        $this->mongo = new \Mongo();
        $this->db = $this->mongo->metrics;
        $this->collections = array(
            'events' => $this->db->events,
            'counters' => $this->db->counters,
            );
    }

    public function meter($key)
    {

    }

    public function counter($key)
    {

    }

    public function timer($key)
    {

    }

    public function event($key)
    {
        // TODO: Implement event() method.
    }

    private function write($data)
    {
        /** @var $events  */
        $events = $this->collections['events'];
        //$events;
    }
}
