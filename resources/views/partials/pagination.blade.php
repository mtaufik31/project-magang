<div id="pagination" class="flex justify-center space-x-2 my-4">
    @if ($mangas->onFirstPage())
        <span class="px-4 py-2 text-gray-500 border border-gray-300 rounded">Previous</span>
    @else
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" data-page="{{ $mangas->currentPage() - 1 }}">
            Previous
        </button>
    @endif

    @foreach ($mangas->getUrlRange(1, $mangas->lastPage()) as $page => $url)
        @if ($page == $mangas->currentPage())
            <span class="px-4 py-2 bg-blue-500 text-white rounded">{{ $page }}</span>
        @else
            <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-200" data-page="{{ $page }}">
                {{ $page }}
            </button>
        @endif
    @endforeach

    @if ($mangas->hasMorePages())
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" data-page="{{ $mangas->currentPage() + 1 }}">
            Next
        </button>
    @else
        <span class="px-4 py-2 text-gray-500 border border-gray-300 rounded">Next</span>
    @endif
</div>
