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
        $bookCategories = book_category::all();
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
        ]);

        book_category::create([
            'category_name' => $request->category_name,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book_category $book_category)
    {
        //
    }
}
