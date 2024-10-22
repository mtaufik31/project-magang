<div
    class="bg-white fixed top-0 w-full py-4 flex items-center  border-b border-gray-300 shadow-sm transition-all duration-300">
    <button id="menuButton" class="text-2xl py-2 px-8">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="font-fira text-2xl ">Dashboard {{ Auth::user()->role }}</div>

    <x-account></x-account>
</div>
