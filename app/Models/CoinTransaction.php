<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'price',
        'transaction_id',
        'midtrans_token',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
