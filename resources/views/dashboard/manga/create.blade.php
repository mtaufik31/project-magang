@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5 ">
        <div class="flex font-fira bg-white py-4 px-5 shadow-xl rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="{{ route('List Manga') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">List</h2>
            </a>
            <p class="px-2"> &raquo; </p>
            <a href="">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Create</h2>
            </a>
        </div>
    </section>

    <div class="bg-white mx-auto px-5 py-5 shadow-xl rounded-b-xl w-full relative">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-fira text-2xl">Add New Manga</h1>
        </div>

        <hr class="mb-4">

        <!-- Wrapper for form and image preview -->
        <div class="flex flex-wrap md:flex-nowrap gap-5">

            <!-- Form Section -->
            <div class="w-full md:w-[85%]">
                <form action="{{ route('Store manga') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap gap-5">
                        <!-- Cover Image Upload and Preview Trigger -->
                        <div class="w-full md:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border
                                          file:rounded-md file:text-sm file:bg-gray-50 file:text-gray-700
                                          hover:file:bg-gray-100"
                                onchange="previewImage()" required>
                        </div>

                        <!-- Title -->
                        <div class="w-full md:w-1/2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('title') }}" required>
                        </div>
                        @error('title')
                            {{ $message }}
                        @enderror

                        <!-- Alternative Title -->
                        <div class="w-full md:w-1/2">
                            <label for="alternative" class="block text-sm font-medium text-gray-700">Alternative
                                Title</label>
                            <input type="text" name="alternative" id="alternative"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('alternative') }}" required>
                        </div>
                        @error('alternative')
                            {{ $message }}
                        @enderror

                        <!-- Status -->
                        <div class="w-full md:w-1/2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                required>
                                <option value="ongoing">Ongoing</option>
                                <option value="complete">Complete</option>
                            </select>
                        </div>
                        @error('status')
                            {{ $message }}
                        @enderror

                        <!-- Rating -->
                        <div class="w-full md:w-1/2">
                            <label for="rating" class="block text-sm font-medium text-gray-700">Rating (1-10)</label>
                            <input type="number" name="rating" id="rating" min="1" max="10"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('rating') }}" required>
                        </div>
                        @error('rating')
                            {{ $message }}
                        @enderror

                        <!-- Released Year -->
                        <div class="w-full md:w-1/2">
                            <label for="released_year" class="block text-sm font-medium text-gray-700">Released Year</label>
                            <input type="number" name="released_year" id="released_year" min="1900"
                                max="{{ date('Y') }}"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('released_year') }}" required>
                        </div>
                        @error('released_year')
                            {{ $message }}
                        @enderror

                        <!-- Author -->
                        <div class="w-full md:w-1/2">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('author') }}" required>
                        </div>
                        @error('author')
                            {{ $message }}
                        @enderror

                        <!-- Artist -->
                        <div class="w-full md:w-1/2">
                            <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                            <input type="text" name="artist" id="artist"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('artist') }}" required>
                        </div>
                        @error('artist')
                            {{ $message }}
                        @enderror

                        <!-- Publisher -->
                        <div class="w-full md:w-1/2">
                            <label for="publisher" class="block text-sm font-medium text-gray-700">Publisher</label>
                            <input type="text" name="publisher" id="publisher"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('publisher') }}">
                        </div>
                        @error('publisher')
                            {{ $message }}
                        @enderror

                        <!-- Genre -->
                        <div class="flex flex-col !w-full mb-4">
                            <label for="genre" class="mb-2 font-semibold">Jenis Genre</label>
                            <select name="genre[]" id="genre" class="h-10 border-2 rounded-md border-slate-400"
                                multiple="multiple">
                            </select>
                            <p class="text-red-500">
                                @error('genre')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="flex flex-col !w-full mb-4">
                            <h4 for="nama" class="mb-2 font-semibold">Apakah Berbayar? (jika gratis biarkan saja)</h4>
                            <div class="">
                                <input type="radio" name="is_paid" id="gratis" value="0"
                                    onchange="togglePriceInput(false)">
                                <label for="gratis">Gratis</label>
                            </div>
                            <div class="">
                                <input type="radio" name="is_paid" id="bayar" value="1"
                                    onchange="togglePriceInput(true)">
                                <label for="bayar">Bayar</label>
                            </div>
                            <p class="text-red-500">
                                @error('is_paid')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <!-- Input tambahan untuk harga -->
                        <div id="priceInput" class="flex flex-col !w-full mb-4 hidden">
                            <label for="unlock_cost" class="mb-2 font-semibold">Harga Coin per Manga (minimal 90
                                coin)</label>
                            <input type="number" name="unlock_cost" id="unlock_cost"
                                class="border border-gray-300 rounded p-2" min="90" value="90" step="1">
                            <p class="text-red-500">
                                @error('unlock_cost')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>



                        <!-- Description -->
                        <div class="w-full">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4" required minlength="150"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror

                        <!-- Save Button -->
                        <div class="w-full mt-4">
                            <button type="submit"
                                class="w-full px-4 py-2 text-white font-medium bg-orange-500 rounded-md hover:bg-orange-600 transition duration-200">
                                Save Manga
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Image Preview Section -->
            <div class="">
                <div id="imagePreviewContainer"
                    class="flex items-center justify-center w-full h-80 border border-orange-300 rounded-md bg-orange-50 overflow-hidden">
                    <img id="imagePreview" class="w-auto h-full object-cover hidden" alt="Image Preview">
                    <span id="placeholderText" class="text-orange-500 text-center">Image preview will appear here</span>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // JavaScript function to preview image
        function previewImage() {
            const file = document.getElementById('image').files[0];
            const imagePreview = document.getElementById('imagePreview');
            const placeholderText = document.getElementById('placeholderText');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('hidden');
                    placeholderText.classList.add('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        function initGenreTypeSelect(selector, showTypes = true) {
            return $(selector).select2({
                placeholder: "Pilih Jenis Genre",
                tokenSeparators: [','],
                allowClear: true,
                tags: true,
                ajax: {
                    url: '{{ route('genre.search') }}',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: showTypes ? data : data.map(item => ({
                                id: item.title,
                                text: item.title,
                                newTag: false
                            }))
                        };
                    },
                    cache: true
                },
                createTag: function(params) {
                    const term = $.trim(params.term);
                    if (term === '') {
                        return null;
                    }

                    // Cek apakah nilai sudah ada di opsi yang ada
                    const exists = $(this).find('option').filter(function() {
                        return $(this).val().toLowerCase() === term.toLowerCase();
                    }).length > 0;

                    if (exists) {
                        return null;
                    }

                    return {
                        id: term,
                        text: term,
                        newTag: true
                    };
                }
            });
        }
        $(document).ready(function() {
            initGenreTypeSelect('#genre');
        });
    </script>
    <script>
        function togglePriceInput(isPaid) {
            const priceInput = document.getElementById('priceInput');
            if (isPaid) {
                priceInput.classList.remove('hidden'); // Tampilkan input harga
            } else {
                priceInput.classList.add('hidden');   // Sembunyikan input harga
                document.getElementById('unlock_cost').value = 90; // Reset nilai ke default
            }
        }
    </script>

@endsection
