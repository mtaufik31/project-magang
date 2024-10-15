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
        class="bg-[#fec46d] py-3 px-5 rounded-xl mt-5  w-[69%] justify-center relative items-center mx-auto lg:block hidden">
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

    <section class="py-5">
        <div class="bg-white md:w-[69%] mx-auto relative px-5">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Latest Update</h1>
                <a href="{{ route('list') }}">
                    <i data-feather="arrow-right-circle" class=" me-5 hover:text-slate-700 duration-150"></i>
                </a>
            </div>

            <hr>
            <div class="overflow-x-auto">
                <div class="flex py-6 gap-3">
                    <!-- Card 1 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Jujutsu Kaisen</h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 2 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto hover:bg-black">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postrot.jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Shikanoko Nokonoko...</h3>
                    </h3>
                        <p class="text-gray-500">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postcsm.jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Chainsaw Man</h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 4 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postlv2.jpg') }}"
                                alt="Shikanoko Nokonoko Koshitantan">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Lv2 kara Cheat datta..
                        </h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 5 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postspy.jpg') }}"
                                alt="Chainsaw Man">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Spy X Family</h3>
                        <p class="text-gray-500">Chapter 167</p>
                    </a>
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postspy.jpg') }}"
                                alt="Chainsaw Man">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Spy X Family</h3>
                        <p class="text-gray-500">Chapter 167</p>
                    </a>
                    <a href="{{ route('manga') }}" class="min-w-[200px] text-center block">
                        <div class="w-[160px] h-[250px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postspy.jpg') }}"
                                alt="Chainsaw Man">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Spy X Family</h3>
                        <p class="text-gray-500">Chapter 167</p>
                    </a>


                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="bg-white md:w-[69%] mx-auto relative px-3">
            <div class="flex items-center justify-between">
                <h1 class="font-fira text-[24px] pt-5 pb-3">Blog</h1>
                <a href="{{ route('list') }}">
                    <i data-feather="arrow-right-circle" class=" me-5 hover:text-slate-700 duration-150"></i>
                </a>
            </div>

            <hr>
            <div class="overflow-x-auto px-5">
                <div class="flex py-6 gap-20">
                    <!-- Card 1 -->
                    <a href="{{ route('manga') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>
                    <a href="{{ route('manga') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>
                    <a href="{{ route('manga') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>
                    <a href="{{ route('manga') }}" class="min-w-[200px]  text-start block">
                        <div class="w-[250px] h-[160px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/postjjk.jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <div class="w-[250px]   ">
                            <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">Bagaimana Cara Membuat akun di Website MangaLo?</h3>
                            <p class="text-gray-500 text-[14px]">Masih Banyak Yang kebingungan cara...</p>
                            <p class="text-[12px]"><span class=" italic">BudiJago -</span> Nov 12, 2024</p>
                        </div>
                    </a>


                    <!-- Tambahan Card jika diperlukan -->
                </div>
            </div>
        </div>
    </section>


    {{-- <div class="swiper mySwiper w-[30%] h-[10%] mt-16 relative">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/halo.png') }}" alt="" class="w-full h-full object-cover rounded-lg">
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
