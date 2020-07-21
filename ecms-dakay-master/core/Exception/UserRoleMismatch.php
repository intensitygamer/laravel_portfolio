<?php

namespace Core\Exception;

class UserRoleMismatch extends Exception
{
    public function __construct($errors)
    {
        $this->errors = $errors;
    }
}