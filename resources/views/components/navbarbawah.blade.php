<nav class="bg-[rgb(255,153,0,0.7)] hidden md:block transition-all">
    <div class="max-w-screen-xl px-5 mx-auto ">
        <div class="flex font-inter items-center justify-between">
            <ul class="flex flex-row font-fira mt-0 gap-10 rtl:space-x-reverse text-lg items-center ">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-gray-900 flex flex-col items-center group justify-center {{ request()->routeIs('home') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }} {{ request()->routeIs('search.manga') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }} ">
                        Home
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('list') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('list') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }} {{ request()->routeIs('manga') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }} ">
                        List
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('blogs') ? 'bg-[#ff9900] px-4 py-3 text-white rounded-lg' : '' }} {{ request()->routeIs('blog') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }}">
                        Blogs
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('join') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('join') ? 'bg-[#ff9900] px-4 py-3 text-white  rounded-lg' : '' }}">
                        Join Us
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">

                    </a>
                </li>
                <li>
                    <a href="{{ route('faq') }}"
                        class="text-gray-900 group justify-center flex flex-col items- {{ request()->routeIs('faq') ? 'bg-[#ff9900] px-4 py-3 text-white rounded-lg' : '' }}">
                        FAQ
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">

                    </a>
                </li>
            </ul>

            {{-- <div class="flex space-x-4 ml-auto">
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
            </div> --}}
        </div>
    </div>
</nav>
