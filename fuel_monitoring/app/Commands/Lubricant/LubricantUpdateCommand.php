<?php

namespace App\Commands\Lubricant;

use Illuminate\Http\Request;
use App\Repositories\Lubricant\LubricantRepository;
use Core\Usecase\Lubricant\LubricantUpdate;

class LubricantUpdateCommand
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
        $usecase = new LubricantUpdate(new LubricantRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
