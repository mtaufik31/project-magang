<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'manga_id',
        'chapter_number',
        'chapter_title',
        'cover_image',
        'content_path',
    ];

    protected static function booted()
    {
        static::saved(function ($chapter) {
            $chapter->manga->touch(); // Perbarui updated_at pada manga terkait
        });
    }

    public function manga()
    {
        return $this->belongsTo(Manga::class);
    }
}
