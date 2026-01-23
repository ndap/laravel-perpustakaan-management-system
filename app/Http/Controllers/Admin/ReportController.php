<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\borrowing;
use App\Models\book;
use App\Models\User;
use App\Models\book_category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Generate Borrowing Report
     */
    public function borrowingReport(Request $request)
    {
        // Validate input
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = Carbon::parse($request->start_date);
        $endDate = Carbon::parse($request->end_date);

        // Query borrowings with relationships
        $borrowings = borrowing::with(['user', 'book', 'approvedBy', 'confirmedBy'])
            ->whereBetween('borrow_date', [$startDate, $endDate])
            ->orderBy('borrow_date', 'desc')
            ->get();

        // Calculate statistics
        $statistics = [
            'total' => $borrowings->count(),
            'pending' => $borrowings->where('status', 'pending')->count(),
            'approved' => $borrowings->where('status', 'approved')->count(),
            'returned' => $borrowings->where('status', 'returned')->count(),
            'rejected' => $borrowings->where('status', 'rejected')->count(),
        ];

        // Generate PDF
        $pdf = PDF::loadView('reports.borrowing_report', [
            'borrowings' => $borrowings,
            'statistics' => $statistics,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'generatedAt' => now(),
        ]);

        $filename = 'laporan_peminjaman_' . $startDate->format('Ymd') . '_' . $endDate->format('Ymd') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Generate Book Collection Report
     */
    public function bookReport(Request $request)
    {
        $categoryId = $request->category_id;

        // Query books with categories
        $booksQuery = book::with(['categories', 'borrowings']);

        // Filter by category if selected
        if ($categoryId && $categoryId !== 'all') {
            $booksQuery->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('book_categories.id', $categoryId);
            });
        }

        $books = $booksQuery->orderBy('title')->get();

        // Calculate statistics
        $statistics = [
            'total_books' => $books->count(),
            'total_stock' => $books->sum('stock'),
            'total_borrowed' => $books->sum(function ($book) {
                return $book->borrowings()->whereIn('status', ['approved', 'pending'])->count();
            }),
        ];

        // Get selected category name
        $categoryName = 'Semua Kategori';
        if ($categoryId && $categoryId !== 'all') {
            $category = book_category::find($categoryId);
            $categoryName = $category ? $category->category_name : 'Semua Kategori';
        }

        // Generate PDF
        $pdf = PDF::loadView('reports.book_report', [
            'books' => $books,
            'statistics' => $statistics,
            'categoryName' => $categoryName,
            'generatedAt' => now(),
        ]);

        $filename = 'laporan_koleksi_buku_' . now()->format('Ymd') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Generate User Report
     */
    public function userReport(Request $request)
    {
        $role = $request->role;

        // Query users with borrowings
        $usersQuery = User::with(['borrowings']);

        // Filter by role if selected
        if ($role && $role !== 'all') {
            $usersQuery->where('role', $role);
        }

        $users = $usersQuery->orderBy('full_name')->get();

        // Add borrowing count to each user
        $users->each(function ($user) {
            $user->borrowing_count = $user->borrowings()->count();
            $user->active_borrowing_count = $user->borrowings()->whereIn('status', ['approved', 'pending'])->count();
        });

        // Calculate statistics
        $statistics = [
            'total_users' => $users->count(),
            'total_borrowings' => $users->sum('borrowing_count'),
            'users_with_active_borrowing' => $users->where('active_borrowing_count', '>', 0)->count(),
        ];

        // Get selected role name
        $roleName = 'Semua Role';
        if ($role && $role !== 'all') {
            $roleName = ucfirst($role);
        }

        // Generate PDF
        $pdf = PDF::loadView('reports.user_report', [
            'users' => $users,
            'statistics' => $statistics,
            'roleName' => $roleName,
            'generatedAt' => now(),
        ]);

        $filename = 'laporan_pengguna_' . now()->format('Ymd') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Generate Statistics Report
     */
    public function statisticsReport(Request $request)
    {
        $period = $request->period ?? 'this_month';

        // Calculate date range based on period
        $startDate = null;
        $endDate = Carbon::now();
        $periodName = '';

        switch ($period) {
            case 'this_month':
                $startDate = Carbon::now()->startOfMonth();
                $periodName = 'Bulan Ini (' . $startDate->format('F Y') . ')';
                break;
            case 'last_month':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                $endDate = Carbon::now()->subMonth()->endOfMonth();
                $periodName = 'Bulan Lalu (' . $startDate->format('F Y') . ')';
                break;
            case 'last_3_months':
                $startDate = Carbon::now()->subMonths(3)->startOfMonth();
                $periodName = '3 Bulan Terakhir';
                break;
            case 'this_year':
                $startDate = Carbon::now()->startOfYear();
                $periodName = 'Tahun Ini (' . $startDate->format('Y') . ')';
                break;
            default:
                $startDate = Carbon::now()->startOfMonth();
                $periodName = 'Bulan Ini';
        }

        // Query borrowings in period
        $borrowings = borrowing::with(['user', 'book'])
            ->whereBetween('borrow_date', [$startDate, $endDate])
            ->get();

        // Calculate key metrics
        $metrics = [
            'total_borrowings' => $borrowings->count(),
            'pending' => $borrowings->where('status', 'pending')->count(),
            'approved' => $borrowings->where('status', 'approved')->count(),
            'returned' => $borrowings->where('status', 'returned')->count(),
            'late_returns' => $borrowings->filter(function ($b) {
                return $b->isLate();
            })->count(),
        ];

        // Get top 10 most borrowed books
        $topBooks = book::withCount([
            'borrowings' => function ($query) use ($startDate, $endDate) {
                $query->whereBetween('borrow_date', [$startDate, $endDate]);
            }
        ])
            ->orderBy('borrowings_count', 'desc')
            ->limit(10)
            ->get();

        // Get active users (users with borrowings in period)
        $activeUsers = User::whereHas('borrowings', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('borrow_date', [$startDate, $endDate]);
        })->count();

        // Monthly trend data (group by month)
        $monthlyData = $borrowings->groupBy(function ($borrowing) {
            return $borrowing->borrow_date->format('Y-m');
        })->map(function ($group) {
            return [
                'month' => Carbon::parse($group->first()->borrow_date)->format('M Y'),
                'count' => $group->count(),
            ];
        })->values();

        // Generate PDF
        $pdf = PDF::loadView('reports.statistics_report', [
            'metrics' => $metrics,
            'topBooks' => $topBooks,
            'activeUsers' => $activeUsers,
            'monthlyData' => $monthlyData,
            'periodName' => $periodName,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'generatedAt' => now(),
        ]);

        $filename = 'laporan_statistik_' . now()->format('Ymd') . '.pdf';

        return $pdf->download($filename);
    }
}
