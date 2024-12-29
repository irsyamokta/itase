<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tims';
    protected $fillable = [
        'leader_id',
        'order_id',
        'tim_name',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
}
