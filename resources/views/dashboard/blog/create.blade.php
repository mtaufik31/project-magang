@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5">
        <div class="flex font-fira bg-white py-4 px-5 shadow-xl rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard </h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="{{ route('List Blogs') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline"> List Blog</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="hover:text-orange-400 duration-100 hover:underline"> Create Blog</h2>
            </a>
        </div>
    </section>

    <div class="bg-white mx-auto relative px-5 py-5 shadow-xl rounded-b-xl">
        <div class="font-fira text-2xl pb-3 flex justify-between">
            <p>Blog List</p>
        </div>
        <hr class="mb-4">

        <form action="{{ route('blog.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-wrap gap-3">
                <!-- Input untuk Title -->
                <div class="w-screen sm:w-full">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" id="title" name="title"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400" required>
                </div>

                @error('title')
                    {{ $message }}
                @enderror

                <!-- Input untuk Description -->
                <div class="w-screen sm:w-full">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400 h-32" rows="4"
                        required></textarea>
                    <small class="text-gray-600">No limit</small>
                </div>

                @error('description')
                    {{ $message }}
                @enderror

                <!-- Input untuk Gambar -->
                <div class="w-screen sm:w-full">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                    <div class="relative">
                        <input onchange="loadFile(event)" type="file" id="image" name="image"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" required>
                        <div
                            class="flex items-center justify-center border-2 border-dashed border-gray-300 rounded-md p-4 bg-gray-50 cursor-pointer hover:border-orange-400 transition">
                            <div id="preview-container" class="text-center">
                                <img class="w-[40%] mx-auto hidden" id="output" alt="Image preview">
                                <p class="text-gray-400 mt-2" id="placeholder-text">Click to upload an image</p>
                            </div>
                        </div>
                    </div>
                    {{-- <input type="file" name="image"> --}}
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

                @error('image')
                    <p class="text-red-400">
                        {{ $message }}
                    </p>
                @enderror


                <!-- Tombol Submit -->
                <div class="w-screen sm:w-full mt-3">
                    <button type="submit"
                        class="w-full px-4 py-2 text-white font-medium bg-orange-400 rounded-md hover:bg-orange-500 transition duration-200">
                        Add Blog
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- <script src="https://cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script> <!-- Menggunakan full build -->
    <script>
        // Inisialisasi CKEditor dengan opsi tambahan
        CKEDITOR.replace('description', {
            height: 300, // Tinggi editor
            toolbar: [
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat',] },
                { name: 'styles', items: ['Font', 'FontSize'] }, // Menambahkan pemilihan font dan ukuran
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'alignment', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] }, // Menambahkan alat meratakan teks
                { name: 'tools', items: ['Maximize', '-', 'ShowBlocks'] }
            ],
            // Menambahkan font dan ukuran font yang kustom
            font_names: 'Arial;Comic Sans MS;pop in 2;Courier New;Georgia;Times New Roman;Verdana',
            fontSize_sizes: '8/Small;10/Normal;12/Medium;14/Large;16/X-Large;18/XX-Large;20/XXX-Large',
            // Menambahkan gaya font
            stylesSet: [
                { name: 'Normal', element: 'p' },
                { name: 'Heading 1', element: 'h1' },
                { name: 'Heading 2', element: 'h2' },
                { name: 'Heading 3', element: 'h3' },
                { name: 'Quote', element: 'blockquote' },
                { name: 'Highlighted', element: 'span', attributes: { 'class': 'highlight' } }
            ]
        });
    </script> --}}
@endsection
