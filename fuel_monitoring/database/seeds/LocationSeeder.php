<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('locations')->truncate();

            $locations = [
                ['id' => 1, 'name' => 'Sogod',
                    'location_date' => Carbon::now(),
                    'address' => 'n/a',
                    'contact_person' => 'n/a',
                    'created_user_id' => 2,
                    'phone_no' => '1234567890',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ['id' => 2, 'name' => 'HNU',
                    'location_date' => Carbon::now(),
                    'address' => 'n/a',
                    'contact_person' => 'n/a',
                    'created_user_id' => 2,
                    'phone_no' => '1234567890',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ['id' => 3, 'name' => 'Alturas',
                    'location_date' => Carbon::now(),
                    'address' => 'n/a',
                    'contact_person' => 'n/a',
                    'created_user_id' => 2,
                    'phone_no' => '1234567890',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ['id' => 4, 'name' => 'Yard 3',
                    'location_date' => Carbon::now(),
                    'address' => 'n/a',
                    'contact_person' => 'n/a',
                    'created_user_id' => 2,
                    'phone_no' => '1234567890',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()],
                ['id' => 5, 'name' =>
                    'Baseline', 'location_date' => Carbon::now(),
                    'address' => 'n/a',
                    'contact_person' => 'n/a',
                    'created_user_id' => 2,
                    'phone_no' => '1234567890',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()]
            ];

        \DB::table('locations')->insert($locations);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
