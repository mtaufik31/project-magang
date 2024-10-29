<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'alternative',
        'image',
        'status',
        'rating' ,
        'description',
        'realese_year',
        'author',
        'artist',
        'publisher',
        'posted_by',
        'posted_on',
        'genre'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
