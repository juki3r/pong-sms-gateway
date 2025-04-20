<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CreditTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'paymongo_link_id',
        'status',
    ];
}
