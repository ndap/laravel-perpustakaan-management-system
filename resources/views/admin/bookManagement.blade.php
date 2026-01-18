<x-admin-layout>
    <x-slot name="title">Manajemen Buku</x-slot>

    <!-- Page Header -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen Buku</h1>
            <p class="text-gray-600 mt-1">Kelola koleksi buku perpustakaan</p>
        </div>
        <button class="px-6 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
            + Tambah Buku
        </button>
    </div>

    <!-- Search and Filter -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <input 
                type="text" 
                placeholder="Cari buku..." 
                class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
            >
            <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                <option>Semua Kategori</option>
                <option>Fiksi</option>
                <option>Non-Fiksi</option>
            </select>
            <button class="px-6 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors">
                Cari
            </button>
        </div>
    </div>

    <!-- Books Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul Buku</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Penulis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Contoh Buku 1</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Penulis A</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Fiksi</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 py-1 text-xs font-semibold rounded bg-green-100 text-green-800">Tersedia</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button class="text-blue-600 hover:text-blue-800 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-800">Hapus</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</x-admin-layout>
