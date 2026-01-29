<div class="top-bar">
    <!-- Hamburger Menu (Mobile) -->
    <button class="hamburger-button" onclick="toggleAdminSidebar()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="top-bar-brand">
        <span><i class="fas fa-book"></i></span>
        <span>BukuHub {{ Auth::user()->role }}</span>
    </a>
    
    <!-- Profile Section -->
    <div class="top-bar-profile" x-data="{ open: false }" @click.away="open = false">
        <button @click="open = !open" class="profile-button">
            <div class="profile-avatar w-10 h-10 rounded-full overflow-hidden border border-gray-200 flex items-center justify-center bg-gray-100 text-gray-600 font-bold">
                @if(Auth::user()->photo_profile)
                    <img src="{{ asset('storage/' . Auth::user()->photo_profile) }}" alt="{{ Auth::user()->full_name }}" class="w-full h-full object-cover">
                @else
                    {{ strtoupper(substr(Auth::user()->full_name ?? 'A', 0, 1)) }}
                @endif
            </div>
            <span class="profile-name hidden md:block">{{ Auth::user()->full_name ?? 'Admin' }}</span>
            <svg class="w-4 h-4 hidden md:block" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
        </button>
        
        <!-- Dropdown Menu -->
        <div class="profile-dropdown" :class="{'active': open}">
            <a href="{{ route('profile.edit') }}" class="profile-dropdown-item">
                <i class="fas fa-user mr-2"></i> Profile Saya
            </a>
            <a href="#" class="profile-dropdown-item">
                <i class="fas fa-cog mr-2"></i> Pengaturan
            </a>
            <div class="profile-dropdown-divider"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="profile-dropdown-item w-full text-left">
                    <i class="fas fa-sign-out-alt mr-2"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function toggleAdminSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const overlay = document.querySelector('.mobile-overlay');
    sidebar.classList.toggle('mobile-open');
    overlay.classList.toggle('active');
}
</script>
