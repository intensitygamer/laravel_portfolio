<?php

namespace App\Commands\Bank;

use App\Repositories\BankRegisterRepository;
use Core\Usecase\Bank\BankCreator;
use Illuminate\Http\Request;

class BankCreatorCommand
{
    protected $request;
    protected $settings;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new BankCreator(new BankRegisterRepository);

        $bank = $creator->handle($data);

        return $bank;
    }
}
