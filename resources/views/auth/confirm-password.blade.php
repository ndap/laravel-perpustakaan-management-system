<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
            <svg class="h-8 w-8 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Konfirmasi Kata Sandi</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Ini adalah area yang aman. Silakan konfirmasi kata sandi Anda sebelum melanjutkan.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" 
                            placeholder="Masukkan kata sandi Anda" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-6">
            <x-primary-button>
                {{ __('Konfirmasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
