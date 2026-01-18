<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\book_category;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Biografi',
            'Pendidikan',
            'Kamus',
            'Komputer',
            'Hobi',
            'Kesehatan',
            'Kuliner',
            'Olahraga',
            'Religi',
            'Sejarah',
            'Teknologi',
            'Travel',
        ];

        foreach ($categories as $category) {
            book_category::create([
                'category_name' => $category,
            ]);
        }
    }
}
