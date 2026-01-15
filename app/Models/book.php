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
}
