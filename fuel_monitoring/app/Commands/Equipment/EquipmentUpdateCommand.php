<?php

namespace App\Commands\Equipment;

use Illuminate\Http\Request;
use App\Repositories\Equipment\EquipmentUpdateRepository;
use Core\Usecase\Equipment\EquipmentUpdate;

class EquipmentUpdateCommand
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
        $usecase = new EquipmentUpdate(new EquipmentUpdateRepository);

        return $usecase->handle($this->id, $this->request);
    }
}
