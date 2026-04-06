<x-admin-layout>
    <x-slot name="title">Manajemen Peminjaman</x-slot>

    <!-- Flash Messages -->
    @if(session('success'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p class="text-green-800 font-medium">{{ session('success') }}</p>
            <button x-on:click="show = false" class="ml-auto text-green-600 hover:text-green-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="mb-6 p-4 bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <p class="text-red-800 font-medium">{{ session('error') }}</p>
            <button x-on:click="show = false" class="ml-auto text-red-600 hover:text-red-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    @if(session('warning'))
        <div 
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 5000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="mb-6 p-4 bg-gradient-to-r from-yellow-50 to-amber-50 border border-yellow-200 rounded-xl flex items-center gap-3 shadow-sm"
        >
            <div class="flex-shrink-0 w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center shadow-sm">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <p class="text-yellow-800 font-medium">{{ session('warning') }}</p>
            <button x-on:click="show = false" class="ml-auto text-yellow-600 hover:text-yellow-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    @endif

    <!-- Page Header with Gradient Background -->
    <div class="mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-primary-500/10 via-emerald-500/10 to-green-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-6 shadow-lg">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Manajemen Peminjaman Buku</h1>
                    <p class="text-gray-600 mt-0.5 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kelola persetujuan, pengambilan, dan pengembalian buku
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-7 gap-4 mb-8">
        <div class="group relative bg-gradient-to-br from-gray-50 to-gray-100/50 rounded-xl p-5 border border-gray-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-gray-600 mb-1">Total</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $statusCounts['all'] }}</h3>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-yellow-50 to-yellow-100/50 rounded-xl p-5 border border-yellow-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-yellow-600 mb-1">Pending</p>
                    <h3 class="text-2xl font-bold text-yellow-900">{{ $statusCounts['pending'] }}</h3>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl p-5 border border-emerald-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-emerald-600 mb-1">Disetujui</p>
                    <h3 class="text-2xl font-bold text-emerald-900">{{ $statusCounts['approved'] }}</h3>
                    <p class="text-xs text-emerald-600 mt-0.5">menunggu diambil</p>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-indigo-50 to-indigo-100/50 rounded-xl p-5 border border-indigo-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-indigo-600 mb-1">Dipinjam</p>
                    <h3 class="text-2xl font-bold text-indigo-900">{{ $statusCounts['borrowed'] }}</h3>
                    <p class="text-xs text-indigo-600 mt-0.5">sedang dipinjam</p>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-xl p-5 border border-purple-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-purple-600 mb-1">Pengajuan Kembali</p>
                    <h3 class="text-2xl font-bold text-purple-900">{{ $statusCounts['return_requested'] }}</h3>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-red-50 to-red-100/50 rounded-xl p-5 border border-red-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-red-600 mb-1">Ditolak</p>
                    <h3 class="text-2xl font-bold text-red-900">{{ $statusCounts['rejected'] }}</h3>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="group relative bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl p-5 border border-blue-200/50 hover:shadow-lg transition-all duration-300 hover:scale-105">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-xs font-medium text-blue-600 mb-1">Dikembalikan</p>
                    <h3 class="text-2xl font-bold text-blue-900">{{ $statusCounts['returned'] }}</h3>
                </div>
                <div class="w-11 h-11 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-xl shadow-md mb-6 border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
        <div class="flex border-b border-gray-200 overflow-x-auto">
            <a href="{{ route('admin.borrowings') }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ !request('status') ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Semua ({{ $statusCounts['all'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'pending']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'pending' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Pending ({{ $statusCounts['pending'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'approved']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'approved' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Disetujui ({{ $statusCounts['approved'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'borrowed']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'borrowed' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Dipinjam ({{ $statusCounts['borrowed'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'return_requested']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'return_requested' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Pengajuan Kembali ({{ $statusCounts['return_requested'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'rejected']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'rejected' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Ditolak ({{ $statusCounts['rejected'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'returned']) }}" 
               class="group flex items-center gap-2 px-5 py-4 font-semibold whitespace-nowrap transition-all duration-200 text-sm {{ request('status') == 'returned' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                Dikembalikan ({{ $statusCounts['returned'] }})
            </a>
        </div>
    </div>

    <!-- Borrowing Table -->
    @if($borrowings->count() > 0)
        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">User</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Buku</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal Pinjam</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Tanggal Kembali</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($borrowings as $borrowing)
                            <tr class="hover:bg-gradient-to-r hover:from-primary-50/30 hover:to-emerald-50/30 transition-all duration-200 group">
                                <!-- User Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-gradient-to-br from-primary-100 to-emerald-100 rounded-full flex items-center justify-center ring-2 ring-primary-200/50 group-hover:ring-primary-300 transition-all">
                                            <svg class="w-5 h-5 text-primary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-bold text-gray-900 group-hover:text-primary-700 transition-colors">{{ $borrowing->user->full_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $borrowing->user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Book Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($borrowing->book->image)
                                            <div class="w-12 h-16 rounded-lg overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 shadow-md group-hover:shadow-lg transition-shadow ring-1 ring-gray-200">
                                                <img src="{{ asset('storage/' . $borrowing->book->image) }}" 
                                                     alt="{{ $borrowing->book->title }}" 
                                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                            </div>
                                        @else
                                            <div class="w-12 h-16 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center shadow-md ring-1 ring-gray-200">
                                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <div class="ml-3">
                                            <div class="text-sm font-bold text-gray-900">{{ $borrowing->book->title }}</div>
                                            <div class="text-sm text-gray-600">{{ $borrowing->book->author }}</div>
                                            <div class="text-xs text-gray-500 mt-0.5">Stock: {{ $borrowing->book->stock }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Borrow Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $borrowing->borrow_date->format('d M Y') }}</div>
                                </td>

                                <!-- Return Date -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $borrowing->return_date->format('d M Y') }}</div>
                                    @if(in_array($borrowing->status, ['borrowed', 'return_requested']) && $borrowing->isLate())
                                        <div class="mt-1 inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                            </svg>
                                            Terlambat
                                        </div>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($borrowing->status == 'pending')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Pending
                                        </span>
                                    @elseif($borrowing->status == 'approved')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-emerald-100 to-green-100 text-emerald-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Disetujui
                                        </span>
                                        @if($borrowing->approvedBy)
                                            <div class="text-xs text-gray-500 mt-1">oleh: {{ $borrowing->approvedBy->full_name }}</div>
                                        @endif
                                        <div class="text-xs text-emerald-600 mt-0.5">Menunggu pengambilan</div>
                                    @elseif($borrowing->status == 'borrowed')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-indigo-100 to-blue-100 text-indigo-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            Sedang Dipinjam
                                        </span>
                                        @if($borrowing->borrowed_at)
                                            <div class="text-xs text-gray-500 mt-1">Diambil: {{ $borrowing->borrowed_at->format('d M Y H:i') }}</div>
                                        @endif
                                    @elseif($borrowing->status == 'return_requested')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-purple-100 to-violet-100 text-purple-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                            </svg>
                                            Pengajuan Kembali
                                        </span>
                                        @if($borrowing->return_requested_at)
                                            <div class="text-xs text-gray-500 mt-1">Diajukan: {{ $borrowing->return_requested_at->format('d M Y H:i') }}</div>
                                        @endif
                                    @elseif($borrowing->status == 'rejected')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-red-100 to-rose-100 text-red-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Ditolak
                                        </span>
                                    @elseif($borrowing->status == 'returned')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-semibold rounded-full bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                            </svg>
                                            Dikembalikan
                                        </span>
                                        @if($borrowing->confirmedBy)
                                            <div class="text-xs text-gray-500 mt-1">oleh: {{ $borrowing->confirmedBy->full_name }}</div>
                                        @endif
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if($borrowing->status == 'pending')
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- Approve Button -->
                                            <form action="{{ route('borrowing.approve', $borrowing->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        onclick="event.preventDefault(); Swal.fire({ title: 'Setujui Peminjaman?', text: 'Setujui peminjaman ini? User harus mengambil buku di perpustakaan.', icon: 'question', showCancelButton: true, confirmButtonColor: '#10b981', cancelButtonColor: '#6b7280', confirmButtonText: 'Ya, Setujui', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { this.closest('form').submit(); } });"
                                                        class="group/btn inline-flex items-center px-3 py-2 text-sm font-semibold text-green-600 bg-green-50 rounded-lg hover:bg-green-100 transition-all duration-200 shadow-sm hover:shadow hover:scale-105">
                                                    <svg class="w-4 h-4 mr-1.5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                    </svg>
                                                    Approve
                                                </button>
                                            </form>
                                            
                                            <!-- Reject Button -->
                                            <form action="{{ route('borrowing.reject', $borrowing->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        onclick="event.preventDefault(); Swal.fire({ title: 'Tolak Peminjaman?', text: 'Tolak peminjaman ini?', icon: 'warning', showCancelButton: true, confirmButtonColor: '#ef4444', cancelButtonColor: '#6b7280', confirmButtonText: 'Ya, Tolak', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { this.closest('form').submit(); } });"
                                                        class="group/btn inline-flex items-center px-3 py-2 text-sm font-semibold text-red-600 bg-red-50 rounded-lg hover:bg-red-100 transition-all duration-200 shadow-sm hover:shadow hover:scale-105">
                                                    <svg class="w-4 h-4 mr-1.5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                    Reject
                                                </button>
                                            </form>
                                        </div>
                                    @elseif($borrowing->status == 'approved')
                                        <!-- Confirm Pickup Button -->
                                        <form action="{{ route('borrowing.confirmPickup', $borrowing->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    onclick="event.preventDefault(); Swal.fire({ title: 'Konfirmasi Pengambilan?', text: 'Konfirmasi bahwa user sudah mengambil buku secara fisik? Stok buku akan berkurang.', icon: 'question', showCancelButton: true, confirmButtonColor: '#6366f1', cancelButtonColor: '#6b7280', confirmButtonText: 'Ya, Konfirmasi', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { this.closest('form').submit(); } });"
                                                    class="group/btn inline-flex items-center px-3 py-2 text-sm font-semibold text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-100 transition-all duration-200 shadow-sm hover:shadow hover:scale-105">
                                                <svg class="w-4 h-4 mr-1.5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                Konfirmasi Pengambilan
                                            </button>
                                        </form>
                                    @elseif($borrowing->status == 'borrowed')
                                        <span class="inline-flex items-center px-3 py-1.5 text-xs font-medium text-gray-500 bg-gray-50 rounded-lg">
                                            <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            Menunggu pengajuan kembali
                                        </span>
                                    @elseif($borrowing->status == 'return_requested')
                                        <!-- Confirm Return Button -->
                                        <form action="{{ route('borrowing.confirmReturn', $borrowing->id) }}" method="POST" class="inline">
                                            @csrf
                                            <button type="submit" 
                                                    onclick="event.preventDefault(); Swal.fire({ title: 'Konfirmasi Pengembalian?', text: 'Konfirmasi bahwa buku sudah dikembalikan secara fisik?', icon: 'question', showCancelButton: true, confirmButtonColor: '#3b82f6', cancelButtonColor: '#6b7280', confirmButtonText: 'Ya, Konfirmasi', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { this.closest('form').submit(); } });"
                                                    class="group/btn inline-flex items-center px-3 py-2 text-sm font-semibold text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100 transition-all duration-200 shadow-sm hover:shadow hover:scale-105">
                                                <svg class="w-4 h-4 mr-1.5 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                                </svg>
                                                Konfirmasi Pengembalian
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($borrowings->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100">
                    {{ $borrowings->links() }}
                </div>
            @endif
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl shadow-md p-12 text-center border border-gray-100">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4 mx-auto shadow-lg">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Tidak Ada Data</h3>
                <p class="text-gray-600">
                    @if(request('status'))
                        Tidak ada peminjaman dengan status {{ request('status') }}
                    @else
                        Belum ada peminjaman yang tercatat
                    @endif
                </p>
            </div>
        </div>
    @endif
</x-admin-layout>
