<?php

namespace NickMoline\Robots;

use NickMoline\Robots\Base as RobotsBase;

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

    public function validate()
    {
    }
}
