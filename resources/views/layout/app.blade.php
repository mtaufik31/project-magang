<!DOCTYPE html>
<html lang="en" scroll-behaviour="smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('asset/img/logo.jpeg') }}">
    {{-- <link rel="icon" href="{{ asset('asset/img/logo.jpeg') }}">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        .swiper-button-next,
        .swiper-button-prev {
            color: #000;
            width: 50px;
            height: 50px;
            top: 50%;
            transform: translateY(-50%);
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 20px;
            font-weight: bold;
        }

        .swiper-pagination-bullet {
            background-color: #ccc;
            opacity: 1;
        }

        .swiper-pagination-bullet-active {
            background-color: #ff9900;
        }
    </style>
</head>

<body class="bg-[#e6e6e6] transition-all duration-200">
    {{-- navbar atas --}}
    <x-navbar></x-navbar>

    {{-- navbar bawah --}}
    <x-navbarbawah></x-navbarbawah>

    {{-- Isi Content disini --}}
    @yield('content')

    {{-- Footer --}}
    <x-footer></x-footer>
    <!-- Footer section End -->


    {{-- Tambah Javascript disini --}}
    @yield('script')
    <script src="https://kit.fontawesome.com/c340d81b5e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
      </script>
</body>

</html>
