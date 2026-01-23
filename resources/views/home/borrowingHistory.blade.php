<x-home-layout>
    <x-slot name="title">Riwayat Peminjaman</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Riwayat Peminjaman</h1>
        <p class="text-gray-600 mt-1">Lihat semua aktivitas peminjaman buku Anda</p>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow-sm mb-6">
        <div class="flex border-b border-gray-200 overflow-x-auto">
            <a href="{{ route('home.borrowingHistory') }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ !request('status') ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-list mr-2"></i> Semua
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'pending']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'pending' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-clock mr-2"></i> Pending
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'approved']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'approved' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-check-circle mr-2"></i> Disetujui
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'rejected']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'rejected' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-times-circle mr-2"></i> Ditolak
            </a>
            <a href="{{ route('home.borrowingHistory', ['status' => 'returned']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'returned' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-undo mr-2"></i> Dikembalikan
            </a>
        </div>
    </div>

    <!-- History List -->
    @if($borrowings->count() > 0)
        <div class="space-y-4">
            @foreach($borrowings as $borrowing)
                <div class="bg-white rounded-lg shadow-sm p-6 hover:shadow-md transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                        <!-- Book Info -->
                        <div class="flex gap-4 flex-1">
                            @if($borrowing->book->image)
                                <img src="{{ asset('storage/' . $borrowing->book->image) }}" 
                                     alt="{{ $borrowing->book->title }}" 
                                     class="w-16 h-24 object-cover rounded">
                            @else
                                <div class="w-16 h-24 bg-gray-200 rounded flex items-center justify-center">
                                    <i class="fas fa-book text-gray-400 text-2xl"></i>
                                </div>
                            @endif

                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900 mb-1">{{ $borrowing->book->title }}</h3>
                                <p class="text-sm text-gray-600 mb-2">{{ $borrowing->book->author }}</p>
                                
                                <div class="flex flex-wrap gap-3 text-sm text-gray-600">
                                    <span><i class="fas fa-calendar-alt mr-1"></i> {{ $borrowing->borrow_date->format('d M Y') }}</span>
                                    <span><i class="fas fa-calendar-check mr-1"></i> {{ $borrowing->return_date->format('d M Y') }}</span>
                                </div>

                                @if($borrowing->status == 'approved' && $borrowing->isLate())
                                    <div class="mt-2">
                                        <span class="inline-block px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded">
                                            <i class="fas fa-exclamation-triangle mr-1"></i> Terlambat
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Status Badge -->
                        <div class="flex flex-col items-end gap-2">
                            @if($borrowing->status == 'pending')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-yellow-100 text-yellow-800 rounded-full">
                                    <i class="fas fa-clock mr-1"></i> Menunggu Persetujuan
                                </span>
                            @elseif($borrowing->status == 'approved')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-green-100 text-green-800 rounded-full">
                                    <i class="fas fa-check-circle mr-1"></i> Disetujui
                                </span>
                                @if($borrowing->approved_at)
                                    <span class="text-xs text-gray-500">
                                        Disetujui: {{ $borrowing->approved_at->format('d M Y H:i') }}
                                    </span>
                                @endif
                            @elseif($borrowing->status == 'rejected')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-red-100 text-red-800 rounded-full">
                                    <i class="fas fa-times-circle mr-1"></i> Ditolak
                                </span>
                            @elseif($borrowing->status == 'returned')
                                <span class="inline-block px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded-full">
                                    <i class="fas fa-undo mr-1"></i> Dikembalikan
                                </span>
                                @if($borrowing->returned_at)
                                    <span class="text-xs text-gray-500">
                                        Dikembalikan: {{ $borrowing->returned_at->format('d M Y H:i') }}
                                    </span>
                                @endif
                            @endif

                            <!-- Additional Info -->
                            @if($borrowing->status == 'approved')
                                <p class="text-xs text-gray-500 mt-1">
                                    <i class="fas fa-info-circle mr-1"></i> Harap datang ke perpustakaan untuk mengambil buku
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $borrowings->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="text-6xl mb-4">📋</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Riwayat</h3>
                <p class="text-gray-600 mb-6">
                    @if(request('status'))
                        Tidak ada peminjaman dengan status {{ request('status') }}
                    @else
                        Anda belum pernah meminjam buku
                    @endif
                </p>
                <a href="{{ route('dashboard') }}" class="inline-block px-6 py-3 bg-primary-700 text-white rounded-lg hover:bg-primary-800 transition-colors font-semibold">
                    Pinjam Buku Sekarang
                </a>
            </div>
        </div>
    @endif
</x-home-layout>
