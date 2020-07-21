<?php

namespace App\Generators;

class ContactNumber
{
    public $number;
    public $country_code;

    public function __construct($contact_number = null)
    {
        if (strrpos($contact_number, '.') === false)
        {
            $this->number = $contact_number;
        }
        else
        {
            $this->number = substr($contact_number, strpos($contact_number, '.') + 1);

            list ($this->country_code) = explode('.', $contact_number);
        }
    }

    public function __toString()
    {
        return sprintf('%s.%s', $this->country_code, $this->number);
    }
}