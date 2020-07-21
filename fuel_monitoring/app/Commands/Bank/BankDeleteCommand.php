<?php

namespace App\Commands\Bank;

use App\Repositories\BankDeleteRepository;
use App\Repositories\BankUpdateRepository;
use Core\Usecase\Bank\BankDelete;
use Core\Usecase\Bank\BankUpdate;
use Illuminate\Http\Request;

class BankDeleteCommand
{
    private $id;
    private $data;
    protected $request;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new BankDelete(
            new BankDeleteRepository
        );

        $usecase->handle($this->id);
    }
}
