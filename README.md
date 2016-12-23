# Robots Exclusion Protocol Checking Classes [![Build Status](https://travis-ci.org/nickmoline/robots-checker.svg?branch=develop)](https://travis-ci.org/nickmoline/robots-checker)

These classes allow you to check all of the different ways you can exclude a URL from search engines.

## Classes

You can instantiate the following classes:

* `NickMoline\Robots\RobotsTxt` : Checks the corresponding robots.txt file for a url
* `NickMoline\Robots\RobotsStatus` : Checks the HTTP Status code for an indexable URL
* `NickMoline\Robots\RobotsHeader` : Checks the HTTP `X-Robots-Tag` Header
* `NickMoline\Robots\RobotsMeta` : Checks the `<meta name="robots">` tag (as well as bot specific tags)
* `NickMoline\Robots\RobotsAll` : Wrapper class that will run all of the above checks

## Example Usage

```php
<?php

require NickMoline\Robots\RobotsTxt;
require NickMoline\Robots\RobotsHeader;
require NickMoline\Robots\RobotsAll;

$checker = new RobotsTxt("http://www.example.com/test.html");
$allowed = $checker->verify();                              // By default it checks Googlebot
$allowed = $checker->setUserAgent("bingbot")->verify();     // Checks to see if blocked for bingbot by robots.txt file

echo $checker->getReason();              // Get the reason the url is allowed or denied

$checker2 = new RobotsHeader("http://www.example.com/test.html");
$allowed = $checker->verify();           // Same as above but will test the X-Robots-Tag HTTP headers

$checkerAll = new RobotsAll("http://www.example.com/test.html");
$allowed = $checker->verify();           // This one runs all of the available tests
```
