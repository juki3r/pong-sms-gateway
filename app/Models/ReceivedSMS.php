<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReceivedSMS extends Model
{
    use HasFactory;

    protected $table = 'received_sms';

    protected $fillable = [
        'user_id',
        'phone_number',
        'message',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
