<?php

namespace App\Commands\SubContractor;

use App\Repositories\SubContractor\SubContractorRepository;
use App\Transformers\SubContractorTransformer;
use Core\Usecase\SubContractor\SubContractorDetail;

class SubContractorDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new SubContractorDetail(new SubContractorRepository);

        $subcontractor = $usecase->handle($this->id);

        $transformer = new SubContractorTransformer;

        return $transformer->transform_item($subcontractor);
    }
}