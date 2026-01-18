<x-admin-layout>
    <x-slot name="title">Manajemen Kategori</x-slot>

    <!-- Page Header -->
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Kategori</h1>
        <p class="text-gray-600 mt-1">Kelola kategori buku</p>
    </div>

    <!-- Add Category Form -->
    <x-card-form action="{{ route('category.store') }}" title="Tambah Kategori Baru">
        <div>
            <x-input-label for="category_name" :value="__('Nama Kategori')" />
            <x-text-input id="category_name" class="block mt-1 w-full" type="text" name="category_name" :value="old('category_name')" required autofocus placeholder="Masukkan nama kategori baru" />
            <x-input-error :messages="$errors->get('category_name')" class="mt-2" />
        </div>

        <x-slot name="footer">
            <x-primary-button>
                {{ __('Simpan Kategori') }}
            </x-primary-button>
        </x-slot>
    </x-card-form>

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Category Card -->
        @foreach ($bookCategories as $bookCategory)
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-primary-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-book-open text-2xl text-primary-600"></i>
                </div>
                <div class="flex gap-2">
                    <button class="text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </button>
                    <button class="text-red-600 hover:text-red-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $bookCategory->category_name }}</h3>
            <p class="text-sm text-gray-500">Total: <span class="font-semibold text-gray-900">45 buku</span></p>
        </div>
        @endforeach
    </div>
</x-admin-layout>
