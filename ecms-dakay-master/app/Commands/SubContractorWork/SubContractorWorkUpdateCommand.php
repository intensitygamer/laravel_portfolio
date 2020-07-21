<?php

namespace App\Commands\SubContractorWork;

use Illuminate\Http\Request;
use App\Repositories\SubContractorWork\SubContractorWorkRepository;
use Core\Usecase\SubContractorWork\SubContractorWorkUpdate;

class SubContractorWorkUpdateCommand
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
        $usecase = new SubContractorWorkUpdate(new SubContractorWorkRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
