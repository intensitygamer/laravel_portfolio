<?php

namespace Core\Exception;

class ValidationException extends \Exception
{
    private $errors;

    private $validator;

    public function __construct($validator)
    {
        $this->validator = $validator;

        $this->errors = $validator->instance()->errors()->all();
    }

    public function get_errors()
    {
        return $this->errors;
    }

    public function validator()
    {
        return $this->validator->instance();
    }
}