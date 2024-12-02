<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function getChapter()
    {
        $path = $this->content_path;

        if (!Storage::exists($path)) {
            return ['error' => 'Chapter not found'];
        }

        $files = Storage::allFiles($path);

        $fileList = [];
        foreach ($files as $file) {
            $fileList[] = [
                'nama' => basename($file),
                'path' => $file,
                'url' => Storage::url($file),
            ];
        }

        return $fileList;
    }
}
