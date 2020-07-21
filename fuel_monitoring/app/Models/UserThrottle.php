<?php

namespace App\Models;

use Cartalyst\Sentinel\Throttling\EloquentThrottle;

class UserThrottle extends EloquentThrottle
{
    protected $table = 'user_throttle';
}
