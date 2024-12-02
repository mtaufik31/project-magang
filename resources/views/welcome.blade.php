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
    @if (session('berhasil'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Goodbye!",
                    text: "{{ session('berhasil') }}", // Use the session success message here
                    icon: "success"
                });
            });
        </script>
    @endif

    <div
        class="swiper-container w-full md:max-w-[97%] xl:max-w-[69%] mx-auto overflow-hidden md:pt-5 relative transition-all">
        <div class="swiper-wrapper ">
            @foreach ($swiperMangas as $swiper)
                <x-swiper :swiper="$swiper" id="{{ $swiper->manga->id }}" title="{{ $swiper->manga->title }}"
                    image="{{ $swiper->manga->image }}"
                    number="{{ $swiper->manga->chapters->last()->chapter_number ?? 'No chapters' }}"
                    :genres="$swiper->manga->getGenre()"
                    description="{{ Str::limit($swiper->manga->description, 210, '...') }}"
                    status="{{ $swiper->manga->status }}" />
            @endforeach

        </div>



        <div class="absolute left-0 right-0 px-3 text-center bottom-1">
            <div class="pagination-wrapper">
                <div class="swiper-pagination custom-pagination"></div>
            </div>
        </div>


    </div>


    <section
        class="bg-[#fec46d] py-3 px-5 rounded-t-xl md:max-w-[97%] xl:max-w-[69%] my-5 justify-center relative items-center mx-auto lg:block hidden transition-all">
        <div class="flex justify-between">
            <div class="font-fira text-[18px] self-center space-x-7 ps-10 ">
                @foreach ($genres as $genre)
                    <a class="duration-300 hover:text-white"
                        href="{{ route('genre.sort', $genre->id) }}">{{ $genre->title }}</a>
                @endforeach
            </div>
            <div
                class="relative px-10 py-2 overflow-hidden text-white transition-all duration-300 bg-orange-500 border border-orange-500 rounded-lg shadow- md:max-w-[97%] before:ease before:absolute before:right-0 before:top-0 before:h-24 before:w-5 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-30 before:duration-700 hover:shadow-orange-400 hover:bg-orange-400 animate-shine">
                <a href="{{ route('list') }}">
                    See More
                </a>
            </div>
            <style>
                @keyframes shine {
                    0% {
                        transform: translateX(12px) rotate(6deg);
                    }

                    100% {
                        transform: translateX(-180px) rotate(6deg);
                    }
                }

                .animate-shine::before {
                    animation: shine 1.5s infinite linear;
                    animation-delay: 2s;
                }
            </style>
        </div>
    </section>

    <section class=" transition-all">
        <div class="bg-white md:max-w-[97%] xl:w-[69%] mx-auto relative px-5 transition-all">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Latest Update</h1>
                <a href="{{ route('list') }}">
                    <i data-feather="arrow-right-circle" class="duration-150 me-5 hover:text-slate-700"></i>
                </a>
                <a href="{{ route('list') }}"
                    class="text-sm font-semibold text-white hover:text-white bg-orange-500 py-2 px-4 absolute right-0 hover:rounded-s-xl duration-300 hover:px-5 hover:bg-orange-400 rounded-l-md">Semua
                    Manga</a>
            </div>

            <hr>
            <div class="overflow-x-auto">
                <div class="flex gap-4 py-6">
                    <!-- Card 1 -->
                    @foreach ($mangas as $manga)
                        <x-cardmanga :manga="$manga" id="{{ $manga->id }}" status="{{ $manga->status }}"
                            title="{{ $manga->title }}" author="{{ $manga->author }}" :description="$manga->chapters->first()->chapter_title ?? 'No chapters'"
                            image="{{ asset('storage/' . $manga->image) }}"
                            chapter="{{ $manga->chapters->first()->chapter_number ?? 'N/A' }}">
                        </x-cardmanga>
                    @endforeach

                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

    <section class="transition-all py-10">
        <div class="bg-white md:max-w-[97%] xl:w-[69%] mx-auto relative px-7">

            <div class="flex items-center justify-between border-b-2">
                <h1 class="font-fira text-[24px] pt-5 pb-3 ">Updated Chapter</h1>
                <a href="{{ route('list') }}"
                    class="text-sm font-semibold text-white hover:text-white bg-orange-500 py-2 px-4 absolute right-0 hover:rounded-s-xl duration-300 hover:px-5 hover:bg-orange-400 rounded-l-md">Semua
                    Manga</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 py-3">
                @foreach ($mangas as $manga)
                    <div class="flex sm:justify-normal py-3  border-b-2 duration-300">
                        <img class="w-[80px] h-auto rounded-md hover:scale-105 duration-300"
                            src="{{ asset('storage/' . $manga->image) }}" alt="{{ $manga->title }}">
                        <div class="px-5 w-full lg:w-fit">
                            <a href="{{ route('manga', $manga->id) }}"
                                class="font-poppins font-medium text-lg hover:text-orange-500 duration-300">
                                {{ Str::limit($manga->title, 14, '...') }}</a>
                            <div class="mt-2 space-y-2 flex flex-col w-full font-fira">
                                @foreach ($manga->chapters as $chapter)
                                    <a class="flex items-center justify-between"
                                        href="{{ route('chapter', ['manga_id' => $manga->id, 'chapter_number' => $chapter->chapter_number]) }}">
                                        <div class="items-center flex gap-2">
                                            <i class="fa-solid fa-circle text-[5px] text-gray-400"></i>
                                            <span>Ch. {{ $chapter->chapter_number }}</span>
                                        </div>
                                        <span class="ml-2 text-sm text-gray-700">
                                            {{ $chapter->updated_at->setTimezone('Asia/Jakarta')->format('F d, Y') }}
                                        </span>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="py-10 transition-all">
        <div class="bg-white md:max-w-[97%] xl:w-[69%] mx-auto relative px-7">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Blog</h1>
                <a href="{{ route('blogs') }}"
                    class="text-sm font-semibold text-white hover:text-white bg-orange-500 py-2 px-4 absolute right-0 hover:rounded-s-xl duration-300 hover:px-5 hover:bg-orange-400 rounded-l-md">Semua
                    Blog</a>
            </div>

            <hr class="mb-5">

            <div>
                <div class="flex flex-wrap justify-center gap-6">
                    <!-- Blog Cards -->
                    {{-- {{ $blogs }} --}}
                    @foreach ($blogs as $blog)
                        <x-cardblog id="{{ $blog->id }}" title="{{ $blog->title }}"
                            description="{{ $blog->description }}" image="{{ $blog->image }}"
                            name="{{ $blog->user->name }} - {{ $blog->created_at->format('d-m-Y') }}">
                        </x-cardblog>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    <!-- Swiper -->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Count the number of slides in the swiper container
        const slideCount = document.querySelectorAll('.swiper-container .swiper-slide').length;

        // Initialize swiper with conditional touch move based on slide count
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: '1',
            centeredSlides: true,
            allowTouchMove: slideCount >= 4,
        });
    </script>
@endsection
