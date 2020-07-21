<?php

namespace Core\Domain\Entity;

use Core\Domain\Contract;
use Core\Domain\Entity\EntityTrait;

class User implements Contract\UserEntityContract
{
    use EntityTrait;

    const ROLE_SYSADMIN = 'sysadmin';
    const ROLE_GODLIKE = 'godlike';
    const ROLE_MONITORING_CLERK = 'monitoring-clerk';
    const ROLE_SUB_CON_CLERK = 'sub-con-clerk';
    const ROLE_GUEST = 'guest';

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    const STATUS_ACTIVE = 'active';
    const STATUS_SUSPENDED = 'suspended';
    const STATUS_CLOSED = 'closed';

    public $email;
    public $username;
    public $password;

    public $name;
    public $first_name;
    public $last_name;
    public $address;
    public $gender;
    public $contact_number;
    public $designation;
    public $dob;

    public $status;

    public $roles = [];
    public $permissions = [];

    public $last_login;
    public $last_login_ip;
    public $login_agent;

    public function hash_password()
    {
        return bcypt($this->password);
    }

    public static function available_roles()
    {
        return [self::ROLE_SYSADMIN, self::ROLE_GODLIKE, self::ROLE_MONITORING_CLERK, self::ROLE_SUB_CON_CLERK, self::ROLE_GUEST];
    }

    public static function available_genders()
    {
        return [self::GENDER_MALE, self::GENDER_FEMALE];
    }

    public static function available_status()
    {
        return [
            self::STATUS_ACTIVE, self::STATUS_SUSPENDED, self::STATUS_CLOSED
        ];
    }
}
