<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SubContractorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('subcontractors')->truncate();

        $subcontractors = [
            ['id' => 1,
                'created_user_id' => 2,
                'name' => 'Subcon 1',
                'address' => 'Cebu 1',
                'contact_1' => '987654321',
                'contact_2' => '123456789',
                'website' => 'http://none.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['id' => 2,
                'created_user_id' => 2,
                'name' => 'Cebu 2',
                'address' => 'Address 2',
                'contact_1' => '987654321-2',
                'contact_2' => '123456789-2',
                'website' => 'http://none2.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],
            ['id' => 3,
                'created_user_id' => 2,
                'name' => 'Cebu 3',
                'address' => 'Address 3',
                'contact_1' => '987654321-3',
                'contact_2' => '123456789-3',
                'website' => 'http://none3.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()],

        ];

        \DB::table('subcontractors')->insert($subcontractors);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
