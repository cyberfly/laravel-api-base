<?php

use App\ApiRole;
use App\WebRole;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles

        $roles = [
            [
                'name' => 'administrator',
                'display_name' => 'MDEC',
                'description' => 'MDEC',
                'guards' => [
                    'web',
                    'api',
                ],
            ],
        ];

        if (!empty($roles)) {

            foreach ($roles as $role) {

                $role = collect($role);
                $role_name = $role['name'];

                $role_guards = $role['guards'];

                if (!empty($role_guards)) {
                    foreach ($role_guards as $role_guard) {

                        if ($role_guard=='api') {

                            $role = ApiRole::findByName($role_name);

                            if (!$role) {
                                $role = ApiRole::create($role->except('guards')->all());
                            }
                        }
                        else if ($role_guard=='web') {

                            $role = WebRole::findByName($role_name);

                            if (!$role) {
                                $role = WebRole::create($role->except('guards')->all());
                            }
                        }

                    }
                }

            }
        }
    }
}
