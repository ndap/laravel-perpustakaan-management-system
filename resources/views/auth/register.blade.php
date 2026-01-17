<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Daftar Akun Baru</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Bergabunglah dengan BukuHub untuk akses perpustakaan digital</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Full Name -->
            <div>
                <x-input-label for="full_name" :value="__('Nama Lengkap')" />
                <x-text-input id="full_name" class="block mt-1 w-full" type="text" name="full_name" :value="old('full_name')" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap" />
                <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
            </div>

            <!-- Username -->
            <div>
                <x-input-label for="username" :value="__('Username')" />
                <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autocomplete="username" placeholder="contoh: john_doe123" />
                <x-input-error :messages="$errors->get('username')" class="mt-2" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" placeholder="contoh@email.com" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div>
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="tel" name="phone_number" :value="old('phone_number')" required autocomplete="tel" placeholder="08xxxxxxxxxx" />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>
        </div>

        <!-- Address -->
        <div class="mt-4">
            <x-input-label for="address" :value="__('Alamat')" />
            <textarea id="address" name="address" rows="2" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Kata Sandi')" />
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" 
                                placeholder="Minimal 8 karakter" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Ulangi kata sandi" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors" href="{{ route('login') }}">
                {{ __('Sudah punya akun? Masuk') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
