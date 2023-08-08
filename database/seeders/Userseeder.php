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
            'username' => 'Admin',
            'name' => 'Abdul wahab',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1111'),
            'role' => 'admin',
        ]);
    }
}
