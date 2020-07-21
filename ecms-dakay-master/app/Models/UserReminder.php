<?php

namespace App\Models;

use Cartalyst\Sentinel\Reminders\EloquentReminder;

class UserReminder extends EloquentReminder
{
    protected $table = 'user_reminders';
}
