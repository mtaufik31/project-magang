@extends('layout.app')

@section('content')
    @if (session('success'))
        <div class="bg-[#ff9900] border border-black text-black px-4 py-3 rounded relative" role="alert"
            id="alert">
            <span class="block sm:inline">{{ session('success') }}</span>

            <!-- Close button -->
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="closeAlert()">
                <svg class="fill-current h-6 w-6 text-green-700" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M14.348 5.652a.5.5 0 00-.707 0L10 9.293 6.36 5.652a.5.5 0 10-.707.707L9.293 10l-3.64 3.64a.5.5 0 00.707.707L10 10.707l3.64 3.64a.5.5 0 00.707-.707L10.707 10l3.64-3.64a.5.5 0 000-.707z" />
                </svg>
            </span>
        </div>
    @endif
    <div class="swiper mySwiper w-[54%] h-1/3 mt-16">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/1.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/2.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/3.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('asset/img/1.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg">
            </div>
        </div>
        <div class="swiper-pagination "></div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
            centeredSlides: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });

        function closeAlert() {
        document.getElementById('alert').style.display = 'none';
    }
    </script>
@endsection
