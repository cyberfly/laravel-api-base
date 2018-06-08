<?php

namespace App\Traits;

trait SpatiePermission
{
    //find permission / role exist for specific guard

    public function scopeFirstByName($query, $name)
    {
        return $query->whereName($name)->whereGuardName($this->guard_name)->first();
    }
}