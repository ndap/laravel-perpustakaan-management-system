<x-guest-layout>
    <!-- Page Header -->
    <div class="mb-6 text-center">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Daftar Akun Baru</h2>
        <p class="text-gray-600 text-sm">Bergabunglah dengan BukuHub untuk akses perpustakaan digital</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Full Name & Username -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="full_name" class="auth-label">Nama Lengkap</label>
                <input 
                    id="full_name" 
                    class="auth-input @error('full_name') auth-input-error @enderror" 
                    type="text" 
                    name="full_name" 
                    value="{{ old('full_name') }}" 
                    required 
                    autofocus 
                    autocomplete="name" 
                    placeholder="Masukkan nama lengkap"
                >
                @error('full_name')
                    <p class="auth-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="username" class="auth-label">Username</label>
                <input 
                    id="username" 
                    class="auth-input @error('username') auth-input-error @enderror" 
                    type="text" 
                    name="username" 
                    value="{{ old('username') }}" 
                    required 
                    autocomplete="username" 
                    placeholder="contoh: john_doe123"
                >
                @error('username')
                    <p class="auth-error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Email & Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="email" class="auth-label">Email</label>
                <input 
                    id="email" 
                    class="auth-input @error('email') auth-input-error @enderror" 
                    type="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required 
                    autocomplete="email" 
                    placeholder="contoh@email.com"
                >
                @error('email')
                    <p class="auth-error-message">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="phone_number" class="auth-label">Nomor Telepon</label>
                <input 
                    id="phone_number" 
                    class="auth-input @error('phone_number') auth-input-error @enderror" 
                    type="tel" 
                    name="phone_number" 
                    value="{{ old('phone_number') }}" 
                    required 
                    autocomplete="tel" 
                    placeholder="08xxxxxxxxxx"
                >
                @error('phone_number')
                    <p class="auth-error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Address -->
        <div class="mb-4">
            <label for="address" class="auth-label">Alamat</label>
            <textarea 
                id="address" 
                name="address" 
                rows="2" 
                class="auth-input @error('address') auth-input-error @enderror" 
                style="border-radius: 1rem;"
                required 
                placeholder="Masukkan alamat lengkap"
            >{{ old('address') }}</textarea>
            @error('address')
                <p class="auth-error-message">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password & Confirm Password -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="password" class="auth-label">Password</label>
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

            <div>
                <label for="password_confirmation" class="auth-label">Konfirmasi Password</label>
                <input 
                    id="password_confirmation" 
                    class="auth-input @error('password_confirmation') auth-input-error @enderror" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password" 
                    placeholder="Ulangi password"
                >
                @error('password_confirmation')
                    <p class="auth-error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Register Button -->
        <button type="submit" class="auth-button-primary mb-6">
            Daftar
        </button>

        <!-- Login Link -->
        <div class="text-center">
            <span class="text-sm text-gray-600">Sudah punya akun?</span>
            <a class="auth-link text-sm ml-1" href="{{ route('login') }}">
                Masuk di sini
            </a>
        </div>
    </form>
</x-guest-layout>
