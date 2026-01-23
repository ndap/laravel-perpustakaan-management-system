<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\book;

class bookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        book::create([
            'image' => 'laskar-pelangi.jpg',
            'title' => 'Laskar Pelangi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2005,
            'synopsis' => 'Novel ini mengisahkan kehidupan 10 anak dari keluarga miskin yang bersekolah di SD Muhammadiyah di Belitung. Mereka menghadapi berbagai tantangan namun tetap semangat mengejar mimpi.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'bumi-manusia.jpg',
            'title' => 'Bumi Manusia',
            'author' => 'Pramoedya Ananta Toer',
            'publisher' => 'Hasta Mitra',
            'publication_year' => 1980,
            'synopsis' => 'Novel pertama dalam tetralogi Buru yang mengisahkan perjalanan hidup Minke, seorang pribumi muda yang terpelajar di masa kolonial Belanda.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'perahu-kertas.jpg',
            'title' => 'Perahu Kertas',
            'author' => 'Dee Lestari',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2009,
            'synopsis' => 'Mengisahkan tentang Kugy dan Keenan yang memiliki mimpi besar. Keduanya bertemu dalam perjalanan yang penuh inspirasi dan cinta.',
            'stock' => 2,
        ]);

        book::create([
            'image' => 'sang-pemimpi.jpg',
            'title' => 'Sang Pemimpi',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2006,
            'synopsis' => 'Sekuel dari Laskar Pelangi yang menceritakan perjuangan Ikal dan Arai untuk mewujudkan mimpi mereka melanjutkan pendidikan ke luar negeri.',
            'stock' => 4,
        ]);

        book::create([
            'image' => 'ayat-ayat-cinta.jpg',
            'title' => 'Ayat-Ayat Cinta',
            'author' => 'Habiburrahman El Shirazy',
            'publisher' => 'Republika',
            'publication_year' => 2004,
            'synopsis' => 'Novel yang mengisahkan perjalanan cinta seorang mahasiswa Indonesia bernama Fahri yang tengah menempuh pendidikan di Universitas Al Azhar, Kairo.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'negeri-5-menara.jpg',
            'title' => 'Negeri 5 Menara',
            'author' => 'Ahmad Fuadi',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2009,
            'synopsis' => 'Novel inspiratif tentang kehidupan di pondok pesantren Madani yang mengajarkan pentingnya mimpi, doa, dan ikhtiar.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'ronggeng-dukuh-paruk.jpg',
            'title' => 'Ronggeng Dukuh Paruk',
            'author' => 'Ahmad Tohari',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 1982,
            'synopsis' => 'Trilogi pertama yang mengisahkan kehidupan Srintil, seorang ronggeng dari Dukuh Paruk yang nasibnya diombang-ambingkan oleh tradisi dan politik.',
            'stock' => 2,
        ]);

        book::create([
            'image' => 'cantik-itu-luka.jpg',
            'title' => 'Cantik Itu Luka',
            'author' => 'Eka Kurniawan',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2002,
            'synopsis' => 'Novel yang menggabungkan realisme magis dengan sejarah Indonesia, mengisahkan kehidupan Dewi Ayu dan keturunannya yang penuh dengan tragedi.',
            'stock' => 4,
        ]);

        book::create([
            'image' => 'edensor.jpg',
            'title' => 'Edensor',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2007,
            'synopsis' => 'Bagian ketiga dari tetralogi Laskar Pelangi yang menceritakan petualangan Ikal di Eropa dalam mengejar impiannya.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'tenggelamnya-kapal-van-der-wijck.jpg',
            'title' => 'Tenggelamnya Kapal Van Der Wijck',
            'author' => 'HAMKA',
            'publisher' => 'Bulan Bintang',
            'publication_year' => 1938,
            'synopsis' => 'Novel klasik yang mengisahkan kisah cinta tragis antara Zainuddin dan Hayati yang terhalang oleh perbedaan status sosial dan adat istiadat Minangkabau.',
            'stock' => 2,
        ]);
    }
}
