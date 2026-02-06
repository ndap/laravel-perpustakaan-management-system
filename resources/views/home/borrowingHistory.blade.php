<x-home-layout>
    <x-slot name="title">Riwayat Peminjaman</x-slot>

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

    <!-- Page Header with Gradient Background -->
    <div class="mb-6 md:mb-8 relative">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500/10 via-purple-500/10 to-pink-500/10 rounded-2xl blur-3xl"></div>
        <div class="relative bg-white/80 backdrop-blur-sm border border-gray-100 rounded-2xl p-4 md:p-6 shadow-lg">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0">
                    <svg class="w-5 h-5 md:w-6 md:h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h1 class="text-xl md:text-3xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">Riwayat Peminjaman</h1>
                    <p class="text-gray-600 mt-0.5 flex items-center gap-2 text-sm md:text-base">
                        <svg class="w-4 h-4 hidden sm:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="truncate">Lihat semua aktivitas peminjaman buku Anda</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-xl shadow-md mb-4 md:mb-6 border border-gray-100 overflow-hidden hover:shadow-lg transition-shadow">
        <div class="flex border-b border-gray-200 overflow-x-auto scrollbar-hide">
            <a href="{{ route('home.borrowingHistory') }}" 
               class="group flex items-center gap-1.5 md:gap-2 px-3 md:px-6 py-3 md:py-4 text-sm md:text-base font-semibold whitespace-nowrap transition-all duration-200 {{ !request('status') ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-4 h-4 md:w-5 md:h-5 {{ !request('status') ? 'text-primary-700' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                <span>Semua</span>
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'pending']) }}" 
               class="group flex items-center gap-1.5 md:gap-2 px-3 md:px-6 py-3 md:py-4 text-sm md:text-base font-semibold whitespace-nowrap transition-all duration-200 {{ request('status') == 'pending' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-4 h-4 md:w-5 md:h-5 {{ request('status') == 'pending' ? 'text-primary-700' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Pending</span>
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'approved']) }}" 
               class="group flex items-center gap-1.5 md:gap-2 px-3 md:px-6 py-3 md:py-4 text-sm md:text-base font-semibold whitespace-nowrap transition-all duration-200 {{ request('status') == 'approved' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-4 h-4 md:w-5 md:h-5 {{ request('status') == 'approved' ? 'text-primary-700' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="hidden sm:inline">Disetujui</span>
                <span class="sm:hidden">OK</span>
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'rejected']) }}" 
               class="group flex items-center gap-1.5 md:gap-2 px-3 md:px-6 py-3 md:py-4 text-sm md:text-base font-semibold whitespace-nowrap transition-all duration-200 {{ request('status') == 'rejected' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-4 h-4 md:w-5 md:h-5 {{ request('status') == 'rejected' ? 'text-primary-700' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span class="hidden sm:inline">Ditolak</span>
                <span class="sm:hidden">No</span>
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'returned']) }}" 
               class="group flex items-center gap-1.5 md:gap-2 px-3 md:px-6 py-3 md:py-4 text-sm md:text-base font-semibold whitespace-nowrap transition-all duration-200 {{ request('status') == 'returned' ? 'text-primary-700 border-b-2 border-primary-700 bg-primary-50/50' : 'text-gray-600 hover:text-gray-900 hover:bg-gray-50' }}">
                <svg class="w-4 h-4 md:w-5 md:h-5 {{ request('status') == 'returned' ? 'text-primary-700' : 'text-gray-400 group-hover:text-gray-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                </svg>
                <span class="hidden sm:inline">Dikembalikan</span>
                <span class="sm:hidden">Kembali</span>
            </a>
        </div>
    </div>

    <!-- History List -->
    @if($borrowings->count() > 0)
        <div class="space-y-3 md:space-y-4">
            @foreach($borrowings as $borrowing)
                <div class="group bg-white rounded-xl shadow-md p-4 md:p-6 border border-gray-100 hover:shadow-xl transition-all duration-300 md:hover:scale-[1.01]">
                    <div class="flex flex-col gap-3 md:gap-4">
                        <!-- Book Info -->
                        <div class="flex gap-3 md:gap-4 flex-1">
                            @if($borrowing->book->image)
                                <div class="w-14 h-20 md:w-16 md:h-24 rounded-lg overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 shadow-md group-hover:shadow-lg transition-shadow ring-1 ring-gray-200 flex-shrink-0">
                                    <img src="{{ asset('storage/' . $borrowing->book->image) }}" 
                                         alt="{{ $borrowing->book->title }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                            @else
                                <div class="w-14 h-20 md:w-16 md:h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-lg flex items-center justify-center shadow-md ring-1 ring-gray-200 flex-shrink-0">
                                    <svg class="w-6 h-6 md:w-8 md:h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                </div>
                            @endif

                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-base md:text-lg text-gray-900 mb-1 group-hover:text-primary-700 transition-colors line-clamp-2">{{ $borrowing->book->title }}</h3>
                                <p class="text-xs md:text-sm text-gray-600 mb-2 md:mb-3 flex items-center gap-1.5 truncate">
                                    <svg class="w-3 h-3 md:w-3.5 md:h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span class="truncate">{{ $borrowing->book->author }}</span>
                                </p>
                                
                                <div class="flex flex-col sm:flex-row sm:flex-wrap gap-1.5 sm:gap-3 text-xs md:text-sm text-gray-600">
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-primary-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="font-medium">Pinjam:</span> {{ $borrowing->borrow_date->format('d M Y') }}
                                    </span>
                                    <span class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="font-medium">Kembali:</span> {{ $borrowing->return_date->format('d M Y') }}
                                    </span>
                                </div>

                                @if($borrowing->status == 'approved' && $borrowing->isLate())
                                    <div class="mt-2 md:mt-3">
                                        <span class="inline-flex items-center px-2 py-0.5 md:px-2.5 md:py-1 text-xs font-semibold bg-gradient-to-r from-red-100 to-rose-100 text-red-700 rounded-full shadow-sm">
                                            <svg class="w-3 h-3 md:w-3.5 md:h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                            </svg>
                                            Terlambat
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="flex flex-col items-start md:items-end gap-2 pt-2 md:pt-0 border-t md:border-t-0 border-gray-100">
                            @if($borrowing->status == 'pending')
                                <span class="inline-flex items-center px-2.5 py-1 md:px-3.5 md:py-1.5 text-xs md:text-sm font-semibold rounded-full bg-gradient-to-r from-yellow-100 to-amber-100 text-yellow-800 shadow-sm">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="hidden sm:inline">Menunggu Persetujuan</span>
                                    <span class="sm:hidden">Pending</span>
                                </span>
                            @elseif($borrowing->status == 'approved')
                                <span class="inline-flex items-center px-2.5 py-1 md:px-3.5 md:py-1.5 text-xs md:text-sm font-semibold rounded-full bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 shadow-sm">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Disetujui
                                </span>
                                @if($borrowing->approved_at)
                                    <span class="text-[10px] md:text-xs text-gray-500">
                                        Disetujui: {{ $borrowing->approved_at->format('d M Y H:i') }}
                                    </span>
                                @endif
                                <div class="mt-1 md:mt-2 px-2.5 py-1.5 md:px-3 md:py-2 bg-blue-50 rounded-lg border border-blue-200 w-full md:w-auto">
                                    <p class="text-[10px] md:text-xs text-blue-700 font-medium flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 md:w-4 md:h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span class="hidden sm:inline">Datang ke perpustakaan untuk mengambil buku</span>
                                        <span class="sm:hidden">Ambil buku di perpustakaan</span>
                                    </p>
                                </div>
                                <a href="{{ route('home.borrowingProof.download', $borrowing->id) }}" 
                                   class="mt-2 md:mt-3 w-full md:w-auto inline-flex items-center justify-center gap-2 px-3 py-1.5 md:px-4 md:py-2 bg-gradient-to-r from-primary-600 to-purple-600 text-white text-xs md:text-sm font-semibold rounded-lg hover:from-primary-700 hover:to-purple-700 transition-all duration-300 shadow-md shadow-primary-500/30 hover:shadow-lg hover:shadow-primary-500/50 md:hover:scale-105">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <span class="hidden sm:inline">Download Bukti Peminjaman</span>
                                    <span class="sm:hidden">Download Bukti</span>
                                </a>
                            @elseif($borrowing->status == 'rejected')
                                <span class="inline-flex items-center px-2.5 py-1 md:px-3.5 md:py-1.5 text-xs md:text-sm font-semibold rounded-full bg-gradient-to-r from-red-100 to-rose-100 text-red-800 shadow-sm">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Ditolak
                                </span>
                            @elseif($borrowing->status == 'returned')
                                <span class="inline-flex items-center px-2.5 py-1 md:px-3.5 md:py-1.5 text-xs md:text-sm font-semibold rounded-full bg-gradient-to-r from-blue-100 to-cyan-100 text-blue-800 shadow-sm">
                                    <svg class="w-3.5 h-3.5 md:w-4 md:h-4 mr-1 md:mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6"/>
                                    </svg>
                                    Dikembalikan
                                </span>
                                @if($borrowing->returned_at)
                                    <span class="text-[10px] md:text-xs text-gray-500">
                                        Dikembalikan: {{ $borrowing->returned_at->format('d M Y H:i') }}
                                    </span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($borrowings->hasPages())
            <div class="mt-8 bg-white rounded-xl shadow-md border border-gray-100 p-4">
                {{ $borrowings->links() }}
            </div>
        @endif
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl shadow-md p-12 text-center border border-gray-100">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <svg class="w-12 h-12 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belum Ada Riwayat</h3>
                <p class="text-gray-600 mb-6">
                    @if(request('status'))
                        Tidak ada peminjaman dengan status {{ request('status') }}
                    @else
                        Anda belum pernah meminjam buku
                    @endif
                </p>
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-gradient-to-r from-primary-600 to-emerald-600 text-white rounded-xl hover:from-primary-700 hover:to-emerald-700 transition-all duration-300 font-semibold shadow-lg shadow-primary-500/30 hover:shadow-xl hover:shadow-primary-500/50 hover:scale-105">
                    Pinjam Buku Sekarang
                </a>
            </div>
        </div>
    @endif
</x-home-layout>
