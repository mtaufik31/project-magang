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

    <div class="swiper-container w-full md:max-w-[71%] mx-auto overflow-hidden px-4 pt-5 relative ">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="p-4 overflow-hidden text-white rounded-lg shadow-md swiper-slide">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url(/public/asset/img/postspy.jpg)] bg-cover bg-center "></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-55"></div>

                <div class="relative flex">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px]  relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">Spy x Family</h2>
                            <p class="mt-2 text-yellow-400">GENRE</p>
                            <p class="flex flex-wrap gap-1 mt-1 mb-3 text-sm">
                                <a class="duration-200 hover:text-orange-400 " href="">Action, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Comedy, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Slice Of Life, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Drama, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Fantasy, </a>
                            </p>
                        </div>
                        <div class="hidden mt-2 sm:block">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="mt-1 mb-2 text-sm">
                                {{ Str::limit(
                                    'The master spy codenamed <Twilight> has spent most of his life on undercover missions, all for the dream of a better world. Yet one day he receives a particularly difficult order from command. For his mission, he must form a temporary family and start a new life?!

                                                                                                A Spy/Action/Comedy manga about a one-of-a-kind family!',
                                    180,
                                    '...',
                                ) }}
                            </p>
                        </div>
                        <p class="block mb-3 sm:hidden">Status : Ongoing</p>
                        <button
                            class="text-orange hover:before:bg-orange relative h-[40px] w-40 overflow-hidden border border-orange-500 bg-transparent px-2  shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-orange-500 before:transition-all before:duration-300 hover:text-white hover:shadow-orange-500 hover:before:left-0 hover:before:w-full hover:font-medium"><span
                                class="relative z-10">Read More</span></button>
                    </div>
                </div>
            </div>
            <div class="p-4 overflow-hidden text-white rounded-lg shadow-md swiper-slide">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url(/public/asset/img/postspy.jpg)] bg-cover bg-center "></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-55"></div>

                <div class="relative flex">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px]  relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">Spy x Family</h2>
                            <p class="mt-2 text-yellow-400">GENRE</p>
                            <p class="flex flex-wrap gap-1 mt-1 mb-3 text-sm">
                                <a class="duration-200 hover:text-orange-400 " href="">Action, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Comedy, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Slice Of Life, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Drama, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Fantasy, </a>
                            </p>
                        </div>
                        <div class="hidden mt-2 sm:block">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="mt-1 mb-2 text-sm">
                                {{ Str::limit(
                                    'The master spy codenamed <Twilight> has spent most of his life on undercover missions, all for the dream of a better world. Yet one day he receives a particularly difficult order from command. For his mission, he must form a temporary family and start a new life?!

                                                                                                A Spy/Action/Comedy manga about a one-of-a-kind family!',
                                    180,
                                    '...',
                                ) }}
                            </p>
                        </div>
                        <p class="block mb-3 sm:hidden">Status : Ongoing</p>
                        <button
                            class="text-orange hover:before:bg-orange relative h-[40px] w-40 overflow-hidden border border-orange-500 bg-transparent px-2  shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-orange-500 before:transition-all before:duration-300 hover:text-white hover:shadow-orange-500 hover:before:left-0 hover:before:w-full"><span
                                class="relative z-10">Read More</span></button>
                    </div>
                </div>
            </div>
            <div class="p-4 overflow-hidden text-white rounded-lg shadow-md swiper-slide">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url(/public/asset/img/postspy.jpg)] bg-cover bg-center "></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-55"></div>

                <div class="relative flex">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px]  relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">Spy x Family</h2>
                            <p class="mt-2 text-yellow-400">GENRE</p>
                            <p class="flex flex-wrap gap-1 mt-1 mb-3 text-sm">
                                <a class="duration-200 hover:text-orange-400 " href="">Action, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Comedy, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Slice Of Life, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Drama, </a>
                                <a class="duration-200 hover:text-orange-400 " href="">Fantasy, </a>
                            </p>
                        </div>
                        <div class="hidden mt-2 sm:block">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="mt-1 mb-2 text-sm">
                                {{ Str::limit(
                                    'The master spy codenamed <Twilight> has spent most of his life on undercover missions, all for the dream of a better world. Yet one day he receives a particularly difficult order from command. For his mission, he must form a temporary family and start a new life?! A Spy/Action/Comedy manga about a one-of-a-kind family!',
                                    180,
                                    '...',
                                ) }}
                            </p>
                        </div>
                        <p class="block mb-3 sm:hidden">Status : Ongoing</p>
                        <button
                            class="text-orange hover:before:bg-orange relative h-[40px] w-40 overflow-hidden border border-orange-500 bg-transparent px-2  shadow-2xl transition-all before:absolute before:bottom-0 before:left-0 before:top-0 before:z-0 before:h-full before:w-0 before:bg-orange-500 before:transition-all before:duration-300 hover:text-white hover:shadow-orange-500 hover:before:left-0 hover:before:w-full">
                            <span class="relative z-10">Read More</span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Slide 1 -->

        </div>

        <div class="absolute left-0 right-0 px-5 text-center swiper-pagination bottom-1"></div>
        <!-- Add Pagination inside the Swiper container -->
    </div>


    <section
        class="bg-[#fec46d] py-3 px-5 rounded-t-xl mt-5  w-[69%] justify-center relative items-center mx-auto lg:block hidden transition-all">
        <div class="flex justify-between ">
            <div class="font-fira text-[18px] self-center space-x-7 ps-10 ">
                @foreach ($genres as $genre)
                    <a class="duration-200 hover:text-white "
                        href="{{ route('genre.sort', $genre->id) }}">{{ $genre->title }}</a>
                @endforeach
            </div>
            <div
                class="relative px-10 py-2 overflow-hidden text-white transition-all duration-300 bg-orange-400 border border-orange-500 rounded-lg shadow-2xl before:ease before:absolute before:right-0 before:top-0 before:h-24 before:w-5 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-30 before:duration-700 hover:shadow-orange-400 hover:bg-orange-500 animate-shine">
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

    <section class="py-5 transition-all">
        <div class="bg-white md:w-[69%] mx-auto relative px-5">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Latest Update</h1>
                <a href="{{ route('list') }}">
                    <i data-feather="arrow-right-circle" class="duration-150 me-5 hover:text-slate-700"></i>
                </a>
            </div>

            <hr>
            <div class="overflow-x-auto">
                <div class="flex gap-4 py-6">
                    <!-- Card 1 -->
                    @foreach ($mangas as $manga)
                        <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}"
                            author="{{ $manga->author }}" description="{{ $manga->description }}"
                            image="{{ asset('storage/' . $manga->image) }}"></x-cardmanga>
                    @endforeach

                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

    <section class="py-10 transition-all">
        <div class="bg-white md:w-[69%] mx-auto relative px-7">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Blog</h1>
                <a href="{{ route('blogs') }}" class="text-gray-700 hover:text-orange-400">
                    <i class="fa-solid fa-arrow-right me-5"></i>
                </a>
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
        var swiper = new Swiper('.mySwiper', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 10,
        });
    </script>

    <script>
        var swiper = new Swiper('.swiper-container', {
            loop: true,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            slidesPerView: 'auto',
            centeredSlides: true,
        });
    </script>
@endsection
