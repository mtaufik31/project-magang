@extends('layout.app')

@section('content')

<section class="py-5">
    <div class="bg-slate-100 md:w-[65%] md:ps-4 mx-auto relative shadow-xl">
        <div class="flex flex-wrap items-center justify-between">
            <h1 class="font-fira text-[24px] md:px-0 px-3">Manga List</h1>
            <div class="flex items-center px-6 py-4 font-fira space-x-7 bg-gradient-to-l from-orange-500">
                <h1 class="font-semibold text-[20px]">Order By</h1>

                <!-- Dropdown for Tablet and Mobile -->
                <div class="relative cursor-pointer md:hidden">
                    <select id="sort-select" class="block w-full p-2 bg-white border rounded-md shadow-sm cursor-pointer">
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>A-Z</option>
                        <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Z-A</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>

                <!-- Links for Desktop -->
                <div class="hidden md:flex space-x-7">
                    <a href="javascript:void(0)" class="sort-link font-light hover:text-orange-600 duration-200" data-sort="latest">Latest</a>
                    <a href="javascript:void(0)" class="sort-link font-light hover:text-orange-600 duration-200" data-sort="a-z">A-Z</a>
                    <a href="javascript:void(0)" class="sort-link font-light hover:text-orange-600 duration-200" data-sort="z-a">Z-A</a>
                    <a href="javascript:void(0)" class="sort-link font-light hover:text-orange-600 duration-200" data-sort="oldest">Oldest</a>
                </div>
            </div>
        </div>
        <hr>
        <div id="manga-list-container" class="w-full text-center">
            <div class="flex flex-wrap justify-center gap-8 py-5 md:gap-6 md:justify-start">
                @foreach ($mangas as $manga)
                    <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}" author="{{ $manga->author }}"
                        description="{{ $manga->description }}" image="{{ asset('storage/' . $manga->image) }}">
                    </x-cardmanga>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Swiper JS & CSS (Add Swiper's CSS and JS link to your HTML) -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<div class="swiper-container w-full max-w-7xl mx-auto px-4 py-6">
    <div class="swiper-wrapper">
        <!-- Slide 1 -->
        <div class="swiper-slide flex items-center p-6 bg-[#1a1a2e] rounded-lg overflow-hidden text-white">
            <!-- Text Content -->
            <div class="w-full md:w-1/2 pr-6">
                <p class="text-gray-400 text-sm mb-2">Chapter: 188</p>
                <h2 class="text-3xl font-bold mb-4">Sakamoto Days</h2>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Taro Sakamoto adalah pembunuh utama, ditakuti oleh penjahat dan dikagumi oleh pembunuh bayaran. Tapi suatu hari ... dia jatuh cinta! Pensiun, menikah, menjadi ayah, dan kemudian ... Sakamoto bertambah.
                </p>
                <!-- Genre Tags -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Action</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Comedy</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Drama</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Mature</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Shounen</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Slice of Life</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Supernatural</span>
                </div>
                <!-- Button -->
                <button class="px-6 py-2 text-sm font-semibold bg-yellow-400 text-black rounded hover:bg-yellow-500 transition">
                    Mulai Baca →
                </button>
            </div>
            <!-- Image Content -->
            <div class="relative w-full md:w-1/2">
                <img src="{{ asset('asset/img/postrot.jpg') }}" alt="Sakamoto Days" class="rounded-lg shadow-lg object-cover w-full h-full">
            </div>
        </div>
        <div class="swiper-slide flex items-center p-6 bg-[#1a1a2e] rounded-lg overflow-hidden text-white">
            <!-- Text Content -->
            <div class="w-full md:w-1/2 pr-6">
                <p class="text-gray-400 text-sm mb-2">Chapter: 188</p>
                <h2 class="text-3xl font-bold mb-4">Sakamoto Days</h2>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Taro Sakamoto adalah pembunuh utama, ditakuti oleh penjahat dan dikagumi oleh pembunuh bayaran. Tapi suatu hari ... dia jatuh cinta! Pensiun, menikah, menjadi ayah, dan kemudian ... Sakamoto bertambah.
                </p>
                <!-- Genre Tags -->
                <div class="flex flex-wrap gap-2 mb-6">
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Action</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Comedy</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Drama</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Mature</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Shounen</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Slice of Life</span>
                    <span class="px-3 py-1 text-xs font-semibold text-white bg-gray-700 rounded-full">Supernatural</span>
                </div>
                <!-- Button -->
                <button class="px-6 py-2 text-sm font-semibold bg-yellow-400 text-black rounded hover:bg-yellow-500 transition">
                    Mulai Baca →
                </button>
            </div>
            <!-- Image Content -->
            <div class="relative w-full md:w-1/2">
                <img src="your-manga-image-url.jpg" alt="Sakamoto Days" class="rounded-lg shadow-lg object-cover w-full h-full">
            </div>
        </div>
    </div>
    <!-- Swiper Pagination -->
    <div class="swiper-pagination"></div>
</div>

<!-- Swiper Initialization -->
<script>
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sortSelect = document.getElementById("sort-select");
        const sortLinks = document.querySelectorAll(".sort-link");

        // Fungsi untuk memuat ulang daftar manga berdasarkan sorting
        function loadMangaList(sort) {
            fetch(`{{ route('list') }}?sort=${sort}`, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById("manga-list-container").innerHTML = data;
            })
            .catch(error => console.error("Error fetching manga list:", error));
        }

        // Event untuk dropdown sorting
        sortSelect.addEventListener("change", function () {
            loadMangaList(this.value);
        });

        // Event untuk link sorting di desktop
        sortLinks.forEach(link => {
            link.addEventListener("click", function () {
                const sort = this.getAttribute("data-sort");
                loadMangaList(sort);
            });
        });
    });
    </script>

@endsection

@section('script')



@endsection
