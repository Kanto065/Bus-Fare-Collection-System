<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id' => 'A-101',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01732570221',
            'password' => '1234',
        ]);
    }
}
