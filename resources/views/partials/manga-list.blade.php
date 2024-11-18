<div class="flex flex-wrap justify-center gap-8 py-5 md:gap-6 md:justify-start">
    @foreach ($mangas as $manga)
        <x-cardmanga id="{{ $manga->id }}" status="{{ $manga->status }}" title="{{ $manga->title }}" author="{{ $manga->author }}"
            description="{{ $manga->description }}" image="{{ asset('storage/' . $manga->image) }}">
        </x-cardmanga>
    @endforeach
</div>
