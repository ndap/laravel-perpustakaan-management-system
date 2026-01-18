<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Dashboard Admin</h1>
        <p class="text-gray-600 mt-1">Selamat datang di panel admin BukuHub</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Books -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total Buku</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">150</p>
                </div>
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book text-2xl text-primary-600"></i>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total User</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">85</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-2xl text-blue-600"></i>
                </div>
            </div>
        </div>

        <!-- Active Borrowings -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Sedang Dipinjam</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">23</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clipboard-list text-2xl text-yellow-600"></i>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Kategori</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">12</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tags text-2xl text-purple-600"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-sm p-6">
        <h2 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h2>
        <div class="space-y-3">
            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                <div>
                    <p class="text-sm font-medium text-gray-900">Peminjaman baru oleh User A</p>
                    <p class="text-xs text-gray-500">2 jam yang lalu</p>
                </div>
                <span class="text-xs px-2 py-1 bg-green-100 text-green-800 rounded">Baru</span>
            </div>
            <div class="flex items-center justify-between py-3 border-b border-gray-100">
                <div>
                    <p class="text-sm font-medium text-gray-900">Pengembalian buku oleh User B</p>
                    <p class="text-xs text-gray-500">5 jam yang lalu</p>
                </div>
                <span class="text-xs px-2 py-1 bg-blue-100 text-blue-800 rounded">Selesai</span>
            </div>
        </div>
    </div>
</x-admin-layout>
