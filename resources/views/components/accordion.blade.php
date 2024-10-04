<div class="py-2">
    <h2>
        <button id="accordion-btn-{{ $id }}" type="button" class="flex items-center justify-between w-full text-left font-semibold py-2">
            <span>{{ $title }}</span>
            <svg class="fill-orange-500 shrink-0 ml-8" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                <rect id="rect-1-{{ $id }}" y="7" width="16" height="2" rx="1" class="transform origin-center transition duration-200 ease-out" />
                <rect id="rect-2-{{ $id }}" y="7" width="16" height="2" rx="1" class="transform origin-center rotate-90 transition duration-200 ease-out" />
            </svg>
        </button>
    </h2>
    <div id="accordion-content-{{ $id }}" role="region" class="text-sm text-slate-600 overflow-hidden transition-all ease-in-out duration-300" style="max-height: 0;">
        <p class="pb-3">
            {{ $slot }}
        </p>
    </div>
</div>

