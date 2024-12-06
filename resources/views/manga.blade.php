@extends('layout.app')
@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Welcome!",
                    text: "{{ session('success') }}", // Use the session success message here
                    icon: "success"
                });
            });
        </script>
    @endif
    <section>
        <div class="relative">
            <div class="relative w-full h-[300px] bg-fixed bg-cover bg-bottom overflow-hidden"
                style="background-image: url('{{ asset('storage/' . $manga->image) }}');">
                <div class="absolute inset-0 bg-white/30 backdrop-blur-lg"></div>
            </div>
    </section>
    <section>
        <div class="relative z-20 mt-[-200px]">
            <div
                class="bg-white w-full md:w-[81%] mx-auto py-5 px-6 my-10 rounded-t-md shadow-lg flex flex-col md:flex-row md:flex-nowrap">
                <div class="flex flex-col items-center transition-all md:items-start">
                    <div class="w-full judul md:border-b-2">
                        <h1 class="mb-2 text-3xl text-center text-black font-fira md:text-left ">
                            {{ $manga->title }} {{ $manga->id }}
                        </h1>
                        <p class="mb-2 text-center text-slate-600 md:text-left">{{ $manga->alternative }} </p>
                    </div>

                    <!-- isi-kiri and isi-kanan -->
                    <div class="flex flex-col md:flex-row md:pt-5 ">

                        <!-- Left Section -->
                        <div class="flex flex-col items-center isi-kiri md:items-start">
                            <img class="w-[210px] h-[310px] mb-4 shadow-xl" src="{{ asset('storage/' . $manga->image) }}"
                                alt="">
                            <div class="space-y-3">
                                <div
                                    class="w-[210px] flex justify-between bg-slate-200 py-2 items-center px-4  rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Status</span>
                                    <span
                                        class="font-medium uppercase px-2 py-1 rounded
                                        {{ $manga->status === 'ongoing' ? 'text-orange-600' : ($manga->status === 'complete' ? 'text-green-600 ' : 'text-gray-500 ') }}">
                                        {{ $manga->status }}
                                    </span>
                                </div>
                                <div
                                    class="w-[210px] flex justify-between bg-slate-200 py-3 items-center px-4  rounded-lg shadow">
                                    <span class="mr-2 text-gray-500">Rating</span>
                                    <span class="text-black">{{ $manga->rating }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Section -->
                        <div class="w-full mt-8 isi-kanan md:ml-10 md:mt-0">
                            <h2 class="text-2xl text-[#ff9900] font-semibold mb-2">Sinopsis</h2>
                            <p class="text-gray-700">
                                {!! $manga->description !!}
                            </p>

                            <div class="grid grid-cols-2 py-3 border-gray-300 md:grid-cols-4">

                                <!-- Released -->
                                <div class="p-4 border-b border-r border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Released</h2>
                                    <span class="text-base">{{ $manga->released_year ?? '-' }}</span>
                                </div>
                                <!-- Artist -->
                                <div class="p-4 border-b border-gray-300 md:border-r">
                                    <h2 class="text-sm font-medium text-gray-500 ">Artist</h2>
                                    <span class="text-base capitalize">{{ $manga->artist }}</span>
                                </div>
                                <!-- Author -->
                                <div class="p-4 border-b border-r border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Author</h2>
                                    <span class="text-base capitalize">{{ $manga->author }}</span>
                                </div>
                                <!-- publisher -->
                                <div class="p-4 border-b border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Publisher</h2>
                                    <span class="text-base">{{ $manga->publisher }}</span>
                                </div>
                                <!-- Posted By -->
                                <div class="p-4 border-b border-r border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Posted By</h2>
                                    <span class="text-base">{{ $manga->user->name }}</span>
                                </div>
                                <div class="p-4 border-b border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Rating</h2>
                                    <span class="text-base">
                                        {{ $manga->rating }}
                                    </span>
                                </div>
                                <!-- Posted On -->
                                <div class="p-4 border-b border-gray-300 md:border-l">
                                    <h2 class="text-sm font-medium text-gray-500">Posted On</h2>
                                    <span class="text-base">
                                        {{ $manga->created_at->setTimezone('Asia/Jakarta')->format('F d, Y') }}
                                    </span>
                                </div>
                                <!-- Updated On -->
                                <div class="p-4 border-b border-l border-gray-300">
                                    <h2 class="text-sm font-medium text-gray-500">Updated On</h2>
                                    <span class="text-base">
                                        {{ $manga->updated_at->setTimezone('Asia/Jakarta')->format('F d, Y') }}
                                    </span>
                                </div>

                            </div>


                            <div class="flex pt-3 baris-satu">
                                <div class="">
                                    <h2 class="mb-2 text-[18px]">Genre</h2>
                                    <div class="flex flex-wrap gap-4">
                                        @foreach ($manga->getGenre() as $genre)
                                            <x-buttongenre route="{{ route('genre.sort', $genre->id) }}" class="">
                                                {{ $genre->title }}
                                            </x-buttongenre>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="grid grid-cols-1 md:grid-cols-3 w-full md:w-[81%] mx-auto gap-8">
        <div class="w-full my-5 bg-white shadow-md md:col-span-2 md:rounded-l-xl">
            <div class="px-6 py-4 border-b">
                <h2 class="text-2xl font-medium font-fira">Chapter <span
                        class="text-orange-500 underline">{{ $manga->title }}</span></h2>
            </div>
            <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                <!-- Tombol First -->
                @if ($firstChapter)
                    <a href="{{ route('chapter', $firstChapter->id) }}"
                        class="px-6 py-4 text-white duration-200 bg-orange-500 rounded-lg hover:bg-orange-400">
                        <h3 class="font-bold text-md">First</h3>
                        <p class="text-lg">Chapter {{ $firstChapter->chapter_number }}</p>
                    </a>
                @endif

                <!-- Tombol New -->
                @if ($newChapter)
                    <a href="{{ route('chapter', $newChapter->id) }}"
                        class="px-6 py-4 text-white duration-200 bg-orange-500 rounded-lg hover:bg-orange-400">
                        <h3 class="font-bold text-md">New</h3>
                        <p class="text-lg">Chapter {{ $newChapter->chapter_number }}</p>
                    </a>
                @endif
            </div>

            <div class="px-6 py-1 border-t">
                <div class="flex items-center justify-between gap-4 py-3">
                    <form method="GET" action="{{ route('manga', ['id' => $manga->id]) }}" class="flex w-full gap-4">
                        <input type="text" name="query" inputmode="numeric" value="{{ request('query') }}"
                            data-manga-id="{{ $manga->id }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-500 caret-orange-400"
                            placeholder="Search Chapter. Example: 25 or 178" />
                        <button type="button" id="sortButton" data-sort="{{ request('sort', 'desc') }}"
                            class="text-orange-500 duration-200 hover:text-orange-400">
                            <i
                                class="fa-solid fa-arrow-{{ request('sort', 'desc') === 'desc' ? 'up-1-9' : 'down-9-1' }}"></i>
                        </button>
                    </form>
                </div>

            </div>
            <div class="border-t">
                <div class="overflow-y-auto" style="max-height: 380px">
                    <div id="chaptersContainer" class="gap-x-4 gap-y-6">
                        @if ($chapters->isEmpty())
                            <script src="https://cdn.lordicon.com/lordicon.js"></script>
                            <div class="text-center md:mt-28">
                                <lord-icon lazy="loading" src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                                    colors="primary:#121331,secondary:#eeaa66" style="width:100px;height:80px">
                                </lord-icon>
                                <p class="mt-3 text-gray-500">No chapters available yet.</p>
                            </div>
                        @else
                            @foreach ($chapters as $chapter)
                                <x-cardchapter :chapter-id="$chapter->id" :number="$chapter->chapter_number" :title="$chapter->chapter_title" :cover="asset('storage/' . $chapter->cover_image)"
                                    :date="$chapter->updated_at->setTimezone('Asia/Jakarta')->format('F d, Y')" :chapter-route="route('chapter', ['id' => $chapter->id])" />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
        <div class="w-full mx-auto my-5 bg-white shadow-md md:col-span-1 md:rounded-r-xl ransition-all">
            <div class="px-6 py-4 border-b t">
                <h2 class="text-2xl font-medium font-fira">Random Mangas</h2>
            </div>
            <div class="py-2 space-y-4">
                @foreach ($mangas as $manga)
                    <a href="{{ route('manga', $manga->id) }}">
                        <div
                            class="flex items-center px-4 py-2 space-x-4 transition-all duration-100 border-b hover:bg-gradient-to-l group hover:from-slate-200 hover:to-transparent ">
                            <!-- Gambar Manga -->
                            <img src="{{ asset('storage/' . $manga->image) }}" alt="{{ $manga->title }}"
                                class="object-cover w-16 h-24">

                            <!-- Detail Manga -->
                            <div class="flex-1">
                                <h3 class="text-base font-medium duration-200 font-fira group-hover:text-orange-400">
                                    {{ Str::limit($manga->title, 27, '...') }}</h3>
                                <p class="text-sm text-gray-400 duration-200 group-hover:text-black">
                                    {{ $manga->released_year }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.querySelector('input[name="query"]');
            const chaptersContainer = document.getElementById('chaptersContainer');
            const originalContent = chaptersContainer.innerHTML; // Simpan konten awal
            const sortButton = document.getElementById('sortButton');

            function createChapterCard(chapter) {
                return `
                    <a href="${chapter.url}">
                        <div class="relative flex items-center justify-between duration-200 border-b rounded-md cursor-pointer group md:px-5 hover:bg-slate-100">
                            <div class="flex w-full gap-4 md:py-2">
                                <img src="${chapter.cover}" alt="Chapter Image"
                                    class="object-cover w-24 h-24 transition-all duration-200 md:w-36 md:h-28 md:group-hover:-translate-x-2">
                                <div class="flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-xl font-semibold group-hover:text-orange-400">#${chapter.number}</h3>
                                        <p class="text-gray-700 font-roboto group-hover:text-gray-900 text-[14px]">${chapter.title || `Chapter ${chapter.number}`}</p>
                                    </div>
                                    <p class="text-[12px] font-inter text-gray-500">${chapter.date}</p>
                                </div>
                            </div>
                            <i class="ml-auto text-gray-400 transition-all duration-200 fa-regular fa-eye group-hover:text-orange-400"></i>
                        </div>
                    </a>
                `;
            }

            function loadChapters(sort = null) {
                const query = searchInput.value;
                const currentSort = sort || sortButton.dataset.sort;

                // Jika tidak ada pencarian dan tidak ada perubahan sort, kembalikan ke tampilan awal
                if (!query.trim() && !sort) {
                    chaptersContainer.innerHTML = originalContent;
                    return;
                }

                const mangaId = document.querySelector('input[name="query"]').dataset.mangaId;

                // Debug: Log search query dan sort
                console.log('Searching for:', query, 'Sort:', currentSort);

                // Tampilkan loading state
                chaptersContainer.innerHTML = `
                    <div class="text-center md:mt-28">
                        <lord-icon lazy="loading" src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                            colors="primary:#121331,secondary:#eeaa66" style="width:100px;height:80px">
                        </lord-icon>
                        <p class="mt-3 text-gray-500">Loading chapters...</p>
                    </div>
                `;

                // Fetch data
                fetch(`/manga/${mangaId}?query=${query}&sort=${currentSort}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        // Debug: Log raw response
                        console.log('Raw response:', response);
                        return response.json();
                    })
                    .then(response => {
                        // Debug: Log processed response
                        console.log('Processed response:', response);

                        if (response.data.length === 0) {
                            chaptersContainer.innerHTML = `
                            <div class="text-center md:mt-28">
                                <lord-icon lazy="loading" src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                                    colors="primary:#121331,secondary:#eeaa66" style="width:100px;height:80px">
                                </lord-icon>
                                <p class="mt-3 text-gray-500">No chapters found${query ? ` for "${query}"` : ''}</p>
                            </div>
                        `;
                            return;
                        }

                        const chaptersHTML = response.data
                            .map(chapter => createChapterCard(chapter))
                            .join('');

                        chaptersContainer.innerHTML = chaptersHTML;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        chaptersContainer.innerHTML = `
                        <p class="text-center text-red-500">
                            Error loading chapters. Please try again.<br>
                            Error details: ${error.message}
                        </p>
                    `;
                    });
            }

            // Event listener untuk tombol sort
            sortButton.addEventListener('click', function() {
                const currentSort = this.dataset.sort;
                const newSort = currentSort === 'desc' ? 'asc' : 'desc';

                // Update icon
                this.querySelector('i').className =
                    `fa-solid fa-arrow-${newSort === 'desc' ? 'up-1-9' : 'down-9-1'}`;

                // Update data-sort
                this.dataset.sort = newSort;

                // Load chapters dengan sort baru
                loadChapters(newSort);
            });

            // Debounce function
            let timeout;

            function debounce(func, wait) {
                clearTimeout(timeout);
                timeout = setTimeout(func, wait);
            }

            // Event listener untuk search
            searchInput.addEventListener('input', () => debounce(loadChapters, 300));
        });
    </script>
@endsection
