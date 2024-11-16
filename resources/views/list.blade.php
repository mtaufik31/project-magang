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
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Newest</option>
                        <option value="a-z" {{ request('sort') == 'a-z' ? 'selected' : '' }}>A-Z</option>
                        <option value="z-a" {{ request('sort') == 'z-a' ? 'selected' : '' }}>Z-A</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>

                <!-- Links for Desktop -->
                <div class="hidden md:flex space-x-7">
                    <a href="javascript:void(0)" class="sort-link font-light hover:text-orange-600 duration-200" data-sort="latest">Newest</a>
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
                    <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}"
                        status="{{ $manga->status }}" author="{{ $manga->author }}"
                        description="{{ $manga->description }}" image="{{ asset('storage/' . $manga->image) }}">
                    </x-cardmanga>
                @endforeach
            </div>
        </div>
    </div>
</section>

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
