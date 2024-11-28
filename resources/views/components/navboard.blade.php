<div
    class="bg-white h-20 top-0 w-full flex items-center  border-b border-gray-300 justify-between shadow-sm transition-all duration-300 " >
    <button id="menuButton" class="text-2xl px-8">
        <div class="font-inter text-2xl"> <i class="fa-solid fa-bars hover:text-[#ff9900]"></i>   Welcome, {{ Auth::user()->name }}!</div>
    </button>

    <x-account></x-account>
</div>
