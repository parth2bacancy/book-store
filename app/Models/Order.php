<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'display_id',
        'book_id',
        'user_id',
        'quantity',
        'discount_amount',
        'sub_total',
        'total',
        'status'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayStatusAttribute()
    {
        return ucfirst($this->status);
    }
}
