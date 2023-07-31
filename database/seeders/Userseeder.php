<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                //Admin
                'name' => 'Admin1',
                'username' => 'Admin1',
                'email' => 'admin@giki.com',
                'password' => bcrypt('1111'),
                'role' => 'Admin',
                'status' => 'active',
            ],

            [
                //User
                'name' => 'User',
                'username' => 'user5',
                'email' => 'user5@gmail.com',
                'password' => bcrypt('111'),
                'role' => 'User',
                'status' => 'active',
            ],

        ]);
    }
}
