@extends('layout.chapter')

@section('content')
    <style>
        .navbar {
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }

        .navbar.active {
            transform: translateY(-100%);
        }

        .footer.active {
            transform: translateY(125%);
        }

        .footer {
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }
    </style>

    <div id="navbar"
        class="navbar fixed top-0 left-0 w-full border-t-2 md:border-t-8 border-orange-500 bg-gradient-to-t from-transparent to-black text-white p-4 z-50 ">
        <div class="container mx-auto flex justify-between md:justify-between items-center gap-8 md:px-5">
            <a href="{{ route('home') }}"
                class="flex items-center space-x-3 rtl:space-x-reverse hover:scale-105 duration-100 w-[170px] md:w-[280px]">
                <img width="" loading="lazy" src="{{ asset('asset/img/manga.png') }}" alt="">
            </a>
            <div class="">
                <h1 class="text-[22px] font-fira font-medium hidden md:block">{{ $chapter->chapter_title }} </h1>
                <div class="w-full max-w-sm min-w-[200px]">
                    <div class="relative">
                        <select id="chap"
                            class="w-full bg-black placeholder:text-slate-400 text-white text-sm border border-slate-200 rounded-b pl-3 pr-8 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md appearance-none cursor-pointer"
                            onchange="location.href=this.value">
                            @foreach ($chapter->manga->chapters as $chapters)
                                <option value="{{ $chapters->id }}" @if ($chapter->id == $chapters->id) selected @endif>
                                    {{ $chapters->chapter_title }}</option>
                            @endforeach
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container" oncontextmenu="return false;">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-3 justify-items-center">
            @foreach ($images as $image)
                <img src="{{ asset('storage/' . $chapter->content_path . '/' . $image) }}" alt="Page {{ $loop->iteration }}"
                    class="chapter-image" loading="lazy" width="800px">
            @endforeach
        </div>
    </div>


    <div id="footer"
        class="fixed footer bottom-0 left-0 w-full border-b-2 md:border-b-8 border-orange-500 bg-gradient-to-b from-transparent to-black text-white p-4 z-50">
        <div class="">
            <div id="current-page" class="fixed bottom-4 right-4 bg-black/80 text-white px-4 py-2 rounded-md z-50">
                Halaman: <span id="current-number">1</span>/<span class="text-slate-400"
                    id="total-pages">{{ count($images) }}</span>
            </div>
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navbar = document.getElementById('navbar');
            const footer = document.getElementById('footer');
            let navbarVisible = false;
            setTimeout(() => {
                navbar.classList.add('active');
                footer.classList.add('active');
                setTimeout(() => {
                    navbar.classList.add('hidden');
                    footer.classList.add('hidden');
                }, 300)
            }, 4000);
            document.body.addEventListener('click', (e) => {
                console.log(e.target.classList.contains('chapter-image'));
                if (navbarVisible && e.target.classList.contains('chapter-image')) {
                    navbar.classList.add('active');
                    footer.classList.add('active');

                    setTimeout(() => {
                        navbar.classList.add('hidden');
                        footer.classList.add('hidden');
                    }, 300);
                    navbarVisible = false;
                } else {
                    // Jika navbar terlihat, sembunyikan
                    navbar.classList.remove('hidden');
                    footer.classList.remove('hidden');

                    setTimeout(() => {
                        navbar.classList.remove('active');
                        footer.classList.remove('active');
                    }, 10); // Delay untuk menyembunyikan setelah animasi selesai
                    navbarVisible = true;
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chapterImages = document.querySelectorAll('.chapter-image');
            const currentPageNumber = document.getElementById('current-number');
            const totalPages = document.getElementById('total-pages');
            const navbar = document.getElementById('navbar');
            const footer = document.getElementById('footer');

            totalPages.textContent = chapterImages.length;

            let currentPage = 1;
            let navbarVisible = true;
            let prevScrollPos = window.pageYOffset;

            window.addEventListener('scroll', () => {
                const currentScrollPos = window.pageYOffset;

                if (currentScrollPos < prevScrollPos) {
                    navbar.classList.remove('hidden');
                    footer.classList.remove('hidden');
                    navbar.classList.remove('active');
                    footer.classList.remove('active');
                    navbarVisible = true;
                } else {
                    navbar.classList.add('active');
                    footer.classList.add('active');

                    setTimeout(() => {
                        navbar.classList.add('hidden');
                        footer.classList.add('hidden');
                    }, 300);
                    navbarVisible = false;
                }

                prevScrollPos = currentScrollPos;

                // Hitung halaman yang sedang aktif
                let activeIndex = 0;
                chapterImages.forEach((image, index) => {
                    const imageTop = image.offsetTop;
                    if (currentScrollPos >= imageTop) {
                        activeIndex = index;
                    }
                });

                currentPage = activeIndex + 1;
                currentPageNumber.textContent = currentPage;

                // Jika di halaman terakhir, tampilkan navbar dan footer permanen
                if (currentPage === chapterImages.length) {
                    navbar.classList.remove('hidden');
                    footer.classList.remove('hidden');
                    navbar.classList.remove('active');
                    footer.classList.remove('active');
                    navbarVisible = true;
                }
            });
        });
    </script>
    <script>
        document.onkeydown = function(e) {
            return false;
        }
    </script>
@endsection
