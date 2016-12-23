<?php

namespace nickmoline\RobotsChecker;

class RobotsMeta extends RobotsStatus
{
    public static function createFromExisting(Robots $existing, Robots $robots = null)
    {
        if (!$robots) {
            $robots = new RobotsMeta();
        }

        $robots = RobotsStatus::createFromExisting($existing, $robots);

        return $robots;
    }

    public function validate($userAgent = "Googlebot")
    {
    }
}
