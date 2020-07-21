<?php

namespace Core\Repository\Lubricant;

use Illuminate\Http\Request;

interface LubricantRepository
{

    public function get_lubricants(array $filters, $page, $per_page) : array;
    public function get_pe_lubricants(array $filters) : array;
    public function store_lubricant(array $lubricant) : array;
    public function get_type_of_oil_list_by_key_id();
    public function get_lubricant_by_id($lubricant_id);
    public function get_all_lubricants();
    public function update_lubricant($lubricant_id, Request $data) : array;

}