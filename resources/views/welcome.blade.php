@extends('layout.app')

@section('content')
<div class="swiper mySwiper w-[54%] h-1/3 mt-16">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="{{ asset('asset/img/1.jpg') }}" alt=""
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('asset/img/2.jpg') }}" alt=""
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('asset/img/3.jpg') }}" alt=""
                class="w-full h-full object-cover rounded-lg">
        </div>
        <div class="swiper-slide">
            <img src="{{ asset('asset/img/1.jpg') }}" alt=""
                class="w-full h-full object-cover rounded-lg">
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
</script>
@endsection
