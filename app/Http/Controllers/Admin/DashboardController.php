<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use App\Models\book_category;
use App\Models\borrowing;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard with real statistics.
     */
    public function index()
    {
        // Statistics Counts
        $totalBooks = book::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalCategories = book_category::count();
        $activeBorrowings = borrowing::whereIn('status', ['borrowed', 'return_requested'])->count();

        // Monthly Statistics
        $startOfMonth = Carbon::now()->startOfMonth();
        $newBooksThisMonth = book::where('created_at', '>=', $startOfMonth)->count();
        $newUsersThisMonth = User::where('role', 'user')
            ->where('created_at', '>=', $startOfMonth)
            ->count();

        // Overdue Borrowings (borrowed/return_requested but return_date < today)
        $overdueBorrowings = borrowing::whereIn('status', ['borrowed', 'return_requested'])
            ->whereNotNull('return_date')
            ->where('return_date', '<', Carbon::today())
            ->count();

        // Recent Activities (latest 10 borrowings)
        $recentActivities = borrowing::with(['user', 'book'])
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get()
            ->map(function ($borrow) {
                // Calculate status
                $status = $borrow->status;
                $statusLabel = 'Dipinjam';
                $statusClass = 'bg-yellow-100 text-yellow-800';

                if ($status === 'returned') {
                    $statusLabel = 'Dikembalikan';
                    $statusClass = 'bg-green-100 text-green-800';
                } elseif ($status === 'pending') {
                    $statusLabel = 'Pending';
                    $statusClass = 'bg-yellow-100 text-yellow-800';
                } elseif ($status === 'approved') {
                    $statusLabel = 'Disetujui';
                    $statusClass = 'bg-emerald-100 text-emerald-800';
                } elseif ($status === 'rejected') {
                    $statusLabel = 'Ditolak';
                    $statusClass = 'bg-red-100 text-red-800';
                } elseif ($status === 'return_requested') {
                    $statusLabel = 'Pengajuan Kembali';
                    $statusClass = 'bg-purple-100 text-purple-800';
                } elseif ($status === 'borrowed' && $borrow->return_date && Carbon::parse($borrow->return_date)->lt(Carbon::today())) {
                    $statusLabel = 'Terlambat';
                    $statusClass = 'bg-red-100 text-red-800';
                } elseif ($status === 'borrowed') {
                    $statusLabel = 'Dipinjam';
                    $statusClass = 'bg-blue-100 text-blue-800';
                }

                return [
                    'id' => $borrow->id,
                    'user_name' => $borrow->user?->full_name ?? 'Unknown User',
                    'book_title' => $borrow->book?->title ?? 'Unknown Book',
                    'borrow_date' => Carbon::parse($borrow->borrow_date),
                    'status' => $status,
                    'status_label' => $statusLabel,
                    'status_class' => $statusClass,
                    'created_at' => $borrow->created_at,
                ];
            });

        // Popular Books (most borrowed)
        $popularBooks = book::withCount('borrowings')
            ->orderBy('borrowings_count', 'desc')
            ->take(5)
            ->get();

        // Users by Role Count
        $usersByRole = [
            'admin' => User::where('role', 'admin')->count(),
            'librarian' => User::where('role', 'librarian')->count(),
            'user' => User::where('role', 'user')->count(),
        ];

        // Total Returns This Month
        $returnsThisMonth = borrowing::where('status', 'returned')
            ->where('updated_at', '>=', $startOfMonth)
            ->count();

        return view('admin.dashboard', compact(
            'totalBooks',
            'totalUsers',
            'totalCategories',
            'activeBorrowings',
            'newBooksThisMonth',
            'newUsersThisMonth',
            'overdueBorrowings',
            'recentActivities',
            'popularBooks',
            'usersByRole',
            'returnsThisMonth'
        ));
    }
}
