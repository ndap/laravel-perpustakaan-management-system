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
        <!-- Alpine.js CDN -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-linear-to-br from-gray-100 via-white to-indigo-50 dark:from-gray-900 dark:via-gray-800 dark:to-indigo-950">
            <!-- Logo & Branding -->
            <div class="mb-4">
                <a href="/" class="flex flex-col items-center group">
                    <div class="flex items-center justify-center w-16 h-16 bg-indigo-600 rounded-2xl shadow-lg transform group-hover:scale-105 transition-transform duration-200">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <span class="mt-3 text-2xl font-bold text-gray-900 dark:text-white">BukuHub</span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Perpustakaan Digital</span>
                </a>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-xl mt-4 px-6 py-8 bg-white dark:bg-gray-800 shadow-xl overflow-hidden sm:rounded-2xl border border-gray-100 dark:border-gray-700">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
                &copy; {{ date('Y') }} BukuHub. All rights reserved.
            </div>
        </div>
    </body>
</html>
