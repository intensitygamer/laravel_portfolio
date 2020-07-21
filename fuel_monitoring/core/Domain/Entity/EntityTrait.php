<?php

namespace Core\Domain\Entity;

trait EntityTrait
{
    public function get_properties()
    {
        return get_object_vars($this);
    }

    public function set_properties(array $properties)
    {
        foreach ($properties as $property => $value)
        {
            if (property_exists($this, $property))
                $this->{$property} = $value;
        }
    }
}