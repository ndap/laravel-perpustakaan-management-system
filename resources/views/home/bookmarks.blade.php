<x-home-layout>
    <x-slot name="title">Koleksi Pribadi</x-slot>

    <!-- Flash Messages -->
    @if(session('success'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
            <button x-on:click="show = false" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="mb-6 p-4 bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-red-800 font-medium">{{ session('error') }}</p>
            <button x-on:click="show = false" class="ml-auto text-red-600 hover:text-red-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Page Header with Gradient Background -->
    <div class="mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 via-yellow-500/10 to-orange-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Koleksi Pribadi</h1>
                        <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Buku-buku yang telah Anda simpan ({{ $bookmarks->total() }} buku)
                        </p>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    Jelajahi Katalog
                </a>
            </div>
        </div>
    </div>

    @if($bookmarks->isEmpty())
        <!-- Empty State -->
        <div class="bg-white rounded-xl shadow-md p-12 text-center border border-gray-100">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-12 h-12 text-amber-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Koleksi</h3>
                <p class="text-gray-600 mb-6">Mulai simpan buku favorit Anda dari katalog dengan klik tombol bookmark</p>
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105">
                    Jelajahi Katalog
                </a>
            </div>
        </div>
    @else
        <!-- Bookmarks Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($bookmarks as $bookmark)
                <div class="group bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-300 hover:scale-[1.02]">
                    <!-- Book Cover -->
                    <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="block relative">
                        <div class="aspect-[2/3] bg-gradient-to-br from-primary-50 to-emerald-50 overflow-hidden">
                            @if($bookmark->book->image)
                                <img 
                                    src="{{ Storage::url($bookmark->book->image) }}" 
                                    alt="{{ $bookmark->book->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
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
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 shadow-md ring-1 ring-green-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Tersedia
                                </span>
                            </div>
                        @else
                            <div class="absolute top-3 right-3">
                                <span class="inline-flex items-center px-2.5 py-1 text-xs font-bold rounded-full bg-gradient-to-r from-red-100 to-rose-100 text-red-700 shadow-md ring-1 ring-red-200">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Stok Habis
                                </span>
                            </div>
                        @endif

                        <!-- Bookmark Badge (Top Left) -->
                        <div class="absolute top-3 left-3">
                            <div class="w-8 h-8 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                                </svg>
                            </div>
                        </div>
                    </a>

                    <!-- Book Info -->
                    <div class="p-5">
                        <!-- Categories -->
                        @if($bookmark->book->categories->count() > 0)
                            <div class="flex flex-wrap gap-1.5 mb-3">
                                @foreach($bookmark->book->categories->take(2) as $category)
                                    <span class="inline-flex items-center px-2.5 py-1 bg-gradient-to-r from-primary-50 to-emerald-50 text-primary-700 text-xs font-semibold rounded-full ring-1 ring-primary-200">
                                        {{ $category->category_name }}
                                    </span>
                                @endforeach
                                @if($bookmark->book->categories->count() > 2)
                                    <span class="inline-flex items-center px-2.5 py-1 bg-gray-100 text-gray-600 text-xs font-semibold rounded-full">
                                        +{{ $bookmark->book->categories->count() - 2 }}
                                    </span>
                                @endif
                            </div>
                        @endif

                        <!-- Title -->
                        <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="block">
                            <h3 class="font-bold text-lg text-gray-900 line-clamp-2 group-hover:text-primary-700 transition-colors mb-2">
                                {{ $bookmark->book->title }}
                            </h3>
                        </a>

                        <!-- Author -->
                        <p class="text-sm text-gray-600 mb-4 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            {{ $bookmark->book->author }}
                        </p>

                        <!-- Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('home.bookDetail', $bookmark->book) }}" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-primary-50 to-emerald-50 text-primary-700 rounded-lg hover:from-primary-100 hover:to-emerald-100 transition-all duration-200 font-semibold text-sm text-center shadow-sm hover:shadow">
                                Lihat Detail
                            </a>
                            <form action="{{ route('bookmark.destroy', $bookmark) }}" method="POST" class="inline" onsubmit="event.preventDefault(); Swal.fire({ title: 'Hapus Bookmark?', text: 'Hapus buku ini dari koleksi?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#10b981', cancelButtonColor: '#ef4444', confirmButtonText: 'Ya, Hapus', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { event.target.submit(); } });">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-2.5 bg-gradient-to-r from-red-50 to-rose-50 text-red-700 rounded-lg hover:from-red-100 hover:to-rose-100 transition-all duration-200 font-semibold shadow-sm hover:shadow">
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
            <div class="mt-8 bg-white rounded-xl shadow-md border border-gray-100 p-4">
                {{ $bookmarks->links() }}
            </div>
        @endif
    @endif
</x-home-layout>
