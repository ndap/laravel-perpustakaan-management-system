<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'BukuHub') }} - Perpustakaan Digital Modern</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    
    <!-- FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Tailwind CSS CDN -->
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
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        
        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-light {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #047857 0%, #10b981 50%, #34d399 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Hero Pattern */
        .hero-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-600 to-primary-800 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-xl transition-all duration-300 group-hover:scale-105">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold text-white">BukuHub</span>
                </a>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('guest.books') }}" class="text-white/90 hover:text-white font-medium transition-colors">Koleksi Buku</a>
                    <a href="#fitur" class="text-white/90 hover:text-white font-medium transition-colors">Fitur</a>
                    <a href="#tentang" class="text-white/90 hover:text-white font-medium transition-colors">Tentang</a>
                    <a href="#stats" class="text-white/90 hover:text-white font-medium transition-colors">Statistik</a>
                </div>
                
                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex px-5 py-2.5 text-white font-semibold rounded-full hover:bg-white/10 transition-all duration-300">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-2.5 bg-white text-primary-700 font-semibold rounded-full hover:bg-primary-50 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                        Daftar Gratis
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary-900 via-primary-800 to-forest-900 hero-pattern">
        <!-- Decorative Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-primary-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-forest-500/20 rounded-full blur-3xl animate-pulse-slow delay-200"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary-600/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-primary-200 text-sm font-medium mb-6 animate-fade-in-up">
                        <i class="fas fa-sparkles"></i>
                        <span>Perpustakaan Digital Terbaik</span>
                    </div>
                    
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up delay-100">
                        Jelajahi Dunia <br>
                        <span class="bg-gradient-to-r from-primary-300 via-emerald-300 to-green-300 bg-clip-text text-transparent">Pengetahuan Tanpa Batas</span>
                    </h1>
                    
                    <p class="text-lg sm:text-xl text-gray-300 mb-8 max-w-xl mx-auto lg:mx-0 animate-fade-in-up delay-200">
                        BukuHub adalah platform perpustakaan digital modern yang memudahkan Anda menemukan, meminjam, dan membaca buku kapan saja dan di mana saja.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start animate-fade-in-up delay-300">
                        <a href="{{ route('guest.books') }}" class="group inline-flex items-center justify-center gap-2 px-8 py-4 bg-gradient-to-r from-primary-500 to-emerald-500 text-white font-semibold rounded-full hover:from-primary-400 hover:to-emerald-400 shadow-2xl shadow-primary-500/30 hover:shadow-primary-500/50 transition-all duration-300 hover:scale-105">
                            <i class="fas fa-book-open"></i>
                            <span>Lihat Koleksi Buku</span>
                            <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                            <i class="fas fa-user-plus"></i>
                            <span>Daftar Gratis</span>
                        </a>
                    </div>
                    
                    <!-- Trust Badges -->
                    <div class="mt-12 flex flex-wrap items-center justify-center lg:justify-start gap-6 text-gray-400 animate-fade-in-up delay-400">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-primary-400"></i>
                            <span class="text-sm">Gratis Selamanya</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-shield-alt text-primary-400"></i>
                            <span class="text-sm">Aman & Terpercaya</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-clock text-primary-400"></i>
                            <span class="text-sm">Akses 24/7</span>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content - Illustration -->
                <div class="hidden lg:flex justify-center items-center">
                    <div class="relative animate-float">
                        <!-- Main Book Stack -->
                        <div class="relative w-80 h-80">
                            <!-- Background Glow -->
                            <div class="absolute inset-0 bg-gradient-to-br from-primary-400/30 to-emerald-400/30 rounded-3xl blur-2xl"></div>
                            
                            <!-- Glass Card -->
                            <div class="relative glass rounded-3xl p-8 h-full flex flex-col items-center justify-center">
                                <div class="w-32 h-32 bg-gradient-to-br from-primary-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 shadow-2xl">
                                    <i class="fas fa-book-reader text-white text-5xl"></i>
                                </div>
                                <h3 class="text-white text-xl font-bold mb-2">Koleksi Lengkap</h3>
                                <p class="text-gray-300 text-center text-sm">Ribuan buku siap untuk dipinjam</p>
                            </div>
                        </div>
                        
                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl flex items-center justify-center shadow-xl animate-bounce" style="animation-duration: 3s;">
                            <i class="fas fa-bookmark text-white text-2xl"></i>
                        </div>
                        
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl flex items-center justify-center shadow-xl animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
            <a href="#fitur" class="flex flex-col items-center text-white/60 hover:text-white transition-colors">
                <span class="text-sm mb-2">Scroll ke bawah</span>
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-24 bg-white relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-100/50 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-50 rounded-full text-primary-700 text-sm font-semibold mb-4">
                    <i class="fas fa-magic"></i>
                    <span>Fitur Unggulan</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                    Kenapa Memilih <span class="gradient-text">BukuHub</span>?
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Kami menyediakan pengalaman peminjaman buku yang mudah, cepat, dan menyenangkan untuk semua pengguna.
                </p>
            </div>
            
            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Pencarian Mudah</h3>
                    <p class="text-gray-600">
                        Temukan buku favorit Anda dengan fitur pencarian yang cepat dan akurat berdasarkan judul, penulis, atau kategori.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-hand-holding-heart text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Peminjaman Cepat</h3>
                    <p class="text-gray-600">
                        Proses peminjaman yang sederhana dan cepat. Hanya dengan beberapa klik, buku sudah siap Anda baca.
                    </p>
                </div>
                
                <!-- Feature 3 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-bookmark text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Bookmark Buku</h3>
                    <p class="text-gray-600">
                        Simpan buku favorit Anda ke dalam daftar bookmark untuk akses cepat di kemudian hari.
                    </p>
                </div>
                
                <!-- Feature 4 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-history text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Riwayat Lengkap</h3>
                    <p class="text-gray-600">
                        Pantau semua riwayat peminjaman Anda dengan mudah. Tidak ada yang terlewat.
                    </p>
                </div>
                
                <!-- Feature 5 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-red-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Ulasan & Rating</h3>
                    <p class="text-gray-600">
                        Berikan ulasan dan rating untuk buku yang telah Anda baca untuk membantu pembaca lainnya.
                    </p>
                </div>
                
                <!-- Feature 6 -->
                <div class="group relative bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:shadow-2xl hover:border-primary-200 transition-all duration-300 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Responsif</h3>
                    <p class="text-gray-600">
                        Akses perpustakaan dari perangkat apa saja - desktop, tablet, atau smartphone.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-24 bg-gradient-to-br from-gray-50 to-primary-50/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left - Image/Illustration -->
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-primary-400/20 to-emerald-400/20 rounded-3xl blur-2xl"></div>
                    <div class="relative bg-white rounded-3xl p-8 shadow-2xl">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl p-6 aspect-square flex flex-col items-center justify-center">
                                <i class="fas fa-books text-4xl text-primary-700 mb-3"></i>
                                <p class="text-primary-800 font-semibold text-center text-sm">Koleksi Lengkap</p>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-2xl p-6 aspect-square flex flex-col items-center justify-center">
                                <i class="fas fa-users text-4xl text-emerald-700 mb-3"></i>
                                <p class="text-emerald-800 font-semibold text-center text-sm">Komunitas Aktif</p>
                            </div>
                            <div class="bg-gradient-to-br from-amber-100 to-amber-200 rounded-2xl p-6 aspect-square flex flex-col items-center justify-center">
                                <i class="fas fa-clock text-4xl text-amber-700 mb-3"></i>
                                <p class="text-amber-800 font-semibold text-center text-sm">24/7 Akses</p>
                            </div>
                            <div class="bg-gradient-to-br from-blue-100 to-blue-200 rounded-2xl p-6 aspect-square flex flex-col items-center justify-center">
                                <i class="fas fa-shield-check text-4xl text-blue-700 mb-3"></i>
                                <p class="text-blue-800 font-semibold text-center text-sm">Aman Terjamin</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right - Content -->
                <div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-100 rounded-full text-primary-700 text-sm font-semibold mb-4">
                        <i class="fas fa-info-circle"></i>
                        <span>Tentang Kami</span>
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-6">
                        Perpustakaan Digital untuk <span class="gradient-text">Generasi Modern</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-6">
                        BukuHub hadir untuk memudahkan akses ke dunia literasi. Kami percaya bahwa setiap orang berhak mendapatkan akses mudah ke pengetahuan dan informasi.
                    </p>
                    <p class="text-gray-600 mb-8">
                        Dengan teknologi modern dan antarmuka yang ramah pengguna, kami membuat pengalaman membaca dan meminjam buku menjadi lebih menyenangkan. Bergabunglah dengan ribuan pembaca lainnya dan mulai petualangan literasi Anda bersama kami.
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white font-semibold rounded-xl hover:from-primary-700 hover:to-emerald-700 shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-user-plus"></i>
                            <span>Daftar Sekarang</span>
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-white text-gray-700 font-semibold rounded-xl border border-gray-200 hover:border-primary-300 hover:text-primary-700 shadow-lg hover:shadow-xl transition-all duration-300">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Masuk</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="py-24 bg-gradient-to-br from-primary-900 via-primary-800 to-forest-900 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 hero-pattern"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary-500/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-sm rounded-full text-primary-200 text-sm font-semibold mb-4">
                    <i class="fas fa-chart-line"></i>
                    <span>Statistik</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                    Dipercaya oleh Banyak Pembaca
                </h2>
                <p class="text-lg text-gray-300 max-w-2xl mx-auto">
                    Bergabung dengan komunitas pembaca yang terus berkembang setiap harinya.
                </p>
            </div>
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition-colors">
                        <i class="fas fa-book text-3xl text-primary-300"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-white mb-2">1000+</h3>
                    <p class="text-gray-400">Koleksi Buku</p>
                </div>
                
                <!-- Stat 2 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition-colors">
                        <i class="fas fa-users text-3xl text-emerald-300"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-white mb-2">500+</h3>
                    <p class="text-gray-400">Pengguna Aktif</p>
                </div>
                
                <!-- Stat 3 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition-colors">
                        <i class="fas fa-exchange-alt text-3xl text-amber-300"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-white mb-2">2500+</h3>
                    <p class="text-gray-400">Peminjaman</p>
                </div>
                
                <!-- Stat 4 -->
                <div class="text-center group">
                    <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:bg-white/20 transition-colors">
                        <i class="fas fa-layer-group text-3xl text-blue-300"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-white mb-2">50+</h3>
                    <p class="text-gray-400">Kategori</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="relative">
                <!-- Background Decoration -->
                <div class="absolute inset-0 bg-gradient-to-r from-primary-100/50 via-emerald-100/50 to-green-100/50 rounded-3xl blur-2xl"></div>
                
                <div class="relative bg-gradient-to-br from-primary-600 to-primary-800 rounded-3xl p-12 shadow-2xl overflow-hidden">
                    <!-- Pattern -->
                    <div class="absolute inset-0 hero-pattern opacity-30"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-rocket text-4xl text-white"></i>
                        </div>
                        <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                            Siap Memulai Perjalanan Membaca?
                        </h2>
                        <p class="text-lg text-primary-100 mb-8 max-w-2xl mx-auto">
                            Daftar sekarang dan nikmati akses gratis ke ribuan koleksi buku. Tidak ada biaya tersembunyi, tidak ada komitmen.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white text-primary-700 font-semibold rounded-full hover:bg-primary-50 shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                                <i class="fas fa-user-plus"></i>
                                <span>Daftar Gratis Sekarang</span>
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-full border border-white/20 hover:bg-white/20 transition-all duration-300">
                                <i class="fas fa-sign-in-alt"></i>
                                <span>Sudah Punya Akun?</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-12">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <a href="/" class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-book-open text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold text-white">BukuHub</span>
                    </a>
                    <p class="text-gray-400 mb-6 max-w-md">
                        Platform perpustakaan digital modern yang memudahkan Anda menemukan, meminjam, dan membaca buku kapan saja.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-primary-600 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-primary-600 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:bg-primary-600 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Tautan Cepat</h4>
                    <ul class="space-y-3">
                        <li><a href="#fitur" class="text-gray-400 hover:text-primary-400 transition-colors">Fitur</a></li>
                        <li><a href="#tentang" class="text-gray-400 hover:text-primary-400 transition-colors">Tentang Kami</a></li>
                        <li><a href="#stats" class="text-gray-400 hover:text-primary-400 transition-colors">Statistik</a></li>
                    </ul>
                </div>
                
                <!-- Account -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Akun</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('login') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Masuk</a></li>
                        <li><a href="{{ route('register') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Daftar</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} BukuHub. Hak Cipta Dilindungi.
                </p>
                <p class="text-gray-500 text-sm">
                    Dibuat dengan <i class="fas fa-heart text-red-500"></i> untuk pencinta buku
                </p>
            </div>
        </div>
    </footer>

    <!-- Navbar Background Script -->
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-primary-900/95', 'backdrop-blur-lg', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-primary-900/95', 'backdrop-blur-lg', 'shadow-lg');
            }
        });
    </script>
</body>
</html>
