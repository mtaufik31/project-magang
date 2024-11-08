<div class="p-4 overflow-hidden text-white rounded-lg shadow-lg swiper-slide relative">
    <!-- Background Image with Blur and Dark Overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-[url('/public/asset/img/postspy.jpg')] filter blur-sm"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-black/70 to-black/80 opacity-80"></div>

    <div class="relative flex">
        <!-- Manga Cover with Subtle Shadow -->
        <div class="relative w-[140px] h-[230px] flex-shrink-0 rounded-lg overflow-hidden shadow-lg">
            <img src="{{ asset('asset/img/postspy.jpg') }}" alt="Manga Cover"
                class="object-cover w-full h-full">
        </div>

        <!-- Manga Details -->
        <div class="pl-5">
            <h2 class="text-2xl font-fira font-extrabold leading-tight tracking-wide">Spy x Family</h2>
            <p class="mt-2 text-yellow-400 text-sm uppercase tracking-wide">Genres</p>
            <p class="flex flex-wrap gap-2 mt-1 mb-3 text-sm">
                <a class="hover:text-orange-400 transition duration-150" href="">Action, </a>
                <a class="hover:text-orange-400 transition duration-150" href="">Comedy, </a>
                <a class="hover:text-orange-400 transition duration-150" href="">Slice Of Life, </a>
                <a class="hover:text-orange-400 transition duration-150" href="">Drama, </a>
                <a class="hover:text-orange-400 transition duration-150" href="">Fantasy, </a>
            </p>

            <!-- Synopsis with Improved Spacing and Font Size -->
            <div class="hidden mt-3 sm:block">
                <p class="font-semibold text-sm">Synopsis</p>
                <p class="mt-2 text-gray-200 text-sm leading-relaxed">
                    {{ Str::limit(
                        'The master spy codenamed <Twilight> has spent most of his life on undercover missions, all for the dream of a better world. Yet one day he receives a particularly difficult order from command. For his mission, he must form a temporary family and start a new life?! A Spy/Action/Comedy manga about a one-of-a-kind family!',
                        180,
                        '...'
                    ) }}
                </p>
            </div>
            <p class="block mt-2 text-sm font-medium sm:hidden">Status: Ongoing</p>

            <!-- Updated Button with Enhanced Hover Effects -->
            <button
                class="relative h-10 w-40 mt-4 border border-orange-500 text-orange-500 font-semibold bg-transparent rounded transition overflow-hidden group">
                <span class="absolute inset-0 w-full h-full bg-orange-500 group-hover:w-full transition-all duration-300 ease-in-out transform origin-left scale-x-0 group-hover:scale-x-100"></span>
                <span class="relative z-10 group-hover:text-white">Read More</span>
            </button>
        </div>
    </div>
</div>

