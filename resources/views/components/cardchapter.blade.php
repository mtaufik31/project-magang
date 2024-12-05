<a href="{{  $chapterRoute  }}">
    <div
        class="group relative flex items-center justify-between md:px-5 hover:bg-slate-100 duration-200 rounded-md cursor-pointer border-b">
        <div class="flex md:py-2 gap-4 w-full">
            <!-- Gambar -->
            <img src="{{ $cover }}" alt="Chapter Image"
                class="md:w-36 md:h-28 w-24 h-24 object-cover transition-all duration-200 md:group-hover:-translate-x-2">
            <!-- Detail Chapter -->
            <div class="flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold group-hover:text-orange-400">#{{ $number }}</h3>
                    <p class="text-gray-700 font-roboto group-hover:text-gray-900 text-[14px]">{{ $title }}</p>
                </div>
                <p class="text-[12px] font-inter text-gray-500">{{ $date }}</p>
            </div>
        </div>
        <!-- Icon Mata -->
        <i class="fa-regular fa-eye text-gray-400 group-hover:text-orange-400 transition-all duration-200 ml-auto"></i>
    </div>
</a>
