<?php

use Illuminate\Database\Seeder;

use App\Models;
use \Sentinel as S;

class UserSeeder extends Seeder
{
    public function run()
    {
        \Schema::disableForeignKeyConstraints();

        \DB::table('users')->truncate();

        $admin = S::registerAndActivate([
            'id' => 1,
            'first_name' => 'sysadmin',
            'last_name' => 'sysadmin',
            'email'    => 'sysadmin@gmail.com',
            'password' => 'qwe123',
            'username' => 'sysadmin',
            'designation' => 'Administrator',
            'status' => 'active',
        ]);

        $role = S::findRoleByName('sysadmin');
        $role->users()->attach($admin);

        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index)
        {
            $first_name = $faker->firstName;
            $last_name = $faker->lastName;
            $username = sprintf('dakay%d', $index);

            $users = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $faker->safeEmail,
                'password' => 'qwe123',
                'username' => $username,
                'status' => 'active',
            ];

            if($index == '1'|| $index == '2'){
                $role = S::findRoleByName('godlike');
                $users['designation'] = 'Godlike';
            } elseif($index == '3' || $index == '4'){
                $role = S::findRoleByName('monitoring-clerk');
                $users['designation'] = 'Monitoring Clerk';
            } elseif($index == '5' || $index == '6'){
                $role = S::findRoleByName('sub-con-clerk');
                $users['designation'] = 'Sub Contractor';
            } else{
                $role = S::findRoleByName('guest');
                $users['designation'] = 'Guest';
            }

            $new_user = S::registerAndActivate($users);

            $role->users()->attach($new_user);
        }

        \Schema::enableForeignKeyConstraints();
    }
}
