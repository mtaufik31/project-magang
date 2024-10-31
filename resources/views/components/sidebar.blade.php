<!-- Sidebar -->
<nav id="sidebar" class="bg-white w-[37vh] h-[100vh] fixed z-10 font-sans border-r border-gray-300 shadow-md transition-transform transform duration-500 -translate-x-full md:translate-x-0">
    <div class="py-5">
        <!-- Sidebar Title -->
        <h1 class="text-3xl text-center font-poppins hover:text-orange-400">
            MangaLo
        </h1>
    </div>
    <div class="px-4">
        <!-- Menu Section -->
        <div class="py-3">
            <p class="text-xl font-semibold mb-2">Menu</p>
            <ul class="">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('dashboard') ? 'text-orange-400 translate-x-1 hover:text-gray-800 translate-x-1' : '' }}">
                        <i class="fa-brands fa-dropbox mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200 ">
                        <i class="fa-solid fa-house mr-2"></i> Home
                    </a>
                </li>
            </ul>
        </div>
        <!-- Manga Section -->
        <div class="py-3">
            <p class="text-xl font-semibold mb-2">Manga</p>
            <ul class="">
                <li>
                    <a href="{{ route('List Manga') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List Manga') ? 'text-orange-400 translate-x-1 hover:text-gray-900' : '' }} ">
                        <i class="fa-solid fa-book mr-2"></i>Manga List
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200 ">
                        <i class="fa-solid fa-rectangle-list mr-2"></i> Chapter
                    </a>
                </li>
            </ul>
        </div>
        <!-- Manga Section -->
        <div class="py-3">
            <p class="text-xl font-semibold mb-2">Blog</p>
            <ul class="">
                <li>
                    <a href="{{ route('List Blogs') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List Blogs') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="fa-solid fa-book mr-2"></i> Blog List
                    </a>
                </li>
                <li>
                    <a href="{{ route('Create blog') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('Create blog') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="fa-solid fa-plus mr-2"></i>  Add Blog
                    </a>
                </li>
            </ul>
        </div>
        <!-- Manga Section -->
        <div class="py-3">
            <p class="text-xl font-semibold mb-2">Staff Data</p>
            <ul class="">
                <li>
                    <a href="{{ route('List.Staff') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List.Staff') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="fa-solid fa-address-card mr-2"></i> List User
                    </a>
                </li>
                <li>
                    <a href="{{ route('Staff.create') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('Staff.create') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="fa-solid fa-plus mr-3"></i> Add User
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar -->

<!-- Overlay for Sidebar -->
<div id="overlay" class="fixed inset-0 bg-black opacity-50 z-5 hidden md:hidden"></div>

<!-- JavaScript for Toggling Sidebar -->

