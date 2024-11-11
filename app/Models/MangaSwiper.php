<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MangaSwiper extends Model
{
    use HasFactory;

    protected $fillable = ['manga_id', 'order', 'is_active'];

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
