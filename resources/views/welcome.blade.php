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
            <div class="swiper-slide text-white rounded-lg p-4 shadow-md overflow-hidden">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url('/asset/img/postspy.jpg')] bg-cover bg-center filter blur-md"></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-30"></div>

                <div class="flex relative">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px]  relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">SONO MONBAN...</h2>
                            <p class="text-yellow-400 mt-2">MANGA</p>
                            <p class="text-sm mt-1">Action, Comedy, SOL...</p>
                        </div>
                        <div class="mt-4">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="text-sm mt-1">Sieg is an adventurer with...</p>
                            <p class="mt-2">Status: Ongoing</p>
                            <p>Author: TOMOBASHI Kametsu</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 1 -->
            <div class="swiper-slide text-white rounded-lg p-4 shadow-md   overflow-hidden">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url('/asset/img/postspy.jpg')] bg-cover bg-center filter blur-md"></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-30"></div>

                <div class="flex relative">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px] relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">SONO MONBAN...</h2>
                            <p class="text-yellow-400 mt-2">MANGA</p>
                            <p class="text-sm mt-1">Action, Comedy, SOL...</p>
                        </div>
                        <div class="mt-4">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="text-sm mt-1">Sieg is an adventurer with...</p>
                            <p class="mt-2">Status: Ongoing</p>
                            <p>Author: TOMOBASHI Kametsu</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 1 -->
            <div class="swiper-slide text-white rounded-lg p-4 shadow-md   overflow-hidden">
                <!-- Background Image with Blur -->
                <div class="absolute inset-0 bg-[url('/asset/img/postspy.jpg')] bg-cover bg-center filter blur-md"></div>

                <!-- Overlay for Darkening Background -->
                <div class="absolute inset-0 bg-black opacity-30"></div>

                <div class="flex relative">
                    <!-- Manga Cover -->
                    <div class="w-[140px] h-[230px] relative flex-shrink-0">
                        <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                            class="relative object-cover w-full h-full">
                    </div>

                    <!-- Manga Details -->
                    <div class="pl-4 ">
                        <div>
                            <h2 class="text-xl font-bold">SONO MONBAN...</h2>
                            <p class="text-yellow-400 mt-2">MANGA</p>
                            <p class="text-sm mt-1">Action, Comedy, SOL...</p>
                        </div>
                        <div class="mt-4">
                            <p class="font-semibold">Sinopsis</p>
                            <p class="text-sm mt-1">Sieg is an adventurer with...</p>
                            <p class="mt-2">Status: Ongoing</p>
                            <p>Author: TOMOBASHI Kametsu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-pagination absolute bottom-1 px-5 left-0 right-0 text-center"></div>
        <!-- Add Pagination inside the Swiper container -->
    </div>


    <section
        class="bg-[#fec46d] py-3 px-5 rounded-xl mt-5  w-[69%] justify-center relative items-center mx-auto lg:block hidden transition-all">
        <div class="flex justify-between ">
            <div class="font-fira text-[18px] self-center space-x-7 ps-10 ">
                <a class="hover:text-white duration-150" href="">Adventure</a>
                <a class="hover:text-white duration-150" href="">Action</a>
                <a class="hover:text-white duration-150" href="">Comedy</a>
                <a class="hover:text-white duration-150" href="">Drama</a>
                <a class="hover:text-white duration-150" href="">Isekai</a>
                <a class="hover:text-white duration-150" href="">Parody</a>
            </div>
            <div
                class="before:ease rounded-lg relative px-10 py-2 overflow-hidden border border-orange-500 bg-orange-500 text-white shadow-2xl transition-all before:absolute before:right-0 before:top-0 before:h-14 before:w-6 before:translate-x-12 before:rotate-6 before:bg-white before:opacity-50 before:duration-700 hover:shadow-orange-500 hover:before:-translate-x-44">
                <a href="{{ route('list') }}">
                    All Genre
                </a>
            </div>
        </div>
    </section>

    <section class="py-5 transition-all">
        <div class="bg-white md:w-[69%] mx-auto relative px-5">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Latest Update</h1>
                <a href="{{ route('list') }}">
                    <i data-feather="arrow-right-circle" class=" me-5 hover:text-slate-700 duration-150"></i>
                </a>
            </div>

            <hr>
            <div class="overflow-x-auto">
                <div class="flex py-6 gap-4">
                    <!-- Card 1 -->
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>
                    <x-cardmanga></x-cardmanga>



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
                <div class="flex flex-wrap gap-6 justify-center">
                    <!-- Blog Cards -->
                    {{-- {{ $blogs }} --}}
                    @foreach ($blogs as $blog)
                        <x-cardblog
                            id="{{ $blog->id }}"
                            title="{{ $blog->title }}"
                            description="{{ $blog->description }}"
                            image="{{ $blog->image }}"
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
                delay: 3000,
                disableOnInteraction: false,
            },
            slidesPerView: 'auto',
            centeredSlides: true,
        });
    </script>
@endsection
