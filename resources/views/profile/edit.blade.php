@php
    $layout = $user->role === 'user' ? 'home-layout' : 'admin-layout';
@endphp

<x-dynamic-component :component="$layout">
    <x-slot name="title">Profil Saya</x-slot>

    <!-- Flash Messages -->
    @if(session('status') === 'profile-updated')
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-green-800 font-medium">Profil berhasil diperbarui!</p>
            <button x-on:click="show = false" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('status') === 'password-updated')
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-green-800 font-medium">Password berhasil diperbarui!</p>
            <button x-on:click="show = false" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('status') === 'photo-updated')
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-green-800 font-medium">Foto profil berhasil diperbarui!</p>
            <button x-on:click="show = false" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('status') === 'photo-deleted')
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-blue-800 font-medium">Foto profil berhasil dihapus!</p>
            <button x-on:click="show = false" class="ml-auto text-blue-600 hover:text-blue-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Page Header with Gradient Background -->
    <div class="mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 via-emerald-500/10 to-green-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <!-- Profile Avatar with Upload -->
                <div x-data="{ 
                    previewUrl: '{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : '' }}',
                    showUploadModal: false,
                    fileSelected: false,
                    fileName: '',
                    handleFileSelect(event) {
                        const file = event.target.files[0];
                        if (file) {
                            this.fileSelected = true;
                            this.fileName = file.name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                this.previewUrl = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                }" class="relative group">
                    <!-- Avatar Container -->
                    <div class="relative">
                        @if($user->photo_profile)
                            <img 
                                :src="previewUrl || '{{ asset('storage/' . $user->photo_profile) }}'" 
                                alt="{{ $user->full_name }}" 
                                class="w-24 h-24 rounded-2xl object-cover shadow-xl border-2 border-white"
                            >
                        @else
                            <div x-show="!previewUrl" class="w-24 h-24 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-xl text-white text-3xl font-bold">
                                {{ strtoupper(substr($user->full_name ?? $user->username ?? 'U', 0, 2)) }}
                            </div>
                            <img 
                                x-show="previewUrl" 
                                :src="previewUrl" 
                                alt="{{ $user->full_name }}" 
                                class="w-24 h-24 rounded-2xl object-cover shadow-xl border-2 border-white"
                                style="display: none;"
                            >
                        @endif
                        
                        <!-- Upload Overlay -->
                        <div class="absolute inset-0 bg-black/50 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center cursor-pointer"
                             x-on:click="showUploadModal = true">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Photo Upload Modal -->
                    <div x-show="showUploadModal" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100"
                         x-transition:leave-end="opacity-0"
                         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
                         style="display: none;"
                         x-on:click.self="showUploadModal = false; fileSelected = false;">
                        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6" x-on:click.stop>
                            <div class="text-center mb-6">
                                <div class="mx-auto w-16 h-16 bg-gradient-to-br from-primary-100 to-emerald-200 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Ubah Foto Profil</h3>
                                <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF, WEBP (Maks. 2MB)</p>
                            </div>

                            <form action="{{ route('profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Preview Area -->
                                <div class="mb-6 flex justify-center">
                                    <div class="relative">
                                        <template x-if="previewUrl">
                                            <img :src="previewUrl" class="w-32 h-32 rounded-2xl object-cover shadow-lg border-2 border-gray-100">
                                        </template>
                                        <template x-if="!previewUrl">
                                            <div class="w-32 h-32 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg text-white text-4xl font-bold">
                                                {{ strtoupper(substr($user->full_name ?? $user->username ?? 'U', 0, 2)) }}
                                            </div>
                                        </template>
                                    </div>
                                </div>

                                <!-- File Input -->
                                <div class="mb-6">
                                    <label class="block w-full cursor-pointer">
                                        <div class="border-2 border-dashed rounded-xl p-4 text-center transition-colors"
                                             :class="fileSelected ? 'border-primary-300 bg-primary-50' : 'border-gray-300 hover:border-primary-400'">
                                            <input type="file" name="photo_profile" accept="image/*" class="hidden" x-on:change="handleFileSelect($event)" required>
                                            <svg class="w-8 h-8 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            <p class="text-sm" :class="fileSelected ? 'text-primary-700 font-medium' : 'text-gray-500'">
                                                <span x-show="!fileSelected">Klik untuk memilih foto</span>
                                                <span x-show="fileSelected" x-text="fileName"></span>
                                            </p>
                                        </div>
                                    </label>
                                </div>

                                @error('photo_profile')
                                    <p class="mb-4 text-sm text-red-600 text-center">{{ $message }}</p>
                                @enderror

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <button type="button" 
                                            x-on:click="showUploadModal = false; fileSelected = false; previewUrl = '{{ $user->photo_profile ? asset('storage/' . $user->photo_profile) : '' }}';"
                                            class="flex-1 px-4 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors">
                                        Batal
                                    </button>
                                    <button type="submit" 
                                            :disabled="!fileSelected"
                                            class="flex-1 px-4 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-emerald-600 rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed">
                                        Simpan Foto
                                    </button>
                                </div>
                            </form>

                            @if($user->photo_profile)
                                <div class="mt-4 pt-4 border-t border-gray-100">
                                    <form action="{{ route('profile.photo.delete') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto profil?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-red-600 hover:text-red-700 hover:bg-red-50 rounded-lg transition-colors flex items-center justify-center gap-2">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Hapus Foto
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <div>
                            <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">{{ $user->full_name ?? 'User' }}</h1>
                            <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                                {{ '@' . $user->username }}
                            </p>
                        </div>
                    </div>
                    
                    <!-- Quick Info -->
                    <div class="flex flex-wrap gap-4 mt-3">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            {{ $user->email }}
                            @if($user->email_verified_at)
                                <span class="w-4 h-4 bg-green-100 rounded-full flex items-center justify-center" title="Email terverifikasi">
                                    <svg class="w-2.5 h-2.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        
                        @php
                            $roleClasses = [
                                'admin' => 'bg-gradient-to-r from-red-100 to-red-200 text-red-800 border-red-300',
                                'librarian' => 'bg-gradient-to-r from-emerald-100 to-emerald-200 text-emerald-800 border-emerald-300',
                                'user' => 'bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 border-blue-300',
                            ];
                            $roleLabels = [
                                'admin' => 'Admin',
                                'librarian' => 'Pustakawan',
                                'user' => 'Member',
                            ];
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full border {{ $roleClasses[$user->role] ?? $roleClasses['user'] }}">
                            {{ $roleLabels[$user->role] ?? 'User' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content - Profile Information -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Update Profile Information -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Informasi Profil</h2>
                            <p class="text-xs text-gray-500">Perbarui informasi akun dan alamat email Anda</p>
                        </div>
                    </div>
                </div>
                
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                
                <form method="post" action="{{ route('profile.update') }}" class="p-6 space-y-6">
                    @csrf
                    @method('patch')
                    
                    <!-- Full Name & Username -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="full_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Nama Lengkap
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input 
                                id="full_name" 
                                name="full_name" 
                                type="text" 
                                class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                value="{{ old('full_name', $user->full_name) }}" 
                                required 
                                autofocus
                                placeholder="Masukkan nama lengkap"
                                @if($user->role === 'user') readonly class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed text-gray-500" @endif
                            >
                            @error('full_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="username" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                    Username
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input 
                                id="username" 
                                name="username" 
                                type="text" 
                                class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                value="{{ old('username', $user->username) }}" 
                                required 
                                placeholder="Masukkan username"
                            >
                            @error('username')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Email & Phone -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Email
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                value="{{ old('email', $user->email) }}" 
                                required 
                                placeholder="contoh@email.com"
                                @if($user->role === 'user') readonly class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed text-gray-500" @endif
                            >
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            
                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-3 p-3 bg-yellow-50 border border-yellow-200 rounded-lg">
                                    <p class="text-sm text-yellow-800 flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                        Email belum diverifikasi.
                                        <button form="send-verification" class="underline text-yellow-700 hover:text-yellow-900 font-semibold">
                                            Kirim ulang email verifikasi
                                        </button>
                                    </p>
                                    
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="mt-2 text-sm text-green-600 font-medium">
                                            Link verifikasi baru telah dikirim ke email Anda.
                                        </p>
                                    @endif
                                </div>
                            @endif
                        </div>
                        
                        <div>
                            <label for="phone_number" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Nomor Telepon
                                </div>
                            </label>
                            <input 
                                id="phone_number" 
                                name="phone_number" 
                                type="text" 
                                class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                value="{{ old('phone_number', $user->phone_number) }}" 
                                placeholder="08xxxxxxxxxx"
                                @if($user->role === 'user') readonly class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed text-gray-500" @endif
                            >
                            @error('phone_number')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Alamat
                            </div>
                        </label>
                        <textarea 
                            id="address" 
                            name="address" 
                            rows="3"
                            class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300"
                            placeholder="Masukkan alamat lengkap..."
                            @if($user->role === 'user') readonly class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-0 focus:border-gray-300 bg-gray-100 cursor-not-allowed text-gray-500" @endif
                        >{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button 
                            type="submit"
                            class="px-8 py-3 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-emerald-600 rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105"
                        >
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Simpan Perubahan
                            </div>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Update Password -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden hover:shadow-xl transition-shadow">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-orange-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Ubah Password</h2>
                            <p class="text-xs text-gray-500">Pastikan menggunakan password yang kuat dan unik</p>
                        </div>
                    </div>
                </div>
                
                <form method="post" action="{{ route('password.update') }}" class="p-6 space-y-6">
                    @csrf
                    @method('put')
                    
                    <!-- Current Password -->
                    <div>
                        <label for="current_password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Password Saat Ini
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <div class="relative" x-data="{ showPassword: false }">
                            <input 
                                id="current_password" 
                                name="current_password" 
                                x-bind:type="showPassword ? 'text' : 'password'"
                                class="w-full px-4 py-3 pr-12 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                autocomplete="current-password"
                                placeholder="Masukkan password saat ini"
                            >
                            <button 
                                type="button"
                                x-on:click="showPassword = !showPassword"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                            >
                                <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                        @error('current_password', 'updatePassword')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- New Password & Confirm -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg>
                                    Password Baru
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <div class="relative" x-data="{ showPassword: false }">
                                <input 
                                    id="password" 
                                    name="password" 
                                    x-bind:type="showPassword ? 'text' : 'password'"
                                    class="w-full px-4 py-3 pr-12 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                    autocomplete="new-password"
                                    placeholder="Minimal 8 karakter"
                                >
                                <button 
                                    type="button"
                                    x-on:click="showPassword = !showPassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                >
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password', 'updatePassword')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div>
                            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                    Konfirmasi Password
                                    <span class="text-red-500">*</span>
                                </div>
                            </label>
                            <div class="relative" x-data="{ showPassword: false }">
                                <input 
                                    id="password_confirmation" 
                                    name="password_confirmation" 
                                    x-bind:type="showPassword ? 'text' : 'password'"
                                    class="w-full px-4 py-3 pr-12 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                    autocomplete="new-password"
                                    placeholder="Ulangi password baru"
                                >
                                <button 
                                    type="button"
                                    x-on:click="showPassword = !showPassword"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors"
                                >
                                    <svg x-show="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg x-show="showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password_confirmation', 'updatePassword')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex justify-end pt-4 border-t border-gray-100">
                        <button 
                            type="submit"
                            class="px-8 py-3 text-sm font-semibold text-white bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl hover:from-amber-600 hover:to-orange-700 transition-all duration-300 shadow-lg shadow-amber-500/30 hover:shadow-xl hover:shadow-amber-500/50 hover:scale-105"
                        >
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Ubah Password
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Sidebar - Account Info & Danger Zone -->
        <div class="space-y-6">
            <!-- Account Information -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-gray-900">Info Akun</h2>
                            <p class="text-xs text-gray-500">Detail akun Anda</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Bergabung</span>
                        <span class="text-sm font-semibold text-gray-900">{{ $user->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-600">Terakhir diperbarui</span>
                        <span class="text-sm font-semibold text-gray-900">{{ $user->updated_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-gray-600">Status Email</span>
                        @if($user->email_verified_at)
                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Terverifikasi
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                Belum Verifikasi
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Danger Zone - Delete Account -->
            <div class="bg-white rounded-2xl shadow-lg border border-red-200 overflow-hidden">
                <div class="p-6 border-b border-red-100 bg-gradient-to-r from-red-50 to-rose-50">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-md">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-red-900">Zona Berbahaya</h2>
                            <p class="text-xs text-red-600">Tindakan permanen</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-6">
                    <p class="text-sm text-gray-600 mb-4">
                        Setelah akun Anda dihapus, semua data dan informasi akan dihapus secara permanen. Pastikan untuk mengunduh data yang ingin Anda simpan sebelum menghapus akun.
                    </p>
                    
                    <button 
                        x-data
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                        class="w-full px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl hover:from-red-600 hover:to-red-700 transition-all duration-300 shadow-lg shadow-red-500/30 hover:shadow-xl hover:shadow-red-500/50"
                    >
                        <div class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Akun
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Delete Account Modal -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')
            
            <div class="text-center mb-6">
                <div class="mx-auto w-16 h-16 bg-gradient-to-br from-red-100 to-red-200 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-gray-900">Hapus Akun?</h2>
                <p class="text-sm text-gray-600 mt-2">Semua data dan informasi akan dihapus secara permanen. Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            
            <div class="mb-6">
                <label for="delete_password" class="block text-sm font-semibold text-gray-700 mb-2">
                    Konfirmasi Password
                </label>
                <input 
                    id="delete_password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-red-500 transition-all"
                    placeholder="Masukkan password untuk konfirmasi"
                >
                @error('password', 'userDeletion')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex gap-3">
                <button 
                    type="button" 
                    x-on:click="$dispatch('close')"
                    class="flex-1 px-4 py-3 text-sm font-semibold text-gray-700 bg-gray-100 rounded-xl hover:bg-gray-200 transition-colors"
                >
                    Batal
                </button>
                <button 
                    type="submit"
                    class="flex-1 px-4 py-3 text-sm font-semibold text-white bg-gradient-to-r from-red-500 to-red-600 rounded-xl hover:from-red-600 hover:to-red-700 transition-all shadow-lg"
                >
                    Hapus Akun Saya
                </button>
            </div>
        </form>
    </x-modal>
</x-dynamic-component>
