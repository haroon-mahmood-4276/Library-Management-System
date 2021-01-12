<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'rack_id' => '1',
                'title' => 'XYZ',
                'author' => 'Me',
                'published_year' => '2020',
            ],
            [
                'rack_id' => '2',
                'title' => 'XYZ',
                'author' => 'Me',
                'published_year' => '2020',
            ],
            [
                'rack_id' => '6',
                'title' => 'XYZ',
                'author' => 'Me',
                'published_year' => '2020',
            ],
        ]);
    }
}
