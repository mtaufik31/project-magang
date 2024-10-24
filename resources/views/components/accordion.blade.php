<div class="py-3 mt-2 bg-[#fec46d] rounded-xl hover:text-white hover:bg-[rgba(255,153,0,0.9)] duration-150">
    <h2>
        <button id="accordion-btn-{{ $id }}" type="button" class="flex items-center justify-between w-full text-left font-bold font-poppins py-2 px-5 duration-150 ">
            <span class="">{{ $title }}</span>
            <svg class="fill-black shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                <rect id="rect-1-{{ $id }}" y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" />
                <rect id="rect-2-{{ $id }}" y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" />
            </svg>
        </button>
    </h2>
    <div id="accordion-content-{{ $id }}" role="region" class="text-sm text-slate-600 overflow-hidden transition-all ease-in-out duration-300" style="max-height: 0;">
        <p class="pb-3 px-5 text-black font-semibold">
            {{ $slot }}
        </p>
    </div>
</div>

