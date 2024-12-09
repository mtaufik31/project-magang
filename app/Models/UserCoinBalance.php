<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoinBalance extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_coins'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Tambahkan method untuk menambah atau mengurangi coin
    public function addCoins($amount)
    {
        $this->total_coins += $amount;
        $this->save();
    }

    public function deductCoins($amount)
    {
        if ($this->total_coins >= $amount) {
            $this->total_coins -= $amount;
            $this->save();
            return true;
        }
        return false;
    }
}
