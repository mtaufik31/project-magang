<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Manga;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class ChapterController extends Controller
{
    public function index($mangaId)
    {
        $manga = Manga::findOrFail($mangaId);
        $chapters = Chapter::where('manga_id', $mangaId)->get();
        return view('dashboard.chapter.index', [
            'title' => 'Dashboard | Chapter List',
            'chapters' => $chapters,
            'manga' => $manga,
        ]);
    }

    public function create($mangaId)
    {
        $manga = Manga::findOrFail($mangaId);
        return view('dashboard.chapter.create', [
            'title' => 'Dashboard | Add Chapter',
            'manga' => $manga,
        ]);
    }

    public function store(Request $request, $mangaId)
    {
        $request->validate([
            'chapter_number' => 'required|numeric',
            'chapter_title' => 'required|string',
            'cover_image' => 'required|image',
            'chapter_content' => 'required|file|mimes:zip',
        ]);

        $existingChapter = Chapter::where('manga_id', $mangaId)
            ->where('chapter_number', 'like', $request->chapter_number . '%')
            ->orderBy('chapter_number', 'desc')
            ->first();

        $newChapterNumber = $existingChapter
            ? (float)$existingChapter->chapter_number + 0.1
            : $request->chapter_number;

        $coverImagePath = $request->file('cover_image')->store('chapters/covers', 'public');

        // Extract ZIP content
        $extractPath = 'chapters/assets/' . uniqid();
        $destinationPath = storage_path('app/public/' . $extractPath);

        $zip = new ZipArchive();
        $zipPath = $request->file('chapter_content')->path();
        if ($zip->open($zipPath) === true) {
            $zip->extractTo($destinationPath);
            $zip->close();
        } else {
            return back()->withErrors(['chapter_content' => 'Failed to extract ZIP file']);
        }

        Chapter::create([
            'manga_id' => $mangaId,
            'chapter_number' => $newChapterNumber,
            'chapter_title' => $request->chapter_title,
            'cover_image' => $coverImagePath,
            'content_path' => 'storage/' . $extractPath,
        ]);

        $manga = Manga::findOrFail($mangaId);
        $manga->touch();

        return redirect()->route('chapters.index', $mangaId)->with('success', 'Chapter added successfully.');
    }

    public function destroy($mangaId, $id)
    {
        $chapter = Chapter::findOrFail($id);

        // Delete files
        Storage::delete($chapter->cover_image);
        Storage::deleteDirectory($chapter->content_path);

        $chapter->delete();

        return back()->with('success', 'Chapter deleted successfully.');
    }

    public function edit($mangaId, $id)
    {
        $manga = Manga::findOrFail($mangaId);
        $chapter = Chapter::findOrFail($id);
        return view('dashboard.chapter.edit', [
            'title' => 'Dashboard | Edit Chapter',
            'chapter' => $chapter,
            'manga' => $manga,
        ]);
    }

    public function update(Request $request, $mangaId, $id)
    {
        $request->validate([
            'chapter_number' => 'required|integer',
            'chapter_title' => 'required|string',
            'cover_image' => 'nullable|image',
            'chapter_content' => 'nullable|file|mimes:zip',
        ]);

        $chapter = Chapter::findOrFail($id);

        // Update cover image if provided
        if ($request->hasFile('cover_image')) {
            Storage::delete($chapter->cover_image);
            $chapter->cover_image = $request->file('cover_image')->store('chapters/covers');
        }

        // Update content if ZIP is provided
        if ($request->hasFile('chapter_content')) {
            // Delete existing content folder
            Storage::deleteDirectory($chapter->content_path);

            // Extract new ZIP
            $zip = new ZipArchive();
            $zipPath = $request->file('chapter_content')->path();
            $extractPath = 'chapters/content/' . uniqid();
            if ($zip->open($zipPath) === true) {
                $zip->extractTo(storage_path('app/' . $extractPath));
                $zip->close();
                $chapter->content_path = $extractPath;
            } else {
                return back()->withErrors(['chapter_content' => 'Failed to extract ZIP file']);
            }
        }

        // Update other fields
        $chapter->update([
            'chapter_number' => $request->chapter_number,
            'chapter_title' => $request->chapter_title,
        ]);

        $manga = Manga::findOrFail($mangaId);
        $manga->touch();

        return redirect()->route('chapters.index', $mangaId)->with('success', 'Chapter updated successfully.');
    }

    public function showChapter($chapterId)
    {
        $chapter = Chapter::findOrFail($chapterId); // Pastikan chapter ditemukan
        $contentPath = $chapter->content_path;

        // Ambil file gambar dari folder path
        $images = collect(Storage::files($contentPath))->filter(function ($file) {
            return in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp']);
        });

        return view('chapters', compact('chapter', 'images'));
    }
}
