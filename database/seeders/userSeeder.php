<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'full_name' => 'dafa',
            'username' => 'dafa',
            'email' => 'ndapu2401@gmail.com',
            'phone_number' => '089682949101',
            'address' => 'Jl. User No. 1',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'admin',
            'username' => 'admin',
            'email' => 'upskiel@gmail.com',
            'phone_number' => '089682949102',
            'address' => 'Jl. Admin No. 1',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
