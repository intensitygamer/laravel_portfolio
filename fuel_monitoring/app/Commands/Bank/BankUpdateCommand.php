<?php

namespace App\Commands\Bank;

use App\Repositories\BankUpdateRepository;
use Core\Usecase\Bank\BankUpdate;
use Illuminate\Http\Request;

class BankUpdateCommand
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
        $usecase = new BankUpdate(
            new BankUpdateRepository
        );

        return $usecase->handle($this->id, $this->request);
    }
}
