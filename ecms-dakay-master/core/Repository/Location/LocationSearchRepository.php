<?php

namespace Core\Repository\Location;

interface LocationSearchRepository
{
    public function get_locations(array $filters, $page, $per_page) : array;
}