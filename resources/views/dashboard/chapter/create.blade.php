@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5 ">
        <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">List Manga</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="{{ route('chapters.index', $manga->id) }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Detail Manga</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Create Chapter</h2>
            </a>
        </div>
    </section>

    <div class="bg-white mx-auto relative px-5 py-5 shadow-xl rounded-b-xl">
        <div class="font-fira text-2xl pb-3 flex justify-between">
            <p>Add Chapter for <span class="text-orange-500 underline">{{ $manga->title }} </span></p>
        </div>
        <hr class="mb-4">

        <form action="{{ route('chapters.store', $manga->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap gap-3">
                <!-- Input untuk Chapter Number -->
                <div class="w-screen sm:w-full">
                    <label for="chapter_number" class="block text-sm font-medium text-gray-700">Chapter Number</label>
                    <input type="number" id="chapter_number" name="chapter_number"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
                </div>

                @error('chapter_number')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror

                <!-- Input untuk Chapter Title -->
                <div class="w-screen sm:w-full">
                    <label for="chapter_title" class="block text-sm font-medium text-gray-700">Chapter Title</label>
                    <p class="text-[12px] italic text-red-400">*Please Input The Title Like The Placeholder</p>
                    <input type="text" id="chapter_title" name="chapter_title"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" placeholder="Chapter 1: The Title" required>
                </div>

                @error('chapter_title')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror

                <!-- Input untuk Cover Image -->
                <div class="w-screen sm:w-full">
                    <label for="cover_image" class="block text-sm font-medium text-gray-700 mb-2">Cover Image</label>
                    <div class="relative">
                        <input onchange="loadFile(event)" type="file" id="cover_image" name="cover_image"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" required>
                        <div
                            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-4 bg-gray-50 cursor-pointer hover:border-orange-400 transition">
                            <div id="preview-container" class="text-center">
                                <img class="w-[40%] mx-auto hidden" id="output" alt="Cover Image preview">
                                <p class="text-gray-400 mt-2" id="placeholder-text">Click to upload an image</p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var loadFile = function(event) {
                        var reader = new FileReader();
                        reader.onload = function() {
                            var output = document.getElementById('output');
                            output.src = reader.result;
                            output.classList.remove('hidden');
                            var placeholderText = document.getElementById('placeholder-text');
                            placeholderText.classList.add('hidden');
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    };
                </script>

                @error('cover_image')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror

                <!-- Input untuk Chapter Content -->
                <div class="w-screen sm:w-full">
                    <label for="chapter_content" class="block text-sm font-medium text-gray-700">Chapter Content
                        (ZIP)</label>
                    <input type="file" id="chapter_content" name="chapter_content"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                        accept=".zip" required>
                </div>

                @error('chapter_content')
                    <p class="text-red-400">{{ $message }}</p>
                @enderror

                <!-- Tombol Submit -->
                <div class="w-screen sm:w-full mt-3">
                    <button type="submit"
                        class="w-full px-4 py-2 text-white font-medium bg-orange-400 rounded-md hover:bg-orange-500 transition duration-200">
                        Add Chapter
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
