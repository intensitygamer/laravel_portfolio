<?php

namespace App\Commands\Equipment;

use App\Repositories\Equipment\EquipmentRegistryRepository;
use Core\Usecase\Equipment\EquipmentCreator;
use Illuminate\Http\Request;

class EquipmentCreatorCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $data = $this->request;

        $creator = new EquipmentCreator(new EquipmentRegistryRepository);

        $location = $creator->handle($data);

        return $location;
    }
}
