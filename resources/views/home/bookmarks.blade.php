<x-home-layout>
    <x-slot name="title">Koleksi Pribadi</x-slot>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-green-700 font-medium">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="text-red-700 font-medium">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Page Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Koleksi Pribadi</h1>
            <p class="text-gray-600 mt-1">Buku-buku yang telah Anda simpan ({{ $bookmarks->total() }} buku)</p>
        </div>
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors font-semibold flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            Jelajahi Katalog
        </a>
    </div>

    @if($bookmarks->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="w-20 h-20 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-10 h-10 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Koleksi</h3>
                <p class="text-gray-600 mb-6">Mulai simpan buku favorit Anda dari katalog dengan klik tombol bookmark</p>
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                    Jelajahi Katalog
                </a>
            </div>
        </div>
    @else
        <!-- Bookmarks Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($bookmarks as $bookmark)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all group">
                    <!-- Book Cover -->
                    <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="block relative">
                        <div class="aspect-[2/3] bg-gradient-to-br from-primary-50 to-emerald-50 overflow-hidden">
                            @if($bookmark->book->image)
                                <img 
                                    src="{{ Storage::url($bookmark->book->image) }}" 
                                    alt="{{ $bookmark->book->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                >
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-16 h-16 text-primary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Stock Badge -->
                        @if($bookmark->book->stock > 0)
                            <div class="absolute top-2 right-2">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-bold rounded-full bg-green-100 text-green-700 shadow-sm">
                                    Tersedia
                                </span>
                            </div>
                        @else
                            <div class="absolute top-2 right-2">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-bold rounded-full bg-red-100 text-red-700 shadow-sm">
                                    Stok Habis
                                </span>
                            </div>
                        @endif
                    </a>

                    <!-- Book Info -->
                    <div class="p-4">
                        <!-- Categories -->
                        @if($bookmark->book->categories->count() > 0)
                            <div class="flex flex-wrap gap-1 mb-2">
                                @foreach($bookmark->book->categories->take(2) as $category)
                                    <span class="inline-flex items-center px-2 py-0.5 bg-primary-50 text-primary-700 text-xs font-medium rounded-full border border-primary-200">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Title -->
                        <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="block">
                            <h3 class="font-bold text-gray-900 line-clamp-2 group-hover:text-primary-700 transition-colors mb-1">
                                {{ $bookmark->book->title }}
                            </h3>
                        </a>

                        <!-- Author -->
                        <p class="text-sm text-gray-600 mb-3">{{ $bookmark->book->author }}</p>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="flex-1 px-3 py-2 bg-primary-50 text-primary-700 rounded-lg hover:bg-primary-100 transition-colors font-semibold text-sm text-center">
                                Lihat Detail
                            </a>
                            <form action="{{ route('bookmark.destroy', $bookmark) }}" method="POST" class="inline" onsubmit="return confirm('Hapus buku ini dari koleksi?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2 bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition-colors font-semibold text-sm">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($bookmarks->hasPages())
            <div class="mt-8">
                {{ $bookmarks->links() }}
            </div>
        @endif
    @endif
</x-home-layout>
