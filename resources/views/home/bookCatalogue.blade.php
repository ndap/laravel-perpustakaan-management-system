<x-home-layout>
    <x-slot name="title">Katalog Buku</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Katalog Buku</h1>
        <p class="text-gray-600 mt-1">Jelajahi koleksi buku digital kami</p>
    </div>

    <!-- Search and Filter Section -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Search Bar -->
            <div class="flex-1">
                <input 
                    type="text" 
                    placeholder="Cari buku berdasarkan judul atau penulis..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                >
            </div>
            
            <!-- Category Filter -->
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option>Semua Kategori</option>
                <option>Fiksi</option>
                <option>Non-Fiksi</option>
                <option>Teknologi</option>
                <option>Bisnis</option>
            </select>
            
            <!-- Search Button -->
            <button class="px-6 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                Cari
            </button>
        </div>
    </div>

    <!-- Books Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        <!-- Sample Book Card -->
        <a href="{{ route('home.bookDetail') }}" class="text-primary-700 hover:underline">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="aspect-[2/3] bg-gray-200 flex items-center justify-center">
                <i class="fas fa-book text-4xl text-gray-400"></i>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 text-sm mb-1 line-clamp-2">Contoh Judul Buku</h3>
                <p class="text-xs text-gray-600 mb-2">Penulis</p>
                <span class="inline-block px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded">Tersedia</span>
            </div>
        </div>
        </a>        
        <!-- Add more book cards as needed -->
    </div>
</x-home-layout>