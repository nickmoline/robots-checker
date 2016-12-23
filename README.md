# Robots Exclusion Protocol Checking Classes

These classes allow you to check all of the different ways you can exclude a URL from search engines.

## Classes

You can instantiate the following classes:

* `nickmoline\RobotsChecker\RobotsTxt` : Checks the corresponding robots.txt file for a url
* `nickmoline\RobotsChecker\RobotsStatus` : Checks the HTTP Status code for an indexable URL
* `nickmoline\RobotsChecker\RobotsHeader` : Checks the HTTP `X-Robots-Tag` Header
* `nickmoline\RobotsChecker\RobotsMeta` : Checks the `<meta name="robots">` tag (as well as bot specific tags)
* `nickmoline\RobotsChecker\RobotsAll` : Wrapper class that will run all of the above checks

## Example Usage

```php
<?php

require nickmoline\RobotsChecker\RobotsTxt;

$checker = new RobotsTxt("http://www.example.com/test.html");
$allowed = $checker->verify("bingbot");  // Checks to see if blocked for bingbot by robots.txt file
$allowed = $checker->verify();           // By default it checks Googlebot

echo $checker->getReason();              // Get the reason the url is allowed or denied

$checker2 = new RobotsHeader("http://www.example.com/test.html");
$allowed = $checker->verify();           // Same as above but will test the X-Robots-Tag HTTP headers

$checkerAll = new RobotsAll("http://www.example.com/test.html");
$allowed = $checker->verify();           // This one runs all of the available tests
```

