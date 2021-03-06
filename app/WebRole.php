<?php

namespace App;

use App\Traits\Filterable;
use App\Traits\HasParentModel;
use App\Traits\Resultable;
use App\Traits\SpatiePermission;
use App\Traits\WebGuardScope;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class WebRole extends SpatieRoleModel
{
    use HasParentModel;
    use SpatiePermission;
    use Filterable;
    use Resultable;
    use WebGuardScope;

    protected $table = 'roles';
    protected static $guard_name = 'web';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
}
