<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BukuHub') }} - Perpustakaan Digital</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS CDN -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            forest: {
                                50: '#f0fdf4',
                                100: '#dcfce7',
                                200: '#bbf7d0',
                                300: '#86efac',
                                400: '#4ade80',
                                500: '#22c55e',
                                600: '#16a34a',
                                700: '#15803d',
                                800: '#166534',
                                900: '#14532d',
                                950: '#052e16',
                            },
                            primary: {
                                50: '#ecfdf5',
                                100: '#d1fae5',
                                200: '#a7f3d0',
                                300: '#6ee7b7',
                                400: '#34d399',
                                500: '#10b981',
                                600: '#059669',
                                700: '#047857',
                                800: '#065f46',
                                900: '#064e3b',
                                950: '#022c22',
                            },
                        }
                    }
                }
            }
        </script>
        
        <!-- Auth CSS -->
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
        
        <!-- Alpine.js CDN -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="auth-split-container">
            <!-- Left Panel -->
            <div class="auth-left-panel">
                <div class="flex-1 flex flex-col items-center justify-center">
                    <!-- Logo Circle -->
                    <div class="auth-logo-circle">
                        <div class="auth-logo-inner">
                            📚
                        </div>
                    </div>
                    
                    <!-- Brand Name -->
                    <h1 class="text-3xl font-bold text-white mb-2">BukuHub</h1>
                    <p class="text-green-100 text-center text-sm max-w-xs">
                        Perpustakaan Digital Modern untuk Generasi Digital
                    </p>
                    
                    <!-- Decorative Illustration -->
                    <div class="mt-8 opacity-40">
                        <img src="{{ asset('images/auth/decoration.png') }}" alt="Library Decoration" class="w-48 h-auto">
                    </div>
                </div>
                
                <!-- Asset Label -->
                <div class="auth-asset-label">
                    Digital Library Asset
                </div>
            </div>
            
            <!-- Right Panel -->
            <div class="auth-right-panel">
                <div class="auth-form-container">
                    <!-- Back to Home Link -->
                    <div class="mb-6">
                        <a href="/" class="auth-link text-sm inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>
                    
                    <!-- Form Content Slot -->
                    {{ $slot }}
                    
                    <!-- Footer -->
                    <div class="mt-8 text-center text-xs text-gray-500">
                        &copy; {{ date('Y') }} BukuHub. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
