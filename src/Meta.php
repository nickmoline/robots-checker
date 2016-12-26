<?php

namespace NickMoline\Robots;

use NickMoline\Robots\Base as RobotsBase;

class Meta extends RobotsStatus
{
    public static function createFromExisting(RobotsBase $existing, RobotsBase $robots = null)
    {
        if (!$robots) {
            $robots = new Meta();
        }

        $robots = Status::createFromExisting($existing, $robots);

        return $robots;
    }

    public function validate()
    {
    }
}
