<?php

namespace App\Commands\SubContractor;

use App\Repositories\SubContractor\SubContractorRegistryRepository;
use Core\Usecase\SubContractor\SubContractorCreator;
use Illuminate\Http\Request;

class SubContractorCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new SubContractorCreator(new SubContractorRegistryRepository);

        $location = $creator->handle($data);

        return $location;
    }
}
