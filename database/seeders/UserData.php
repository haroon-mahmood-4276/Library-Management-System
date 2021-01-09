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
        DB::table('lms_users')->insert([
            [
                'User_Email' => 'admin@lms.com',
                'User_Password' => Hash::make('123456'),
                'User_FirstName' => 'Haroon',
                'User_LastName' => 'Mahmood',
                'User_Role' => 'Admin',
            ],
            [
                'User_Email' => 'user@lms.com',
                'User_Password' => Hash::make('123456'),
                'User_FirstName' => 'Haroon',
                'User_LastName' => 'Mahmood',
                'User_Role' => 'User',
            ]
        ]);
    }
}
