<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali!</h2>
        <p class="text-gray-600 text-sm">Masuk ke akun BukuHub Anda</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="auth-success-message" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email or Username -->
        <div class="mb-5">
            <label for="login" class="auth-label block mb-2 text-sm font-semibold text-gray-700">Email / Username</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-user text-gray-400"></i>
                </div>
                <input 
                    id="login" 
                    class="auth-input pl-10 block w-full rounded-full border-gray-300 focus:border-forest-500 focus:ring focus:ring-forest-200 focus:ring-opacity-50 transition duration-200 @error('login') border-red-500 @enderror" 
                    type="text" 
                    name="login" 
                    value="{{ old('login') }}" 
                    required 
                    autofocus 
                    autocomplete="username" 
                    placeholder="Masukkan email atau username"
                >
            </div>
            @error('login')
                <p class="auth-error-message text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-5">
            <label for="password" class="auth-label block mb-2 text-sm font-semibold text-gray-700">Password</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-lock text-gray-400"></i>
                </div>
                <input 
                    id="password" 
                    class="auth-input pl-10 block w-full rounded-full border-gray-300 focus:border-forest-500 focus:ring focus:ring-forest-200 focus:ring-opacity-50 transition duration-200 @error('password') border-red-500 @enderror" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" 
                    placeholder="Masukkan password"
                >
            </div>
            @error('password')
                <p class="auth-error-message text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    class="auth-checkbox" 
                    name="remember"
                >
                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link text-sm" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <!-- Login Button -->
        <button type="submit" class="auth-button-primary mb-6">
            Masuk
        </button>

        <!-- Register Link -->
        <div class="text-center">
            <span class="text-sm text-gray-600">Belum punya akun?</span>
            <a class="auth-link text-sm ml-1" href="{{ route('register') }}">
                Daftar sekarang
            </a>
        </div>
    </form>
</x-guest-layout>
