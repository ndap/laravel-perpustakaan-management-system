<?php

namespace App\Http\Controllers;

use App\Models\book_review;
use App\Models\book;
use App\Models\borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, book $book)
    {
        // Check if user has borrowed this book (approved or returned)
        $hasBorrowed = borrowing::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereIn('status', ['approved', 'borrowed', 'return_requested', 'returned'])
            ->exists();

        if (!$hasBorrowed) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Anda hanya dapat memberikan ulasan untuk buku yang pernah Anda pinjam.');
        }

        // Validate the request
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|min:10|max:1000',
        ], [
            'rating.required' => 'Silakan berikan rating untuk buku ini',
            'rating.min' => 'Rating minimal adalah 1 bintang',
            'rating.max' => 'Rating maksimal adalah 5 bintang',
            'review.required' => 'Silakan tulis ulasan Anda',
            'review.min' => 'Ulasan minimal 10 karakter',
            'review.max' => 'Ulasan maksimal 1000 karakter',
        ]);

        // Check if user already reviewed this book
        $existingReview = book_review::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->first();

        if ($existingReview) {
            return redirect()->route('home.bookDetail', $book)
                ->with('error', 'Anda sudah memberikan ulasan untuk buku ini.');
        }

        // Create the review
        book_review::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'rating' => $validated['rating'],
            'review' => $validated['review'],
        ]);

        return redirect()->route('home.bookDetail', $book)
            ->with('success', 'Terima kasih! Ulasan Anda berhasil ditambahkan.');
    }

    /**
     * Remove the specified review from storage.
     */
    public function destroy(book_review $review)
    {
        // Ensure user can only delete their own reviews
        if ($review->user_id !== Auth::id()) {
            return redirect()->back()
                ->with('error', 'Anda tidak memiliki akses untuk menghapus ulasan ini.');
        }

        $bookId = $review->book_id;
        $review->delete();

        return redirect()->route('home.bookDetail', $bookId)
            ->with('success', 'Ulasan berhasil dihapus.');
    }
}
