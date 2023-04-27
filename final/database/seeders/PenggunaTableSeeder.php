<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenggunaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penggunas')->insert([
            'name'=> 'Alex Kurniawan',
            'email'=>'admin123@gmail.com',
            'password'=>'admin Alex',
            'phone'=>'081234567891',
        ]);
    }
}
