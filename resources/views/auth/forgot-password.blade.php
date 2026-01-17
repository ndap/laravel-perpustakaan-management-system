<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Lupa Password?</h2>
        <p class="text-gray-600 text-sm">
            Tidak masalah. Masukkan email Anda dan kami akan mengirimkan link untuk reset password.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="auth-success-message" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="auth-label">Email</label>
            <input 
                id="email" 
                class="auth-input @error('email') auth-input-error @enderror" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
                autocomplete="email" 
                placeholder="Masukkan email Anda"
            >
            @error('email')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="auth-button-primary mb-6">
            Kirim Link Reset Password
        </button>

        <!-- Back to Login -->
        <div class="text-center">
            <a class="auth-link text-sm inline-flex items-center justify-center" href="{{ route('login') }}">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Login
            </a>
        </div>
    </form>
</x-guest-layout>
