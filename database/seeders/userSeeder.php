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
        // admin
        User::create([
            'full_name' => 'Mujiyono admin disini',
            'username' => 'admin',
            'email' => 'ndapu2401@gmail.com',
            'phone_number' => '081234567890',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // librarian
        User::create([
            'full_name' => 'Rusmono librarian disini',
            'username' => 'librarian',
            'email' => 'yoruoura@gmail.com',
            'phone_number' => '081234567891',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'librarian',
        ]);

        // user
        User::create([
            'full_name' => 'Bagyo user pertama disini',
            'username' => 'user',
            'email' => 'upskiel@gmail.com',
            'phone_number' => '081234567892',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Ujang User kedua disini',
            'username' => 'user1',
            'email' => 'naufal.juliant47@smk.belajar.id',
            'phone_number' => '081234567893',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
