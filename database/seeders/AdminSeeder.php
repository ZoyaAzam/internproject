<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('Admins')->insert([
            'name' => 'Admin',
            'email' => 'admin1122@gmail.com',
            'password' => Hash::make('maya1122'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'auth_token' => null,
        ]);
    }
}
