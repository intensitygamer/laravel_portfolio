<?php

namespace Core;

/**
 * will be replaced soon with core\domain\contract\validator contract
 */
class Validator
{
	protected $validator_instance;
	protected $input;
    protected $rules;
    protected $errors;

    public function setup(array $input)
    {
        $this->input = $input;
        $this->rules = [];
    }

    public function add_rule($key, $rules)
    {
        if (! isset($this->rules[$key]))
            $this->rules[$key] = [];

        if (is_array($rules))
            $this->rules[$key] = array_merge($this->rules[$key], $rules);
        else
            $this->rules[$key][] = $rules;
    }

    public function is_valid()
    {
        $this->validator_instance = \Validator::make($this->input, $this->rules);

        if ($this->validator_instance->fails())
        {
            $this->errors = $this->validator_instance->errors()->all();

            return false;
        }

        return true;
    }

    public function instance()
    {
    	return $this->validator_instance;
    }

    public function add_input($key, $value)
    {
        $this->input[$key] = $value;
    }

    public function get_input($key)
    {
        return isset($this->input[$key]) ? $this->input[$key] : null;
    }

    public function get_rules()
    {
        return $this->rules;
    }

    public function get_errors()
    {
        return $this->errors;
    }

}