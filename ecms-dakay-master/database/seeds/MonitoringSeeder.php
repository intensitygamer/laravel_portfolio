<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');

        \DB::table('monitoring')->truncate();

            $monitoring = [
                ['id' => 1,
                'code' => 'FS',
                'name' => 'Fuel Stock',
                'value' => '0'
                ],
                ['id' => 2,
                    'code' => 'FU',
                    'name' => 'Fuel Use',
                    'value' => '0'
                ],
                ['id' => 3,
                    'code' => 'LEOS',
                    'name' => 'Lubricant Engine Oil (15W40) Stock',
                    'value' => '0'
                ],
                ['id' => 4,
                    'code' => 'LEOU',
                    'name' => 'Lubricant Engine Oil (15W40) Use',
                    'value' => '0'
                ],
                ['id' => 5,
                    'code' => 'LHOS',
                    'name' => 'Lubricant Hydraulic Oil (AW100) Stock',
                    'value' => '0'
                ],
                ['id' => 6,
                    'code' => 'LHOU',
                    'name' => 'Lubricant Hydraulic Oil (AW100) Use',
                    'value' => '0'
                ],
                ['id' => 7,
                    'code' => 'LGOS',
                    'name' => 'Lubricant Gear Oil Stock',
                    'value' => '0'
                ],
                ['id' => 8,
                    'code' => 'LGOU',
                    'name' => 'Lubricant Gear Oil Use',
                    'value' => '0'
                ],
                ['id' => 9,
                    'code' => 'LTS',
                    'name' => 'Lubricant Telluse Stock',
                    'value' => '0'
                ],
                ['id' => 10,
                    'code' => 'LTU',
                    'name' => 'Lubricant Telluse Use',
                    'value' => '0'
                ],
            ];

        \DB::table('monitoring')->insert($monitoring);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
