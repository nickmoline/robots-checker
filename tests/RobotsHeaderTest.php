<?php

namespace NickMoline\Robots\Test;

use PHPUnit_Framework_TestCase;
use NickMoline\Robots\RobotsHeader;
use Curl\CaseInsensitiveArray;

class RobotsHeaderTest extends PHPUnit_Framework_TestCase
{
    private $blockedHeader;
    private $allowedHeader;
    private $noHeader;
    private $specificHeader;

    public function setUp()
    {
        $noHeaders = new CaseInsensitiveArray(["Content-Type" => "text/html"]);
        $this->noHeader = new RobotsHeader("http://www.example.com/ambiguous");
        $this->noHeader->setResponseHeaders($noHeaders)->setFetched();

        $blockedHeaders = new CaseInsensitiveArray(["Content-Type" => "text/html"]);
        $blockedHeaders['X-Robots-Tag'] = "noindex, nofollow";
        $this->blockedHeader = new RobotsHeader("http://www.example.com/blocked");
        $this->blockedHeader->setResponseHeaders($blockedHeaders)->setFetched();

        $allowedHeaders = new CaseInsensitiveArray(["Content-Type" => "text/html"]);
        $allowedHeaders['X-Robots-Tag'] = "index, follow";
        $this->allowedHeader = new RobotsHeader("http://www.example.com/allowed");
        $this->allowedHeader->setResponseHeaders($allowedHeaders)->setFetched();

        $specificHeaders = new CaseInsensitiveArray(["Content-Type" => "text/html"]);
        $specificHeaders['X-Robots-Tag'] = "index, follow\nGooglebot: noindex, nofollow";

        $this->specificHeader = new RobotsHeader("http://www.example.com/blockgoogle");
        $this->specificHeader->setResponseHeaders($specificHeaders)->setFetched();
    }

    /**
     * Test that if no X-Robots-Tag header is present, the url is shown as allowed
     * @return [type] [description]
     */
    public function testNoHeader()
    {
        $this->assertTrue($this->noHeader->validate());
    }

    public function testAllowedHeader()
    {
        $this->assertTrue($this->allowedHeader->validate());
    }

    public function testBlockedHeader()
    {
        $this->assertFalse($this->blockedHeader->validate());
    }

    public function testSpecificHeaderGooglebot()
    {
        $this->assertFalse($this->specificHeader->validate());
    }

    public function testSpecificHeaderBingbot()
    {
        $this->assertTrue($this->specificHeader->validate("bingbot"));
    }
}
