<!-- Sidebar -->
<nav id="sidebar" class="bg-white w-[37vh] h-[100vh] fixed z-10 font-sans px-2 border-r border-gray-300 shadow-md transition-transform transform duration-500 -translate-x-full md:translate-x-0">
    <div class="py-5">
        <!-- Sidebar Title -->
        <h1 class="text-3xl text-center font-poppins hover:text-orange-400">
            MangaLo
        </h1>
    </div>
    <div class="px-4">
        <!-- Menu Section -->
        <div class="py-3">
            <p class="mb-2 text-xl font-semibold">Menu</p>
            <ul class="">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('dashboard') ? 'text-orange-400  hover:text-gray-800 translate-x-1' : '' }}">
                        <i class="mr-2 fa-brands fa-dropbox"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="flex items-center p-2 text-gray-700 transition-all duration-200 rounded-md hover:text-orange-400 hover:bg-gray-100 hover:translate-x-1 ">
                        <i class="mr-2 fa-solid fa-house"></i> Home
                    </a>
                </li>
            </ul>
        </div>
        <!-- Manga Section -->
        <div class="">
            <div class="">
                <x-accordion title="Post" id="1" :isSidebar="true">
                    <ul class="">
                        <li>
                            <a href="{{ route('List Manga') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List Manga') ? 'text-orange-400 translate-x-1 hover:text-gray-900' : '' }} ">
                                <i class="mr-2 fa-solid fa-book"></i>Manga List
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-2 text-gray-700 transition-all duration-200 rounded-md hover:text-orange-400 hover:bg-gray-100 hover:translate-x-1 ">
                                <i class="mr-2 fa-solid fa-rectangle-list"></i> Chapter
                            </a>
                        </li>
                    </ul>
                </x-accordion>
            </div>

        </div>
        <!-- Manga Section -->
        <div class="py-3">
            <p class="mb-2 text-xl font-semibold">Blog</p>
            <ul class="">
                <li>
                    <a href="{{ route('List Blogs') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List Blogs') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="mr-2 fa-solid fa-book"></i> Blog List
                    </a>
                </li>
                <li>
                    <a href="{{ route('Create blog') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('Create blog') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="mr-2 fa-solid fa-plus"></i>  Add Blog
                    </a>
                </li>
            </ul>
        </div>
        <!-- Manga Section -->
        <div class="py-3">
            <p class="mb-2 text-xl font-semibold">Staff Data</p>
            <ul class="">
                <li>
                    <a href="{{ route('List.Staff') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('List.Staff') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="mr-2 fa-solid fa-address-card"></i> List User
                    </a>
                </li>
                <li>
                    <a href="{{ route('Staff.create') }}" class="flex items-center p-2 rounded-md text-gray-700 hover:text-orange-400 hover:bg-gray-100 transition-all hover:translate-x-1 duration-200  {{ request()->routeIs('Staff.create') ? 'text-orange-400 translate-x-1 hover:text-gray-800' : '' }}">
                        <i class="mr-3 fa-solid fa-plus"></i> Add User
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar -->

<!-- Overlay for Sidebar -->
<div id="overlay" class="fixed inset-0 hidden bg-black opacity-50 z-5 md:hidden"></div>

<!-- JavaScript for Toggling Sidebar -->

