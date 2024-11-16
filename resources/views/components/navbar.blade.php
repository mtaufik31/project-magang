<nav class="md:bg-transparent  font-poppins transition-all">
     <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto xl:p-4 py-4 px-6">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse hover:scale-105 duration-100 fill-black">
             <img width="180px" src="{{ asset('asset/img/manga.png') }}" alt="">
        </a>
        <div class="flex md:order-2 items-center">

            <div class="hidden md:block">
                <x-searchbar></x-searchbar>
            </div>
            <x-account></x-account>

            <!-- Include Alpine.js -->
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

            <button data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden focus:outline-none"
                    aria-controls="navbar-search" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 transition-all duration-300"
        id="navbar-search">
        <div class="block md:hidden">
            <x-searchbar></x-searchbar>
        </div>
             <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white md:hidden">
                <li><a href="{{ route('home') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Home</a></li>
                <li><a href="{{ route('list') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">List</a></li>
                <li><a href="{{ route('blogs') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Blogs</a></li>
                <li><a href="{{ route('join') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">Join Us</a></li>
                <li><a href="{{ route('faq') }}" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 hover:text-[#FF9900] md:hover:bg-transparent md:hover:text-blue-700 md:p-0">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>
