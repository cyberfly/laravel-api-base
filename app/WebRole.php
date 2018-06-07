<?php

namespace App;

use Spatie\Permission\Models\Role as SpatieRoleModel;

class WebRole extends SpatieRoleModel
{
    protected $guard_name = 'web';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
