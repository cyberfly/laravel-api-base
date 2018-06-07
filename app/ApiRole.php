<?php

namespace App;

use Spatie\Permission\Models\Role as SpatieRoleModel;

class ApiRole extends SpatieRoleModel
{
    protected $guard_name = 'api';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
