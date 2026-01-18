<x-home-layout>
    <x-slot name="title">Koleksi Pribadi</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Koleksi Pribadi</h1>
        <p class="text-gray-600 mt-1">Buku-buku yang telah Anda simpan</p>
    </div>

    <!-- Empty State or Books -->
    <div class="bg-white rounded-lg shadow-sm p-12 text-center">
        <div class="max-w-md mx-auto">
            <div class="text-6xl mb-4">❤️</div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Koleksi</h3>
            <p class="text-gray-600 mb-6">Mulai simpan buku favorit Anda dari katalog</p>
            <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                Jelajahi Katalog
            </a>
        </div>
    </div>
</x-home-layout>
