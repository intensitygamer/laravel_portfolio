<?php

namespace Core\Exception;

class UserNotExists extends Exception
{
    public $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }
}