<?php

namespace Core\Exception;

class UserSuspended extends Exception
{
    public $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }
}