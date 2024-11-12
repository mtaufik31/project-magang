<div class="px-4 py-4 md:py-8 overflow-hidden text-white shadow-lg swiper-slide relative cursor-grab">
    <!-- Background Image with Darker Gradient -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-70"
        style="background-image: url('{{ asset('storage/' . $image) }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-orange-400/60 to-orange-900/85"></div>



    <!-- Content Container -->
    <div class="relative z-10 flex md:flex xl:ps-8 px-3">
        <!-- Image displayed only on mobile, hidden on md and larger screens -->
        <div class="flex-shrink-0 mb-4 me-5 md:hidden">
            <img class="w-[130px] h-[200px] shadow-xl" src="{{ asset('storage/' . $image) }}" alt="Manga Cover">
        </div>

        <!-- Content Section -->
        <div class="md:ml-6">
            <!-- Chapter Number -->
            <h3 class="text-lg md:text-[20px] font-bold mb-2 md:block hidden">Chapter: 200</h3>

            <!-- Title -->
            <h2 class="text-2xl md:text-3xl font-poppins font-bold mb-4">{{ $title }}</h2>

            <!-- Description -->
            <p class="text-gray-200 text-sm md:text-[14px] mb-6 md:w-[calc(55%)]">{{ $description }}</p>

            <!-- Genre Tags -->
            <div class="space-x-1 flex-wrap  mb-6 hidden md:block">
                @foreach ($genres as $genre)
                    <a href="{{ route('genre.sort', $genre->id) }}">
                        <span class="px-3 md:px-4 py-1 text-xs md:text-sm rounded-md bg-transparent cursor-pointer hover:bg-orange-600/50 border hover:border-orange-700">
                            {{ $genre->title }}
                        </span>
                    </a>
                @endforeach
            </div>

            <!-- Read Button -->
            <a href="{{ route('manga', $id) }}">
                <button class="relative flex h-12 md:h-[50px] w-36 md:w-40 items-center justify-center overflow-hidden bg-transparent border hover:border-black hover:text-black text-white shadow-2xl transition-all before:absolute before:h-0 before:w-0 before:rounded-full before:bg-orange-600 before:duration-500 before:ease-out hover:shadow-orange-600 hover:before:h-56 hover:before:w-56">
                    <span class="relative z-10">Read More &raquo;</span>
                </button>
            </a>
        </div>
    </div>



    <!-- Manga Cover - Positioned below text on mobile -->
    <div
        class="absolute md:right-0 xl:right-10 top-1/2 transform md:-translate-y-1/2 md:w-[240px] xl:w-[280px] w-[140px] h-auto mt-6 md:mt-0 mx-auto md:mx-0 xl:-skew-x-6">
        <img src="{{ 'storage/' . $image }}" alt="Manga Cover"
            class="w-full h-full hidden md:block object-contain md:object-right">
    </div>
</div>
