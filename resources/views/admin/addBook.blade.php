<x-admin-layout>
    <x-slot name="title">Tambah Buku</x-slot>

    <!-- Page Header with Gradient Background -->
    <div class="mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 via-emerald-500/10 to-green-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
            <div class="flex items-center gap-4">
                <!-- Back Button -->
                <a href="{{ route('admin.books') }}" class="group flex items-center justify-center w-12 h-12 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5 text-gray-600 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Tambah Buku Baru</h1>
                        <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tambahkan buku ke koleksi perpustakaan digital
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Error Messages -->
    @if($errors->any())
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="mb-6 p-4 bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-xl shadow-sm"
        >
            <div class="flex items-center gap-3 mb-2">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-red-800 font-medium">Terjadi kesalahan validasi:</p>
                <button x-on:click="show = false" class="ml-auto text-red-600 hover:text-red-800 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <ul class="list-disc list-inside text-sm text-red-700 ml-12">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <!-- Form -->
        <form 
            action="{{ route('book.store') }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="p-8"
            x-data="{
                isDragging: false,
                previewUrl: '',
                fileName: '',
                handleDrop(e) {
                    this.isDragging = false;
                    const files = e.dataTransfer.files;
                    if (files.length > 0) {
                        this.handleFile(files[0]);
                    }
                },
                handleFile(file) {
                    if (file && file.type.startsWith('image/')) {
                        this.fileName = file.name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.previewUrl = e.target.result;
                        };
                        reader.readAsDataURL(file);
                        
                        // Set file to input
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);
                        this.$refs.coverInput.files = dataTransfer.files;
                    }
                },
                handleFileInput(e) {
                    const file = e.target.files[0];
                    if (file) {
                        this.handleFile(file);
                    }
                },
                clearPreview() {
                    this.previewUrl = '';
                    this.fileName = '';
                    this.$refs.coverInput.value = '';
                }
            }"
        >
            @csrf

            <div class="space-y-6">
                <!-- Cover Upload with Drag & Drop -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Cover Buku
                        </div>
                    </label>
                    
                    <!-- Dropzone -->
                    <div 
                        x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false"
                        x-on:drop.prevent="handleDrop($event)"
                        x-bind:class="isDragging ? 'border-primary-500 bg-primary-50' : 'border-gray-300 hover:border-primary-400'"
                        class="relative border-2 border-dashed rounded-xl p-8 transition-all duration-200 cursor-pointer"
                        x-on:click="$refs.coverInput.click()"
                    >
                        <input 
                            type="file" 
                            name="cover" 
                            x-ref="coverInput"
                            x-on:change="handleFileInput($event)"
                            accept="image/jpeg,image/png,image/jpg,image/gif,image/webp"
                            class="hidden"
                        >

                        <!-- Preview or Placeholder -->
                        <div class="text-center">
                            <template x-if="previewUrl">
                                <div class="relative inline-block">
                                    <img 
                                        x-bind:src="previewUrl" 
                                        class="max-h-64 rounded-lg shadow-md mx-auto"
                                        alt="Preview cover"
                                    >
                                    <button 
                                        type="button"
                                        x-on:click.stop="clearPreview()"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-2 hover:bg-red-600 transition-colors shadow-lg"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <p class="text-xs text-gray-500 mt-3" x-text="fileName"></p>
                                </div>
                            </template>
                            <template x-if="!previewUrl">
                                <div>
                                    <div class="mx-auto w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-base font-medium text-gray-700">Drag & drop cover buku di sini</p>
                                    <p class="text-sm text-gray-500 mt-2">atau klik untuk memilih file</p>
                                    <p class="text-xs text-gray-400 mt-3">Format: JPEG, PNG, GIF, WebP (Maks. 2MB)</p>
                                </div>
                            </template>
                        </div>
                    </div>
                    @error('cover')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                            </svg>
                            Judul Buku
                            <span class="text-red-500">*</span>
                        </div>
                    </label>
                    <input 
                        id="title" 
                        name="title" 
                        type="text" 
                        class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                        value="{{ old('title') }}" 
                        required 
                        autofocus
                        placeholder="Masukkan judul buku"
                    >
                    @error('title')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Author & Publisher in Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="author" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Penulis
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <input 
                            id="author" 
                            name="author" 
                            type="text" 
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                            value="{{ old('author') }}" 
                            required 
                            placeholder="Nama penulis"
                        >
                        @error('author')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="publisher" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                Penerbit
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <input 
                            id="publisher" 
                            name="publisher" 
                            type="text" 
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                            value="{{ old('publisher') }}" 
                            required 
                            placeholder="Nama penerbit"
                        >
                        @error('publisher')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Publication Year -->
                <div>
                    <label for="publication_year" class="block text-sm font-semibold text-gray-700 mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Tahun Terbit
                            <span class="text-red-500">*</span>
                        </div>
                    </label>
                    <input 
                        id="publication_year" 
                        name="publication_year" 
                        type="number" 
                        class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                        value="{{ old('publication_year') }}" 
                        required 
                        min="1900"
                        max="{{ date('Y') }}"
                        placeholder="Contoh: 2024"
                    >
                    @error('publication_year')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Synopsis -->
                <div>
                    <label for="synopsis" class="block text-sm font-semibold text-gray-700 mb-2">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
                            </svg>
                            Sinopsis
                        </div>
                    </label>
                    <textarea 
                        id="synopsis" 
                        name="synopsis" 
                        rows="5"
                        class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300"
                        placeholder="Deskripsi singkat tentang buku ini..."
                    >{{ old('synopsis') }}</textarea>
                    @error('synopsis')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categories -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Kategori
                            <span class="text-red-500">*</span>
                        </div>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($categories as $category)
                            <label class="flex items-center p-3 bg-gray-50 rounded-xl hover:bg-primary-50 transition-colors cursor-pointer border-2 border-gray-200 hover:border-primary-300">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    value="{{ $category->id }}"
                                    class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500"
                                    @if(is_array(old('categories')) && in_array($category->id, old('categories')))
                                        checked
                                    @endif
                                >
                                <span class="ml-2 text-sm text-gray-700 font-medium">{{ $category->category_name }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('categories')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="mt-8 flex justify-end gap-3 pt-6 border-t-2 border-gray-100">
                <a 
                    href="{{ route('admin.books') }}"
                    class="px-6 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors shadow-sm hover:shadow-md"
                >
                    Batal
                </a>
                <button 
                    type="submit"
                    class="px-8 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-emerald-600 rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105"
                >
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Buku
                    </div>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
