<?php

namespace Core\Domain\Contract;

interface ValidatorContract
{
    public function add_input($key, $value);
    public function add_rule($key, $rules);
    public function is_valid() : bool;
    public function errors() : array;
}