<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'phone_number',
        'message',
        'status',
        'response',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
}
