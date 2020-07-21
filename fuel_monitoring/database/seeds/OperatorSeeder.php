<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('operators')->truncate();

            $operators = [
                ['id' => 1,
                    'created_user_id' => 2,
                    'name' => 'Amoren F.',
                    'alias' => 'Amoren',
                    'license_no' => '12',
                    'operator_date' => Carbon::now(),
                    'address' => 'n/a',
                    'phone_no' => '1234567890',
                    'driver_code' => 'G01-11-003947',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                ['id' => 2,
                    'created_user_id' => 2,
                    'name' => 'Labinoy N.',
                    'alias' => 'Labinoy',
                    'license_no' => '12',
                    'operator_date' => Carbon::now(),
                    'address' => 'n/a',
                    'phone_no' => '1234567890',
                    'driver_code' => 'G02-31-103946',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                ['id' => 3,
                    'created_user_id' => 2,
                    'name' => 'Montefalcon J.',
                    'alias' => 'Montefalcon',
                    'license_no' => '12',
                    'operator_date' => Carbon::now(),
                    'address' => 'n/a',
                    'phone_no' => '1234567890',
                    'driver_code' => 'F01-12-333948',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],

            ];

        \DB::table('operators')->insert($operators);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
