<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'image',
        'title',
        'author',
        'publisher',
        'publication_year',
        'synopsis',
        'stock',
    ];

    public function borrowings()
    {
        return $this->hasMany(borrowing::class);
    }

    public function reviews()
    {
        return $this->hasMany(book_review::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(bookmark::class);
    }

    public function categories()
    {
        return $this->belongsToMany(book_category::class, 'book_category_trans', 'book_id', 'category_id');
    }

    /**
     * Check if book is available for borrowing
     */
    public function isAvailable()
    {
        return $this->stock > 0;
    }

    /**
     * Decrement stock when book is approved for borrowing
     */
    public function decrementStock()
    {
        if ($this->stock > 0) {
            $this->decrement('stock');
            return true;
        }
        return false;
    }

    /**
     * Increment stock when book is returned
     */
    public function incrementStock()
    {
        $this->increment('stock');
        return true;
    }

    /**
     * Get average rating for the book
     */
    public function averageRating()
    {
        return $this->reviews()->avg('rating') ?? 0;
    }

    /**
     * Get total review count
     */
    public function reviewCount()
    {
        return $this->reviews()->count();
    }
}
