<?php

use App\ApiRole;
use App\User;
use App\WebRole;
use Illuminate\Database\Seeder;

class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin user

        $admin_users = [
            [
              'name' => 'administrator',
              'email' => 'admin@laravelapibase.test',
              'password' => bcrypt('admin123'),
              'verified' => true,
            ],
        ];

        if (!empty($admin_users)) {
            foreach ($admin_users as $admin_user) {

                $email = $admin_user['email'];

                $admin = User::whereEmail($email)->first();

                if (!$admin) {

                    //create user

                    $user = User::create($admin_user);

                    if ($user) {

                        //attach administrator role for web and api guard

                        $api_role = ApiRole::firstByName('administrator');

                        if ($api_role) {
                            $user->assignRole($api_role);
                        }

                        $web_role = WebRole::firstByName('administrator');

                        if ($web_role) {
                            $user->assignRole();
                        }

                    }
                }
            }
        }
    }
}
