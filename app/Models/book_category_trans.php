<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book_category_trans extends Model
{
    protected $table = "book_category_trans";
    protected $fillable = [
        'book_id',
        'category_id',
    ];

    public function book()
    {
        return $this->belongsTo(book::class);
    }

    public function category()
    {
        return $this->belongsTo(book_category::class);
    }
}
