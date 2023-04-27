<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name'=> 'Alex Kurniawan',
            'IdForAdmin'=>'AK001',
            'role' => 'admin',
            'email'=>'admin123@gmail.com',
            'password'=>'adminAlex',
            'phone'=>'081234567891',
        ]);

        DB::table('penggunas')->insert([
            'name'=> 'User1',
            'email'=>'user123@gmail.com',
            'password'=>'user123',
            'phone'=>'081234567891',
        ]);
    }
}
