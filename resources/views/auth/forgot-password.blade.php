<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Lupa Kata Sandi?</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan link untuk mereset kata sandi.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="contoh@email.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors" href="{{ route('login') }}">
                {{ __('Kembali ke login') }}
            </a>

            <x-primary-button>
                {{ __('Kirim Link Reset') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
