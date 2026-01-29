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
            ['name' => 'Fiksi', 'icon' => 'fa-wand-magic-sparkles'],
            ['name' => 'Non-Fiksi', 'icon' => 'fa-book-open'],
            ['name' => 'Biografi', 'icon' => 'fa-user-tie'],
            ['name' => 'Pendidikan', 'icon' => 'fa-graduation-cap'],
            ['name' => 'Kamus', 'icon' => 'fa-language'],
            ['name' => 'Komputer', 'icon' => 'fa-laptop-code'],
            ['name' => 'Hobi', 'icon' => 'fa-palette'],
            ['name' => 'Kesehatan', 'icon' => 'fa-heart-pulse'],
            ['name' => 'Kuliner', 'icon' => 'fa-utensils'],
            ['name' => 'Olahraga', 'icon' => 'fa-dumbbell'],
            ['name' => 'Religi', 'icon' => 'fa-hands-praying'],
            ['name' => 'Sejarah', 'icon' => 'fa-landmark'],
            ['name' => 'Teknologi', 'icon' => 'fa-microchip'],
            ['name' => 'Travel', 'icon' => 'fa-plane-departure'],
            ['name' => 'Bisnis', 'icon' => 'fa-briefcase'],
            ['name' => 'Sains', 'icon' => 'fa-flask'],
            ['name' => 'Psikologi', 'icon' => 'fa-brain'],
            ['name' => 'Hukum', 'icon' => 'fa-scale-balanced'],
            ['name' => 'Musik', 'icon' => 'fa-music'],
            ['name' => 'Komik', 'icon' => 'fa-mask'],
        ];

        foreach ($categories as $category) {
            book_category::create([
                'category_name' => $category['name'],
                'icon' => $category['icon'],
            ]);
        }
    }
}
