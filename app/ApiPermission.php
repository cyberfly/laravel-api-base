<?php

namespace App;

use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class ApiPermission extends SpatiePermissionModel
{
    protected $guard_name = 'api';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
