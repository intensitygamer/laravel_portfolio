<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TypeOfOilsSeederSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('type_of_oils')->truncate();

            $type_of_oil = [
                ['id' => 1, 'name' => 'Engine Oil (15W40)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['id' => 2, 'name' => 'Hydraulic Oil (AW100)', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['id' => 3, 'name' => 'Gear Oil', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['id' => 4, 'name' => 'Telluse', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ];

        \DB::table('type_of_oils')->insert($type_of_oil);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
