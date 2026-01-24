<?php

namespace App\Http\Controllers;

use App\Models\borrowing;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowingController extends Controller
{
    /**
     * Display a listing of borrowing requests for admin/librarian
     */
    public function index(Request $request)
    {
        $query = borrowing::with(['user', 'book', 'approvedBy', 'confirmedBy']);

        // Filter by status if provided
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $borrowings = $query->orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(15);

        // Get counts for each status
        $statusCounts = [
            'all' => borrowing::count(),
            'pending' => borrowing::where('status', 'pending')->count(),
            'approved' => borrowing::where('status', 'approved')->count(),
            'rejected' => borrowing::where('status', 'rejected')->count(),
            'returned' => borrowing::where('status', 'returned')->count(),
        ];

        return view('admin.borrowingManagement', compact('borrowings', 'statusCounts'));
    }

    /**
     * Approve a pending borrowing request
     */
    public function approve($id)
    {
        $borrowing = borrowing::with('book')->findOrFail($id);

        // Validate that the request is pending
        if ($borrowing->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya permintaan dengan status pending yang dapat disetujui.');
        }

        // Check if book stock is available
        if (!$borrowing->book->isAvailable()) {
            return redirect()->back()->with('error', 'Stok buku tidak tersedia. Tidak dapat menyetujui peminjaman.');
        }

        // Update borrowing status
        $borrowing->status = 'approved';
        $borrowing->approved_at = now();
        $borrowing->approved_by = Auth::id();
        $borrowing->save();

        // Decrement book stock
        $borrowing->book->decrementStock();

        return redirect()->back()->with('success', 'Peminjaman berhasil disetujui! Stok buku telah dikurangi.');
    }

    /**
     * Reject a pending borrowing request
     */
    public function reject($id)
    {
        $borrowing = borrowing::findOrFail($id);

        // Validate that the request is pending
        if ($borrowing->status !== 'pending') {
            return redirect()->back()->with('error', 'Hanya permintaan dengan status pending yang dapat ditolak.');
        }

        // Update borrowing status
        $borrowing->status = 'rejected';
        $borrowing->save();

        return redirect()->back()->with('success', 'Peminjaman ditolak. Stok buku tidak berubah.');
    }

    /**
     * Confirm book return
     */
    public function confirmReturn($id)
    {
        $borrowing = borrowing::with('book')->findOrFail($id);

        // Validate that the request is approved
        if ($borrowing->status !== 'approved') {
            return redirect()->back()->with('error', 'Hanya peminjaman yang disetujui yang dapat dikonfirmasi pengembaliannya.');
        }

        // Update borrowing status
        $borrowing->status = 'returned';
        $borrowing->returned_at = now();
        $borrowing->confirmed_by = Auth::id();

        // Check if return is late
        $isLate = $borrowing->returned_at->greaterThan($borrowing->return_date);

        $borrowing->save();

        // Increment book stock
        $borrowing->book->incrementStock();

        // Return appropriate message
        if ($isLate) {
            $daysLate = $borrowing->returned_at->diffInDays($borrowing->return_date);
            return redirect()->back()->with('warning', "Pengembalian terlambat {$daysLate} hari! Stok buku telah dikembalikan.");
        }

        return redirect()->back()->with('success', 'Pengembalian dikonfirmasi tepat waktu. Stok buku telah dikembalikan.');
    }
}
