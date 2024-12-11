<div class="rounded-xl duration-150 {{ $isSidebar ? 'hover:text-orange-500' : 'bg-[#fec46d] hover:bg-[rgba(255,153,0,0.9)] hover:text-white py-3 mt-2'}}">
    <h2>
        <button id="accordion-btn-{{ $id }}" type="button" class="flex items-center justify-between w-full {{ $isSidebar ? 'text-xl font-fira font-medium' : 'px-5 font-poppins font-bold' }} py-2 text-left duration-150">
            <span>{{ $title }}</span>
            <svg class="fill-black shrink-0" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                <rect id="rect-1-{{ $id }}" y="7" width="16" height="2" rx="1" class="transition duration-200 ease-out origin-center transform" />
                <rect id="rect-2-{{ $id }}" y="7" width="16" height="2" rx="1" class="transition duration-200 ease-out origin-center transform rotate-90" />
            </svg>
        </button>
    </h2>
    <div
        id="accordion-content-{{ $id }}"
        role="region"
        class="overflow-hidden text-sm transition-all duration-200 ease-in-out text-slate-600"
        style="max-height: {{ request()->routeIs(['List Manga', 'Create manga', 'GenreList']) ? '100vh' : '0' }};"
    >
        <p class="px-5 font-semibold text-black">
            {{ $slot }}
        </p>
    </div>
</div>
