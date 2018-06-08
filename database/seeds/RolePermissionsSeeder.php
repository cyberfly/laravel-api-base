<?php

use App\ApiPermission;
use App\ApiRole;
use App\WebPermission;
use App\WebRole;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create new permission and assign new permission to roles

        $permissions_data = [
            [
                'permission_name' => 'read-logviewer',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                ],
            ],
            [
                'permission_name' => 'read-passport',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                ],
            ],
            [
                'permission_name' => 'create-user',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'read-user',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'update-user',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'delete-user',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'create-role',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'read-role',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'update-role',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'delete-role',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'create-permission',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'read-permission',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'update-permission',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'permission_name' => 'delete-permission',
                'roles' => [
                    'administrator',
                ],
                'guards' => [
                    'web',
                    'api',
                ],
            ],
        ];

        if (!empty($permissions_data)) {
            foreach ($permissions_data as $permission_data) {

                $permission_name = $permission_data['permission_name'];
                $permission_guards = array_get($permission_data, 'guards', []);
                $roles = array_get($permission_data, 'roles', []);

                if (!empty($permission_guards)) {
                    foreach ($permission_guards as $permission_guard) {

                        if ($permission_guard == 'api') {
                            $permission = ApiPermission::firstByName($permission_name);
                        } else {
                            if ($permission_guard == 'web') {
                                $permission = WebPermission::firstByName($permission_name);
                            }
                        }

                        if ($permission) {

                            //assign permission to role

                            if (!empty($roles)) {
                                foreach ($roles as $role_name) {

                                    if ($permission_guard == 'api') {
                                        $role = ApiRole::firstByName($role_name);
                                    } else {
                                        if ($permission_guard == 'web') {
                                            $role = WebRole::firstByName($role_name);
                                        }
                                    }

                                    if ($role) {

                                        //assign permission to role

                                        $role_has_permission = $role->hasPermissionTo($permission);

                                        if (!$role_has_permission) {
                                            $role->givePermissionTo($permission);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
