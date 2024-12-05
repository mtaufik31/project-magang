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
            'content_path' => $extractPath,
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
            'chapter_number' => 'required|numeric',
            'chapter_title' => 'required|string',
            'cover_image' => 'nullable|image',
            'chapter_content' => 'nullable|file|mimes:zip',
        ]);

        $chapter = Chapter::findOrFail($id);

        // Check for existing chapter number
        $existingChapter = Chapter::where('manga_id', $mangaId)
            ->where('id', '!=', $id) // Exclude the current chapter
            ->where('chapter_number', 'like', $request->chapter_number . '%')
            ->orderBy('chapter_number', 'desc')
            ->first();

        $newChapterNumber = $existingChapter
            ? (float)$existingChapter->chapter_number + 0.1
            : $request->chapter_number;

        // Update cover image if provided
        if ($request->hasFile('cover_image')) {
            if ($chapter->cover_image) {
                Storage::disk('public')->delete($chapter->cover_image); // Delete old cover
            }
            $chapter->cover_image = $request->file('cover_image')->store('chapters/covers', 'public');
        }

        // Update content if ZIP is provided
        if ($request->hasFile('chapter_content')) {
            // Delete existing content folder
            if ($chapter->content_path) {
                Storage::disk('public')->deleteDirectory($chapter->content_path);
            }

            // Extract new ZIP content
            $extractPath = 'chapters/assets/' . uniqid();
            $destinationPath = storage_path('app/public/' . $extractPath);

            $zip = new ZipArchive();
            $zipPath = $request->file('chapter_content')->path();
            if ($zip->open($zipPath) === true) {
                $zip->extractTo($destinationPath);
                $zip->close();
                $chapter->content_path = $extractPath;
            } else {
                return back()->withErrors(['chapter_content' => 'Failed to extract ZIP file']);
            }
        }

        // Update chapter fields
        $chapter->update([
            'chapter_number' => $newChapterNumber,
            'chapter_title' => $request->chapter_title,
        ]);

        // Touch the manga to update its updated_at timestamp
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

        return view('chapter', compact('chapter', 'images'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Filter chapters based on the query (assuming chapter_number is an integer)
        $chapters = Chapter::where('chapter_number', $query)
            ->get();

        // Return the filtered data as JSON
        return response()->json($chapters);
    }

    public function view(Request $request, $id)
    {
        $chapter = Chapter::findOrFail($id);

        // Cari chapter selanjutnya dalam manga yang sama
        $nextChapter = Chapter::where('manga_id', $chapter->manga_id)
            ->where('chapter_number', '>', $chapter->chapter_number)
            ->orderBy('chapter_number', 'asc')
            ->first();

        // Ambil path absolut untuk konten chapter
        $absolutePath = storage_path('app/public/' . $chapter->content_path);

        // Ambil semua file dalam folder
        $files = scandir($absolutePath);

        // Filter hanya file gambar
        $images = collect($files)->filter(function ($file) use ($absolutePath) {
            $filePath = $absolutePath . '/' . $file;
            return is_file($filePath) && in_array(pathinfo($file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp']);
        })->toArray();

        // Urutkan berdasarkan angka di awal nama file
        usort($images, function ($a, $b) {
            $numA = (int) preg_replace('/\D/', '', pathinfo($a, PATHINFO_FILENAME));
            $numB = (int) preg_replace('/\D/', '', pathinfo($b, PATHINFO_FILENAME));

            return $numA <=> $numB;
        });

        return view('chapter', [
            'title' => 'MangaLo | Chapter',
            'chapter' => $chapter,
            'images' => $images,
            'nextChapter' => $nextChapter
        ]);
    }
}
