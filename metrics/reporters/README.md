Reporters
=========
Reporters are how the events are propagated into other systems and eventually reported to the user.

MixPanel
--------
MixPanel is a SaSS platform for reporting events that occur in your application. Installing it is very simple.

* Sign up at [www.mixpanel.com]. 
* Then add the following line of code to configure what keys the reporter should listen for; `Metrics::reporter('foo')->mixpanel(array('token' => '<YOUR API TOKEN HERE>'));`
* Finally, fire an event! `Metrics::event('foo')->mark();`. The `mark()` function can also take an array parameter which it will pass on to MixPanel.

The `event()` is the only supported Metric type.

StatsD
------
This is not currently implemented.

ToTango
-------
This is not currently implemented.

Standard Out
------------
Created for Debugging, this reporter will emit to `standard out` any events that are fired. This is also a great starting point for a new integration. 

All metric types are supported.