<?php

namespace App\Models;

use Cartalyst\Sentinel\Persistences\EloquentPersistence;

class UserPersistence extends EloquentPersistence
{
    protected $table = 'user_persistences';
}
