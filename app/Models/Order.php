<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'transaction_id',
        'phone',
        'category',
        'amount',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
