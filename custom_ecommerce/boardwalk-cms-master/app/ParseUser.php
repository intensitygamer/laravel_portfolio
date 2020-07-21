<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ParseUser extends Eloquent
{
	protected $table = '_User';
	protected $connection = 'mongodb';
}
