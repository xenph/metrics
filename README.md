Metrics
=======

Metrics is a simple metrics library for PHP, with reporters for both StatsD, MixPanel and ToTango.

[![Build Status](https://secure.travis-ci.org/xenph/Metrics.png?branch=master)](http://travis-ci.org/xenph/Metrics)

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

`Metrics::event('totango.event')->mark();`

Reporters
---------
Reporters are how the application saves the metric information, they use a regular expression to figure out which metric keys to act on. The regular expression will either pass the entire matched string, or the first match if a subpattern is used.

`Metrics::reporter('sales\..*')->statsd(array('host' => 'sales-stats.bigcommerce.com', 'port' => 3317));`
`Metrics::reporter('hits\..*')->statsd(array('host' => 'localhost', 'port' => 3317));`
`Metrics::reporter('totango\.(.*)')->totango(array('account_id' => 'test', 'token' => 'abc123'));`
`Metrics::reporter('mixpanel\.(.*)')->mixpanel(array('token' => 'abc123'));`

Examples using Regular Expressions

    php > Metrics::reporter('^1234\..*')->stdout();
    php > Metrics::counter('1234.abc')->decrement(array());
    Counter: Decrement! Key: 1234.abc
    php > Metrics::reporter('^123\.(.*)')->stdout();
    php > Metrics::counter('123.abc')->decrement(array());
    Counter: Decrement! Key: abc

