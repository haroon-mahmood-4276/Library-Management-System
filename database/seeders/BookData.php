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
        DB::table('lms_books')->insert([
            [
                'Book_RackID' => '1',
                'Book_ID' => 'Book1',
                'Book_Title' => 'XYZ',
                'Book_Author' => 'Me',
                'Book_PublisheYear' => '2020',
            ],
            [
                'Book_RackID' => '2',
                'Book_ID' => 'Book2',
                'Book_Title' => 'XYZ',
                'Book_Author' => 'Me',
                'Book_PublisheYear' => '2020',
            ],
            [
                'Book_RackID' => '6',
                'Book_ID' => 'Book3',
                'Book_Title' => 'XYZ',
                'Book_Author' => 'Me',
                'Book_PublisheYear' => '2020',
            ],
        ]);
    }
}
