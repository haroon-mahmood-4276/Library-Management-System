<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'email' => 'admin@lms.com',
                'passowrd' => Hash::make('123456'),
                'first_name' => 'Haroon',
                'last_name' => 'Mahmood',
                'user_role' => 'Admin',
            ],
            [
                'email' => 'user@lms.com',
                'passowrd' => Hash::make('123456'),
                'first_name' => 'Haroon',
                'last_name' => 'Mahmood',
                'user_role' => 'User',
            ]
        ]);
    }
}
