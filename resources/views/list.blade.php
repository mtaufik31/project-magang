@extends('layout.app')

@section('content')
    <section class="py-5">
        <div class="bg-slate-100 md:w-[65%] md:ps-4 md:pe-4 mx-auto relative shadow-xl">
            <div class="flex flex-wrap items-center justify-between">
                <h1 class="font-fira text-[24px] md:px-0 py-3 px-3">Manga List</h1>
            </div>
            <hr>

            <div class="pt-2 ">
                <div class="relative">
                    <button id="sortDropdown"
                        class="flex border border-black items-center bg-white rounded-sm hover:bg-gray-100 px-10 py-1 font-fira space-x-2">
                        <h1 class="font-normal font-fira text-[15px] ">Order By</h1>
                        <i class="fa-solid fa-chevron-down text-[12px]"></i>
                    </button>

                    <!-- Dropdown Content -->
                    <div id="sortOptions" class="absolute left-0 mt-2 bg-white w-[100%] rounded-md shadow-lg hidden"
                        style="z-index: 50;">
                        <form id="sortForm" class="p-2 ">
                            <div class="space-y-2">
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                    <input type="checkbox" name="sort" value="latest"
                                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                        {{ request('sort') == 'latest' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">Latest</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                    <input type="checkbox" name="sort" value="a-z"
                                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                        {{ request('sort') == 'a-z' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">A-Z</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                    <input type="checkbox" name="sort" value="z-a"
                                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                        {{ request('sort') == 'z-a' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">Z-A</span>
                                </label>
                                <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                    <input type="checkbox" name="sort" value="oldest"
                                        class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                        {{ request('sort') == 'oldest' ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700">Oldest</span>
                                </label>
                            </div>
                            <div class="mt-4 text-center border-t pt-2">
                                <button type="submit"
                                    class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition-colors w-full">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="relative">
                    <button id="genreDropdown"
                        class="flex border border-black items-center bg-white rounded-sm hover:bg-gray-100 px-10 py-1 font-fira space-x-2">
                        <h1 class="font-normal font-fira text-[15px]">Genre</h1>
                        <i class="fa-solid fa-chevron-down text-[12px]"></i>
                    </button>

                    <!-- Dropdown Content -->
                    <div id="genreOptions" class="absolute left-0 mt-2 bg-white w-[100%] rounded-md shadow-lg hidden"
                        style="z-index: 50;">
                        <form id="genreForm" class="p-2">
                            <div class="space-y-2 max-h-60 overflow-y-auto">
                                @foreach ($genres as $genre)
                                    <label class="flex items-center p-2 hover:bg-gray-100 rounded cursor-pointer">
                                        <input type="checkbox" name="genre[]" value="{{ $genre->id }}"
                                            class="form-checkbox h-4 w-4 text-blue-600 transition duration-150 ease-in-out"
                                            {{ in_array($genre->id, $selectedGenres ?? []) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-700">{{ $genre->title }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mt-4 text-center border-t pt-2">
                                <button type="submit"
                                    class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600 transition-colors w-full">
                                    Search
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- Manga List Container -->
            <div id="manga-list-container" class="w-full text-center">
                <div class="flex flex-wrap justify-center gap-8 py-5 md:gap-6 md:justify-start">
                    @foreach ($mangas as $manga)
                        <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}" status="{{ $manga->status }}"
                            author="{{ $manga->author }}" description="{{ $manga->description }}"
                            image="{{ asset('storage/' . $manga->image) }}">
                        </x-cardmanga>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Custom checkbox styling */
        .form-checkbox {
            appearance: none;
            padding: 0;
            print-color-adjust: exact;
            display: inline-block;
            vertical-align: middle;
            background-origin: border-box;
            user-select: none;
            flex-shrink: 0;
            height: 1rem;
            width: 1rem;
            color: #ff9900;
            background-color: #fff;
            border: 1px solid orange;
            border-radius: 0.25rem;
        }

        .form-checkbox:checked {
            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
            background-color: #ff9900;
            background-position: center;
            background-repeat: no-repeat;
            border-color: #ff9900;
        }

        .form-checkbox:focus {
            outline: none;
            ring: 2px;
            ring-offset-2;
            ring-blue-500;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('sortDropdown');
            const dropdownContent = document.getElementById('sortOptions');
            const sortForm = document.getElementById('sortForm');
            const checkboxes = document.querySelectorAll('input[name="sort"]');

            // Toggle dropdown
            dropdownButton.addEventListener('click', function() {
                dropdownContent.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownContent.contains(event.target)) {
                    dropdownContent.classList.add('hidden');
                }
            });

            // Ensure only one checkbox can be checked at a time
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    checkboxes.forEach(cb => {
                        if (cb !== this) {
                            cb.checked = false;
                        }
                    });
                });
            });

            // Handle form submission
            sortForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get the checked checkbox value
                const checkedBox = Array.from(checkboxes).find(cb => cb.checked);
                const sort = checkedBox ? checkedBox.value : 'latest';

                // AJAX request
                fetch(`{{ route('list') }}?sort=${sort}`, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("manga-list-container").innerHTML = data;
                        dropdownContent.classList.add('hidden'); // Close dropdown after search
                    })
                    .catch(error => console.error("Error fetching manga list:", error));
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const genreDropdown = document.getElementById('genreDropdown');
            const genreOptions = document.getElementById('genreOptions');
            const genreForm = document.getElementById('genreForm');

            // Toggle dropdown
            genreDropdown.addEventListener('click', function() {
                genreOptions.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!genreDropdown.contains(event.target) && !genreOptions.contains(event.target)) {
                    genreOptions.classList.add('hidden');
                }
            });

            // Handle form submission
            genreForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form data
                const formData = new FormData(this);

                // Convert FormData to URL parameters
                const params = new URLSearchParams(formData);

                // AJAX request
                fetch(`{{ route('list') }}?${params.toString()}`, {
                        headers: {
                            "X-Requested-With": "XMLHttpRequest"
                        }
                    })
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("manga-list-container").innerHTML = data;
                        genreOptions.classList.add('hidden'); // Close dropdown after search
                    })
                    .catch(error => console.error("Error fetching manga list:", error));
            });
        });
    </script>
@endsection

@section('script')
@endsection
