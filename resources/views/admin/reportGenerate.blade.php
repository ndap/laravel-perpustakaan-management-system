<x-admin-layout>
    <x-slot name="title">Generate Laporan</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Generate Laporan</h1>
        <p class="text-gray-600 mt-1">Buat dan unduh laporan perpustakaan</p>
    </div>

    <!-- Report Options -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Borrowing Report -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-clipboard-list text-2xl text-primary-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Peminjaman</h3>
            <p class="text-sm text-gray-600 mb-4">Generate laporan peminjaman buku berdasarkan periode tertentu</p>
            
            <div class="space-y-3 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Akhir</label>
                    <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                </div>
            </div>
            
            <button class="w-full px-4 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                📥 Download PDF
            </button>
        </div>

        <!-- Book Report -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-book text-2xl text-blue-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Koleksi Buku</h3>
            <p class="text-sm text-gray-600 mb-4">Generate laporan lengkap koleksi buku perpustakaan</p>
            
            <div class="space-y-3 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Filter Kategori</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option>Semua Kategori</option>
                        <option>Fiksi</option>
                        <option>Non-Fiksi</option>
                        <option>Teknologi</option>
                    </select>
                </div>
            </div>
            
            <button class="w-full px-4 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                📥 Download PDF
            </button>
        </div>

        <!-- User Report -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-users text-2xl text-purple-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Pengguna</h3>
            <p class="text-sm text-gray-600 mb-4">Generate laporan data pengguna perpustakaan</p>
            
            <div class="space-y-3 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Filter Status</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Tidak Aktif</option>
                    </select>
                </div>
            </div>
            
            <button class="w-full px-4 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                📥 Download PDF
            </button>
        </div>

        <!-- Statistics Report -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-chart-bar text-2xl text-yellow-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Laporan Statistik</h3>
            <p class="text-sm text-gray-600 mb-4">Generate laporan statistik aktivitas perpustakaan</p>
            
            <div class="space-y-3 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                        <option>Bulan Ini</option>
                        <option>Bulan Lalu</option>
                        <option>3 Bulan Terakhir</option>
                        <option>Tahun Ini</option>
                    </select>
                </div>
            </div>
            
            <button class="w-full px-4 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                📥 Download PDF
            </button>
        </div>
    </div>
</x-admin-layout>
