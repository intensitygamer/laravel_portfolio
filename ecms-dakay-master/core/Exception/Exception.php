<?php

namespace Core\Exception;

abstract class Exception extends \Exception
{
    private $errors;

    private $validator;

    public function __construct($validator = null)
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