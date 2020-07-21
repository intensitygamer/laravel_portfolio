<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(OperatorSeeder::class);
        $this->call(EquipmentSeeder::class);
        $this->call(TypeOfOilsSeederSeeder::class);
        $this->call(MonitoringSeeder::class);
        $this->call(SubContractorSeeder::class);
    }
}
