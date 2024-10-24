<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('asset/img/logo.jpeg') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" /> --}}
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body class="bg-[#EFEFEF] transition-all duration-200">
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Wow!",
                    text: "{{ session('success') }}", // Use the session success message here
                    icon: "success"
                });
            });
        </script>
    @endif


    <x-sidebar></x-sidebar>
    <div id="content" class="md:ml-[35vh] transition-all duration-500">
        <x-navboard></x-navboard>
        <div class="px-12 py-4  ">
            @yield('content')
        </div>
    </div>

    @yield('scripts')
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/c340d81b5e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const menuButton = document.getElementById('menuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const content = document.getElementById('content');

        menuButton.addEventListener('click', () => {
            if(window.innerWidth <= 768) {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            } else {
                sidebar.classList.toggle('md:translate-x-0');
                content.classList.toggle('md:ml-[35vh]');
            }
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
</body>

</html>
