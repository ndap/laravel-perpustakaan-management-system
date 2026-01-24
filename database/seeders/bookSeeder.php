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

        book::create([
            'image' => 'dilan-1990.jpg',
            'title' => 'Dilan: Dia adalah Dilanku Tahun 1990',
            'author' => 'Pidi Baiq',
            'publisher' => 'Pastel Books',
            'publication_year' => 2014,
            'synopsis' => 'Kisah cinta remaja yang bikin baper antara Dilan, panglima tempur geng motor di Bandung, dengan Milea, siswa baru dari Jakarta.',
            'stock' => 10,
        ]);

        book::create([
            'image' => 'laut-bercerita.jpg',
            'title' => 'Laut Bercerita',
            'author' => 'Leila S. Chudori',
            'publisher' => 'Kepustakaan Populer Gramedia',
            'publication_year' => 2017,
            'synopsis' => 'Novel historical fiction yang mengangkat tragedi penghilangan paksa aktivis mahasiswa pada masa reformasi 1998 dari sudut pandang korban dan keluarga yang ditinggalkan.',
            'stock' => 4,
        ]);

        book::create([
            'image' => 'gadis-kretek.jpg',
            'title' => 'Gadis Kretek',
            'author' => 'Ratih Kumala',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2012,
            'synopsis' => 'Menguak sejarah industri kretek di Indonesia lewat pencarian sosok misterius bernama Jeng Yah oleh tiga anak Pak Soeraja yang sedang sekarat.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'hujan.jpg',
            'title' => 'Hujan',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2016,
            'synopsis' => 'Berlatar dunia masa depan, menceritakan persahabatan dan cinta antara Lail dan Esok yang tumbuh setelah bencana letusan gunung purba.',
            'stock' => 7,
        ]);

        book::create([
            'image' => '5-cm.jpg',
            'title' => '5 cm',
            'author' => 'Donny Dhirgantoro',
            'publisher' => 'Grasindo',
            'publication_year' => 2005,
            'synopsis' => 'Kisah lima sahabat yang memutuskan berpisah sementara (tiga bulan) lalu bertemu kembali untuk mendaki puncak Mahameru tepat pada tanggal 17 Agustus.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'saman.jpg',
            'title' => 'Saman',
            'author' => 'Ayu Utami',
            'publisher' => 'Kepustakaan Populer Gramedia',
            'publication_year' => 1998,
            'synopsis' => 'Novel pemenang sayembara DKJ yang mendobrak tabu sastra, mengisahkan Saman, mantan pastur yang menjadi buronan politik di era Orde Baru.',
            'stock' => 2,
        ]);

        book::create([
            'image' => 'filosofi-kopi.jpg',
            'title' => 'Filosofi Kopi',
            'author' => 'Dee Lestari',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2006,
            'synopsis' => 'Kumpulan cerita pendek tentang Ben dan Jody yang membangun kedai kopi idealis, serta kisah-kisah lain tentang pencarian makna hidup.',
            'stock' => 6,
        ]);

        book::create([
            'image' => 'aroma-karsa.jpg',
            'title' => 'Aroma Karsa',
            'author' => 'Dee Lestari',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2018,
            'synopsis' => 'Petualangan Jati Wesi, si Hidung Tikus, dalam memburu tanaman mitos Puspa Karsa yang konon bisa mengendalikan kehendak manusia.',
            'stock' => 4,
        ]);

        book::create([
            'image' => 'supernova-kpbj.jpg',
            'title' => 'Supernova: Ksatria, Putri, dan Bintang Jatuh',
            'author' => 'Dee Lestari',
            'publisher' => 'Truedee Books',
            'publication_year' => 2001,
            'synopsis' => 'Novel debut fenomenal yang menggabungkan sains, filsafat, dan kisah cinta segitiga antara Dimas, Reuben, Rana, dan Ferre.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'raden-mandasia.jpg',
            'title' => 'Raden Mandasia Si Pencuri Daging Sapi',
            'author' => 'Yusi Avianto Pareanom',
            'publisher' => 'Banana',
            'publication_year' => 2016,
            'synopsis' => 'Kisah dongeng modern yang absurd dan kocak tentang petualangan Sungu Lembu dan Raden Mandasia menuju Kerajaan Gerbang Agung.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'pulang-leila.jpg',
            'title' => 'Pulang',
            'author' => 'Leila S. Chudori',
            'publisher' => 'Kepustakaan Populer Gramedia',
            'publication_year' => 2012,
            'synopsis' => 'Kisah para eksil politik Indonesia yang terdampar di Paris setelah peristiwa 1965 dan kerinduan mereka akan tanah air.',
            'stock' => 2,
        ]);

        book::create([
            'image' => 'bumi-tere-liye.jpg',
            'title' => 'Bumi',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2014,
            'synopsis' => 'Awal mula petualangan Raib, Seli, dan Ali menjelajahi dunia paralel. Novel fantasi remaja yang sangat populer.',
            'stock' => 15,
        ]);

        book::create([
            'image' => 'bulan.jpg',
            'title' => 'Bulan',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2015,
            'synopsis' => 'Sekuel dari Bumi. Raib, Seli, dan Ali diundang ke Klan Matahari untuk mencari bunga matahari pertama yang mekar.',
            'stock' => 12,
        ]);

        book::create([
            'image' => 'negeri-para-bedebah.jpg',
            'title' => 'Negeri Para Bedebah',
            'author' => 'Tere Liye',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2012,
            'synopsis' => 'Thriller ekonomi-politik tentang Thomas, seorang konsultan keuangan yang berusaha menyelamatkan bank pamannya dari likuidasi.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'seperti-dendam.jpg',
            'title' => 'Seperti Dendam, Rindu Harus Dibayar Tuntas',
            'author' => 'Eka Kurniawan',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2014,
            'synopsis' => 'Kisah Ajo Kawir, jagoan yang impoten, dan perjalanan hidupnya yang keras di jalur pantura. Penuh satire dan aksi.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'lelaki-harimau.jpg',
            'title' => 'Lelaki Harimau',
            'author' => 'Eka Kurniawan',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2004,
            'synopsis' => 'Novel realisme magis tentang pembunuhan di sebuah kota kecil pesisir dan misteri siluman harimau yang menyelimutinya.',
            'stock' => 2,
        ]);

        book::create([
            'image' => 'critical-eleven.jpg',
            'title' => 'Critical Eleven',
            'author' => 'Ika Natassa',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2015,
            'synopsis' => 'Drama rumah tangga Ale dan Anya yang retak setelah kehilangan anak mereka, diceritakan dengan gaya urban yang khas.',
            'stock' => 7,
        ]);

        book::create([
            'image' => 'antologi-rasa.jpg',
            'title' => 'Antologi Rasa',
            'author' => 'Ika Natassa',
            'publisher' => 'Gramedia Pustaka Utama',
            'publication_year' => 2011,
            'synopsis' => 'Kisah persahabatan jadi cinta yang rumit antara Keara, Harris, dan Ruly, berlatar kehidupan profesional muda Jakarta.',
            'stock' => 6,
        ]);

        book::create([
            'image' => 'garis-waktu.jpg',
            'title' => 'Garis Waktu',
            'author' => 'Fiersa Besari',
            'publisher' => 'Media Kita',
            'publication_year' => 2016,
            'synopsis' => 'Kumpulan pemikiran dan prosa tentang perjalanan menghapus luka. Formatnya unik seperti kronologi waktu.',
            'stock' => 9,
        ]);

        book::create([
            'image' => 'konspirasi-alam-semesta.jpg',
            'title' => 'Konspirasi Alam Semesta',
            'author' => 'Fiersa Besari',
            'publisher' => 'Media Kita',
            'publication_year' => 2017,
            'synopsis' => 'Novel yang memadukan naskah dan musik (albuk), menceritakan kisah cinta Juang dan Ana yang terpisah jarak.',
            'stock' => 5,
        ]);

        book::create([
            'image' => 'nkcthi.jpg',
            'title' => 'Nanti Kita Cerita Tentang Hari Ini',
            'author' => 'Marchella FP',
            'publisher' => 'KPG',
            'publication_year' => 2018,
            'synopsis' => 'Buku visual grafis yang berisi pesan-pesan pendek menyentuh hati dari seorang ibu kepada masa depan anaknya.',
            'stock' => 8,
        ]);

        book::create([
            'image' => 'orang-orang-biasa.jpg',
            'title' => 'Orang-Orang Biasa',
            'author' => 'Andrea Hirata',
            'publisher' => 'Bentang Pustaka',
            'publication_year' => 2019,
            'synopsis' => 'Kisah sekelompok orang "kalah" yang merencanakan perampokan bank amatir demi biaya kuliah anak teman mereka. Lucu dan mengharukan.',
            'stock' => 4,
        ]);

        book::create([
            'image' => 'bidadari-bidadari-surga.jpg',
            'title' => 'Bidadari-Bidadari Surga',
            'author' => 'Tere Liye',
            'publisher' => 'Republika',
            'publication_year' => 2008,
            'synopsis' => 'Pengorbanan Kak Laisa, kakak tertua yang fisik nya kurang sempurna tapi mendedikasikan hidupnya untuk keberhasilan adik-adiknya.',
            'stock' => 3,
        ]);

        book::create([
            'image' => 'sabtu-bersama-bapak.jpg',
            'title' => 'Sabtu Bersama Bapak',
            'author' => 'Adhitya Mulya',
            'publisher' => 'Gagas Media',
            'publication_year' => 2014,
            'synopsis' => 'Tentang seorang bapak yang meninggalkan rekaman video untuk kedua anaknya agar tetap bisa membimbing mereka meski ia sudah tiada.',
            'stock' => 6,
        ]);

        book::create([
            'image' => 'koala-kumal.jpg',
            'title' => 'Koala Kumal',
            'author' => 'Raditya Dika',
            'publisher' => 'Gagas Media',
            'publication_year' => 2015,
            'synopsis' => 'Kumpulan cerita komedi tentang patah hati dan perubahan, khas gaya bercerita Raditya Dika yang absurd.',
            'stock' => 10,
        ]);

        book::create([
            'image' => 'rentang-kisah.jpg',
            'title' => 'Rentang Kisah',
            'author' => 'Gita Savitri Devi',
            'publisher' => 'Gagas Media',
            'publication_year' => 2017,
            'synopsis' => 'Kumpulan cerita pengalaman Gita Savitri selama kuliah di Jerman, menemukan tujuan hidup dan keyakinan.',
            'stock' => 5,
        ]);
    }
}
