@if (Auth::check())
    <a href="{{ route('points') }}"
        class="relative inline-flex items-center justify-center me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-orange-500 to-orange-300 group-hover:from-orange-500 group-hover:to-orange-300 hover:text-white    ">
        <span
            class="relative px-2 py-2 flex transition-all ease-in duration-75 bg-slate-50 md:bg-gray-100  rounded-md group-hover:bg-opacity-0 justify-between items-center space-x-7 w-full md:">
            <div class="">
                <i class="fa-solid fa-coins"></i>
                <span>100</span>
            </div>
            <i class="fa-solid fa-plus"></i>
        </span>
    </a>
@endif
