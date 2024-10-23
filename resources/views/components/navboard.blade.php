<div
    class="bg-white  fixed top-0 w-full py-4 flex items-center  border-b border-gray-300 justify-between shadow-sm transition-all duration-300 " >
    <button id="menuButton" class="text-2xl py-2 px-8">
        <div class="font-fira text-2xl"> <i class="fa-solid fa-bars hover:text-[#ff9900]"></i>   Dashboard {{ Auth::user()->role }}</div>
    </button>

    <x-account></x-account>
</div>
