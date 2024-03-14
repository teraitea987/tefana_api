<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default user
        $usersData = [
            'firstname' => "Teraitea",
            'lastname' => "Tarihaa",
            'email' => "teraitea.tarihaa@gmail.com",
            'email_verified_at' => NULL,
            'password' => Hash::make("password"),
            'remember_token' => ""
        ];
        
        DB::table('users')->insert($usersData);
    }
}
