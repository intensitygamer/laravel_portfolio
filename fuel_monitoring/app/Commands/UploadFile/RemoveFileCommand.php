<?php

namespace App\Commands\UploadFile;

use App\Models\EquipmentImage;
use Input;
use DB;

class RemoveFileCommand
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function execute()
    {
        $configPath = 'uploads/tmp/';

        \File::delete($configPath.$this->name);

        return $this->name;

    }

    public function executeStorage()
    {

        DB::beginTransaction();

        $equipment_image = EquipmentImage::where('file_url',$this->name)->forceDelete();

        if($equipment_image){
            $configPath = 'uploads/use/';
            \File::delete($configPath.$this->name);
        }

        DB::commit();

        return $this->name;

    }

}
