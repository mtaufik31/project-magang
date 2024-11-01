@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5">
        <!-- Breadcrumb -->
        <div class="flex font-inter bg-white py-4 px-5 shadow-xl rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2">&raquo;</p>
            <a href="">
                <h2 class="hover:text-orange-400 duration-100 hover:underline">Manga List</h2>
            </a>
        </div>
    </section>

    <div class="bg-white mx-auto px-5 py-5 shadow-xl rounded-b-xl w-full relative">
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-fira text-2xl">Edit Manga</h1>
        </div>

        <hr class="mb-4">

        <div class="flex flex-wrap md:flex-nowrap gap-5">
            <!-- Form Section -->
            <div class="w-full md:w-[85%]">
                <form action="{{ route('Update manga', $manga->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap gap-5">
                        <!-- Cover Image Upload -->
                        <div class="w-full md:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cover Image</label>
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border
                                  file:rounded-md file:text-sm file:bg-gray-50 file:text-gray-700
                                  hover:file:bg-gray-100"
                                onchange="previewImage()">
                            <small class="text-gray-500">Leave blank to keep current image.</small>
                        </div>

                        <!-- Title -->
                        <div class="w-full md:w-1/2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $manga->title) }}"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                required>
                        </div>
                        @error('title')
                            {{ $message }}
                        @enderror

                        <!-- Alternative Title -->
                        <div class="w-full md:w-1/2">
                            <label for="alternative" class="block text-sm font-medium text-gray-700">Alternative
                                Title</label>
                            <input type="text" name="alternative" id="alternative"
                                value="{{ old('alternative', $manga->alternative) }}"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                required>
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
                                <option value="ongoing" {{ old('status', $manga->status) == 'ongoing' ? 'selected' : '' }}>
                                    Ongoing</option>
                                <option value="complete"
                                    {{ old('status', $manga->status) == 'complete' ? 'selected' : '' }}>Complete</option>
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
                                value="{{ old('rating', $manga->rating) }}" required>
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
                                value="{{ old('released_year', $manga->released_year) }}" required>
                        </div>
                        @error('released_year')
                            {{ $message }}
                        @enderror

                        <!-- Author -->
                        <div class="w-full md:w-1/2">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('author', $manga->author) }}" required>
                        </div>
                        @error('author')
                            {{ $message }}
                        @enderror

                        <!-- Artist -->
                        <div class="w-full md:w-1/2">
                            <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                            <input type="text" name="artist" id="artist"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('artist', $manga->artist) }}" required>
                        </div>
                        @error('artist')
                            {{ $message }}
                        @enderror

                        <!-- Publisher -->
                        <div class="w-full md:w-1/2">
                            <label for="publisher" class="block text-sm font-medium text-gray-700">Publisher</label>
                            <input type="text" name="publisher" id="publisher"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('publisher', $manga->publisher) }}">
                        </div>
                        @error('publisher')
                            {{ $message }}
                        @enderror

                        <!-- Genre -->
                        <div class="flex flex-col !w-full mb-4">
                            <label for="genre" class="mb-2 font-bold">Jenis Genre</label>
                            <select name="genre[]" id="genre" class="h-10 border-2 rounded-md border-slate-400"
                                multiple="multiple">
                            </select>
                            <p class="text-red-500">
                                @error('genre')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <!-- Description -->
                        <div class="w-full">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:border-orange-400">{{ old('description', $manga->description) }}</textarea>
                        </div>
                        @error('description')
                            {{ $message }}
                        @enderror

                        <!-- Save Button -->
                        <div class="w-full mt-4">
                            <button type="submit"
                                class="w-full px-4 py-2 text-white font-medium bg-orange-500 rounded-md hover:bg-orange-600 transition duration-200">
                                Update Manga
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Image Preview Section -->
            <div class="">
                <div id="imagePreviewContainer"
                    class="flex items-center justify-center w-full h-80 border border-orange-300 rounded-md bg-orange-50 overflow-hidden">
                    <img id="imagePreview" src="{{ asset('storage/' . $manga->image) }}"
                        class="w-auto h-full object-cover" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>




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
            const existingGenres = @json($manga->genre);
            const genreSelector = initGenreTypeSelect('#genre');

            existingGenres.forEach(genre => {
                const option = new Option(genre, genre, true, true);
                $('#genre').append(option).trigger('change');
            });
        });
    </script>
@endsection
