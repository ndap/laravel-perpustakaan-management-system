<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Reset Password</h2>
        <p class="text-gray-600 text-sm">Masukkan password baru untuk akun Anda</p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="auth-label">Email</label>
            <input 
                id="email" 
                class="auth-input @error('email') auth-input-error @enderror" 
                type="email" 
                name="email" 
                value="{{ old('email', $request->email) }}" 
                required 
                autofocus 
                autocomplete="username" 
                placeholder="Masukkan email Anda"
            >
            @error('email')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="auth-label">Password Baru</label>
            <input 
                id="password" 
                class="auth-input @error('password') auth-input-error @enderror" 
                type="password" 
                name="password" 
                required 
                autocomplete="new-password" 
                placeholder="Minimal 8 karakter"
            >
            @error('password')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="auth-label">Konfirmasi Password</label>
            <input 
                id="password_confirmation" 
                class="auth-input @error('password_confirmation') auth-input-error @enderror" 
                type="password" 
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
                placeholder="Ulangi password baru"
            >
            @error('password_confirmation')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="auth-button-primary mb-6">
            Reset Password
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
