<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Perpustakaan Digital Modern - Jelajahi koleksi buku digital dan lakukan peminjaman online dengan mudah">
    <title>BukuHub - Perpustakaan Digital Modern</title>
    
    <!-- Tailwind CSS CDN with Custom Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        forest: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                            950: '#052e16',
                        },
                        primary: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
                        },
                    },
                }
            }
        }
    </script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body class="bg-white text-gray-900">

    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="shrink-0">
                    <a href="#beranda" class="text-2xl font-bold text-primary-800">
                        📚 BukuHub
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-primary-700 font-medium transition-colors">Beranda</a>
                    <a href="#koleksi-buku" class="text-gray-700 hover:text-primary-700 font-medium transition-colors">Koleksi Buku</a>
                    <a href="#cara-peminjaman" class="text-gray-700 hover:text-primary-700 font-medium transition-colors">Cara Peminjaman</a>
                    <a href="#tentang" class="text-gray-700 hover:text-primary-700 font-medium transition-colors">Tentang</a>
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="text-primary-700 hover:text-primary-800 font-semibold transition-colors">Login</a>
                        <a href="{{ route('register') }}" class="bg-primary-700 hover:bg-primary-800 text-white px-6 py-2.5 rounded-lg font-semibold transition-all shadow-sm hover:shadow-md">Daftar</a>
                    </div>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-btn" class="text-gray-700 hover:text-primary-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-4 space-y-3">
                <a href="#beranda" class="block text-gray-700 hover:text-primary-700 font-medium py-2">Beranda</a>
                <a href="#koleksi-buku" class="block text-gray-700 hover:text-primary-700 font-medium py-2">Koleksi Buku</a>
                <a href="#cara-peminjaman" class="block text-gray-700 hover:text-primary-700 font-medium py-2">Cara Peminjaman</a>
                <a href="#tentang" class="block text-gray-700 hover:text-primary-700 font-medium py-2">Tentang</a>
                <hr class="my-3">
                <a href="{{ route('login') }}" class="block text-primary-700 font-semibold py-2">Login</a>
                <a href="{{ route('register') }}" class="block bg-primary-700 text-white text-center px-6 py-2.5 rounded-lg font-semibold">Daftar</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="pt-32 pb-20 hero-gradient">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center animate-on-scroll">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    Perpustakaan Digital Modern untuk Generasi Digital
                </h1>
                <p class="text-lg md:text-xl text-green-50 mb-10 max-w-2xl mx-auto">
                    Akses ribuan buku digital, pinjam buku online dengan mudah, dan kelola riwayat peminjaman Anda dalam satu platform yang terorganisir.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#koleksi-buku" data-cta="explore" class="btn-primary bg-white text-primary-800 px-8 py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                        Jelajahi Koleksi
                    </a>
                    <a href="{{ route('register') }}" class="btn-primary bg-primary-800 border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all">
                        Pinjam Buku Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="tentang" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Platform perpustakaan digital yang dirancang untuk memberikan pengalaman terbaik</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm animate-on-scroll">
                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Peminjaman Online</h3>
                    <p class="text-gray-600">Pinjam buku kapan saja, di mana saja dengan sistem peminjaman online yang mudah dan cepat</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm animate-on-scroll">
                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Katalog Digital</h3>
                    <p class="text-gray-600">Ribuan judul buku dari berbagai kategori tersimpan dalam katalog digital yang terorganisir</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm animate-on-scroll">
                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pencarian & Filter</h3>
                    <p class="text-gray-600">Temukan buku yang Anda cari dengan fitur pencarian smart dan filter berdasarkan kategori</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-sm animate-on-scroll">
                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Riwayat Peminjaman</h3>
                    <p class="text-gray-600">Pantau riwayat peminjaman, status pengembalian, dan kelola aktivitas membaca Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Library App Preview Section -->
    <section id="koleksi-buku" class="py-20 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Koleksi Buku Terpopuler</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Jelajahi berbagai koleksi buku dari berbagai genre dan kategori</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- Book Card 1 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_1_1768631196917.png') }}" alt="The Art of Programming" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">The Art of Programming</h3>
                    <p class="text-gray-600 text-xs mb-2">Alex Chen</p>
                    <span class="status-badge bg-green-100 text-green-800">Tersedia</span>
                </div>
                
                <!-- Book Card 2 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_2_1768631211953.png') }}" alt="Digital Innovation" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">Digital Innovation</h3>
                    <p class="text-gray-600 text-xs mb-2">Alex Chen</p>
                    <span class="status-badge bg-green-100 text-green-800">Tersedia</span>
                </div>
                
                <!-- Book Card 3 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_3_1768631228428.png') }}" alt="The Psychology of Learning" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">The Psychology of Learning</h3>
                    <p class="text-gray-600 text-xs mb-2">Dr. Elara Vance</p>
                    <span class="status-badge bg-red-100 text-red-800">Dipinjam</span>
                </div>
                
                <!-- Book Card 4 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_4_1768631247573.png') }}" alt="Data Science Essentials" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">Data Science Essentials</h3>
                    <p class="text-gray-600 text-xs mb-2">A.R. Chen</p>
                    <span class="status-badge bg-green-100 text-green-800">Tersedia</span>
                </div>
                
                <!-- Book Card 5 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_5_1768631263100.png') }}" alt="Creative Writing Workshop" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">Creative Writing Workshop</h3>
                    <p class="text-gray-600 text-xs mb-2">Literary Guide</p>
                    <span class="status-badge bg-green-100 text-green-800">Tersedia</span>
                </div>
                
                <!-- Book Card 6 -->
                <div class="book-card animate-on-scroll">
                    <div class="book-cover-frame aspect-2/3 mb-3">
                        <img src="{{ asset('images/books/book_cover_6_1768631279021.png') }}" alt="Business Strategy" class="w-full h-full object-cover">
                    </div>
                    <h3 class="font-bold text-gray-900 text-sm mb-1 line-clamp-2">Business Strategy</h3>
                    <p class="text-gray-600 text-xs mb-2">Alexander Chen</p>
                    <span class="status-badge bg-green-100 text-green-800">Tersedia</span>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="btn-primary inline-block bg-primary-700 hover:bg-primary-800 text-white px-8 py-3 rounded-lg font-semibold text-lg shadow-md hover:shadow-lg transition-all">
                    Lihat Semua Koleksi
                </a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-peminjaman" class="py-20 bg-linear-to-br from-primary-50 to-green-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Cara Kerja</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Empat langkah mudah untuk memulai peminjaman buku</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="step-card text-center animate-on-scroll">
                    <div class="step-number bg-primary-700 text-white mx-auto mb-6">
                        1
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Daftar Akun</h3>
                        <p class="text-gray-600">Buat akun gratis dengan email Anda dan lengkapi profil</p>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="step-card text-center animate-on-scroll">
                    <div class="step-number bg-primary-700 text-white mx-auto mb-6">
                        2
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Cari Buku</h3>
                        <p class="text-gray-600">Jelajahi katalog dan temukan buku favorit Anda</p>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div class="step-card text-center animate-on-scroll">
                    <div class="step-number bg-primary-700 text-white mx-auto mb-6">
                        3
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Pinjam Buku</h3>
                        <p class="text-gray-600">Klik tombol pinjam dan konfirmasi peminjaman</p>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="step-card text-center animate-on-scroll">
                    <div class="step-number bg-primary-700 text-white mx-auto mb-6">
                        4
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm">
                        <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Baca & Kembalikan</h3>
                        <p class="text-gray-600">Nikmati bacaan dan kembalikan sesuai jadwal</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-primary-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center animate-on-scroll">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Memulai Perjalanan Membaca Anda?</h2>
                <p class="text-lg text-green-100 mb-8">Bergabunglah dengan ribuan pengguna yang telah mempercayai BukuHub sebagai perpustakaan digital mereka</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('register') }}" class="btn-primary bg-white text-primary-900 px-8 py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all">
                        Daftar Sekarang Gratis
                    </a>
                    <a href="#koleksi-buku" class="btn-primary border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all">
                        Lihat Koleksi
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- About -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">📚 BukuHub</h3>
                    <p class="text-sm text-gray-400">Platform perpustakaan digital modern yang memudahkan Anda mengakses dan meminjam buku secara online. Membaca lebih mudah, lebih terorganisir.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#beranda" class="hover:text-primary-400 transition-colors">Beranda</a></li>
                        <li><a href="#koleksi-buku" class="hover:text-primary-400 transition-colors">Koleksi Buku</a></li>
                        <li><a href="#cara-peminjaman" class="hover:text-primary-400 transition-colors">Cara Peminjaman</a></li>
                        <li><a href="#tentang" class="hover:text-primary-400 transition-colors">Tentang Kami</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-white text-lg font-bold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            info@bukuhub.id
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            +62 812-3456-7890
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 pt-8 text-center">
                <p class="text-sm text-gray-400">&copy; 2026 BukuHub. All rights reserved. Built with ❤️ for book lovers.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>