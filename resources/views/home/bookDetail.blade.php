<x-home-layout>
    <x-slot name="title">{{ $book->title }}</x-slot>

    <!-- Flash Messages -->
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-red-700 font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Breadcrumb Navigation -->
    <div class="mb-6">
        <nav class="flex items-center gap-2 text-sm">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-primary-600 transition-colors flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                Katalog Buku
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
                                <x-category-badge :category="$category" />
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

                <!-- Action Buttons -->
                <div class="flex flex-wrap gap-4 pt-6 border-t border-gray-100">
                    @if(auth()->user()->role === 'user')
                        @if(!$isAvailable)
                            <button disabled class="flex-1 sm:flex-none px-8 py-4 bg-gray-100 text-gray-400 rounded-xl font-semibold cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Stok Tidak Tersedia
                            </button>
                        @else
                            <a href="{{ route('home.borrowingForm', $book) }}" class="flex-1 sm:flex-none px-8 py-4 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                Pinjam Buku
                            </a>
                        @endif


                        <button 
                            id="bookmarkBtn" 
                            data-book-id="{{ $book->id }}"
                            data-bookmarked="{{ $isBookmarked ? 'true' : 'false' }}"
                            class="bookmark-button px-6 py-4 rounded-xl transition-all font-semibold flex items-center justify-center gap-2 border
                                {{ $isBookmarked 
                                    ? 'bg-amber-100 text-amber-700 border-amber-300 hover:bg-amber-200' 
                                    : 'bg-amber-50 text-amber-700 border-amber-200 hover:bg-amber-100' 
                                }}"
                        >
                            <svg class="w-5 h-5 bookmark-icon {{ $isBookmarked ? 'fill-current' : '' }}" fill="{{ $isBookmarked ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                            <span class="bookmark-text">{{ $isBookmarked ? 'Tersimpan' : 'Bookmark' }}</span>
                        </button>
                    @endif


                    <a href="{{ route('dashboard') }}" class="px-6 py-4 bg-gray-50 text-gray-700 rounded-xl hover:bg-gray-100 transition-all font-semibold flex items-center justify-center gap-2 border border-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
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
            <!-- Review Form (if user hasn't reviewed yet) -->
            @if(auth()->user()->role === 'user')
                @if(!$userHasReviewed)
                    <div class="mb-8 bg-gradient-to-br from-primary-50 to-emerald-50 rounded-xl p-6 border border-primary-100">
                        <h3 class="text-lg font-bold text-gray-900 mb-4">Berikan Ulasan Anda</h3>
                        
                        <form action="{{ route('review.store', $book) }}" method="POST" id="reviewForm">
                            @csrf
                            
                            <!-- Star Rating Input -->
                            <div class="mb-4">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Rating <span class="text-red-500">*</span>
                                </label>
                                <div class="flex items-center gap-2">
                                    <div class="flex gap-1" id="starRating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button 
                                                type="button" 
                                                class="star-btn transition-transform hover:scale-110" 
                                                data-rating="{{ $i }}"
                                            >
                                                <svg class="w-8 h-8 text-gray-300 fill-current cursor-pointer" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </button>
                                        @endfor
                                    </div>
                                    <span id="ratingText" class="text-sm font-semibold text-gray-700"></span>
                                </div>
                                <input type="hidden" name="rating" id="ratingInput" required>
                                @error('rating')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Review Text -->
                            <div class="mb-4">
                                <label for="review" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Ulasan <span class="text-red-500">*</span>
                                </label>
                                <textarea 
                                    name="review" 
                                    id="review"
                                    rows="4" 
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent resize-none"
                                    placeholder="Tulis ulasan Anda tentang buku ini... (minimal 10 karakter)"
                                    required
                                >{{ old('review') }}</textarea>
                                @error('review')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Minimal 10 karakter, maksimal 1000 karakter</p>
                            </div>

                            <!-- Submit Button -->
                            <button 
                                type="submit"
                                class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-lg hover:from-primary-700 hover:to-emerald-700 transition-all font-semibold shadow-lg hover:shadow-xl flex items-center justify-center gap-2"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Kirim Ulasan
                            </button>
                        </form>
                    </div>
                @else
                    <div class="mb-6 p-4 bg-blue-50 border border-blue-200 rounded-xl flex items-center gap-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-blue-700 font-medium">Anda sudah memberikan ulasan untuk buku ini</span>
                    </div>
                @endif
            @endif

            <!-- Reviews List -->
            <div class="space-y-4">
                <h3 class="text-lg font-bold text-gray-900 mb-4">
                    Semua Ulasan ({{ $reviewCount }})
                </h3>

                @forelse($reviews as $review)
                    <div class="border border-gray-200 rounded-xl p-5 hover:border-primary-200 hover:shadow-sm transition-all">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-start gap-3">
                                <!-- User Avatar with Profile Photo -->
                                <x-user-avatar :user="$review->user" size="md" />
                                
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

                            <!-- Delete Button (only for user's own review) -->
                            @if(Auth::id() === $review->user_id)
                                <form action="{{ route('review.destroy', $review) }}" method="POST" class="inline" onsubmit="event.preventDefault(); Swal.fire({ title: 'Hapus Ulasan?', text: 'Hapus ulasan ini?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#10b981', cancelButtonColor: '#ef4444', confirmButtonText: 'Ya, Hapus', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { event.target.submit(); } });">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700 transition-colors p-1 hover:bg-red-50 rounded-lg" title="Hapus ulasan">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            @endif
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

    <!-- Related Books Section -->
    @if($relatedBooks->count() > 0)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-md">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-lg font-bold text-gray-900">Buku Terkait</h2>
                        <p class="text-xs text-gray-500">Buku dengan kategori serupa</p>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4">
                    @foreach($relatedBooks as $relatedBook)
                        <x-book-card :book="$relatedBook" />
                    @endforeach
                </div>
                
                @if($relatedBooks->count() === 0)
                    <div class="text-center py-12 bg-gray-50 rounded-xl">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Tidak Ada Buku Terkait</h3>
                        <p class="text-gray-600">Belum ada buku lain dengan kategori yang sama.</p>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-6 right-6 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 translate-y-20 opacity-0 z-50">
        <div class="flex items-center gap-3">
            <svg id="toastIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span id="toastMessage" class="font-semibold"></span>
        </div>
    </div>

    <script>
        // CSRF Token for AJAX requests
        const csrfToken = '{{ csrf_token() }}';
        
        // Bookmark toggle functionality
        document.getElementById('bookmarkBtn')?.addEventListener('click', function() {
            const btn = this;
            const bookId = btn.dataset.bookId;
            const isBookmarked = btn.dataset.bookmarked === 'true';
            
            // Disable button during request
            btn.disabled = true;
            btn.style.opacity = '0.6';
            
            fetch(`/book/${bookId}/bookmark/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update button state
                    btn.dataset.bookmarked = data.bookmarked ? 'true' : 'false';
                    
                    // Update button styling
                    if (data.bookmarked) {
                        btn.classList.remove('bg-amber-50', 'border-amber-200');
                        btn.classList.add('bg-amber-100', 'border-amber-300');
                        btn.querySelector('.bookmark-icon').classList.add('fill-current');
                        btn.querySelector('.bookmark-icon').setAttribute('fill', 'currentColor');
                        btn.querySelector('.bookmark-text').textContent = 'Tersimpan';
                    } else {
                        btn.classList.remove('bg-amber-100', 'border-amber-300');
                        btn.classList.add('bg-amber-50', 'border-amber-200');
                        btn.querySelector('.bookmark-icon').classList.remove('fill-current');
                        btn.querySelector('.bookmark-icon').setAttribute('fill', 'none');
                        btn.querySelector('.bookmark-text').textContent = 'Bookmark';
                    }
                    
                    // Show success toast
                    showToast(data.message, 'success');
                } else {
                    showToast('Terjadi kesalahan', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showToast('Terjadi kesalahan', 'error');
            })
            .finally(() => {
                // Re-enable button
                btn.disabled = false;
                btn.style.opacity = '1';
            });
        });
        
        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = document.getElementById('toastIcon');
            
            // Set message
            toastMessage.textContent = message;
            
            // Set style based on type
            if (type === 'success') {
                toast.className = 'fixed bottom-6 right-6 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 z-50 bg-green-100 text-green-700 border border-green-300';
                toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>';
            } else {
                toast.className = 'fixed bottom-6 right-6 px-6 py-4 rounded-xl shadow-2xl transform transition-all duration-300 z-50 bg-red-100 text-red-700 border border-red-300';
                toastIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>';
            }
            
            // Show toast
            toast.classList.remove('translate-y-20', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            
            // Hide after 3 seconds
            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }

        // Star rating functionality for review form
        const starButtons = document.querySelectorAll('.star-btn');
        const ratingInput = document.getElementById('ratingInput');
        const ratingText = document.getElementById('ratingText');
        const ratingLabels = ['Sangat Buruk', 'Buruk', 'Cukup', 'Bagus', 'Sangat Bagus'];
        
        if (starButtons.length > 0) {
            starButtons.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    const rating = this.dataset.rating;
                    ratingInput.value = rating;
                    ratingText.textContent = ratingLabels[rating - 1];
                    
                    // Update star colors
                    starButtons.forEach((star, starIndex) => {
                        const svg = star.querySelector('svg');
                        if (starIndex < rating) {
                            svg.classList.remove('text-gray-300');
                            svg.classList.add('text-amber-400');
                        } else {
                            svg.classList.remove('text-amber-400');
                            svg.classList.add('text-gray-300');
                        }
                    });
                });
                
                // Hover effect
                btn.addEventListener('mouseenter', function() {
                    const rating = this.dataset.rating;
                    starButtons.forEach((star, starIndex) => {
                        const svg = star.querySelector('svg');
                        if (starIndex < rating) {
                            svg.classList.add('text-amber-300');
                        }
                    });
                });
                
                btn.addEventListener('mouseleave', function() {
                    const currentRating = ratingInput.value;
                    starButtons.forEach((star, starIndex) => {
                        const svg = star.querySelector('svg');
                        svg.classList.remove('text-amber-300');
                        if (currentRating && starIndex < currentRating) {
                            svg.classList.add('text-amber-400');
                        }
                    });
                });
            });
        }
    </script>
</x-home-layout>