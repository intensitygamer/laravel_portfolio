<?php

namespace App\Models;

use Cartalyst\Sentinel\Activations\EloquentActivation;

class UserActivation extends EloquentActivation
{
    protected $table = 'user_activations';
}
