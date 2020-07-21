<?php

use Illuminate\Database\Seeder;

use \Sentinel as S;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('user_roles')->truncate();

        S::getRoleRepository()->setModel('App\Models\Role');

        foreach ((new \Permission)->permissions('sysadmin') as $p){
            $sysadmin[$p['id']] = true;
        }

        foreach ((new \Permission)->permissions('godlike') as $p){
            $godlike[$p['id']] = true;
        }

        foreach ((new \Permission)->permissions('monitoring-clerk') as $p){
            $monitoringclerk[$p['id']] = true;
        }

        foreach ((new \Permission)->permissions('sub-con-clerk') as $p){
            $subconclerk[$p['id']] = true;
        }

        foreach ((new \Permission)->permissions('guest') as $p){
            $guest[$p['id']] = true;
        }

        $role = S::getRoleRepository()->createModel()->create([
            'id' => 1,
            'name' => 'sysadmin',
            'slug' => 'sysadmin',

            'permissions' => $sysadmin
        ]);

        $role = S::getRoleRepository()->createModel()->create([
            'id' => 2,
            'name' => 'godlike',
            'slug' => 'godlike',

            'permissions' => $godlike
        ]);

        $role = S::getRoleRepository()->createModel()->create([
            'id' => 3,
            'name' => 'monitoring-clerk',
            'slug' => 'monitoring-clerk',

            'permissions' => $monitoringclerk
        ]);

        $role = S::getRoleRepository()->createModel()->create([
            'id' => 4,
            'name' => 'sub-con-clerk',
            'slug' => 'sub-con-clerk',

            'permissions' => $subconclerk
        ]);

        $role = S::getRoleRepository()->createModel()->create([
            'id' => 5,
            'name' => 'guest',
            'slug' => 'guest',

            'permissions' => $guest
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
