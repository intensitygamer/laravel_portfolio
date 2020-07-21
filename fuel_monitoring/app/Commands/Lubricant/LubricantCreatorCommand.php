<?php

namespace App\Commands\Lubricant;

use App\Repositories\Lubricant\LubricantRepository;
use Core\Usecase\Lubricant\LubricantCreator;
use Illuminate\Http\Request;

class LubricantCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new LubricantCreator(new LubricantRepository);

        $lubricant = $creator->handle($data);

        return $lubricant;
    }
}
