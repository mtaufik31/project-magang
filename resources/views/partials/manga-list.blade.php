<div class="flex flex-wrap justify-center gap-1 pb-5 md:gap-6 md:justify-start">
    @forelse ($mangas as $manga)
        <x-cardmanga :manga="$manga" id="{{ $manga->id }}" status="{{ $manga->status }}" title="{{ $manga->title }}"
            author="{{ $manga->author }}" :description="$manga->chapters->last()->chapter_title ?? 'No chapters'" image="{{ asset('storage/' . $manga->image) }}"
            chapter="{{ $manga->chapters->last()->chapter_number ?? 'N/A' }}">
        </x-cardmanga>
    @empty
        <div class="w-full text-center text-gray-500 py-4">
            <script src="https://cdn.lordicon.com/lordicon.js"></script>
            <lord-icon lazy="loading" src="https://cdn.lordicon.com/wjyqkiew.json" trigger="loop"
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
