@extends('layout.app')

@section('content')
    @if (session('success'))
        <div class="bg-[#ff9900] border border-black text-black px-4 md:px-36 py-3 rounded relative" role="alert" id="alert">
            <span class="block">{{ session('success') }}
                @if (Auth::user()->name != null)
                    <span class="text-gray-900 font-medium">Welcome, {{ Auth::user()->name }}</span>
                @endif
            </span>

            <!-- Close button -->
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 10-.707.707L9.293 10l-3.64 3.64a.5.5 0 00.707.707L10 10.707l3.64 3.64a.5.5 0 00.707-.707L10.707 10l3.64-3.64a.5.5 0 000-.707z" />
                </svg>
            </span>
        </div>
    @endif
    @if (@session('berhasil'))
        <div class="bg-[#ff9900] border border-black text-black px-4 md:px-36 py-3 rounded relative" role="alert" id="alert">
            <span class="text-gray-900 font-medium">You're Log Out</span>

            <!-- Close button -->
            <span class="absolute top-0 right-0 px-4 py-3 cursor-pointer" onclick="closeAlert()">
                <svg class="fill-current h-6 w-6 text-black" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 10-.707.707L9.293 10l-3.64 3.64a.5.5 0 00.707.707L10 10.707l3.64 3.64a.5.5 0 00.707-.707L10.707 10l3.64-3.64a.5.5 0 000-.707z" />
                </svg>
            </span>
        </div>

        <script>
            function closeAlert() {
                document.getElementById('alert').style.display = 'none';
            }
        </script>
    @endif

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
