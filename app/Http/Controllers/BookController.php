<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\book_category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        $books = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = book_category::all();

        return view('admin.bookManagement', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = book_category::all();
        return view('admin.addBook', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();

        // Handle cover upload
        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        // Create book
        $book = book::create([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'publisher' => $validated['publisher'],
            'publication_year' => $validated['publication_year'],
            'synopsis' => $validated['synopsis'] ?? null,
            'image' => $coverPath,
            'stock' => $validated['stock'],
        ]);

        // Sync categories
        $book->categories()->sync($validated['categories']);

        return redirect()->route('admin.books')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        $categories = book_category::all();
        return view('admin.editBook', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, book $book)
    {
        $validated = $request->validated();

        // Handle cover upload
        if ($request->hasFile('cover')) {
            // Delete old cover if exists
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
            $book->image = $coverPath;
        }

        // Update book
        $book->title = $validated['title'];
        $book->author = $validated['author'];
        $book->publisher = $validated['publisher'];
        $book->publication_year = $validated['publication_year'];
        $book->synopsis = $validated['synopsis'] ?? null;
        $book->stock = $validated['stock'];
        $book->save();

        // Sync categories
        $book->categories()->sync($validated['categories']);

        return redirect()->route('admin.books')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        // Delete cover if exists
        if ($book->image) {
            Storage::disk('public')->delete($book->image);
        }

        // Detach categories
        $book->categories()->detach();

        // Delete book
        $book->delete();

        return redirect()->route('admin.books')->with('success', 'Buku berhasil dihapus.');
    }
}
