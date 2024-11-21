@extends('layout.app')

@section('content')
    <section class="py-5">
        <div class="bg-slate-100 md:w-[65%] md:ps-4 md:pe-4 mx-auto relative shadow-xl">
            <div class="flex  items-center md:justify-start justify-center">
                <h1 class="font-fira text-[24px] md:px-0 pt-3 pb-2 px-6 font-medium">Manga List</h1>
            </div>
            <div class="flex justify-center pb-3 md:hidden ">
                <a href="{{ route('home') }}">
                    <h2 class="duration-100 hover:text-orange-400 hover:underline"> Home</h2>
                </a>
                <p class="px-2"> &raquo; </p>
                <a href="{{ route('list') }}">
                    <h2 class="duration-100 hover:text-orange-400 hover:underline"> List</h2>
                </a>
            </div>
            <hr>

            <div
                class="relative px-6 py-4 md:px-10 mb-5 bg-gradient-to-r from-transparent to-orange-300 rounded-md">
                <!-- Main container with grid -->
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-5 gap-3">
                    <!-- Sort Dropdown -->
                    <div class="relative w-full lg:w-auto">
                        <button id="sortDropdown"
                            class="flex duration-200 border border-black items-center bg-white rounded-sm justify-center hover:bg-gray-100 px-6 md:px-10 py-1 font-fira space-x-2 w-full">
                            <h1 class="font-normal font-fira text-[15px]">Sort</h1>
                            <i class="fa-solid fa-chevron-down text-[12px]"></i>
                        </button>
                    </div>

                    <!-- Status Dropdown -->
                    <div class="relative w-full lg:w-auto">
                        <button id="statusDropdown"
                            class="flex duration-200 border border-black items-center bg-white rounded-sm justify-center hover:bg-gray-100 px-6 md:px-10 py-1 font-fira space-x-2 w-full">
                            <h1 class="font-normal font-fira text-[15px]">Status</h1>
                            <i class="fa-solid fa-chevron-down text-[12px]"></i>
                        </button>
                    </div>

                    <!-- Genre Dropdown -->
                    <div class="relative w-full lg:w-auto">
                        <button id="genreDropdown"
                            class="flex duration-200 border border-black items-center bg-white rounded-sm justify-center hover:bg-gray-100 px-6 md:px-10 py-1 font-fira space-x-2 w-full">
                            <h1 class="font-normal font-fira text-[15px]">Genre</h1>
                            <i class="fa-solid fa-chevron-down text-[12px]"></i>
                        </button>
                    </div>

                    <!-- Year Dropdown -->
                    <div class="relative w-full lg:w-auto">
                        <button id="yearDropdown"
                            class="flex duration-200 border border-black items-center bg-white rounded-sm justify-center hover:bg-gray-100 px-6 md:px-10 py-1 font-fira space-x-2 w-full">
                            <h1 class="font-normal font-fira text-[15px]">Year</h1>
                            <i class="fa-solid fa-chevron-down text-[12px]"></i>
                        </button>
                    </div>

                    <!-- Search Button -->
                    <div class="col-span-2 md:col-span-2 lg:col-span-1">
                        <form id="filterForm" action="{{ route('list') }}" method="GET" class="w-full">
                            <button type="button" id="applyFilter"
                                class="bg-orange-500 text-white px-6 py-1 text-[16px] rounded-sm hover:bg-orange-600 transition-colors w-full">
                                <i class="fa-solid fa-magnifying-glass md:pe-1"></i> Search
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Your original dropdown content panels -->
                <div id="sortOptions"
                    class="absolute top-36 md:top-16 left-0 md:left-auto md:right-0 mt-2 bg-white w-full rounded-md shadow-lg hidden z-50">
                    <div class="py-2 px-4 grid grid-cols-2 md:grid-cols-4">
                        <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                            <input type="radio" name="sort" value="latest" form="filterForm"
                                class="form-radio h-4 w-4 text-blue-600" {{ request('sort') == 'latest' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Latest</span>
                        </label>
                        <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                            <input type="radio" name="sort" value="a-z" form="filterForm"
                                class="form-radio h-4 w-4 text-blue-600" {{ request('sort') == 'a-z' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">A-Z</span>
                        </label>
                        <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                            <input type="radio" name="sort" value="z-a" form="filterForm"
                                class="form-radio h-4 w-4 text-blue-600" {{ request('sort') == 'z-a' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Z-A</span>
                        </label>
                        <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer p-2">
                            <input type="radio" name="sort" value="oldest" form="filterForm"
                                class="form-radio h-4 w-4 text-blue-600" {{ request('sort') == 'oldest' ? 'checked' : '' }}>
                            <span class="ml-2 text-gray-700">Oldest</span>
                        </label>
                    </div>
                </div>

                <div id="statusOptions"
                    class="absolute top-36 md:top-16 left-0 md:left-auto md:right-0 mt-2 w-full md:w-auto bg-white min-w-full rounded-md shadow-lg hidden z-50">
                    <div class="py-2 px-4 grid grid-cols-2 md:grid-cols-4 justify-center">
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

                <div id="genreOptions"
                    class="absolute top-36 md:top-16 left-0 md:left-auto md:right-0 mt-2 bg-white min-w-full rounded-md shadow-lg hidden z-50">
                    <div id="genreList" class="grid grid-cols-2 md:grid-cols-4 gap-1 px-4 py-3 max-h-60 overflow-y-auto">
                        @foreach ($genres as $genre)
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer py-1 px-2">
                                <input type="checkbox" name="genre[]" value="{{ $genre->id }}" form="filterForm"
                                    class="form-checkbox h-4 w-4 text-blue-600 "
                                    {{ in_array($genre->id, $selectedGenres ?? []) ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700 genre-item">{{ $genre->title }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <div id="yearOptions"
                    class="absolute top-36 md:top-16 left-0 md:left-auto md:right-0 mt-2 bg-white min-w-full rounded-md shadow-lg hidden z-50">
                    <div class="py-3 px-4 grid grid-cols-2 md:grid-cols-4 gap-1 max-h-60 overflow-y-auto">
                        @foreach ($years as $year)
                            <label class="flex items-center hover:bg-gray-100 rounded cursor-pointer py-1 px-2">
                                <input type="checkbox" name="year[]" value="{{ $year }}" form="filterForm"
                                    class="form-checkbox h-4 w-4 text-blue-600"
                                    {{ in_array($year, $selectedYears ?? []) ? 'checked' : '' }}>
                                <span class="ml-2 text-gray-700">{{ $year }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>


            <!-- Manga List Container -->
            <div id="manga-list-container" class="w-full text-center">
                @include('partials.manga-list')
            </div>
        </div>
    </section>

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
            toggleDropdown('yearDropdown', 'yearOptions');
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mangaListContainer = document.getElementById('manga-list-container');
            const filterForm = document.getElementById('filterForm');
            const applyFilterButton = document.getElementById('applyFilter');
            const sortSelect = document.getElementById('sort'); // Tambahkan ini untuk select sorting

            const loadContent = (url) => {
                mangaListContainer.style.opacity = '0.5';

                fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                    .then(response => response.text())
                    .then(data => {
                        mangaListContainer.innerHTML = data;
                        mangaListContainer.style.opacity = '1';
                        initPaginationLinks();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        mangaListContainer.style.opacity = '1';
                    });
            };

            const initPaginationLinks = () => {
                const paginationLinks = document.querySelectorAll('.pagination-wrapper a');
                paginationLinks.forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const url = e.target.href;
                        history.pushState({}, '', url);
                        loadContent(url);
                        mangaListContainer.scrollIntoView({
                            behavior: 'smooth'
                        });
                    });
                });
            };

            // Initialize pagination
            initPaginationLinks();

            // Handle browser back/forward
            window.addEventListener('popstate', () => {
                loadContent(window.location.href);
            });

            // Handle sorting change
            if (sortSelect) {
                sortSelect.addEventListener('change', () => {
                    applyFilterButton.click(); // Trigger filter application when sorting changes
                });
            }

            // Handle filter application
            applyFilterButton.addEventListener('click', () => {
                const formData = new FormData(filterForm);

                // Get all checked year checkboxes
                const yearCheckboxes = document.querySelectorAll('input[name="year[]"]:checked');
                formData.delete('year[]'); // Clear existing year data
                yearCheckboxes.forEach(checkbox => {
                    formData.append('released_year[]', checkbox.value);
                });

                const queryString = new URLSearchParams(formData).toString();
                const url = `${window.location.pathname}?${queryString}`;

                history.pushState({}, '', url);
                loadContent(url);
            });

            // Reset dropdowns
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
@endsection

@section('script')
@endsection
