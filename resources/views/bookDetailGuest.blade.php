<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $book->title }} - {{ config('app.name', 'BukuHub') }}</title>
    
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
        <!-- Breadcrumb Navigation -->
        <div class="mb-6">
            <nav class="flex items-center gap-2 text-sm">
                <a href="{{ route('guest.books') }}" class="text-gray-500 hover:text-primary-600 transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Koleksi Buku
                </a>
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                <span class="text-gray-900 font-medium">{{ Str::limit($book->title, 40) }}</span>
            </nav>
        </div>

        <!-- Book Detail Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-0">
                <!-- Book Cover Section -->
                <div class="lg:col-span-1 bg-gradient-to-br from-primary-50 to-emerald-50 p-8 flex items-center justify-center">
                    <div class="relative w-full max-w-xs">
                        <div class="aspect-[2/3] rounded-xl overflow-hidden shadow-2xl border-4 border-white">
                            @if($book->image)
                                <img 
                                    src="{{ Storage::url($book->image) }}" 
                                    alt="{{ $book->title }}" 
                                    class="w-full h-full object-cover"
                                >
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-100 to-emerald-100 flex items-center justify-center">
                                    <svg class="w-24 h-24 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <!-- Status Badge -->
                        <div class="absolute -top-3 -right-3">
                            @if(!$isAvailable)
                                <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-full bg-red-100 text-red-700 shadow-lg border-2 border-white">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Stok Habis
                                </span>
                            @else
                                <span class="inline-flex items-center px-4 py-2 text-sm font-bold rounded-full bg-green-100 text-green-700 shadow-lg border-2 border-white">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Tersedia
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Book Information Section -->
                <div class="lg:col-span-2 p-8">
                    <!-- Category Badges -->
                    @if($book->categories->count() > 0)
                        <div class="mb-4">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                <h3 class="text-sm font-semibold text-gray-700 uppercase tracking-wide">Kategori</h3>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @foreach($book->categories as $category)
                                    <span class="inline-flex items-center px-3 py-1 bg-primary-50 text-primary-700 text-sm font-medium rounded-full border border-primary-200">
                                        {{ $category->category_name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Title -->
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">{{ $book->title }}</h1>

                    <!-- Book Metadata -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">Penulis</p>
                                <p class="text-gray-900 font-semibold">{{ $book->author }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">Penerbit</p>
                                <p class="text-gray-900 font-semibold">{{ $book->publisher }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-amber-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">Tahun Terbit</p>
                                <p class="text-gray-900 font-semibold">{{ $book->publication_year }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-xl">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">Stok Tersedia</p>
                                <p class="text-gray-900 font-semibold">{{ $book->stock }} buku</p>
                            </div>
                        </div>
                    </div>

                    <!-- Synopsis -->
                    @if($book->synopsis)
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                                </svg>
                                Sinopsis
                            </h3>
                            <p class="text-gray-600 leading-relaxed">{{ $book->synopsis }}</p>
                        </div>
                    @endif

                    <!-- CTA for Guests -->
                    <div class="bg-gradient-to-r from-primary-50 to-emerald-50 rounded-xl p-6 border border-primary-100">
                        <div class="flex flex-col md:flex-row items-center gap-4">
                            <div class="flex-1">
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Ingin Meminjam Buku Ini?</h3>
                                <p class="text-gray-600 text-sm">Masuk atau daftar untuk meminjam buku dan menikmati fitur lengkap lainnya.</p>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('login') }}" class="px-6 py-3 bg-primary-600 text-white font-semibold rounded-xl hover:bg-primary-700 transition-colors shadow-lg flex items-center gap-2">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Masuk
                                </a>
                                <a href="{{ route('register') }}" class="px-6 py-3 bg-white text-primary-700 font-semibold rounded-xl border border-primary-200 hover:bg-primary-50 transition-colors shadow-md flex items-center gap-2">
                                    <i class="fas fa-user-plus"></i>
                                    Daftar
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4 pt-6 border-t border-gray-100 mt-6">
                        <a href="{{ route('guest.books') }}" class="px-6 py-4 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-all font-semibold flex items-center justify-center gap-2 border border-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Kembali ke Koleksi
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews & Ratings Section -->
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
            <!-- Section Header -->
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Ulasan & Rating</h2>
                            <div class="flex items-center gap-2 mt-1">
                                <div class="flex items-center gap-1">
                                    @php
                                        $avgRating = round($averageRating, 1);
                                        $fullStars = floor($avgRating);
                                        $hasHalfStar = ($avgRating - $fullStars) >= 0.5;
                                    @endphp
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $fullStars)
                                            <svg class="w-4 h-4 text-amber-400 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @elseif($i == $fullStars + 1 && $hasHalfStar)
                                            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 20 20">
                                                <defs>
                                                    <linearGradient id="half">
                                                        <stop offset="50%" stop-color="currentColor"/>
                                                        <stop offset="50%" stop-color="#D1D5DB"/>
                                                    </linearGradient>
                                                </defs>
                                                <path fill="url(#half)" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <span class="text-sm font-semibold text-gray-900">{{ number_format($avgRating, 1) }}</span>
                                <span class="text-sm text-gray-500">({{ $reviewCount }} ulasan)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Guest CTA for Reviews -->
                <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl flex items-center gap-3">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-blue-700 font-medium">Ingin memberikan ulasan? <a href="{{ route('login') }}" class="underline hover:text-blue-800">Masuk</a> atau <a href="{{ route('register') }}" class="underline hover:text-blue-800">daftar</a> terlebih dahulu.</span>
                </div>

                <!-- Reviews List -->
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">
                        Semua Ulasan ({{ $reviewCount }})
                    </h3>

                    @forelse($reviews as $review)
                        <div class="border border-gray-200 rounded-xl p-5 hover:border-primary-200 hover:shadow-sm transition-all">
                            <div class="flex items-start gap-3">
                                <!-- User Avatar -->
                                <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-emerald-500 rounded-full flex items-center justify-center">
                                    @if($review->user->photo_profile)
                                        <img src="{{ Storage::url($review->user->photo_profile) }}" alt="{{ $review->user->full_name }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <span class="text-white font-bold text-sm">{{ strtoupper(substr($review->user->full_name ?? $review->user->username, 0, 1)) }}</span>
                                    @endif
                                </div>
                                
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-1">
                                        <h4 class="font-semibold text-gray-900">{{ $review->user->full_name ?? $review->user->username }}</h4>
                                        @if($review->user->role === 'admin')
                                            <span class="text-xs px-2 py-0.5 bg-red-100 text-red-700 rounded-full font-medium">Admin</span>
                                        @elseif($review->user->role === 'librarian')
                                            <span class="text-xs px-2 py-0.5 bg-blue-100 text-blue-700 rounded-full font-medium">Librarian</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-2 mb-2">
                                        <!-- Star Rating Display -->
                                        <div class="flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-amber-400 fill-current' : 'text-gray-300 fill-current' }}" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endfor
                                        </div>
                                        <span class="text-sm font-medium text-amber-600">{{ $review->rating }}.0</span>
                                        <span class="text-gray-300">•</span>
                                        <span class="text-xs text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                                    </div>
                                    
                                    <!-- Review Text -->
                                    <p class="text-gray-700 leading-relaxed">{{ $review->review }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12 bg-gray-50 rounded-xl">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Ulasan</h3>
                            <p class="text-gray-600">Jadilah yang pertama memberikan ulasan untuk buku ini!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Related Books -->
        @if($relatedBooks->count() > 0)
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden mb-8">
                <div class="p-6 border-b border-gray-100">
                    <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <svg class="w-5 h-5 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        Buku Terkait
                    </h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($relatedBooks as $relatedBook)
                            <a href="{{ route('guest.bookDetail', $relatedBook) }}" class="group block">
                                <div class="bg-gray-50 rounded-xl overflow-hidden hover:shadow-lg transition-all duration-300 hover:scale-105">
                                    <div class="aspect-[2/3] bg-gradient-to-br from-primary-100 to-emerald-100 relative">
                                        @if($relatedBook->image)
                                            <img 
                                                src="{{ Storage::url($relatedBook->image) }}" 
                                                alt="{{ $relatedBook->title }}" 
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                            >
                                        @else
                                            <div class="w-full h-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-3">
                                        <h3 class="font-semibold text-gray-900 text-sm line-clamp-2 group-hover:text-primary-700 transition-colors">
                                            {{ $relatedBook->title }}
                                        </h3>
                                        <p class="text-xs text-gray-500 mt-1">{{ $relatedBook->author }}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
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
                    <a href="{{ route('guest.books') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Koleksi Buku</a>
                    <a href="{{ route('login') }}" class="text-gray-400 hover:text-primary-400 transition-colors">Masuk</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
