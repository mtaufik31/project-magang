<a href="{{ route('blog', $id) }}" class="min-w-[200px]  text-start block">
    <div class="w-[250px] h-[160px] mx-auto">
        <img class="w-full h-full object-cover rounded-lg" src="storage/{{ $image }}" alt="Jujutsu Kaisen">
    </div>
    <div class="w-[250px]   ">
        <h3 class="font-semibold mt-2 hover:text-orange-400 duration-150 ">{{ $title }}</h3>
        <p class="text-gray-500 text-[14px]">{{ Str::limit($description, 37) }}</p>
        <p class="text-[12px]"><span class=" italic">{{ $name }}</span> </p>
    </div>
</a>
