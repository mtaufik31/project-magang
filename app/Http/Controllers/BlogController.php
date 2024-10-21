<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('user')->latest()->get(); // Retrieve all blogs
        return view('admin.blogs', ['blogs' => $blogs, 'title' => 'Dashboard | Blogs']);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.blogs')->with('success', 'Blog berhasil ditambahkan');
    }
}
