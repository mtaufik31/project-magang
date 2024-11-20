<div class="flex flex-wrap justify-center gap-8 pb-5 md:gap-6 md:justify-start">
    @forelse ($mangas as $manga)
        <x-cardmanga id="{{ $manga->id }}" title="{{ $manga->title }}" status="{{ $manga->status }}"
            author="{{ $manga->author }}" description="{{ $manga->description }}"
            lazy="loading" image="{{ asset('storage/' . $manga->image) }}">
        </x-cardmanga>
    @empty
        <div class="w-full text-center text-gray-500 py-4">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
                colors="primary:#121331,secondary:#eeaa66" style="width:100px;height:100px">
            </lord-icon>
            <p class="text-lg font-semibold">No Mangas Found</p>
        </div>
    @endforelse
</div>

<hr class="border-2 bg-black">
{{-- Pagination --}}
@if ($mangas->hasPages())
    <div class=" pb-8 pt-5">
        <div class="flex items-center justify-center gap-2">
            {{ $mangas->onEachSide(0)->withQueryString()->links() }}
        </div>
    </div>
@endif
