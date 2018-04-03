<?php

namespace NickMoline\Robots\Test;

use League\Uri\Http;
use NickMoline\Robots\RobotsTxt;
use PHPUnit_Framework_TestCase;

class UriPackageUsageTest extends PHPUnit_Framework_TestCase
{
    public function testUrl()
    {
        $this->assertTrue((new RobotsTxt('https://www.google.com/search'))->urlInfo() instanceof Http);
        $this->assertEquals('/search', (new RobotsTxt('https://www.google.com/search'))->getRelativeUrl());
        $this->assertEquals('https://www.google.com/robots.txt', (new RobotsTxt('https://www.google.com/search'))->getRobotsUrl());
        $this->assertEquals(false, (new RobotsTxt('https://www.google.com/search'))->validate());
        $this->assertEquals(true, (new RobotsTxt('https://www.google.com/search/about'))->validate());
        $this->assertEquals(false, (new RobotsTxt('https://www.google.com/sdch'))->validate());
        $this->assertEquals(false, (new RobotsTxt('https://www.google.com/ebooks/'))->validate());
        $this->assertEquals('https://www.google.com/', (new RobotsTxt('https://www.google.com/search/about'))->getHomepageUrl());
    }
}
