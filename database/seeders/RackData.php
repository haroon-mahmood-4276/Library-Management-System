<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RackData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lms_racks')->insert([
            [
                'Rack_Name' => 'A1',
            ],
            [
                'Rack_Name' => 'A2',
            ],
            [
                'Rack_Name' => 'A3',
            ],
            [
                'Rack_Name' => 'A4',
            ],
            [
                'Rack_Name' => 'A5',
            ],
            [
                'Rack_Name' => 'B1',
            ],
            [
                'Rack_Name' => 'B2',
            ],
            [
                'Rack_Name' => 'B3',
            ],
            [
                'Rack_Name' => 'B4',
            ],
            [
                'Rack_Name' => 'B5',
            ]
        ]);
    }
}
