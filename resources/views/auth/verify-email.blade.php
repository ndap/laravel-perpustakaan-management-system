<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-yellow-100 dark:bg-yellow-900 mb-4">
            <svg class="h-8 w-8 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Verifikasi Email Anda</h2>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi alamat email Anda dengan mengklik link yang baru saja kami kirimkan. Jika tidak menerima email tersebut, kami akan dengan senang hati mengirimkan ulang.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 p-4 rounded-md bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-800">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800 dark:text-green-200">
                        {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda daftarkan.') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-6 flex flex-col sm:flex-row items-center justify-between gap-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-primary-button>
                {{ __('Kirim Ulang Email Verifikasi') }}
            </x-primary-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline transition-colors">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</x-guest-layout>
