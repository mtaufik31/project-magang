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
        class="bg-[#fec46d] py-3 px-5 rounded-xl my-5 w-[75%] justify-center relative items-center mx-auto lg:block hidden">
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

    <section class="py-10">
        <div class="bg-white w-[75%] mx-auto relative">
            <h1 class="font-fira text-[24px] px-6 pt-6 pb-3">Latest Update</h1>
            <hr>
            <div class="overflow-x-auto">
                <div class="flex py-6">
                    <!-- Card 1 -->
                    <a href="/manga/jujutsu-kaisen" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (1).jpg') }}"
                                alt="Jujutsu Kaisen">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Jujutsu Kaisen</h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 2 -->
                    <a href="/manga/spy-x-family" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (3).jpg') }}"
                                alt="Spy X Family">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Spy X Family</h3>
                        <p class="text-gray-500">Chapter 110</p>
                    </a>

                    <!-- Card 3 -->
                    <a href="/manga/lv2-kara-cheat-datta" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (2).jpg') }}"
                                alt="Lv2 kara Cheat datta...">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Lv2 kara Cheat datta...</h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 4 -->
                    <a href="/manga/shikanoko-nokonoko-koshitantan" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (4).jpg') }}"
                                alt="Shikanoko Nokonoko Koshitantan">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Shikanoko Nokonoko Koshitantan</h3>
                        <p class="text-gray-500">Chapter 266</p>
                    </a>

                    <!-- Card 5 -->
                    <a href="/manga/chainsaw-man" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (5).jpg') }}"
                                alt="Chainsaw Man">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Chainsaw Man</h3>
                        <p class="text-gray-500">Chapter 167</p>
                    </a>
                    <a href="/manga/chainsaw-man" class="min-w-[200px] text-center block">
                        <div class="w-[150px] h-[240px] mx-auto">
                            <img class="w-full h-full object-cover rounded-lg" src="{{ asset('asset/img/post (5).jpg') }}"
                                alt="Chainsaw Man">
                        </div>
                        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150">Chainsaw Man</h3>
                        <p class="text-gray-500">Chapter 167</p>
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
