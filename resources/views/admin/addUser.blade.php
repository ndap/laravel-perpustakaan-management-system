<x-admin-layout>
    <x-slot name="title">Tambah User</x-slot>

    <!-- Page Header with Gradient Background -->
    <div class="mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 via-emerald-500/10 to-green-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
            <div class="flex items-center gap-4">
                <!-- Back Button -->
                <a href="{{ route('admin.users') }}" class="group flex items-center justify-center w-12 h-12 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all duration-300 hover:scale-105">
                    <svg class="w-5 h-5 text-gray-600 group-hover:-translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>

                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Tambah User Baru</h1>
                        <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Daftarkan pengguna baru ke perpustakaan digital
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
            action="{{ route('user.store') }}" 
            method="POST"
            class="p-8"
        >
            @csrf

            <div class="space-y-6">
                <!-- Full Name & Username in Grid -->
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
                            value="{{ old('full_name') }}" 
                            required 
                            autofocus
                            placeholder="Masukkan nama lengkap"
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
                            value="{{ old('username') }}" 
                            required 
                            placeholder="Masukkan username"
                        >
                        @error('username')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email & Phone in Grid -->
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
                            value="{{ old('email') }}" 
                            required 
                            placeholder="contoh@email.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
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
                            value="{{ old('phone_number') }}" 
                            placeholder="08xxxxxxxxxx"
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
                    >{{ old('address') }}</textarea>
                    @error('address')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password & Confirm Password in Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                                Password
                                <span class="text-red-500">*</span>
                            </div>
                        </label>
                        <div class="relative" x-data="{ showPassword: false }">
                            <input 
                                id="password" 
                                name="password" 
                                x-bind:type="showPassword ? 'text' : 'password'"
                                class="w-full px-4 py-3 pr-12 text-base border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all hover:border-primary-300" 
                                required 
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
                        @error('password')
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
                                required 
                                placeholder="Ulangi password"
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
                    </div>
                </div>

                <!-- Role Selection -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                            Pilih Role
                            <span class="text-red-500">*</span>
                        </div>
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Admin -->
                        <label class="relative cursor-pointer">
                            <input 
                                type="radio" 
                                name="role" 
                                value="admin"
                                class="peer sr-only"
                                {{ old('role') === 'admin' ? 'checked' : '' }}
                            >
                            <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200 hover:border-red-300 peer-checked:border-red-500 peer-checked:bg-red-50 transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-200 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Admin</p>
                                        <p class="text-xs text-gray-500">Akses penuh ke sistem</p>
                                    </div>
                                </div>
                            </div>
                        </label>

                        <!-- Librarian -->
                        <label class="relative cursor-pointer">
                            <input 
                                type="radio" 
                                name="role" 
                                value="librarian"
                                class="peer sr-only"
                                {{ old('role') === 'librarian' ? 'checked' : '' }}
                            >
                            <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200 hover:border-emerald-300 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-emerald-100 to-emerald-200 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Pustakawan</p>
                                        <p class="text-xs text-gray-500">Kelola perpustakaan</p>
                                    </div>
                                </div>
                            </div>
                        </label>

                        {{-- <!-- User -->
                        <label class="relative cursor-pointer">
                            <input 
                                type="radio" 
                                name="role" 
                                value="user"
                                class="peer sr-only"
                                {{ old('role', 'user') === 'user' ? 'checked' : '' }}
                            >
                            <div class="p-4 bg-gray-50 rounded-xl border-2 border-gray-200 hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition-all">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-100 to-blue-200 rounded-xl flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">Member</p>
                                        <p class="text-xs text-gray-500">Pengguna biasa</p>
                                    </div>
                                </div>
                            </div>
                        </label> --}}
                    </div>
                    @error('role')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="mt-8 flex justify-end gap-3 pt-6 border-t-2 border-gray-100">
                <a 
                    href="{{ route('admin.users') }}"
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
                        Simpan User
                    </div>
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
