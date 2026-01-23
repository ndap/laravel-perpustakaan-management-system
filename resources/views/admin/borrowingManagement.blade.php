<x-admin-layout>
    <x-slot name="title">Manajemen Peminjaman</x-slot>

    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manajemen Peminjaman Buku</h1>
        <p class="text-gray-600 mt-1">Kelola persetujuan dan pengembalian buku</p>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if(session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded-lg mb-6 flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            {{ session('warning') }}
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Total</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $statusCounts['all'] }}</p>
                </div>
                <i class="fas fa-list text-3xl text-gray-400"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-yellow-600">{{ $statusCounts['pending'] }}</p>
                </div>
                <i class="fas fa-clock text-3xl text-yellow-400"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Disetujui</p>
                    <p class="text-2xl font-bold text-green-600">{{ $statusCounts['approved'] }}</p>
                </div>
                <i class="fas fa-check-circle text-3xl text-green-400"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Ditolak</p>
                    <p class="text-2xl font-bold text-red-600">{{ $statusCounts['rejected'] }}</p>
                </div>
                <i class="fas fa-times-circle text-3xl text-red-400"></i>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600">Dikembalikan</p>
                    <p class="text-2xl font-bold text-blue-600">{{ $statusCounts['returned'] }}</p>
                </div>
                <i class="fas fa-undo text-3xl text-blue-400"></i>
            </div>
        </div>
    </div>

    <!-- Filter Tabs -->
    <div class="bg-white rounded-lg shadow-sm mb-6">
        <div class="flex border-b border-gray-200 overflow-x-auto">
            <a href="{{ route('admin.borrowings') }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ !request('status') ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-list mr-2"></i> Semua ({{ $statusCounts['all'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'pending']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'pending' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-clock mr-2"></i> Pending ({{ $statusCounts['pending'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'approved']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'approved' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-check-circle mr-2"></i> Disetujui ({{ $statusCounts['approved'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'rejected']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'rejected' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-times-circle mr-2"></i> Ditolak ({{ $statusCounts['rejected'] }})
            </a>
            <a href="{{ route('admin.borrowings', ['status' => 'returned']) }}" 
               class="px-6 py-3 font-semibold whitespace-nowrap {{ request('status') == 'returned' ? 'text-primary-700 border-b-2 border-primary-700' : 'text-gray-600 hover:text-gray-900' }}">
                <i class="fas fa-undo mr-2"></i> Dikembalikan ({{ $statusCounts['returned'] }})
            </a>
        </div>
    </div>

    <!-- Borrowing Table -->
    @if($borrowings->count() > 0)
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Buku</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($borrowings as $borrowing)
                            <tr class="hover:bg-gray-50">
                                <!-- User Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-primary-100 rounded-full flex items-center justify-center">
                                            <i class="fas fa-user text-primary-700"></i>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $borrowing->user->full_name }}</div>
                                            <div class="text-sm text-gray-500">{{ $borrowing->user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Book Info -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if($borrowing->book->image)
                                            <img src="{{ asset('storage/' . $borrowing->book->image) }}" 
                                                 alt="{{ $borrowing->book->title }}" 
                                                 class="w-12 h-16 object-cover rounded mr-3">
                                        @else
                                            <div class="w-12 h-16 bg-gray-200 rounded mr-3 flex items-center justify-center">
                                                <i class="fas fa-book text-gray-400"></i>
                                            </div>
                                        @endif
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $borrowing->book->title }}</div>
                                            <div class="text-sm text-gray-500">{{ $borrowing->book->author }}</div>
                                            <div class="text-xs text-gray-400">Stock: {{ $borrowing->book->stock }}</div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Borrow Date -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <i class="fas fa-calendar-alt mr-1 text-gray-400"></i>
                                    {{ $borrowing->borrow_date->format('d M Y') }}
                                </td>

                                <!-- Return Date -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <i class="fas fa-calendar-check mr-1 text-gray-400"></i>
                                    {{ $borrowing->return_date->format('d M Y') }}
                                    @if($borrowing->status == 'approved' && $borrowing->isLate())
                                        <br>
                                        <span class="text-xs text-red-600 font-semibold">
                                            <i class="fas fa-exclamation-triangle"></i> Terlambat
                                        </span>
                                    @endif
                                </td>

                                <!-- Status -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($borrowing->status == 'pending')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-clock mr-1"></i> Pending
                                        </span>
                                    @elseif($borrowing->status == 'approved')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fas fa-check-circle mr-1"></i> Disetujui
                                        </span>
                                        @if($borrowing->approvedBy)
                                            <div class="text-xs text-gray-500 mt-1">
                                                oleh: {{ $borrowing->approvedBy->full_name }}
                                            </div>
                                        @endif
                                    @elseif($borrowing->status == 'rejected')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            <i class="fas fa-times-circle mr-1"></i> Ditolak
                                        </span>
                                    @elseif($borrowing->status == 'returned')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            <i class="fas fa-undo mr-1"></i> Dikembalikan
                                        </span>
                                        @if($borrowing->confirmedBy)
                                            <div class="text-xs text-gray-500 mt-1">
                                                oleh: {{ $borrowing->confirmedBy->full_name }}
                                            </div>
                                        @endif
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($borrowing->status == 'pending')
                                        <div class="flex gap-2">
                                            <!-- Approve Button -->
                                            <form action="{{ route('borrowing.approve', $borrowing->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        onclick="return confirm('Setujui peminjaman ini? Stok buku akan berkurang.')"
                                                        class="text-green-600 hover:text-green-900">
                                                    <i class="fas fa-check"></i> Approve
                                                </button>
                                            </form>
                                            
                                            <!-- Reject Button -->
                                            <form action="{{ route('borrowing.reject', $borrowing->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        onclick="return confirm('Tolak peminjaman ini?')"
                                                        class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-times"></i> Reject
                                                </button>
                                            </form>
                                        </div>
                                    @elseif($borrowing->status == 'approved')
                                        <!-- Confirm Return Button (only show if past or on return date) -->
                                        @if(now()->greaterThanOrEqualTo($borrowing->return_date))
                                            <form action="{{ route('borrowing.confirmReturn', $borrowing->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" 
                                                        onclick="return confirm('Konfirmasi bahwa buku sudah dikembalikan secara fisik?')"
                                                        class="text-blue-600 hover:text-blue-900">
                                                    <i class="fas fa-undo"></i> Konfirmasi Pengembalian
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-gray-400 text-xs">
                                                <i class="fas fa-info-circle"></i> Belum jatuh tempo
                                            </span>
                                        @endif
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $borrowings->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-sm p-12 text-center">
            <div class="max-w-md mx-auto">
                <div class="text-6xl mb-4">📚</div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak Ada Data</h3>
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
