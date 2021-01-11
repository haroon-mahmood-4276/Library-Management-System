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
        DB::table('racks')->insert([
            [
                'name' => 'A1',
            ],
            [
                'name' => 'A2',
            ],
            [
                'name' => 'A3',
            ],
            [
                'name' => 'A4',
            ],
            [
                'name' => 'A5',
            ],
            [
                'name' => 'B1',
            ],
            [
                'name' => 'B2',
            ],
            [
                'name' => 'B3',
            ],
            [
                'name' => 'B4',
            ],
            [
                'name' => 'B5',
            ]
        ]);
    }
}
