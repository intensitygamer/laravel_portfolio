<?php

namespace App\Commands\SubContractor;

use Illuminate\Http\Request;
use App\Repositories\SubContractor\SubContractorUpdateRepository;
use Core\Usecase\SubContractor\SubContractorUpdate;

class SubContractorUpdateCommand
{
    private $id;
    private $data;
    protected $request;

    public function __construct($id, Request $request)
    {
        $this->id = $id;
        $this->data = $request->all();
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new SubContractorUpdate(new SubContractorUpdateRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
