<nav class="fixed top-0 z-50 w-full bg-[#fec46d] border-b border-black">
    <div class="px-4 py-4 lg:px-5 lg:pl-3 shadow-md">
        <div class="flex items-center justify-between ">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar" type="button"
                    class="md:hidden  items-center p-2 text-sm text-gray-400 rounded-lg  hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200   ">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex ms-2 md:me-24">
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl duration-200 hover:text-white whitespace-nowrap">DashBoard</span>
                </a>
            </div>
        </div>
    </div>
</nav>
