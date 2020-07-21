<?php

namespace Core\Exception;

class ReportsException extends Exception
{
    public $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
    }
}