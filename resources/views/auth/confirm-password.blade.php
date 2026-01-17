<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Konfirmasi Password</h2>
        <p class="text-gray-600 text-sm">
            Ini adalah area aman dari aplikasi. Silakan konfirmasi password Anda sebelum melanjutkan.
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="auth-label">Password</label>
            <input 
                id="password" 
                class="auth-input @error('password') auth-input-error @enderror" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                placeholder="Masukkan password Anda"
            >
            @error('password')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="auth-button-primary mb-6">
            Konfirmasi
        </button>

        <!-- Cancel Link -->
        <div class="text-center">
            <a class="auth-link text-sm inline-flex items-center justify-center" href="{{ route('dashboard') }}">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali
            </a>
        </div>
    </form>
</x-guest-layout>
