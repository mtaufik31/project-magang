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
