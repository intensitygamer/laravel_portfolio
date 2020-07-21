<?php

namespace Core\Repository\Fuel;

use Illuminate\Http\Request;

interface FuelRepository
{

    public function get_fuels(array $filters, $page, $per_page) : array;
    public function get_pe_fuels(array $filters) : array;
    public function store_fuel(array $fuel) : array;
    public function get_fuel_by_id($fuel_id);
    public function get_all_fuels();
    public function update_fuel($fuel_id, Request $data) : array;

    public function delete_fuel($fuel_id);

}