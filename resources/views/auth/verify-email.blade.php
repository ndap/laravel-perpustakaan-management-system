<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Verifikasi Email</h2>
        <p class="text-gray-600 text-sm">
            Terima kasih telah mendaftar! Sebelum memulai, mohon verifikasi email Anda dengan mengklik link yang telah kami kirimkan.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="auth-success-message mb-4">
            Link verifikasi baru telah dikirim ke email Anda!
        </div>
    @endif

    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-green-600 mt-0.5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <div>
                <p class="text-sm text-green-800 font-medium">Cek Email Anda</p>
                <p class="text-xs text-green-700 mt-1">
                    Jika Anda tidak menerima email, klik tombol di bawah untuk mengirim ulang.
                </p>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-3">
        <!-- Resend Verification Email -->
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="auth-button-primary">
                Kirim Ulang Email Verifikasi
            </button>
        </form>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full py-3 px-6 rounded-full border-2 border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition-all">
                Keluar
            </button>
        </form>
    </div>
</x-guest-layout>
