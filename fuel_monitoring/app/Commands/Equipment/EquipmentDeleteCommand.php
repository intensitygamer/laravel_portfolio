<?php

namespace App\Commands\Equipment;

use App\Models\Equipment;
use App\Repositories\Equipment\EquipmentDeleteRepository;
use Core\Usecase\Equipment\EquipmentDelete;

class EquipmentDeleteCommand
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function execute()
    {
        $usecase = new EquipmentDelete(new EquipmentDeleteRepository);

        $usecase->handle($this->id);
    }
}
