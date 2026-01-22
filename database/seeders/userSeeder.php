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
        // Admin
        User::create([
            'full_name' => 'Administrator System',
            'username' => 'admin',
            'email' => 'admin@perpustakaan.com',
            'phone_number' => '081234567890',
            'address' => 'Jl. Sudirman No. 123, Jakarta',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Librarian
        User::create([
            'full_name' => 'Siti Nurhaliza',
            'username' => 'siti.librarian',
            'email' => 'siti@perpustakaan.com',
            'phone_number' => '081234567891',
            'address' => 'Jl. Gatot Subroto No. 45, Bandung',
            'password' => Hash::make('password'),
            'role' => 'librarian',
        ]);

        // Regular Users
        User::create([
            'full_name' => 'Budi Santoso',
            'username' => 'budi.santoso',
            'email' => 'budi.santoso@gmail.com',
            'phone_number' => '082345678901',
            'address' => 'Jl. Diponegoro No. 78, Surabaya',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Rina Wijaya',
            'username' => 'rina.wijaya',
            'email' => 'rina.wijaya@gmail.com',
            'phone_number' => '083456789012',
            'address' => 'Jl. Ahmad Yani No. 56, Semarang',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Agus Prasetyo',
            'username' => 'agus.prasetyo',
            'email' => 'agus.prasetyo@gmail.com',
            'phone_number' => '084567890123',
            'address' => 'Jl. Gajah Mada No. 34, Yogyakarta',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Dewi Lestari',
            'username' => 'dewi.lestari',
            'email' => 'dewi.lestari@gmail.com',
            'phone_number' => '085678901234',
            'address' => 'Jl. Thamrin No. 12, Medan',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Eko Wahyudi',
            'username' => 'eko.wahyudi',
            'email' => 'eko.wahyudi@gmail.com',
            'phone_number' => '086789012345',
            'address' => 'Jl. Malioboro No. 89, Yogyakarta',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Fitri Amelia',
            'username' => 'fitri.amelia',
            'email' => 'fitri.amelia@gmail.com',
            'phone_number' => '087890123456',
            'address' => 'Jl. Asia Afrika No. 67, Bandung',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Hadi Susanto',
            'username' => 'hadi.susanto',
            'email' => 'hadi.susanto@gmail.com',
            'phone_number' => '088901234567',
            'address' => 'Jl. Pahlawan No. 23, Surabaya',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        User::create([
            'full_name' => 'Indah Permata',
            'username' => 'indah.permata',
            'email' => 'indah.permata@gmail.com',
            'phone_number' => '089012345678',
            'address' => 'Jl. Merdeka No. 45, Makassar',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}
