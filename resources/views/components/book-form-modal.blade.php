@props(['categories', 'book' => null])

@php
    $isEdit = $book !== null;
    $modalName = $isEdit ? 'edit-book-modal-' . $book->id : 'add-book-modal';
    $formAction = $isEdit ? route('book.update', $book->id) : route('book.store');
    $modalTitle = $isEdit ? 'Edit Buku' : 'Tambah Buku Baru';
@endphp

<div 
    x-data="{
        show: false,
        isDragging: false,
        previewUrl: '{{ $isEdit && $book->image ? Storage::url($book->image) : '' }}',
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
    x-on:open-modal.window="$event.detail == '{{ $modalName }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $modalName }}' ? show = false : null"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    x-cloak
    class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
    style="display: none;"
>
    <!-- Backdrop -->
    <div 
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm"
        x-on:click="show = false"
    ></div>

    <!-- Modal Content -->
    <div 
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-auto my-8 overflow-hidden"
    >
        <!-- Header -->
        <div class="bg-linear-to-r from-primary-600 to-primary-700 px-6 py-4">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-white">{{ $modalTitle }}</h3>
                <button 
                    type="button" 
                    x-on:click="show = false"
                    class="text-white/80 hover:text-white transition-colors"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Form -->
        <form 
            action="{{ $formAction }}" 
            method="POST" 
            enctype="multipart/form-data"
            class="p-6"
        >
            @csrf
            @if($isEdit)
                @method('PUT')
            @endif

            <div class="space-y-5">
                <!-- Cover Upload with Drag & Drop -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Cover Buku</label>
                    
                    <!-- Dropzone -->
                    <div 
                        x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false"
                        x-on:drop.prevent="handleDrop($event)"
                        x-bind:class="isDragging ? 'border-primary-500 bg-primary-50' : 'border-gray-300 hover:border-primary-400'"
                        class="relative border-2 border-dashed rounded-xl p-6 transition-all duration-200 cursor-pointer"
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
                                        class="max-h-48 rounded-lg shadow-md mx-auto"
                                        alt="Preview cover"
                                    >
                                    <button 
                                        type="button"
                                        x-on:click.stop="clearPreview()"
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600 transition-colors shadow-lg"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                    <p class="text-xs text-gray-500 mt-2" x-text="fileName"></p>
                                </div>
                            </template>
                            <template x-if="!previewUrl">
                                <div>
                                    <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-700">Drag & drop cover buku di sini</p>
                                    <p class="text-xs text-gray-500 mt-1">atau klik untuk memilih file</p>
                                    <p class="text-xs text-gray-400 mt-2">Format: JPEG, PNG, GIF, WebP (Maks. 2MB)</p>
                                </div>
                            </template>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                </div>

                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Judul Buku')" class="font-semibold" />
                    <x-text-input 
                        id="title" 
                        name="title" 
                        type="text" 
                        class="mt-1 block w-full" 
                        :value="old('title', $book?->title)" 
                        required 
                        placeholder="Masukkan judul buku"
                    />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Author & Publisher in Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="author" :value="__('Penulis')" class="font-semibold" />
                        <x-text-input 
                            id="author" 
                            name="author" 
                            type="text" 
                            class="mt-1 block w-full" 
                            :value="old('author', $book?->author)" 
                            required 
                            placeholder="Nama penulis"
                        />
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="publisher" :value="__('Penerbit')" class="font-semibold" />
                        <x-text-input 
                            id="publisher" 
                            name="publisher" 
                            type="text" 
                            class="mt-1 block w-full" 
                            :value="old('publisher', $book?->publisher)" 
                            required 
                            placeholder="Nama penerbit"
                        />
                        <x-input-error :messages="$errors->get('publisher')" class="mt-2" />
                    </div>
                </div>

                <!-- Publication Year -->
                <div>
                    <x-input-label for="publication_year" :value="__('Tahun Terbit')" class="font-semibold" />
                    <x-text-input 
                        id="publication_year" 
                        name="publication_year" 
                        type="number" 
                        class="mt-1 block w-full" 
                        :value="old('publication_year', $book?->publication_year)" 
                        required 
                        min="1900"
                        max="{{ date('Y') }}"
                        placeholder="Contoh: 2024"
                    />
                    <x-input-error :messages="$errors->get('publication_year')" class="mt-2" />
                </div>

                <!-- Synopsis -->
                <div>
                    <x-input-label for="synopsis" :value="__('Sinopsis')" class="font-semibold" />
                    <textarea 
                        id="synopsis" 
                        name="synopsis" 
                        rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500"
                        placeholder="Deskripsi singkat tentang buku ini..."
                    >{{ old('synopsis', $book?->synopsis) }}</textarea>
                    <x-input-error :messages="$errors->get('synopsis')" class="mt-2" />
                </div>

                <!-- Categories -->
                <div>
                    <x-input-label :value="__('Kategori')" class="font-semibold mb-3" />
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($categories as $category)
                            <label class="flex items-center p-3 bg-gray-50 rounded-lg hover:bg-primary-50 transition-colors cursor-pointer border border-gray-200 hover:border-primary-300">
                                <input 
                                    type="checkbox" 
                                    name="categories[]" 
                                    value="{{ $category->id }}"
                                    class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500"
                                    @if($isEdit && $book->categories->contains($category->id))
                                        checked
                                    @elseif(is_array(old('categories')) && in_array($category->id, old('categories')))
                                        checked
                                    @endif
                                >
                                <span class="ml-2 text-sm text-gray-700">{{ $category->category_name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="mt-8 flex justify-end gap-3 border-t pt-6">
                <button 
                    type="button" 
                    x-on:click="show = false"
                    class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors"
                >
                    Batal
                </button>
                <button 
                    type="submit"
                    class="px-5 py-2.5 text-sm font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors shadow-lg shadow-primary-500/30"
                >
                    {{ $isEdit ? 'Perbarui Buku' : 'Simpan Buku' }}
                </button>
            </div>
        </form>
    </div>
</div>
