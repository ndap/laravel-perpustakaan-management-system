@php
    $currentRoute = Route::currentRouteName();
@endphp

<aside class="sidebar">
    <nav class="sidebar-menu">
        <li class="sidebar-item">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ str_starts_with($currentRoute, 'admin.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-chart-line"></i></span>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('admin.books') }}" class="sidebar-link {{ str_starts_with($currentRoute, 'admin.books') ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-book"></i></span>
                <span>Manajemen Buku</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('admin.categories') }}" class="sidebar-link {{ str_starts_with($currentRoute, 'admin.categories') ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-tags"></i></span>
                <span>Manajemen Kategori</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('admin.users') }}" class="sidebar-link {{ str_starts_with($currentRoute, 'admin.users') ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-users"></i></span>
                <span>Manajemen User</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('admin.reports') }}" class="sidebar-link {{ str_starts_with($currentRoute, 'admin.reports') ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-file-lines"></i></span>
                <span>Generate Laporan</span>
            </a>
        </li>
        
        <li class="sidebar-item">
            <a href="{{ route('profile.edit') }}" class="sidebar-link {{ $currentRoute == 'profile.edit' ? 'active' : '' }}">
                <span class="sidebar-icon"><i class="fas fa-user"></i></span>
                <span>Profile</span>
            </a>
        </li>
    </nav>
</aside>

<!-- Mobile Overlay -->
<div class="mobile-overlay" onclick="toggleAdminSidebar()"></div>
