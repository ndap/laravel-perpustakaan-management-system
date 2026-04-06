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
        'borrowed_at',
        'returned_at',
        'return_requested_at',
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
     * Scope for approved borrowing requests (awaiting pickup)
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    /**
     * Scope for actively borrowed books
     */
    public function scopeBorrowed($query)
    {
        return $query->where('status', 'borrowed');
    }

    /**
     * Scope for return requested
     */
    public function scopeReturnRequested($query)
    {
        return $query->where('status', 'return_requested');
    }

    /**
     * Check if borrowing is late (past return date)
     */
    public function isLate()
    {
        if ($this->status === 'returned' && $this->returned_at) {
            return $this->returned_at->greaterThan($this->return_date);
        }

        // If actively borrowed or return requested, check if current date is past return date
        if (in_array($this->status, ['borrowed', 'return_requested'])) {
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
            'borrowed_at' => 'datetime',
            'returned_at' => 'datetime',
            'return_requested_at' => 'datetime',
        ];
    }
}
