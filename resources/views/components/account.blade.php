<div class="relative text-left md:px-5">
    <div>
        <button id="menu-button" type="button"
            class="inline-flex w-full self-center justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 hover:text-orange-400 duration-150"
            aria-expanded="false" aria-haspopup="true" onclick="toggleDropdown()">
            <i class="fa-solid fa-circle-user self-center text-2xl"></i>
            @if (Auth::check())
                <span class="md:block hidden text-[16px] self-center">{{ Auth::user()->name }}</span>
            @endif
        </button>
    </div>

    <!-- Dropdown menu -->
    <div id="dropdown-menu"
        class="hidden absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button">
        <div class="py-1" role="none">

            @if (Auth::check())
                @if (Auth::user()->role === 'staff' || Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Dashboard</a>
                @endif
                {{-- <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200"
                role="menuitem">Profile</a> --}}
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Login</a>
                <a href="{{ route('register') }}"
                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200">Register</a>
            @endif
        </div>
    </div>
</div>

<script>
    const menuButton = document.getElementById('menu-button');
    const dropdownMenu = document.getElementById('dropdown-menu');

    function toggleDropdown() {
        const isHidden = dropdownMenu.classList.contains('hidden');
        if (isHidden) {
            dropdownMenu.classList.remove('hidden');
            dropdownMenu.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdownMenu.classList.remove('opacity-0', 'scale-95');
                dropdownMenu.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            dropdownMenu.classList.remove('opacity-100', 'scale-100');
            dropdownMenu.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdownMenu.classList.add('hidden');
            }, 100);
        }
    }

    // Close the dropdown when clicking outside
    document.addEventListener('click', (event) => {
        if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownMenu.classList.remove('opacity-100', 'scale-100');
        }
    });
</script>
