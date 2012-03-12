Metrics
=======

Metrics is a simple metrics library for PHP, with reporters for both StatsD, MixPanel and ToTango.

Meters
------
Meters measure the calls per second.

`metrics\Metrics::meter('foo')->mark();`

Counters
--------
Counter measure the number of calls since application start.

`metrics\Metrics::counter('foo')->increment(array('sampleRate' => 1));`
`metrics\Metrics::counter('foo')->decrement(array('sampleRate' => 1));`

Timers
------
Timers measure the length of time something takes to complete.
`metrics\Metrics::timer('foo.bar')->time(array('time' => 400, 'sampleRate' => 1));`

Events
------
Events mark the occurance of a particular state in the application.

`metrics\Metrics::event('totango.event')->mark();`

Reporters
---------
Reporters are how the application saves the metric information, they use a regular expression to figure out which metric keys to act on. The regular expression will either pass the entire matched string, or the first match if a subpattern is used.

`metrics\Metrics::reporter('sales\..*')->statsd(array('host' => 'sales-stats.bigcommerce.com', 'port' => 3317));`
`metrics\Metrics::reporter('hits\..*')->statsd(array('host' => 'localhost', 'port' => 3317));`
`metrics\Metrics::reporter('totango\.(.*)')->totango(array('account_id' => 'test', 'token' => 'abc123'));`
`metrics\Metrics::reporter('mixpanel\.(.*)')->mixpanel(array('token' => 'abc123'));`

Examples using Regular Expressions

    php > metrics\Metrics::reporter('^1234\..*')->stdout();
    php > metrics\Metrics::counter('1234.abc')->decrement(array());
    Counter: Decrement! Key: 1234.abc
    php > metrics\Metrics::reporter('^123\.(.*)')->stdout();
    php > metrics\Metrics::counter('123.abc')->decrement(array());
    Counter: Decrement! Key: abc

