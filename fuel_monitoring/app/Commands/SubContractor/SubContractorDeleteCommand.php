<?php

namespace App\Commands\SubContractor;

use App\Models\SubContractor;
use App\Repositories\SubContractor\SubContractorDeleteRepository;
use Core\Usecase\SubContractor\SubContractorDelete;

class SubContractorDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new SubContractorDelete(new SubContractorDeleteRepository);

        $usecase->handle($this->id);
    }
}
