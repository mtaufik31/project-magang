<nav class="md:bg- bg-accent bg-[rgb(255,153,0,0.7)] md:bg-transparent font-poppins transition-all">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto xl:p-4 py-5 px-6">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-3xl whitespace-nowrap  hover:text-[#FF9900] duration-200">MangaLo!</span>
        </a>
        <div class="flex md:order-2">
            <div class="relative hidden md:block">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search icon</span>
                </div>
                <input type="text" id="search-navbar"
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-[rgb(255,153,0,0.7)]"
                    placeholder="Search...">
            </div>
            <button data-collapse-toggle="navbar-search" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition-all duration-300" id="navbar-search">
            <div class="relative mt-3 md:hidden">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="search-navbar"
                    class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50  dark:border-gray-600 dark:placeholder-gray-400"
                    placeholder="Search...">
            </div>
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white  md:hidden ">
                <li>
                    <a href="{{ route('home') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Home</a>
                </li>
                <li>
                    <a href="{{ route('list') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">List</a>
                </li>
                <li>
                    <a href="{{ route('blogs') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Blogs</a>
                </li>
                <li>
                    <a href="{{ route('join') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Join
                        Us</a>
                </li>
                <li>
                    <a href="{{ route('faq') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">FAQ</a>
                </li>
                <div class="md:hidden pt-2">
                    @if (Auth::check())
                        <!-- Menampilkan nama pengguna dan tombol logout -->
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <button type="button"
                                class="bg-[#FE9800] hover:bg-[rgb(255,153,0,0.7)] duration-200 focus:ring-4 focus:outline-none border border-black focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 text-center">
                                Logout
                            </button>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <!-- Tombol login jika pengguna belum login -->
                        <a href="{{ route('login') }}">
                            <button type="button"
                                class="bg-[#FE9800] hover:bg-[rgb(255,153,0,0.7)] duration-200 focus:ring-4 focus:outline-none border border-black focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 text-center">
                                Login
                            </button>
                        </a>
                        <a href="{{ route('register') }}">
                            <button type="button"
                                class="bg-[#FE9800] hover:bg-[rgb(255,153,0,0.7)] duration-200 focus:ring-4 focus:outline-none border border-black focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                                Register
                            </button>
                        </a>
                    @endif
                </div>
            </ul>
        </div>
    </div>
</nav>
