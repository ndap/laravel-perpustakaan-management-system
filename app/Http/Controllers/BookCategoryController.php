<?php

namespace App\Http\Controllers;

use App\Models\book_category;
use Illuminate\Http\Request;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookCategories = book_category::withCount('books')->get();
        return view('admin.categoryManagement', compact('bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:book_categories,category_name',
            'icon' => 'nullable|string|max:100',
        ]);

        book_category::create([
            'category_name' => $request->category_name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(book_category $book_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book_category $book_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book_category $book_category)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:book_categories,category_name,' . $book_category->id,
            'icon' => 'nullable|string|max:100',
        ]);

        $book_category->update([
            'category_name' => $request->category_name,
            'icon' => $request->icon,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book_category $book_category)
    {
        // Check if category has books
        if ($book_category->books()->count() > 0) {
            return redirect()->route('admin.categories')->with('error', 'Kategori tidak dapat dihapus karena masih memiliki buku terkait.');
        }

        $book_category->delete();

        return redirect()->route('admin.categories')->with('success', 'Kategori berhasil dihapus.');
    }
}
