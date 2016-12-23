<?php

namespace NickMoline\Robots;

class RobotsMeta extends RobotsStatus
{
    public static function createFromExisting(RobotsBase $existing, RobotsBase $robots = null)
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
