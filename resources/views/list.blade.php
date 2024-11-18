@extends('layout.app')

@section('content')
    <section class="py-5">
        <div class="bg-slate-100 md:w-[65%] md:ps-4 md:pe-4 mx-auto relative shadow-xl">
            <div class="flex flex-wrap items-center justify-between">
                <h1 class="font-fira text-[24px] md:px-0 pt-3 pb-2 px-6">Manga List</h1>
            </div>
            <hr>

            <div class="flex flex-wrap px-6 md:px-0 py-4 gap-5 justify-end">
                <!-- Sort Dropdown -->
                <div class="relative w-full md:w-auto">
                    <button id="sortDropdown"
                        class="flex duration-200 border border-black items-center bg-white rounded-sm hover:bg-gray-100 px-6 md:px-10 py-1 font-fira space-x-2 w-full md:w-auto justify-center">
                        <h1 class="font-normal font-fira text-[15px] ">Sort</h1>
                        <i class="fa-solid fa-chevron-down text-[12px]"></i>
                    </button>

                    <div id="sortOptions"
                        class="absolute left-0 md:left-auto md:right-0 mt-2 bg-white min-w-full rounded-md shadow-lg hidden z-50">
                        <div class="p-2 grid grid-cols-2 md:grid-cols-1">
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="sort" value="latest" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('sort') == 'latest' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Latest</span>
                            </label>
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="sort" value="a-z" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('sort') == 'a-z' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">A-Z</span>
                            </label>
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="sort" value="z-a" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('sort') == 'z-a' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Z-A</span>
                            </label>
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="sort" value="oldest" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('sort') == 'oldest' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Oldest</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Status Dropdown -->
                <div class="relative w-full md:w-auto">
                    <button id="statusDropdown"
                        class="flex duration-200  border border-black items-center bg-white rounded-sm hover:bg-gray-100 px-6 py-1 md:px-8 font-fira space-x-2 w-full md:w-auto justify-center">
                        <h1 class="font-normal font-fira text-[15px]">Status</h1>
                        <i class="fa-solid fa-chevron-down text-[12px]"></i>
                    </button>

                    <div id="statusOptions"
                        class="absolute left-0 md:left-auto md:right-0 mt-2 w-full md:w-auto bg-white min-w-full rounded-md shadow-lg hidden z-50">
                        <div class="p-2 grid grid-cols-2 md:grid-cols-1 justify-center">
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="status" value="" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600" {{ request('status') == '' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">All</span>
                            </label>
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="status" value="ongoing" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('status') == 'ongoing' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Ongoing</span>
                            </label>
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                <input type="radio" name="status" value="complete" form="filterForm"
                                    class="form-radio h-4 w-4 text-blue-600"
                                    {{ request('status') == 'complete' ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">Complete</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Genre Dropdown -->
                <div class="relative w-full md:w-auto">
                    <button id="genreDropdown"
                        class="flex  duration-200 border border-black items-center bg-white rounded-sm justify-center hover:bg-gray-100 px-6 md:px-14 py-1 font-fira space-x-2 w-full md:w-auto">
                        <h1 class="font-normal font-fira text-[15px]">Genre</h1>
                        <i class="fa-solid fa-chevron-down text-[12px]"></i>
                    </button>

                    <div id="genreOptions"
                        class="absolute left-0 md:left-auto md:right-0 mt-2 bg-white min-w-full rounded-md shadow-lg hidden z-50">
                        <!-- Search bar -->
                        <div class="p-2">
                            <input type="text" id="genreSearch"
                                class="w-full border border-gray-300 rounded-sm px-2 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-orange-500"
                                placeholder="Search genre...">
                        </div>

                        <!-- Genre list -->
                        <div id="genreList"
                            class="grid grid-cols-2 md:grid-cols-1 gap-1 px-2 py-1 max-h-60 overflow-y-auto">
                            @foreach ($genres as $genre)
                                <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                                    <input type="checkbox" name="genre[]" value="{{ $genre->id }}" form="filterForm"
                                        class="form-checkbox h-4 w-4 text-blue-600 "
                                        {{ in_array($genre->id, $selectedGenres ?? []) ? 'checked' : '' }}>
                                    <span class="ml-2 text-gray-700 genre-item">{{ $genre->title }}</span>
                                </label>
                            @endforeach
                        </div>

                        <!-- No results icon -->
                        <div id="noResults" class="hidden flex flex-col items-center justify-center pb-4 px-4">
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                                colors="primary:#121331,secondary:#eeaa66" style="width:80px;height:80px">
                            </lord-icon>
                            <p class="text-gray-500 text-sm mt-2">No genres found.</p>
                        </div>
                    </div>
                </div>




                <form id="filterForm" action="{{ route('list') }}" method="GET" class="w-full md:w-auto">
                    <button type="button" id="applyFilter"
                        class="bg-orange-500 text-white px-6 py-1 text-[16px] rounded-sm hover:bg-orange-600 transition-colors w-full md:w-auto">
                        <i class="fa-solid fa-magnifying-glass md:pe-1"></i> Search
                    </button>
                </form>
            </div>



            <!-- Manga List Container -->
            <div id="manga-list-container" class="w-full text-center">
                <div class="flex flex-wrap justify-center gap-8 pb-4 md:gap-6 md:justify-start">
                    @foreach ($mangas as $manga)
                        <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}"
                            status="{{ $manga->status }}" author="{{ $manga->author }}"
                            description="{{ $manga->description }}" image="{{ asset('storage/' . $manga->image) }}">
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

        .form-radio {
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

        .form-radio:checked {
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

        .form-radio:focus {
            outline: none;
            ring: 2px;
            ring-offset-2;
            ring-blue-500;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toggleDropdown = (buttonId, dropdownId) => {
                const button = document.getElementById(buttonId);
                const dropdown = document.getElementById(dropdownId);

                button.addEventListener('click', () => {
                    dropdown.classList.toggle('show');
                    dropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!button.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.add('hidden');
                        dropdown.classList.remove('show');
                    }
                });
            };

            toggleDropdown('sortDropdown', 'sortOptions');
            toggleDropdown('genreDropdown', 'genreOptions');
            toggleDropdown('statusDropdown', 'statusOptions');
        });
    </script>
    <script>
         document.addEventListener('DOMContentLoaded', () => {
        const applyFilterButton = document.getElementById('applyFilter');
        const filterForm = document.getElementById('filterForm');
        const mangaListContainer = document.getElementById('manga-list-container');

        applyFilterButton.addEventListener('click', () => {
            // Serialize form data
            const formData = new FormData(filterForm);
            const queryString = new URLSearchParams(formData).toString();

            // AJAX Request
            fetch(`{{ route('list') }}?${queryString}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
                .then(response => response.text())
                .then(data => {
                    mangaListContainer.innerHTML = data; // Replace manga list
                })
                .catch(error => console.error('Error:', error));
        });

        // Optional: Reset dropdowns when re-filtering
        const resetDropdowns = () => {
            const dropdowns = document.querySelectorAll('.dropdown-content');
            dropdowns.forEach(dropdown => dropdown.classList.add('hidden'));
        };

        // Close dropdowns on outside click
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.dropdown')) {
                resetDropdowns();
            }
        });
    });
    </script>
    <script>
        document.getElementById('genreSearch').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const genres = document.querySelectorAll('#genreList .genre-item');
            const noResults = document.getElementById('noResults');
            let hasResults = false;

            genres.forEach(function(genre) {
                const genreText = genre.textContent.toLowerCase();
                const parentLabel = genre.closest('label');

                if (genreText.includes(searchValue)) {
                    parentLabel.style.display = ''; // Tampilkan
                    hasResults = true;
                } else {
                    parentLabel.style.display = 'none'; // Sembunyikan
                }
            });

            // Tampilkan/hidden logo "No Results"
            if (hasResults) {
                noResults.classList.add('hidden');
            } else {
                noResults.classList.remove('hidden');
            }
        });
    </script>
@endsection

@section('script')
@endsection
