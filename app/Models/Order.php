<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'event_id',
        'transaction_id',
        'phone',
        'amount',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'order_id', 'id');
    }
}
