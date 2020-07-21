<?php

namespace Core\Repository\SubContractorWork;

use Illuminate\Http\Request;

interface SubContractorWorkRepository
{

    public function get_subcontractor_works(array $filters, $page, $per_page) : array;
    public function get_pe_subcontractor_works(array $filters) : array;
    public function get_subcontractor_works_by_search_id(array $filters, $page, $per_page) : array;
    public function store_subcontractor_work(array $subcontractor_work) : array;
    public function get_subcontractor_work_by_id($subcontractor_work_id);
    public function get_all_subcontractor_works();
    public function update_subcontractor_work($subcontractor_work_id, Request $data) : array;
    
    // public function update_subcontractor_work_payment($subcontractor_work_payment_id, Request $data) : array;

}