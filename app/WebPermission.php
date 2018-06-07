<?php

namespace App;

use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class WebPermission extends SpatiePermissionModel
{
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
