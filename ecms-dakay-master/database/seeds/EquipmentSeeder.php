<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('equipments')->truncate();

        $equipments = [
            ['id' => 1,
                'created_user_id' => 2,
                'equipment_code' => 'MT-01',
                'equipment_date' => \Carbon\Carbon::now(),
                'equipment_description' => 'Mixer Truck',
                'equipment_make' => 'Isuzu',
                'equipment_model' => 'CXZ19J',
                'for_hauling' => 'yes',
                'capacity' => '5.5 Cu.m',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['id' => 2,
                'created_user_id' => 2,
                'equipment_code' => 'CBH-01',
                'equipment_date' => \Carbon\Carbon::now(),
                'equipment_description' => 'Backhoe, Crawler Mini',
                'equipment_make' => 'Komatsu',
                'equipment_model' => 'PC 75UU-2',
                'for_hauling' => 'yes',
                'capacity' => '0.40 Cu.M',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['id' => 3,
                'created_user_id' => 2,
                'equipment_code' => 'CT-03',
                'equipment_date' => \Carbon\Carbon::now(),
                'equipment_description' => 'Cargo Truck w/ 3.0 ton cap.',
                'equipment_make' => 'Isuzu',
                'equipment_model' => 'CXM19V',
                'for_hauling' => 'yes',
                'capacity' => '25 Tons',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],

        ];

        \DB::table('equipments')->insert($equipments);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
