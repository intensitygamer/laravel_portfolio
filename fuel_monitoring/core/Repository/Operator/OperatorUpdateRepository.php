<?php

namespace Core\Repository\Operator;

use Illuminate\Http\Request;

interface OperatorUpdateRepository
{
    public function update_operator($operator, Request $data) : array;
}
