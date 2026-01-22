<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\book_category;
use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $books = $query->orderBy('created_at', 'desc')->paginate(12);
        $categories = book_category::all();

        // Statistics
        $totalBooks = book::count();
        $borrowedBooks = borrowing::where('status', 'borrowed')->count();
        $availableBooks = $totalBooks - $borrowedBooks;

        return view('home.bookCatalogue', compact(
            'books',
            'categories',
            'totalBooks',
            'availableBooks',
            'borrowedBooks'
        ));
    }

    /**
     * Display the book detail page.
     */
    public function bookDetail(book $book)
    {
        $book->load('categories', 'reviews');

        // Check if book is currently borrowed
        $isBorrowed = borrowing::where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->exists();

        // Get related books (same category)
        $relatedBooks = book::whereHas('categories', function ($q) use ($book) {
            $q->whereIn('book_categories.id', $book->categories->pluck('id'));
        })
            ->where('id', '!=', $book->id)
            ->limit(4)
            ->get();

        return view('home.bookDetail', compact('book', 'isBorrowed', 'relatedBooks'));
    }

    /**
     * Display the borrowing form for a specific book.
     */
    public function borrowingForm(book $book)
    {
        // Check if book is available
        $isBorrowed = borrowing::where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->exists();

        if ($isBorrowed) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Buku ini sedang dipinjam.');
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

        // Check if book is available
        $isBorrowed = borrowing::where('book_id', $book->id)
            ->where('status', 'borrowed')
            ->exists();

        if ($isBorrowed) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Buku ini sedang dipinjam.');
        }

        // Create borrowing record
        borrowing::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
            'status' => 'borrowed',
        ]);

        return redirect()->route('home.borrowingHistory')
            ->with('success', 'Buku berhasil dipinjam!');
    }
}
