@extends('layout.dashboard')

@section('content')
    <section class="pt-3 pb-5">
        <!-- Breadcrumb -->
        <div class="flex px-5 py-4 bg-white shadow-xl font-inter rounded-t-xl">
            <a href="{{ route('dashboard') }}">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Dashboard</h2>
            </a>
            <p class="px-2">&raquo;</p>
            <a href="">
                <h2 class="duration-100 hover:text-orange-400 hover:underline">Manga List</h2>
            </a>
        </div>
    </section>

    <div class="relative w-full px-5 py-5 mx-auto bg-white shadow-xl rounded-b-xl">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-fira">Edit Manga</h1>
        </div>

        <hr class="mb-4">

        <div class="flex flex-wrap gap-5 md:flex-nowrap">
            <!-- Form Section -->
            <div class="w-full md:w-[85%]">
                <form action="{{ route('Update manga', $manga->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap gap-5">
                        <!-- Cover Image Upload -->
                        <div class="w-full md:w-1/2">
                            <label class="block mb-1 text-sm font-medium text-gray-700">Cover Image</label>
                            <input type="file" name="image" id="image"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:rounded-md file:text-sm file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100"
                                onchange="previewImage()">
                            <small class="text-gray-500">Leave blank to keep current image.</small>
                        </div>

                        <!-- Title -->
                        <div class="w-full md:w-1/2">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $manga->title) }}"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
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
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
                                required>
                        </div>
                        @error('alternative')
                            {{ $message }}
                        @enderror

                        <!-- Status -->
                        <div class="w-full md:w-1/2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <select name="status" id="status"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
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
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
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
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('released_year', $manga->released_year) }}" required>
                        </div>
                        @error('released_year')
                            {{ $message }}
                        @enderror

                        <!-- Author -->
                        <div class="w-full md:w-1/2">
                            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                            <input type="text" name="author" id="author"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('author', $manga->author) }}" required>
                        </div>
                        @error('author')
                            {{ $message }}
                        @enderror

                        <!-- Artist -->
                        <div class="w-full md:w-1/2">
                            <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                            <input type="text" name="artist" id="artist"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('artist', $manga->artist) }}" required>
                        </div>
                        @error('artist')
                            {{ $message }}
                        @enderror

                        <!-- Publisher -->
                        <div class="w-full md:w-1/2">
                            <label for="publisher" class="block text-sm font-medium text-gray-700">Publisher</label>
                            <input type="text" name="publisher" id="publisher"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400"
                                value="{{ old('publisher', $manga->publisher) }}">
                        </div>
                        @error('publisher')
                            {{ $message }}
                        @enderror

                        <!-- Genre -->
                        <div class="flex flex-col !w-full mb-4">
                            <label for="genre" class="mb-2 font-bold">Tambah Genre</label>
                            <select name="genre[]" id="genre" class="h-10 border-2 rounded-md border-slate-400"
                                multiple="multiple">
                                @foreach ($manga->getGenre() as $genre)
                                    <option value="{{ $genre->id }}" selected="selected">{{ $genre->title }}</option>
                                @endforeach
                            </select>
                            <p class="text-red-500">
                                @error('genre')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>

                        <div class="mb-4">
                            <label class="block font-semibold">Apakah Berbayar?</label>
                            <div>
                                <input type="radio" name="is_paid" id="gratis" value="0"
                                    {{ old('is_paid', $manga->is_paid) == 0 ? 'checked' : '' }}>
                                <label for="gratis">Gratis</label>
                            </div>
                            <div>
                                <input type="radio" name="is_paid" id="bayar" value="1"
                                    {{ old('is_paid', $manga->is_paid) == 1 ? 'checked' : '' }}>
                                <label for="bayar">Bayar</label>
                            </div>
                            @error('is_paid')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Coin -->
                        <div id="priceInput" class="mb-4 {{ old('is_paid', $manga->is_paid) == 1 ? '' : 'hidden' }}">
                            <label for="unlock_cost" class="block font-semibold">Harga Coin per Manga (minimal 90
                                coin)</label>
                            <input type="number" name="unlock_cost" id="unlock_cost"
                                class="border border-gray-300 rounded p-2 w-full" min="90"
                                value="{{ old('unlock_cost', $manga->unlock_cost) }}">
                            @error('unlock_cost')
                                <p class="text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="w-full">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" id="description" rows="4"
                                class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:border-orange-400">{{ old('description', $manga->description) }}</textarea>
                        </div>
                        @error('description')
                            {{ $message }}
                        @enderror

                        <!-- Save Button -->
                        <div class="w-full mt-4">
                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-white transition duration-200 bg-orange-500 rounded-md hover:bg-orange-600">
                                Update Manga
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Image Preview Section -->
            <div class="">
                <div id="imagePreviewContainer"
                    class="flex items-center justify-center w-full overflow-hidden border border-orange-300 rounded-md h-80 bg-orange-50">
                    <img id="imagePreview" src="{{ asset('storage/' . $manga->image) }}"
                        class="object-cover w-auto h-full" alt="Image Preview">
                </div>
            </div>
        </div>
    </div>




    <script>
        function initGenreTypeSelect(selector, showTypes = true) {
            return $(selector).select2({
                placeholder: "Tambah Genre",
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const gratisInput = document.getElementById('gratis');
            const bayarInput = document.getElementById('bayar');
            const priceInput = document.getElementById('priceInput');

            const togglePriceInput = () => {
                if (bayarInput.checked) {
                    priceInput.classList.remove('hidden');
                } else {
                    priceInput.classList.add('hidden');
                    document.getElementById('unlock_cost').value = 90; // Reset nilai ke default
                }
            };

            gratisInput.addEventListener('change', togglePriceInput);
            bayarInput.addEventListener('change', togglePriceInput);

            // Set initial state
            togglePriceInput();
        });
    </script>
@endsection
