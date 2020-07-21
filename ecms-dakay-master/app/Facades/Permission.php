<?php

namespace App\Facades;

use Auth;

class Permission
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function can_view_admin_dashboard()
    {
        return $this->user->hasAccess('dashboard.admin.view');
    }

    public function can_view_user_dashboard()
    {
        return $this->user->hasAccess('dashboard.user.view');
    }

    public function can_view_managements()
    {
        return $this->user->hasAccess('view.managements');
    }

    /**
     * @param string @locations
     * @return array
     */
    public function can_manage_users_list()
    {
        return $this->user->hasAccess('manage.users.list');
    }
    public function can_manage_users_create()
    {
        return $this->user->hasAccess('manage.users.create');
    }
    public function can_manage_users_update()
    {
        return $this->user->hasAccess('manage.users.update');
    }

    /**
     * @param string @locations
     * @return array
     */
    public function can_manage_location_list()
    {
        return $this->user->hasAccess('manage.locations.list');
    }

    public function can_manage_location_create()
    {
        return $this->user->hasAccess('manage.locations.create');
    }

    public function can_manage_location_update()
    {
        return $this->user->hasAccess('manage.locations.update');
    }

    public function can_manage_location_delete()
    {
        return $this->user->hasAccess('manage.locations.delete');
    }

    /**
     * @param string @operator
     * @return array
     */
    public function can_manage_operator_list()
    {
        return $this->user->hasAccess('manage.operator.list');
    }

    public function can_manage_operator_create()
    {
        return $this->user->hasAccess('manage.operator.create');
    }

    public function can_manage_operator_update()
    {
        return $this->user->hasAccess('manage.operator.update');
    }

    public function can_manage_operator_delete()
    {
        return $this->user->hasAccess('manage.operator.delete');
    }

    /**
     * @param string @@equipment
     * @return array
     */
    public function can_manage_equipment_list()
    {
        return $this->user->hasAccess('manage.equipment.list');
    }

    public function can_manage_equipment_create()
    {
        return $this->user->hasAccess('manage.equipment.create');
    }

    public function can_manage_equipment_update()
    {
        return $this->user->hasAccess('manage.equipment.update');
    }

    public function can_manage_equipment_delete()
    {
        return $this->user->hasAccess('manage.equipment.delete');
    }

    /**
     * @param string @@subcontractor
     * @return array
     */
    public function can_manage_subcontractor_list()
    {
        return $this->user->hasAccess('manage.subcontractor.list');
    }

    public function can_manage_subcontractor_create()
    {
        return $this->user->hasAccess('manage.subcontractor.create');
    }

    public function can_manage_subcontractor_update()
    {
        return $this->user->hasAccess('manage.subcontractor.update');
    }

    public function can_manage_subcontractor_delete()
    {
        return $this->user->hasAccess('manage.subcontractor.delete');
    }

    /**
     * @param string $permissions settings
     * @return array
     */
    public function permissions($role = 'sysadmin')
    {
        $permissions = array_where($this->available_permissions(), function($key, $value) use ($role) {
            if (in_array($role, $key['roles']))
                return $key;
        });

        return $permissions;
    }

    private function available_permissions()
    {
        return [

            /*
            * Admin/User Dashboard (Permissions)
            */
            ['id' => 'dashboard.admin.view', 'desc' => 'view admin dashboard', 'roles' => ['sysadmin'], 'group' => 'dashboard'],
            ['id' => 'dashboard.user.view', 'desc' => 'view user dashboard', 'roles' => ['godlike','monitoring-clerk','sub-con-clerk','guest'], 'group' => 'dashboard'],

            /*
            * Managements (Permissions)
            */
            ['id' => 'view.managements', 'desc' => 'view managements', 'roles' => ['godlike','sysadmin'], 'group' => 'managements'],

            /*
            * Manage Users (Permissions)
            */
            ['id' => 'manage.users.list', 'desc' => 'manage users', 'roles' => ['godlike','sysadmin'], 'group' => 'manage users'],
            ['id' => 'manage.users.create', 'desc' => 'manage users', 'roles' => ['godlike','sysadmin'], 'group' => 'manage users'],
            ['id' => 'manage.users.update', 'desc' => 'manage users', 'roles' => ['godlike','sysadmin'], 'group' => 'manage users'],

            /*
             * Manage Locations (Permissions)
             */
            ['id' => 'manage.locations.list', 'desc' => 'view list locations', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage locations'],
            ['id' => 'manage.locations.create', 'desc' => 'create location', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage locations'],
            ['id' => 'manage.locations.update', 'desc' => 'update location', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage locations'],
            ['id' => 'manage.locations.delete', 'desc' => 'delete location', 'roles' => ['sysadmin'], 'group' => 'manage locations'],

            /*
             * Manage Operator (Permissions)
             */
            ['id' => 'manage.operator.list', 'desc' => 'view list operator', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage operator'],
            ['id' => 'manage.operator.create', 'desc' => 'create operator', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage operator'],
            ['id' => 'manage.operator.update', 'desc' => 'update operator', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage operator'],
            ['id' => 'manage.operator.delete', 'desc' => 'delete operator', 'roles' => ['sysadmin'], 'group' => 'manage operator'],

            /*
             * Manage Equipment (Permissions)
             */
            ['id' => 'manage.equipment.list', 'desc' => 'view list equipment', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage equipment'],
            ['id' => 'manage.equipment.create', 'desc' => 'create equipment', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage equipment'],
            ['id' => 'manage.equipment.update', 'desc' => 'update equipment', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage equipment'],
            ['id' => 'manage.equipment.delete', 'desc' => 'delete equipment', 'roles' => ['sysadmin'], 'group' => 'manage equipment'],

            /*
             * Manage Subcontractor (Permissions)
             */
            ['id' => 'manage.subcontractor.list', 'desc' => 'view list subcontractor', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage subcontractor'],
            ['id' => 'manage.subcontractor.create', 'desc' => 'create subcontractor', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage subcontractor'],
            ['id' => 'manage.subcontractor.update', 'desc' => 'update subcontractor', 'roles' => ['godlike','sysadmin', 'monitoring-clerk','sub-con-clerk','guest'], 'group' => 'manage subcontractor'],
            ['id' => 'manage.subcontractor.delete', 'desc' => 'delete subcontractor', 'roles' => ['sysadmin'], 'group' => 'manage subcontractor'],
        ];
    }

    /**
     * EveryTime you add permissions
     * : please run : php artisan db:seed --class=UserRoleSeeder
     */
}
