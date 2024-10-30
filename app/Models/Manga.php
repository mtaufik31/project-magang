<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'manga';

    protected $fillable = [
        'title',
        'alternative',
        'image',
        'status',
        'rating',
        'description',
        'released_year',
        'author',
        'artist',
        'publisher',
        'created_by',
        'genre'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
