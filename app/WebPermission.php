<?php

namespace App;

use App\Traits\HasParentModel;
use App\Traits\SpatiePermission;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class WebPermission extends SpatiePermissionModel
{
    use HasParentModel;
    use SpatiePermission;

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
