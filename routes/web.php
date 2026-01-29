<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('landing');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto'])->name('profile.photo.delete');

    // Borrowing Routes - Only for regular users
    Route::middleware(['isUser', 'verified'])->group(function () {
        Route::get('/dashboard', [HomeController::class, 'catalogue'])->name('dashboard');
        Route::get('/borrowing-history', [HomeController::class, 'myBorrowings'])->name('home.borrowingHistory');
        Route::get('/book/{book}/borrow', [HomeController::class, 'borrowingForm'])->name('home.borrowingForm');
        Route::post('/book/{book}/borrow', [HomeController::class, 'storeBorrowing'])->name('home.storeBorrowing');

        Route::post('/book/{book}/bookmark/toggle', [BookmarkController::class, 'toggle'])->name('bookmark.toggle');
        Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmark.destroy');
        Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('home.bookmarks');
        // Review Routes
        Route::post('/book/{book}/review', [BookReviewController::class, 'store'])->name('review.store');
        Route::delete('/reviews/{review}', [BookReviewController::class, 'destroy'])->name('review.destroy');
    });

    // Bookmark Routes
    Route::middleware('verified')->group(function () {
        Route::get('/book/{book}', [HomeController::class, 'bookDetail'])->name('home.bookDetail');
    });
});

// Admin Routes
Route::middleware(['auth', 'isAdmin', 'verified'])->prefix('admin')->group(function () {
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

    // User CRUD Routes - Only for Strict Admins
    Route::middleware('isStrictAdmin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/users', [UserController::class, 'store'])->name('user.store');
        Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('user.updateRole');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    // Borrowing Management Routes
    Route::get('/borrowings', [BorrowingController::class, 'index'])->name('admin.borrowings');
    Route::post('/borrowings/{borrowing}/approve', [BorrowingController::class, 'approve'])->name('borrowing.approve');
    Route::post('/borrowings/{borrowing}/reject', [BorrowingController::class, 'reject'])->name('borrowing.reject');
    Route::post('/borrowings/{borrowing}/confirm-return', [BorrowingController::class, 'confirmReturn'])->name('borrowing.confirmReturn');

    Route::get('/reports', function () {
        $categories = \App\Models\book_category::orderBy('category_name')->get();
        return view('admin.reportGenerate', compact('categories'));
    })->name('admin.reports');

    // Report Generation Routes
    Route::post('/reports/borrowing', [ReportController::class, 'borrowingReport'])->name('report.borrowing');
    Route::post('/reports/books', [ReportController::class, 'bookReport'])->name('report.books');
    Route::post('/reports/users', [ReportController::class, 'userReport'])->name('report.users');
    Route::post('/reports/statistics', [ReportController::class, 'statisticsReport'])->name('report.statistics');
});

require __DIR__ . '/auth.php';
