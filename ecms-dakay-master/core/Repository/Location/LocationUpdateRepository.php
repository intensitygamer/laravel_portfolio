<?php

namespace Core\Repository\Location;

use Illuminate\Http\Request;

interface LocationUpdateRepository
{
    public function update_location($location, Request $data) : array;
}
