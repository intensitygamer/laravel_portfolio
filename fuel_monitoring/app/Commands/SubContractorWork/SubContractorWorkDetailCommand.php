<?php

namespace App\Commands\SubContractorWork;

use App\Repositories\SubContractorWork\SubContractorWorkRepository;
use App\Transformers\SubContractorWorkTransformer;
use Core\Usecase\SubContractorWork\SubContractorWorkDetail;

class SubContractorWorkDetailCommand
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new SubContractorWorkDetail(new SubContractorWorkRepository);

        $subcontractorwork = $usecase->handle($this->id);

        $transformer = new SubContractorWorkTransformer;

        return $transformer->transform_item($subcontractorwork);
    }
}