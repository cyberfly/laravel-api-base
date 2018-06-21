<?php

namespace App\Traits;

trait WebGuardScope
{
    public static function bootWebGuardScope()
    {
        static::addGlobalScope(function ($query) {
            $query->where('guard_name', self::$guard_name);
        });
    }
}