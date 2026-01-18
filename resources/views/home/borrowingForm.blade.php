<x-home-layout>
    <x-slot name="title">Pinjam Buku</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Pinjam Buku</h1>
        <p class="text-gray-600 mt-1">Isi formulir untuk meminjam buku</p>
    </div>

    <!-- Borrowing Form -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
        <form action="#" method="POST">
            @csrf
            
            <!-- Book Information -->
            <div class="mb-4">
                <label for="book_id" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                <select id="book_id" name="book_id" class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-primary-500 focus:border-primary-500">
                    <option value="">Pilih Buku</option>
                    <option value="1">Judul Buku 1</option>
                    <option value="2">Judul Buku 2</option>
                    <option value="3">Judul Buku 3</option>
                </select>
            </div>
            
            <!-- Borrower Information -->
            <div class="mb-4">
                <label for="borrower_name" class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                <input type="text" id="borrower_name" name="borrower_name" class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-primary-500 focus:border-primary-500" required>
            </div>
            
            <!-- Borrow Date -->
            <div class="mb-4">
                <label for="borrow_date" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="date" id="borrow_date" name="borrow_date" class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-primary-500 focus:border-primary-500" required>
            </div>
            
            <!-- Return Date -->
            <div class="mb-4">
                <label for="return_date" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" id="return_date" name="return_date" class="mt-1 block w-full rounded-lg border-gray-300 focus:ring-primary-500 focus:border-primary-500" required>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="px-6 py-2 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                Pinjam Buku
            </button>
        </form>
    </div>
</x-home-layout>