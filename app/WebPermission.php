<?php

namespace App;

use App\Traits\HasParentModel;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class WebPermission extends SpatiePermissionModel
{
    use HasParentModel;

    protected $table = 'permissions';
    protected $guard_name = 'web';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
