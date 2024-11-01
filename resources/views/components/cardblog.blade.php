<a href="{{ route('blog', $id) }}" class="block min-w-[200px] text-start mb-5">
    <div class="w-[230px] h-[160px] mx-auto">
        <img class="w-full h-full object-cover rounded-lg" src="storage/{{ $image }}" alt="{{ $title }}">
    </div>
    <div class="w-[220px] mt-2">
        <h3 class="font-semibold text-[16px] hover:text-orange-400 duration-150">{{ Str::limit($title, 20)  }}</h3>
        <p class="text-gray-500 text-[14px] mt-1">{{ Str::limit($description, 30) }}</p>
        <p class="text-[12px] mt-1 italic text-gray-600"><i class="fa-regular fa-user"></i> {{ $name }}</p>
    </div>
</a>
