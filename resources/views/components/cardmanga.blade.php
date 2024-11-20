<a href="{{ route('manga', $id) }}" class="block text-center font-fira">
    <div class="w-[140px] h-[230px] mx-auto relative group rounded-b-md box-manga mb-1">
        <span
            class="absolute top-0 left-0 text-white text-[8px] font-medium capitalize px-2 py-1 rounded-br-md z-[2] font-inter
            {{ $status === 'ongoing' ? 'bg-orange-600' : ($status === 'complete' ? 'bg-green-600' : 'bg-gray-400') }}">
            {{ $status }}
        </span>
        <img class="relative object-cover w-full h-full transition-shadow duration-300 rounded-md shadow-none cursor-pointer z-[1] hover:shadow-lg hover:shadow-gray-500" loading="lazy" src="{{ $image }}"
            alt="Jujutsu Kaisen">
        <span class="absolute bottom-0 left-0 w-full px-2 pb-3 text-white transition-all duration-300 manga z-[1]">
            <h3
                class="mt-2 font-semibold text-[14px] group-hover:text-orange-400 text-start group-hover:-translate-y-3 transition-all duration-300">
                {{ Str::limit($title, 15, '...') }}</h3>
            <h5
                class="font-light transition-all duration-300 text-[10px] text-start group-hover:-translate-y-3 uppercase">
                {{ Str::limit($author, 22, '...') }}</h5>
        </span>
    </div>
    <div
        class="px-2 pb-3 border-t border-black rounded-b-lg text-start bg-gray-50 hover:border-orange-300 hover:bg-gradient-to-t hover:to-white hover:from-orange-400">
        <p class="">#266</p>
        <p class="text-[12px] text-gray-600">
            {!! Str::limit($description, 16, "...") !!}
        </p>
    </div>
</a>
