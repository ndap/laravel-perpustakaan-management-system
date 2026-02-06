<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Koleksi Buku - {{ config('app.name', 'BukuHub') }}</title>
    
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
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-gradient-to-r from-primary-800 to-primary-900 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-white/10 rounded-xl flex items-center justify-center group-hover:bg-white/20 transition-colors">
                        <i class="fas fa-book-open text-white text-lg"></i>
                    </div>
                    <span class="text-xl font-bold text-white">BukuHub</span>
                </a>
                
                <!-- Navigation Links -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="/" class="text-white/80 hover:text-white font-medium transition-colors flex items-center gap-2">
                        <i class="fas fa-home"></i>
                        Beranda
                    </a>
                    <a href="{{ route('guest.books') }}" class="text-white font-medium flex items-center gap-2">
                        <i class="fas fa-book"></i>
                        Koleksi Buku
                    </a>
                </div>
                
                <!-- Auth Buttons -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex px-4 py-2 text-white font-medium rounded-lg hover:bg-white/10 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-white text-primary-700 font-semibold rounded-lg hover:bg-primary-50 shadow-md transition-all">
                        Daftar Gratis
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8 relative">
            <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 via-emerald-500/10 to-green-500/10 rounded-2xl blur-3xl"></div>
            <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Koleksi Buku</h1>
                                <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                    </svg>
                                    Jelajahi koleksi buku digital kami
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ now()->format('l, d F Y') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Books -->
            <div class="group relative bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl p-6 border border-blue-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-blue-600 mb-1">Total Buku</p>
                        <h3 class="text-3xl font-bold text-blue-900">{{ number_format($totalBooks) }}</h3>
                        <p class="text-xs text-blue-600 mt-1">koleksi tersedia</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Available Books -->
            <div class="group relative bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl p-6 border border-emerald-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-emerald-600 mb-1">Tersedia</p>
                        <h3 class="text-3xl font-bold text-emerald-900">{{ number_format($availableBooks) }}</h3>
                        <p class="text-xs text-emerald-600 mt-1">buku dapat dipinjam</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Borrowed Books -->
            <div class="group relative bg-gradient-to-br from-amber-50 to-amber-100/50 rounded-xl p-6 border border-amber-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-amber-600 mb-1">Sedang Dipinjam</p>
                        <h3 class="text-3xl font-bold text-amber-900">{{ number_format($borrowedBooks) }}</h3>
                        <p class="text-xs text-amber-600 mt-1">buku tidak tersedia</p>
                    </div>
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Section -->
        <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 mb-8">
            <form action="{{ route('guest.books') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <!-- Search Bar -->
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari buku berdasarkan judul atau penulis..." 
                        class="w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all"
                    >
                </div>
                
                <!-- Category Filter -->
                <div class="relative">
                    <select 
                        name="category"
                        class="appearance-none pl-4 pr-10 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 bg-white min-w-[200px] transition-all"
                    >
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                
                <!-- Search Button -->
                <button type="submit" class="px-8 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari
                </button>

                @if(request('search') || request('category'))
                    <a href="{{ route('guest.books') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Reset
                    </a>
                @endif
            </form>
        </div>

        <!-- CTA Banner for Guests -->
        <div class="bg-gradient-to-r from-primary-600 to-emerald-600 rounded-xl p-6 mb-8 shadow-lg">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex items-center gap-4 text-white">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-plus text-2xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold">Ingin Meminjam Buku?</h3>
                        <p class="text-primary-100">Daftar atau masuk untuk mulai meminjam buku favorit Anda!</p>
                    </div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('login') }}" class="px-6 py-3 bg-white/20 text-white font-semibold rounded-lg hover:bg-white/30 transition-colors">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-primary-700 font-semibold rounded-lg hover:bg-primary-50 transition-colors shadow-md">
                        Daftar Gratis
                    </a>
                </div>
            </div>
        </div>

        <!-- Books Grid -->
        @if($books->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6 mb-8">
                @foreach($books as $book)
                    @php
                        $isBorrowed = $book->borrowings()->where('status', 'borrowed')->exists();
                    @endphp
                    <a href="{{ route('guest.bookDetail', $book) }}" class="group block">
                        <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-105 hover:border-primary-200">
                            <!-- Book Cover -->
                            <div class="aspect-[2/3] bg-gradient-to-br from-primary-100 to-emerald-100 relative overflow-hidden">
                                @if($book->image)
                                    <img 
                                        src="{{ Storage::url($book->image) }}" 
                                        alt="{{ $book->title }}" 
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                    </div>
                                @endif
                                
                                <!-- Status Badge -->
                                <div class="absolute top-3 right-3">
                                    @if($book->stock <= 0)
                                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700 shadow-sm">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Habis
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700 shadow-sm">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Tersedia
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- Book Info -->
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-2 group-hover:text-primary-700 transition-colors">
                                    {{ $book->title }}
                                </h3>
                                <p class="text-xs text-gray-600 mb-2 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    {{ $book->author }}
                                </p>
                                
                                <!-- Category Badges -->
                                @if($book->categories->count() > 0)
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($book->categories->take(2) as $category)
                                            <span class="inline-block px-2 py-0.5 bg-primary-50 text-primary-700 text-xs font-medium rounded-full">
                                                {{ $category->category_name }}
                                            </span>
                                        @endforeach
                                        @if($book->categories->count() > 2)
                                            <span class="inline-block px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded-full">
                                                +{{ $book->categories->count() - 2 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center">
                {{ $books->withQueryString()->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-md border border-gray-100 p-12 text-center">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Buku Ditemukan</h3>
                <p class="text-gray-600 mb-6">
                    @if(request('search') || request('category'))
                        Tidak ada buku yang sesuai dengan pencarian Anda.
                    @else
                        Belum ada buku yang ditambahkan ke katalog.
                    @endif
                </p>
                @if(request('search') || request('category'))
                    <a href="{{ route('guest.books') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all font-semibold shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset Pencarian
                    </a>
                @endif
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-emerald-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-book-open text-white"></i>
                    </div>
                    <span class="text-xl font-bold">BukuHub</span>
                </div>
                <p class="text-gray-400 text-sm">
                    &copy; {{ date('Y') }} BukuHub. Hak Cipta Dilindungi.
                </p>
                <div class="flex gap-4">
                    <a href="/" class="text-gray-400 hover:text-primary-400 transition-colors">Beranda</a>
                    <a href="{{ route('login') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Daftar</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
