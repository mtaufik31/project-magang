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
                class="bg-[#ff9900] font-semibold border border-black py-2 px-3 rounded-xl duration-150 hover:bg-[rgb(255,153,0,0.7)] relative">
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
                <div class="flex py-6 gap-8">
                    <!-- Card 1 --> 
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Jujutsu Kaisen</h3>
                        <p class="text-gray-500  text-start">Chapter 266</p>
                    </a>
                    <!-- Card 2 -->
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postcsm.jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Chainsaw Man</h3>
                        <p class="text-gray-500 text-start">Chapter 266</p>
                    </a>
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postcsm.jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Chainsaw Man</h3>
                        <p class="text-gray-500 text-start">Chapter 266</p>
                    </a>
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a><a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postcsm.jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Chainsaw Man</h3>
                        <p class="text-gray-500 text-start">Chapter 266</p>
                    </a>
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postcsm.jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Chainsaw Man</h3>
                        <p class="text-gray-500 text-start">Chapter 266</p>
                    </a>
                    <a href="{{ route('manga') }}" class=" text-center block">
                        <div class="w-[140px] h-[230px] mx-auto">
                            <img class="w-full h-full object-cover " src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 text-start">Shikanoko No....</h3>
                        <p class="text-gray-500 text-start">Chapter 110</p>
                    </a>


                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 transition-all">
        <div class="bg-white md:w-[69%] mx-auto relative px-3">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Blog</h1>
                <a href="{{ route('list') }}">
                    <i class="fa-solid fa-arrow-right me-5"></i>
                </a>
            </div>

            <hr>
            <div class="overflow-x-auto px-5">
                <div class="flex py-6 gap-20">
                    <!-- Card 1 -->
                    @foreach ($blogs as $blog)
                        <x-cardblog id="{{ $blog->id }}" title="{{ $blog->title }}"
                            description="{{ $blog->description }}" image="{{ $blog->image }}"
                            name="{{ $blog->user->name }} - {{ $blog->created_at->format('d-m-Y') }}">
                        </x-cardblog>
                    @endforeach



                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>





    {{-- <div class="swiper mySwiper w-[30%] h-[10%] mt-16 relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover ">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover ">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover ">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover ">
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Navigation buttons (arrows) -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div> --}}
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
@endsection
