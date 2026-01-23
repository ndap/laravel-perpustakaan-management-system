@php
    $currentRoute = Route::currentRouteName();
@endphp

<aside class="sidebar">
    <nav class="sidebar-menu">
        <li class="sidebar-item">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ $currentRoute == 'dashboard' ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-book"></i></span>
                <span>Katalog Buku</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('home.bookmarks') }}" class="sidebar-link {{ $currentRoute == 'home.bookmarks' ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-heart"></i></span>
                <span>Koleksi Pribadi</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('profile.edit') }}" class="sidebar-link {{ $currentRoute == 'profile.edit' ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-user"></i></span>
                <span>Profile</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('home.borrowingHistory') }}" class="sidebar-link {{ $currentRoute == 'home.borrowingHistory' ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-clipboard-list"></i></span>
                <span>Riwayat Peminjaman</span>
            </a>
        </li>
    </nav>
</aside>

<!-- Mobile Overlay -->
<div class="mobile-overlay" onclick="toggleSidebar()"></div>