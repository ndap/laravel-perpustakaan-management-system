<x-home-layout>
    <x-slot name="title">Detail Buku</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Detail Buku</h1>
        <p class="text-gray-600 mt-1">Informasi lengkap tentang buku ini</p>
    </div>

    <!-- Book Details -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Book Image -->
            <div class="flex-1">
                <img src="https://via.placeholder.com/300x400" alt="Book Cover" class="w-full h-64 object-cover rounded-lg">
            </div>
            
            <!-- Book Information -->
            <div class="flex-1">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Judul Buku</h2>
                <p class="text-gray-600 mb-2">Penulis: Penulis Buku</p>
                <p class="text-gray-600 mb-2">Penerbit: Penerbit Buku</p>
                <p class="text-gray-600 mb-2">Tahun Terbit: 2024</p>
                <p class="text-gray-600 mb-2">Kategori: Kategori Buku</p>
                <p class="text-gray-600 mb-2">Jumlah Halaman: 300</p>
                <p class="text-gray-600 mb-2">Deskripsi: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec metus vel ante tincidunt placerat.</p>
            </div>
        </div>
    </div>

    <!-- Borrow Button -->
    <button class="px-6 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
        Pinjam Buku
    </button>
</x-home-layout>