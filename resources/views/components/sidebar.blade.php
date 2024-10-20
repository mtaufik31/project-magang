<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-[#fec46d] border-r border-black sm:translate-x-0 "
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto border-black bg-[#fec46d] ">
        <ul class="space-y-1 font-medium">
            <h2 class="pt-3 text-gray-500">Menu</h2>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 rounded-lg group
    {{ request()->routeIs('dashboard') ? 'bg-[rgb(255,153,0,0.6)] text-black' : 'text-gray-400' }}">
                    <svg class="w-5 h-5 transition duration-150
        {{ request()->routeIs('dashboard') ? 'text-black' : 'text-gray-400' }} group-hover:text-black"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path
                            d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path
                            d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>

                <a href="{{ route('home') }}"
                    class="flex items-center p-2 text-gray-400 rounded-lg group hover:text-black duration-150 {{ request()->routeIs('home') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-2 rounded-lg' : '' }}">
                    <svg class="flex-shrink-0 h-6 w-5 text-gray-400 transition duration-150  group-hover:text-gray-900"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                </a>
            </li>
            <h2 class="pt-3 text-gray-500">Manga</h2>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-400 hover:text-black duration-150  rounded-lg group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Manga List</span>
                </a>
                <a href="#"
                    class="flex items-center p-2 text-gray-400 hover:text-black duration-150  rounded-lg group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-400 transition duration-75  group-hover:text-gray-900 "
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Chapter</span>
                </a>
            </li>
            <h2 class="pt-3 text-gray-500">Blog</h2>
            <li>
                <a href="{{ route('home') }}"
                    class="flex items-center p-2 text-gray-400 rounded-lg group hover:text-black duration-150 {{ request()->routeIs('home') ? 'bg-[rgb(255,153,0,0.6)] px-4 py-2 rounded-lg' : '' }}">
                    <svg class="flex-shrink-0 h-6 w-5 text-gray-400 transition duration-150  group-hover:text-gray-900 {{ request()->routeIs('dashboard') ? 'text-black' : 'text-gray-400' }} group-hover:text-black"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Post</span>
                </a>
            </li>
            <h2 class="pt-3 text-gray-500">User</h2>
            <li>
                <a href="{{ route('users') }}"
                    class="flex items-center p-2 text-gray-400 rounded-lg group hover:text-black duration-150 {{ request()->routeIs('users') ? 'bg-[rgb(255,153,0,0.6)] text-black px-4 py-2 rounded-lg' : '' }}">
                    <svg class="flex-shrink-0 h-6 w-5 text-gray-400 transition duration-150 group-hover:text-gray-900 {{ request()->routeIs('users') ? 'text-black' : 'text-gray-400' }}"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path
                            d="M12 12c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm0 2c-3.33 0-10 1.67-10 5v2h20v-2c0-3.33-6.67-5-10-5z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">User List</span>
                </a>

            </li>
        </ul>
        <ul class="font-medium absolute bottom-5">
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="flex items-center p-2 hover:text-red-500 duration-150 text-gray-400 rounded-lg  group">
                    <svg class="flex-shrink-0 h-6 w-5 text-gray-400 transition duration-150  group-hover:text-gray-900"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
