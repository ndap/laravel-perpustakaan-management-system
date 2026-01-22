<x-modal name="add-category-modal" :show="false" maxWidth="xl">
    <!-- Improved Modal Container with Better Spacing -->
    <div class="relative bg-white rounded-2xl shadow-2xl overflow-hidden">
        <!-- Gradient Header -->
        <div class="bg-gradient-to-r from-primary-600 to-emerald-600 px-8 py-5">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">Tambah Kategori Baru</h2>
                        <p class="text-sm text-white/80 mt-0.5">Isi informasi kategori di bawah ini</p>
                    </div>
                </div>
                <button 
                    x-on:click="$dispatch('close-modal', 'add-category-modal')"
                    class="text-white/80 hover:text-white transition-colors p-2 hover:bg-white/10 rounded-lg"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Form Content -->
        <form action="{{ route('category.store') }}" method="POST" class="px-8 py-6">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column: Category Name -->
                <div class="lg:col-span-2">
                    <label for="category_name" class="block text-sm font-semibold text-gray-700 mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Nama Kategori
                            <span class="text-red-500">*</span>
                        </div>
                    </label>
                    <input 
                        type="text" 
                        id="category_name"
                        name="category_name" 
                        value="{{ old('category_name') }}"
                        placeholder="Contoh: Fiksi, Non-Fiksi, Sejarah, Teknologi..."
                        required
                        autofocus
                        class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300 placeholder:text-gray-400"
                    >
                    @error('category_name')
                        <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Icon Picker Section -->
                <div class="lg:col-span-2" x-data="{ 
                    selectedIcon: '{{ old('icon', 'fa-tag') }}',
                    popularIcons: [
                        'fa-tag', 'fa-book', 'fa-bookmark', 'fa-star', 'fa-heart',
                        'fa-graduation-cap', 'fa-flask', 'fa-globe', 'fa-rocket', 
                        'fa-lightbulb', 'fa-palette', 'fa-music', 'fa-film', 'fa-camera',
                        'fa-code', 'fa-database', 'fa-gamepad', 'fa-puzzle-piece', 
                        'fa-child', 'fa-tree', 'fa-mountain', 'fa-utensils', 
                        'fa-shopping-cart', 'fa-briefcase'
                    ]
                }">
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                            Icon FontAwesome
                            <span class="text-gray-400 text-xs font-normal">(opsional)</span>
                        </div>
                    </label>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Icon Preview -->
                        <div class="md:col-span-1">
                            <div class="p-4 bg-gradient-to-br from-primary-50 to-emerald-50 border-2 border-primary-200 rounded-xl h-full flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-white rounded-xl flex items-center justify-center shadow-md mb-3">
                                    <i :class="'fas ' + selectedIcon + ' text-3xl text-primary-600'"></i>
                                </div>
                                <p class="text-sm font-semibold text-gray-700">Preview</p>
                                <p class="text-xs text-gray-500 mt-1" x-text="selectedIcon"></p>
                            </div>
                        </div>

                        <!-- Icon Selection -->
                        <div class="md:col-span-2 space-y-3">
                            <!-- Icon Input -->
                            <input 
                                type="text" 
                                id="icon"
                                name="icon" 
                                x-model="selectedIcon"
                                placeholder="Ketik nama icon: fa-book, fa-star..."
                                class="w-full px-4 py-2.5 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300 placeholder:text-gray-400"
                            >

                            <!-- Popular Icons Grid - More Compact -->
                            <div>
                                <p class="text-xs font-medium text-gray-600 mb-2">Pilih dari icon populer:</p>
                                <div class="grid grid-cols-8 gap-1.5 max-h-28 overflow-y-auto p-2 bg-gray-50 rounded-lg border-2 border-gray-200">
                                    <template x-for="icon in popularIcons" :key="icon">
                                        <button 
                                            type="button"
                                            @click="selectedIcon = icon"
                                            :class="selectedIcon === icon ? 'bg-primary-600 text-white ring-2 ring-primary-300' : 'bg-white text-gray-600 hover:bg-primary-100'"
                                            class="aspect-square rounded-lg border border-gray-200 flex items-center justify-center transition-all hover:scale-110 shadow-sm text-sm"
                                            :title="icon"
                                        >
                                            <i :class="'fas ' + icon"></i>
                                        </button>
                                    </template>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">
                                    Lihat lebih banyak icon di 
                                    <a href="https://fontawesome.com/icons" target="_blank" class="text-primary-600 hover:underline font-medium">fontawesome.com/icons</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Improved Footer with Better Spacing -->
            <div class="flex items-center justify-end gap-3 pt-6 mt-6 border-t-2 border-gray-100">
                <button 
                    type="button"
                    x-on:click="$dispatch('close-modal', 'add-category-modal')"
                    class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all font-semibold shadow-sm hover:shadow-md"
                >
                    <div class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </div>
                </button>
                <button 
                    type="submit"
                    class="px-8 py-2.5 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105"
                >
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Kategori
                    </div>
                </button>
            </div>
        </form>
    </div>
</x-modal>
