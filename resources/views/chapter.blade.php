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
            transform: translateY(180%);
        }

        .footer {
            transform: translateY(0);
            transition: transform 0.3s ease-in-out;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(5px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Teks yang melayang */
        #terbang {
            animation: float 1s ease-in-out infinite;
        }

        #terbang::after {
            content: "";
            position: absolute;
            bottom: -11px;
            left: 43%;
            border-width: 6px;
            border-style: solid;
            border-color: transparent transparent #febf8c transparent;
            rotate: 180deg;
        }

        #vertical-alert {
            animation: fadeInOut 3.5s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* Animasi untuk arrow up dan down */
        #arrow-up {
            animation: slideUp 2s infinite;
        }

        @keyframes slideUp {
            0% {
                transform: translateY(5px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(5px);
            }
        }

        #arrow-down {
            animation: slideDown 2s infinite;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-5px);
            }

            50% {
                transform: translateY(10px);
            }

            100% {
                transform: translateY(-5px);
            }
        }
    </style>

    <div id="#" class="">.</div>
    <div id="vertical-alert" class="fixed inset-0 flex items-center justify-center -z-0">
        <div
            class="py-10 px-16 border-white border bg-black  bg-opacity-80 rounded-lg flex flex-col items-center justify-center shadow-lg">
            <i id="arrow-up" class="fa-solid fa-angles-up text-white text-4xl mb-2"></i>
            <div class="text-white text-xl font-semibold py-2 ">Vertical</div>
            <i id="arrow-down" class="fa-solid fa-angles-down text-white text-4xl mt-2"></i>
        </div>
    </div>


    <div id="navbar"
        class="navbar fixed top-0 left-0 w-full border-t-2 md:border-t-8 border-orange-500 bg-gradient-to-t from-transparent to-black text-white p-4 z-50 ">
        <div class="container mx-auto flex justify-between md:justify-between items-center gap-8 md:px-5">
            <a href="{{ route('home') }}"
                class="flex items-center space-x-3 rtl:space-x-reverse hover:scale-105 duration-100 w-[170px] md:w-[280px]">
                <img width="" loading="lazy" src="{{ asset('asset/img/manga.png') }}" alt="">
            </a>
            <div class="">
                <a href="{{ route('manga', $chapter->manga->id) }}"
                    class="text-[28px] font-fira hover:text-orange-500 duration-200 font-medium hidden md:block ">{{ Str::limit($chapter->manga->title, 20, '...') }}
                </a>
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
        <div
            class="bg-gradient-to-t from-orange-600 via-black to-orange-600   bg-pos-100 transition-all group-hover:bg-gradient-to-t ease-in-out bg-pos rounded-xl w-[400px] mx-auto px-6 py-10 space-y-4 my-36 cursor-pointer relative border group bg-size-200 hover:bg-pos-0 ">
            @if ($nextChapter)
                <p id="terbang"
                    class="flex justify-center w-36 py-2 mx-auto rounded-full text-black bg-gradient-to-r from-orange-500 to-yellow-50 font-medium gap-3 text-[12px] absolute top-4 right-32">
                    <i class="fa-solid fa-forward self-center"></i>
                    Next Chapter
                </p>
                <a href="{{ route('chapter', ['id' => $nextChapter->id]) }}"
                    class="flex justify-center items-center duration-200">
                    <h2
                        class="text-xl font-medium border px-12 mt-5 py-2.5 text-white duration-200 hover:shadow-xl hover:bg-orange-600 rounded-md hover:border-orange-600 tracking-widest hover:tracking-normal hover:text-[18px] truncate ">
                        {{ $nextChapter->chapter_title }}
                    </h2>
                </a>
                <div class="flex justify-center">
                    <img src="{{ asset('storage/' . $nextChapter->cover_image) }}" alt="Next Chapter"
                        class="w-60 h-32 grayscale group-hover:grayscale-0 duration-200 object-cover rounded-xl">
                </div>
                <a href="{{ route('manga', ['id' => $chapter->manga_id]) }}"
                    class="flex justify-center items-center duration-200">
                    <h2
                        class="text-xl font-medium border px-12 py-2.5 text-white duration-200 hover:shadow-xl hover:bg-orange-600 rounded-md hover:border-orange-600">
                        Back to Manga
                    </h2>
                </a>
                <a href="{{ route('home') }}"
                        class="flex absolute items-center top-80 left-40 hover:-translate-y-1 duration-100 w-[90px] md:w-[90px]">
                        <img width="" loading="lazy" src="{{ asset('asset/img/MangaLo_logo_no_background-removebg-preview.png') }}" alt="">
                    </a>
            @else
                <p
                    class="flex justify-center text-yellow-400 font-bold text-[40px] pb-3 group-hover:text-white duration-300 group-hover:drop-shadow-xl truncate">
                    {{ Str::limit($chapter->manga->title, 15, '...') }}</p>
                <a href="{{ route('manga', ['id' => $chapter->manga_id]) }}"
                    class=" justify-center items-center duration-300">
                    <div class="items-center justify-items-center">
                        <img src="{{ asset('storage/' . $chapter->manga->image) }}" alt="Next Chapter"
                            class="w-42 grayscale group-hover:grayscale-0 duration-300 h-60 object-cover rounded-xl">
                        <p
                            class="bg-transparent text-white px-8 py-2.5  rounded-md my-3 group-hover:bg-orange-600 font-medium group-hover:border-orange-600 duration-300 border border-white tracking-widest group-hover:tracking-tight hover:shadow-2xl  ">
                            Back To Manga
                        </p>
                    </div>
                    <a href="{{ route('home') }}"
                        class="flex absolute items-center top-96 left-40 hover:translate-y-4 duration-100 w-[90px] md:w-[90px]">
                        <img width="" loading="lazy" src="{{ asset('asset/img/MangaLo_logo_no_background-removebg-preview.png') }}" alt="">
                    </a>
            @endif
        </div>
    </div>


    <div id="footer"
        class="fixed footer bottom-0 left-0 w-full border-b-2 md:border-b-8 border-orange-500 bg-gradient-to-b from-transparent  to-black text-white p-4 z-50">
        <div class="">
            <div id="current-page" class="fixed bottom-4 left-4 bg-black/80 text-white px-4 py-2 rounded-md z-50">
                Halaman: <span id="current-number">1</span>/<span class="text-slate-400"
                    id="total-pages">{{ count($images) }}</span>
            </div>
        </div>
    </div>
    <div id="terbang" class="fixed bottom-4 right-4 bg-transparent text-white px-4 py-2 rounded-md z-50 after:hidden">
        <a href="#">
            <i
                class="fa-solid fa-arrow-up-long hover:bg-orange-400 duration-200 rounded-full bg-orange-500 p-3 text-black outline-white"></i>
        </a>
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
            }, 3000);
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

            // Set total halaman
            totalPages.textContent = chapterImages.length;

            window.addEventListener('scroll', () => {
                const currentScrollPos = window.pageYOffset;

                // Hitung halaman yang sedang aktif
                let activeIndex = 0;
                chapterImages.forEach((image, index) => {
                    const imageTop = image.offsetTop;
                    if (currentScrollPos >= imageTop) {
                        activeIndex = index;
                    }
                });

                // Update nomor halaman saat ini
                const currentPage = activeIndex + 1;
                currentPageNumber.textContent = currentPage;
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alertElement = document.getElementById('vertical-alert');

            // Set timer to remove the overlay after 4 seconds
            setTimeout(() => {
                alertElement.style.display = 'none';
            }, 3000);
        });
    </script>
    {{-- <script>
        document.onkeydown = function(e) {
            return false;
        }
    </script> --}}
@endsection
