<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = 'submissions';

    protected $fillable = [
        'tim_id',
        'file',
    ];

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'tim_id');
    }
}
