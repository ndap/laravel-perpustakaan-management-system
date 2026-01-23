<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    protected $table = "borrowings";
    protected $fillable = [
        'user_id',
        'book_id',
        'borrow_date',
        'return_date',
        'status',
        'approved_at',
        'approved_by',
        'returned_at',
        'confirmed_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(book::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function confirmedBy()
    {
        return $this->belongsTo(User::class, 'confirmed_by');
    }

    /**
     * Scope for pending borrowing requests
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope for approved borrowing requests
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Check if borrowing is late (past return date)
     */
    public function isLate()
    {
        if ($this->status === 'returned' && $this->returned_at) {
            return $this->returned_at->greaterThan($this->return_date);
        }

        // If not yet returned, check if current date is past return date
        if ($this->status === 'approved') {
            return now()->greaterThan($this->return_date);
        }

        return false;
    }

    /**
     * Cast attributes
     */
    protected function casts(): array
    {
        return [
            'borrow_date' => 'date',
            'return_date' => 'date',
            'approved_at' => 'datetime',
            'returned_at' => 'datetime',
        ];
    }
}
