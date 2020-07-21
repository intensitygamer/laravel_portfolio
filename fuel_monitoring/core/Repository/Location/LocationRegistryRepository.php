<?php

namespace Core\Repository\Location;

interface LocationRegistryRepository
{
    public function create_location(array $location) : array;
}