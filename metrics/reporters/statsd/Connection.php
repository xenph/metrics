<?php
namespace metrics\reporters\statsd;
/*
 * A simple PHP class for connecting to a statsd server and firing
 * metrics over UDP.
 *
 * @author John Crepezzi <john.crepezzi@gmail.com>
 * @see https://github.com/seejohnrun/php-statsd
 *
 * @todo error handling
 * @todo replace with dependency on network library (net\statsd\Client)
 */
class Connection {

    private $host, $port;

    public function __construct($host = 'localhost', $port = 8125) {
        $this->host = $host;
        $this->port = $port;
    }

    public function timing($key, $time, $rate = 1) {
        $this->send("$key:$time|ms", $rate);
    }

    public function time_this($key, $callback, $rate = 1) {
        $begin = microtime(true);
        $callback();
        $time = floor((microtime(true) - $begin) * 1000);
        // And record
        $this->timing($key, $time, $rate);
    }

    public function counting($key, $amount = 1, $rate = 1) {
        $this->send("$key:$amount|c", $rate);
    }

    private function send($value, $rate) {
        $fp = fsockopen('udp://' . $this->host, $this->port, $errno, $errstr);
        // Will show warning if not opened, and return false
        if ($fp) {
            fwrite($fp, "$value|@$rate");
            fclose($fp);
        }
    }

}