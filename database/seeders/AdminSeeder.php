<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name' => 'root',
            'email' => 'root123@hotmail.com',
            'password' => bcrypt(123),
            'authority' => '1',
            'status' => '1',
        ]);
    }
}
