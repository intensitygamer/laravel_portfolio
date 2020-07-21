<?php

namespace App\Helpers;

use App\Models;
use App\Helpers\CountryHelper;
use App\Repositories;

use Core\Domain\Entity\User as UserEntity;
use Core\Object\SerialNumber;

class InputHelper
{

    public static function user_gender()
    {
        return [
            'male' => 'Male',
            'female' => 'Female'
        ];
    }

    public static function user_status()
    {
        return [
            'active' => 'Active',
            'closed' => 'Closed',
            'suspended' => 'Suspended',
        ];
    }

    public static function user_roles()
    {
        return [
            'godlike' => 'Godlike',
            'monitoring-clerk' => 'Monitoring Clerk',
            'sub-con-clerk' => 'Sub Contructor Clerk',
            'guest' => 'Guest',
        ];
    }

    public static function user_roles_id_key()
    {
        return [
            2 => 'Godlike',
            3 => 'Monitoring Clerk',
            4 => 'Sub Contructor Clerk',
            5 => 'Guest',
        ];
    }

    public static function calculate_percentage($cal1, $cal2)
    {
       return bcmul(($cal2 / $cal1), 100, 0);
    }

    public static function equipment_list()
    {
        return (new Repositories\Equipment\EquipmentRepository)->get_equipments_list_by_key_id();
    }

    public static function location_list()
    {

        return (new Repositories\Location\LocationRepository)->get_locations_list_by_key_id();
    }

    public static function lubricant_type_of_oil_list()
    {

        return (new Repositories\Lubricant\LubricantRepository)->get_type_of_oil_list_by_key_id();
    }

    public static function operator_list()
    {
        return (new Repositories\Operator\OperatorRepository)->get_operators_list_by_key_id();
    }

    public static function project_list()
    {
        return (new Repositories\Project\ProjectRepository)->get_projects_list_by_key_id();
    }

    public static function subcontractor_list()
    {
        return (new Repositories\SubContractor\SubContractorRepository)->get_subcontractors_list_by_key_id();
    }

    public static function permission_groups()
    {
        $permissions = [];

        foreach ((new \Permission)->permissions() as $permission)
        {
            $permission_group = $permission['group'];

            if (! isset($permissions[$permission_group]))
                $permissions[$permission_group] = [];

            $permissions[$permission_group][] = $permission;
        }

        return $permissions;
    }
}
