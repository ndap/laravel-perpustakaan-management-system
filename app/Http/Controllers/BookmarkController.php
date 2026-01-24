<?php

namespace App\Http\Controllers;

use App\Models\bookmark;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    /**
     * Display user's bookmarked books.
     */
    public function index()
    {
        $bookmarks = bookmark::with('book.categories')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(12);

        return view('home.bookmarks', compact('bookmarks'));
    }

    /**
     * Toggle bookmark for a book (add if not exists, remove if exists).
     * Returns JSON response for AJAX requests.
     */
    public function toggle(book $book)
    {
        $user = Auth::user();

        $bookmark = bookmark::where('user_id', $user->id)
            ->where('book_id', $book->id)
            ->first();

        if ($bookmark) {
            // Remove bookmark
            $bookmark->delete();
            return response()->json([
                'success' => true,
                'bookmarked' => false,
                'message' => 'Bookmark berhasil dihapus'
            ]);
        } else {
            // Add bookmark
            bookmark::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
            ]);
            return response()->json([
                'success' => true,
                'bookmarked' => true,
                'message' => 'Buku berhasil ditambahkan ke koleksi'
            ]);
        }
    }

    /**
     * Remove specific bookmark.
     */
    public function destroy(bookmark $bookmark)
    {
        // Ensure user can only delete their own bookmarks
        if ($bookmark->user_id !== Auth::id()) {
            return redirect()->route('home.bookmarks')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus bookmark ini.');
        }

        $bookmark->delete();

        return redirect()->route('home.bookmarks')
            ->with('success', 'Bookmark berhasil dihapus dari koleksi.');
    }
}
