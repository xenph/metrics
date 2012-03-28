<?php
namespace metrics\reporters;
require_once("Reportable.php")

class MongoDB implements Reportable
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
        // @TODO: Implement event() method.
    }

    public function counter($key)
    {
        // @TODO: Implement event() method.
    }

    public function timer($key)
    {
        // @TODO: Implement event() method.
    }

    public function event($key)
    {
        // @TODO: Implement event() method.
    }

    private function write($data)
    {
        /** @var $events  */
        $events = $this->collections['events'];
        //$events;
    }
}
