<?php

namespace nickmoline\RobotsChecker;

class RobotsAll extends Robots
{
    private $robotsTxt;
    private $robotsStatus;
    private $robotsHeader;
    private $robotsMeta;

    private $allowedTxt = null;
    private $allowedStatus = null;
    private $allowedHeader = null;
    private $allowedMeta = null;

    public function validate($userAgent = "Googlebot")
    {
        $this->robotsTxt = RobotsTxt::createFromExisting($this);
        $this->allowedTxt = $this->robotsTxt->validate($userAgent);

        $this->robotsStatus = RobotsStatus::createFromExisting($this);
        $this->allowedStatus = $this->robotsStatus->validate($userAgent);

        $this->robotsHeader = RobotsHeader::createFromExisting($this->robotsStatus);
        $this->allowedHeader = $this->robotsHeader->validate($userAgent);

        // $this->robotsMeta = RobotsMeta::createFromExisting($this->robotsStatus);
        // $this->allowedMeta = $this->robotsMeta->validate($userAgent);

        if ($this->allowedStatus === false) {
            $this->setDenied(
                $this->robotsStatus->getReason(),
                $this->robotsStatus->getLabel()
            );
        }
        if ($this->allowedHeader === false) {
            $this->setDenied(
                $this->robotsHeader->getReason(),
                $this->robotsHeader->getLabel()
            );
        }
        if ($this->allowedMeta === false) {
            $this->setDenied(
                $this->robotsMeta->getReason(),
                $this->robotsMeta->getLabel()
            );
        }
        if ($this->allowedTxt === false) {
            $this->setDenied(
                $this->robotsTxt->getReason(),
                $this->robotsTxt->getLabel()
            );
        }
    }
}
