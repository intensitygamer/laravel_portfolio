<?php

namespace App\Commands\SubContractorWork;

use App\Repositories\SubContractorWork\SubContractorWorkRepository;
use Core\Usecase\SubContractorWork\SubContractorWorkCreator;
use Illuminate\Http\Request;

class SubContractorWorkCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new SubContractorWorkCreator(new SubContractorWorkRepository);

        $subcontractor = $creator->handle($data);

        return $subcontractor;
    }
}
