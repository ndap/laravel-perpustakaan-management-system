<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Selamat Datang Kembali</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Masuk ke akun BukuHub Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email or Username -->
        <div>
            <x-input-label for="login" :value="__('Email atau Username')" />
            <x-text-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus autocomplete="username" placeholder="Masukkan email atau username" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Masukkan kata sandi" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Ingat saya') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>

        <div class="mt-6 text-center">
            <span class="text-sm text-gray-600 dark:text-gray-400">Belum punya akun?</span>
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors ms-1" href="{{ route('register') }}">
                {{ __('Daftar sekarang') }}
            </a>
        </div>
    </form>
</x-guest-layout>
