<?php

namespace Core\Repository\Location;

interface LocationRepository
{
    public function get_locations();
    public function get_location_by_id($location_id);
    public function save_location(array $location);
    public function update_location($location_id, array $location);
    public function delete_location($location_id);

}