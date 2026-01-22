<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/dashboard', [HomeController::class, 'catalogue'])
    ->middleware(['auth', 'verified'])->name('dashboard');

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

    // Book Routes
    Route::get('/book/{book}', [HomeController::class, 'bookDetail'])->name('home.bookDetail');
    Route::get('/book/{book}/borrow', [HomeController::class, 'borrowingForm'])->name('home.borrowingForm');
    Route::post('/book/{book}/borrow', [HomeController::class, 'storeBorrowing'])->name('home.storeBorrowing');
});

use App\Http\Controllers\BookController;

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Book CRUD Routes
    Route::get('/books', [BookController::class, 'index'])->name('admin.books');
    Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/books', [BookController::class, 'store'])->name('book.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

    Route::get('/categories', [BookCategoryController::class, 'index'])->name('admin.categories');
    Route::post('/categories', [BookCategoryController::class, 'store'])->name('category.store');
    Route::delete('/categories/{book_category}', [BookCategoryController::class, 'destroy'])->name('category.destroy');

    // User CRUD Routes
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('user.updateRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/reports', function () {
        return view('admin.reportGenerate');
    })->name('admin.reports');
});

require __DIR__ . '/auth.php';
