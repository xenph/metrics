Metrics
=======

Metrics is a simple metrics library for PHP, with reporters for both StatsD and ToTango.

Meters
------
Meters measure the calls per second.

`Metrics::meter('foo')->mark();`

Counters
--------
Counter measure the number of calls since application start.

`Metrics::counter('foo')->increment(array('sampleRate' => 1));`
`Metrics::counter('foo')->decrement(array('sampleRate' => 1));`

Timers
------
Timers measure the length of time something takes to complete.
`Metrics::timer('foo.bar')->time(array('time' => 400, 'sampleRate' => 1));`

Events
------
Events mark the occurance of a particular state in the application.

`Metrics::event('totango.event')->mark();

Reporters
---------
Reporters are how the application saves the metric information, they use a wildcard version of the metric key.

`Metrics::reporter('sales.*')->statsd(array('host' => 'sales-stats.bigcommerce.com', 'port' => 3317));`
`Metrics::reporter('hits.*')->statsd(array('host' => 'localhost', 'port' => 3317));`
`Metrics::reporter('totango-*')->totango(array('account_id' => 'test', 'api_key' => 'abc123'));`