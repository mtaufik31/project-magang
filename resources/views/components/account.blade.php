<div x-data="{ isOpen: false }" class="relative text-left md:px-5">
    <div>
        <button type="button" @click="isOpen = !isOpen"
            class="inline-flex w-full self-center justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold   text-gray-900  "
            id="menu-button" aria-expanded="true" aria-haspopup="true"> <i class="fa-solid fa-circle-user self-center text-2xl hover:text-[#ff9900]"></i>
            @if (Auth::check())
            <span class="md:block hidden text-[16px]">
                {{ Auth::user()->name }}
            </span>
            @endif
        </button>
    </div>

    <!-- Dropdown menu -->
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.away="isOpen = false"
        class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
        <div class="py-1" role="none">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200" role="menuitem">Profile</a>
            @if (Auth::check())
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                    Login
                </a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">
                    Register
                </a>
            @endif
        </div>
    </div>
</div>
