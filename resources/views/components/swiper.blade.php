<div class="px-4 py-14 overflow-hidden text-white shadow-lg swiper-slide relative cursor-grab ">
    <!-- Background Image with Darker Gradient -->
    <div class="absolute inset-0 bg-cover bg-center blur-sm opacity-20"
    style="background-image: url('{{ asset('storage/' . $image) }}');"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-orange-400/60 to-orange-900/85 "></div>

    <!-- Content Container -->
    <div class="relative z-10 xl:ps-8 ">
        <!-- Chapter Number -->
        <h3 class="text-[20px] font-bold mb-2">Chapter: 200</h3>

        <!-- Title -->
        <h2 class="text-3xl font-poppins font-bold mb-4">{{ $title }}</h2>

        <!-- Description -->
        <p class="text-gray-200 text-[14px] mb-6 max-w-2xl truncate">{{ $description }}</p>

        <!-- Genre Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
            @foreach ($genres as $genre)
            <a href="{{ route('genre.sort', $genre->id) }}">
                <span class="px-4 py-2 text-sm rounded-md bg-transparent cursor-pointer hover:bg-orange-600/50 border hover:border-orange-700">
                    {{ $genre->title }}
                </span>
            </a>
            @endforeach
        </div>

        <!-- Read Button -->
        <a href="{{ route('manga', $id) }}"
            class="inline-block px-8 py-3 bg-yellow-400 text-black font-bold rounded hover:bg-yellow-300 transition-colors">
            Mulai Baca →
        </a>
    </div>

    <!-- Manga Cover - Positioned to the right -->
    <div class="absolute md:right-0 xl:right-10 top-1/2 -translate-y-1/2 md:w-[180px] xl:w-[280px] h-auto xl:-skew-x-6">
        <img src="{{ 'storage/' . $image }}"
             alt="Manga Cover"
             class="w-full h-full object-contain">
    </div>
</div>
