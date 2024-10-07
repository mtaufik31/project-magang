<nav class="bg-[rgb(255,153,0,0.7)] hidden md:block">
    <div class="max-w-screen-xl px-5 mx-auto ">
        <div class="flex font-inter items-center justify-between">
            <ul class="flex flex-row font-fira mt-0 gap-10 rtl:space-x-reverse text-lg items-center ">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-gray-900 flex flex-col items-center group justify-center {{ request()->routeIs('home') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-3 rounded-lg' : '' }} ">
                        Home
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('list') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('list') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-3 rounded-lg' : '' }}">
                        List
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('blog') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-3 rounded-lg' : '' }}">
                        Blog
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">
                    </a>
                </li>
                <li>
                    <a href="{{ route('join') }}"
                        class="text-gray-900 group justify-center flex flex-col items-center {{ request()->routeIs('join') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-3 rounded-lg' : '' }}">
                        Join Us
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">

                    </a>
                </li>
                <li>
                    <a href="{{ route('faq') }}"
                        class="text-gray-900 group justify-center flex flex-col items- {{ request()->routeIs('faq') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-3 rounded-lg' : '' }}">
                        FAQ
                        <hr
                            class="w-0 border-transparent transition-all duration-300 group-hover:w-full group-hover:border-black">

                    </a>
                </li>
            </ul>

            <div class="flex space-x-4 ml-auto">
                <a href="{{ route('login') }}">
                    <button type="button"
                        class=" bg-[#FE9800] hover:bg-[rgb(255,153,0,0.7)] duration-200 focus:ring-4 focus:outline-none border border-black focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2 text-center ">
                        Login
                    </button>
                </a>
                <a href="{{ route('register') }}">
                    <button type="button"
                        class=" bg-[#FE9800] hover:bg-[rgb(255,153,0,0.7)] duration-200 focus:ring-4 focus:outline-none border border-black focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center">
                        Register
                    </button>
                </a>
            </div>
        </div>
    </div>
</nav>