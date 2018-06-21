<?php

namespace App\Traits;

trait ApiGuardScope
{
    public static function bootApiGuardScope()
    {
        static::addGlobalScope(function ($query) {
            $query->where('guard_name', self::$guard_name);
        });
    }
}