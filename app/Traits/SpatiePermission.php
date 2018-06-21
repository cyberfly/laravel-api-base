<?php

namespace App\Traits;

trait SpatiePermission
{
    //find permission / role exist for specific guard

    public static function firstByName($name)
    {
        return (new static)::whereName($name)->whereGuardName(self::$guard_name)->first();
    }
}