<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin Jun',
                'email' => 'admin@gmail.com',
                'phone' => '1234578',
                'nik' => '11122223',
                'gender' => 'male',
                'role' => 'admin',
                'password' => bcrypt(1234532345)
            ),
            array(
                'name' => 'User Hao',
                'email' => 'user@gmail.com',
                'phone' => '2349871',
                'nik' => '22334477',
                'gender' => 'male',
                'role' => 'user',
                'password' => bcrypt(33224411)
            ),
        ));
    }
}
