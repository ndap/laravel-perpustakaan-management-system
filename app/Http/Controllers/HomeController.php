<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\book_category;
use App\Models\borrowing;
use App\Models\bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Display the book catalogue with search and filter.
     */
    public function catalogue(Request $request)
    {
        $query = book::with('categories');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%")
                    ->orWhere('publisher', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->has('category') && $request->category) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('book_categories.id', $request->category);
            });
        }

        $books = $query->orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(15);
        $categories = book_category::all();

        // Statistics
        $totalBooks = book::count();
        $totalStock = book::sum('stock');
        $borrowedBooks = borrowing::where('status', 'approved')->count();
        $availableBooks = $totalStock;

        return view('home.bookCatalogue', compact(
            'books',
            'categories',
            'totalBooks',
            'totalStock',
            'availableBooks',
            'borrowedBooks'
        ));
    }

    /**
     * Display the book detail page.
     */
    public function bookDetail(book $book)
    {
        // Load relationships
        $book->load('categories');

        // Check if book is available (based on stock)
        $isAvailable = $book->isAvailable();

        // Check if user has bookmarked this book
        $isBookmarked = bookmark::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->exists();

        // Load reviews with user information, ordered by newest first
        $reviews = $book->reviews()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        // Check if current user has already reviewed this book
        $userHasReviewed = $book->reviews()
            ->where('user_id', Auth::id())
            ->exists();

        // Calculate average rating and review count
        $averageRating = $book->averageRating();
        $reviewCount = $book->reviewCount();

        // Get related books (same category)
        $relatedBooks = book::whereHas('categories', function ($q) use ($book) {
            $q->whereIn('book_categories.id', $book->categories->pluck('id'));
        })
            ->where('id', '!=', $book->id)
            ->limit(4)
            ->get();

        return view('home.bookDetail', compact(
            'book',
            'isAvailable',
            'isBookmarked',
            'reviews',
            'userHasReviewed',
            'averageRating',
            'reviewCount',
            'relatedBooks'
        ));
    }

    /**
     * Display the borrowing form for a specific book.
     */
    public function borrowingForm(book $book)
    {
        // Check if book is available (stock > 0)
        if (!$book->isAvailable()) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Stok buku tidak tersedia. Silakan tunggu hingga ada yang mengembalikan.');
        }

        $user = Auth::user();

        return view('home.borrowingForm', compact('book', 'user'));
    }

    /**
     * Store a new borrowing record.
     */
    public function storeBorrowing(Request $request, book $book)
    {
        $request->validate([
            'borrow_date' => 'required|date|after_or_equal:today',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        // Check if book is available (stock > 0)
        if (!$book->isAvailable()) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Stok buku tidak tersedia.');
        }

        // Create borrowing record with pending status
        borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => 'pending',
        ]);

        return redirect()->route('home.borrowingHistory')
            ->with('success', 'Permintaan peminjaman berhasil dikirim! Silakan tunggu persetujuan dari admin/pustakawan.');
    }

    /**
     * Display user's borrowing history
     */
    public function myBorrowings(Request $request)
    {
        $query = borrowing::with(['book', 'approvedBy', 'confirmedBy'])
            ->where('user_id', Auth::id());

        // Filter by status if provided
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        $borrowings = $query->orderBy('created_at', 'desc')->orderBy('id', 'desc')->paginate(10);

        return view('home.borrowingHistory', compact('borrowings'));
    }

    /**
     * Download borrowing proof as PDF
     */
    public function downloadBorrowingProof($id)
    {
        // Find the borrowing record
        $borrowing = borrowing::with(['book', 'user', 'approvedBy'])
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Only allow download for approved borrowings
        if ($borrowing->status !== 'approved') {
            return redirect()->route('home.borrowingHistory')
                ->with('error', 'Bukti peminjaman hanya tersedia untuk peminjaman yang sudah disetujui.');
        }

        // Generate PDF
        $pdf = Pdf::loadView('home.borrowing_proof', compact('borrowing'));

        // Download PDF with filename
        return $pdf->download('bukti-peminjaman-' . $borrowing->id . '.pdf');
    }
}
