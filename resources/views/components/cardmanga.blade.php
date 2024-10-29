<a href="{{ route('manga') }}" class="block text-center font-fira">
    <div class="w-[140px] h-[230px] mx-auto relative group rounded-b-md box-manga mb-1">
        <img class="relative object-cover w-full h-full transition-shadow duration-300 rounded-md shadow-none cursor-pointer z-[1] hover:shadow-lg hover:shadow-gray-500 "src="{{ asset('asset/img/postjjk.jpg') }}"
            alt="Jujutsu Kaisen">
        <span class=" absolute bottom-0 left-0 w-full px-2 pb-3 text-white transition-all duration-300 manga z-[1]">
            <h3
                class="mt-2  font-semibold text-[14px] group-hover:text-orange-400 text-start group-hover:-translate-y-2 transition-all duration-300">
                {{ Str::limit('Jujutsu Kaisen', 15, '...') }}</h3>
            <h5
                class="  font-light transition-all duration-300 text-[10px] text-start group-hover:-translate-y-2 uppercase">
                {{ Str::limit('gege akutami & aka akasaka', 22, '...') }}</h5>
        </span>
    </div>
    <div class="px-2 pb-3 border-t border-black rounded-b-lg text-start bg-gray-50 hover:border-orange-300 hover:bg-gradient-to-t hover:to-white hover:from-orange-400  ">

        <p class="">#266</p>
        <p class="text-[12px] text-gray-600">{{ Str::limit('266: Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate,
            perspiciatis!', 17, '...') }}</p>
    </div>
</a>
