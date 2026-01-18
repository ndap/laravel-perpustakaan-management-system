<x-home-layout>
    <x-slot name="title">Riwayat Peminjaman</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Peminjaman</h1>
        <p class="text-gray-600 mt-1">Lihat semua aktivitas peminjaman buku Anda</p>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow-sm mb-6">
        <div class="flex border-b border-gray-200">
            <button class="px-6 py-3 font-semibold text-primary-700 border-b-2 border-primary-700">
                Semua
            </button>
            <button class="px-6 py-3 font-semibold text-gray-600 hover:text-gray-900">
                Sedang Dipinjam
            </button>
            <button class="px-6 py-3 font-semibold text-gray-600 hover:text-gray-900">
                Dikembalikan
            </button>
        </div>
    </div>

    <!-- History List -->
    <div class="space-y-4">
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="text-6xl mb-4">📋</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Riwayat</h3>
                <p class="text-gray-600 mb-6">Anda belum pernah meminjam buku</p>
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                    Pinjam Buku Sekarang
                </a>
            </div>
        </div>
    </div>
</x-home-layout>
