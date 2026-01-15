<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book_review extends Model
{
    protected $table = "book_reviews";
    protected $fillable = [
        'book_id',
        'user_id',
        'rating',
        'review',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(book::class);
    }
}
