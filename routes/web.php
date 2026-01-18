<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', function () {
    return view('home.bookCatalogue');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Home Routes
    Route::get('/bookmarks', function () {
        return view('home.bookmarks');
    })->name('home.bookmarks');

    Route::get('/borrowing-history', function () {
        return view('home.borrowingHistory');
    })->name('home.borrowingHistory');

    Route::get('/book-detail', function () {
        return view('home.bookDetail');
    })->name('home.bookDetail');

    Route::get('/borrowing-form', function () {
        return view('home.borrowingForm');
    })->name('home.borrowingForm');
});

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/books', function () {
        return view('admin.bookManagement');
    })->name('admin.books');

    Route::get('/categories', [BookCategoryController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [BookCategoryController::class, 'store'])->name('category.store');

    Route::get('/users', function () {
        return view('admin.userManagement');
    })->name('admin.users');

    Route::get('/reports', function () {
        return view('admin.reportGenerate');
    })->name('admin.reports');
});

require __DIR__ . '/auth.php';
