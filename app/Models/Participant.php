<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $table = 'participants';
    protected $fillable = [
        'tim_id',
        'name',
        'email',
        'university',
        'ktm',
        'profile',
        'role',
    ];

    public function tim()
    {
        return $this->belongsTo(Tim::class);
    }
}
