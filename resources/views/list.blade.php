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

            <div class="md:flex md:flex-wrap px-6 py-4 gap-5 justify-end grid grid-cols-2 bg-gradient-to-r from-transparent via-orange-300 to-transparent my-5 md:bg-gradient-to-r md:to-orange-300 md:px-3">
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
        document.addEventListener('DOMContentLoaded', () => {
            const mangaListContainer = document.getElementById('manga-list-container');

            // Function untuk load content
            const loadContent = (url) => {
                // Tambahkan loading state
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
                        // Reinitialize pagination setelah content diupdate
                        initPaginationLinks();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        mangaListContainer.style.opacity = '1';
                    });
            };

            // Function untuk initialize pagination links
            const initPaginationLinks = () => {
                const paginationLinks = document.querySelectorAll('.pagination-wrapper a');
                paginationLinks.forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const url = e.target.href;

                        // Update URL tanpa refresh
                        history.pushState({}, '', url);

                        // Load content
                        loadContent(url);

                        // Scroll ke atas container
                        mangaListContainer.scrollIntoView({
                            behavior: 'smooth'
                        });
                    });
                });
            };

            // Initialize pagination pertama kali
            initPaginationLinks();

            // Handle browser back/forward buttons
            window.addEventListener('popstate', () => {
                loadContent(window.location.href);
            });

            // Modify existing filter form handler
            const filterForm = document.getElementById('filterForm');
            const applyFilterButton = document.getElementById('applyFilter');

            applyFilterButton.addEventListener('click', () => {
                const formData = new FormData(filterForm);
                const queryString = new URLSearchParams(formData).toString();
                const url = `${window.location.pathname}?${queryString}`;

                // Update URL tanpa refresh
                history.pushState({}, '', url);

                // Load content
                loadContent(url);
            });
        });
    </script>
@endsection

@section('script')
@endsection
