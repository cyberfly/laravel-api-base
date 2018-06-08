<?php

use App\ApiPermission;
use App\WebPermission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create permissions

        $permissions = collect([
            [
                'name' => 'create-user',
                'display_name' => 'Create User',
                'description' => 'Create User',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'read-user',
                'display_name' => 'Read User',
                'description' => 'Read User',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'update-user',
                'display_name' => 'Update User',
                'description' => 'Update User',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'delete-user',
                'display_name' => 'Delete User',
                'description' => 'Delete User',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'create-role',
                'display_name' => 'Create Role',
                'description' => 'Create Role',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'read-role',
                'display_name' => 'Read Role',
                'description' => 'Read Role',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'update-role',
                'display_name' => 'Update Role',
                'description' => 'Update Role',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'delete-role',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'create-permission',
                'display_name' => 'Create Permission',
                'description' => 'Create Permission',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'read-permission',
                'display_name' => 'Read Permission',
                'description' => 'Read Permission',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'update-permission',
                'display_name' => 'Update Permission',
                'description' => 'Update Permission',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'delete-permission',
                'display_name' => 'Delete Permission',
                'description' => 'Delete Permission',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
            [
                'name' => 'read-logviewer',
                'display_name' => 'Read Log Viewer',
                'description' => 'Read Log Viewer',
                'guards' => [
                    'web',
                ],
            ],
            [
                'name' => 'read-passport',
                'display_name' => 'Read Passport Client',
                'description' => 'Read Passport Client',
                'guards' => [
                    'web',
                ],
            ],
        ]);

        if (!empty($permissions)) {
            foreach ($permissions as $permission) {

                $permission = collect($permission);

                $permission_name = $permission['name'];
                $permission_guards = $permission['guards'];

                if (!empty($permission_guards)) {
                    foreach ($permission_guards as $permission_guard) {

                        if ($permission_guard=='api') {

                            $api_permission = ApiPermission::firstByName($permission_name);

                            if (!$api_permission) {
                                $api_permission = ApiPermission::create($permission->except('guards')->all());
                            }

                        }
                        else if ($permission_guard=='web') {

                            $web_permission = WebPermission::firstByName($permission_name);

                            if (!$web_permission) {
                                $web_permission = WebPermission::create($permission->except('guards')->all());
                            }
                        }

                    }
                }
            }
        }
    }
}
