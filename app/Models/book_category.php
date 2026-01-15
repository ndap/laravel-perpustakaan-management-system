<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book_category extends Model
{
    protected $table = "book_categories";
    protected $fillable = [
        'category_name',
    ];

    public function books()
    {
        return $this->belongsToMany(book::class, 'book_category_trans', 'category_id', 'book_id');
    }
}
